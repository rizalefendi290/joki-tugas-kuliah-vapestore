<?php
session_start();
include 'db.php';

// Mengambil informasi kontak admin
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Insert order into database
    $order_query = "INSERT INTO tb_order (order_name, order_address, order_phone, order_email) VALUES ('$name', '$address', '$phone', '$email')";
    mysqli_query($conn, $order_query);
    $order_id = mysqli_insert_id($conn);
    
    // Insert order details into database
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $product_query = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '$product_id'");
        $product = mysqli_fetch_object($product_query);
        $product_price = $product->product_price;
        $total = $product_price * $quantity;
        
        $order_detail_query = "INSERT INTO tb_order_detail (order_id, product_id, quantity, price, total) VALUES ('$order_id', '$product_id', '$quantity', '$product_price', '$total')";
        mysqli_query($conn, $order_detail_query);
    }
    
    // Clear cart
    unset($_SESSION['cart']);
    
    // Redirect to a thank you page or order summary
    header("Location: thank_you.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <style>
        /* Gaya CSS sesuai dengan yang sebelumnya Anda minta */
        body, h1, h2, h3, p, ul, li, form, input, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #1a202c;
            color: #fff;
            line-height: 1.6;
            margin: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: #2d3748;
            padding: 20px 0;
            margin-bottom: 20px;
        }
        header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        header h1 a {
            color: #fff;
            text-decoration: none;
            font-size: 24px;
        }
        header nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        header nav ul li {
            margin-right: 20px;
        }
        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }
        header nav ul li a:hover {
            color: #38c172;
        }
        .py-6 {
            padding-top: 24px;
            padding-bottom: 24px;
        }
        .text-2xl {
            font-size: 24px;
            margin-bottom: 16px;
            color: #fff;
        }
        .form-group {
            margin-bottom: 16px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #4a5568;
            border-radius: 4px;
            background-color: #2d3748;
            color: #fff;
        }
        .btn {
            padding: 8px 16px;
            color: #fff;
            background-color: #38c172;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .btn-success {
            background-color: #38c172;
        }
        .btn:hover {
            background-color: #2d3748;
        }
        .mt-4 {
            margin-top: 16px;
        }
    </style>
</head>
<body>

<header>
    <div class="container">
        <h1><a href="index.php">Bukawarung</a></h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="tentang-kami.php">Contact Us</a></li>
                <li><a href="produk.php">Produk</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container py-6">
    <h2 class="text-2xl">Checkout</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <textarea id="address" name="address" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="phone">No. Telepon</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-success mt-4">Proses Checkout</button>
    </form>
</div>

<footer>
    <div class="container">
        <p>&copy; 2024 - Bukawarung</p>
    </div>
</footer>

</body>
</html>
