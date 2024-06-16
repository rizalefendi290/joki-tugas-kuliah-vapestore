<?php
session_start();
include 'db.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika belum login, redirect ke halaman login
    $_SESSION['error'] = "Silakan login terlebih dahulu untuk melanjutkan.";
    header("Location: login.php");
    exit();
}
// Menghapus item dari keranjang
if (isset($_POST['remove'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
}

// Melanjutkan ke checkout
if (isset($_POST['checkout'])) {
    // Anda bisa menambahkan proses checkout di sini
    header("Location: checkout.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Anda</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #1a202c;
            color: white;
            font-family: 'Quicksand', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2.5rem 0;
        }
        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
            color: #e53e3e;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }
        table, th, td {
            border: 1px solid #4a5568;
        }
        th, td {
            padding: 0.75rem;
            text-align: left;
            color: white;
        }
        th {
            background-color: #2d3748;
        }
        td {
            background-color: #4a5568;
        }
        .total {
            text-align: right;
            font-size: 1.25rem;
            color: #e53e3e;
            margin-top: 1rem;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }
        .actions form, .actions a {
            display: inline;
        }
        .actions button {
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            background-color: #38c172;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }
        .actions button:hover {
            background-color: #2d995b;
        }
        .actions a button {
            background-color: #e53e3e;
        }
        .actions a button:hover {
            background-color: #c53030;
        }
        .empty-cart {
            text-align: center;
            font-size: 1.25rem;
            color: #e53e3e;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pesanan Anda</h1>
        <?php if (!empty($_SESSION['cart'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_price = 0;
                foreach ($_SESSION['cart'] as $product_id => $quantity):
                    $result = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = $product_id");
                    $product = mysqli_fetch_object($result);
                    $total = $product->product_price * $quantity;
                    $total_price += $total;
                ?>
                <tr>
                    <td><?php echo $product->product_name; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>Rp. <?php echo number_format($product->product_price); ?></td>
                    <td>Rp. <?php echo number_format($total); ?></td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <button type="submit" name="remove" style="padding: 0.5rem 1rem; border-radius: 0.375rem; background-color: #e53e3e; color: white; border: none; cursor: pointer; font-size: 1rem;">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="total">
            Total Harga: Rp. <?php echo number_format($total_price); ?>
        </div>
        <div class="actions">
            <form method="POST" action="">
                <button type="submit" name="checkout">Lanjutkan ke Checkout</button>
            </form>
            <a href="produk.php"><button style="background-color: #e53e3e; color: white; border: none; cursor: pointer; font-size: 1rem; padding: 0.75rem 1.5rem; border-radius: 0.375rem;">Tambah Produk Lain</button></a>
        </div>
        <?php else: ?>
        <p class="empty-cart">Keranjang Anda kosong.</p>
        <?php endif; ?>
    </div>
</body>
</html>
