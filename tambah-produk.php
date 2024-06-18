<?php 
include 'db.php';

if(isset($_POST['submit'])) {
    // Menampung inputan dari form
    $kategori   = $_POST['kategori'];
    $nama       = $_POST['nama'];
    $harga      = $_POST['harga'];
    $deskripsi  = $_POST['deskripsi'];
    $status     = $_POST['status'];

    // Menampung data file yang diupload
    $filename = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $type1 = explode('.', $filename);
    $type2 = end($type1);
    $newname = 'produk' . time() . '.' . $type2;

    // Menampung data format file yang diizinkan
    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

    // Validasi format file
    if (!in_array(strtolower($type2), $tipe_diizinkan)) {
        // Jika format file tidak diizinkan
        echo '<script>alert("Format file tidak diizinkan")</script>';
    } else {
        // Jika format file diizinkan, proses upload
        if (move_uploaded_file($tmp_name, './produk/' . $newname)) {
            // Gunakan prepared statement untuk mencegah SQL Injection
            $stmt = $conn->prepare("INSERT INTO tb_product (category_id, product_name, product_price, product_description, product_image, product_status) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isdssi", $kategori, $nama, $harga, $deskripsi, $newname, $status);

            // Eksekusi query
            if ($stmt->execute()) {
                echo '<script>alert("Tambah data berhasil")</script>';
                echo '<script>window.location="data-produk.php"</script>';
            } else {
                echo '<script>alert("Tambah data gagal")</script>';
                echo 'Error: ' . $stmt->error;
            }
        } else {
            echo '<script>alert("Upload file gagal")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FKA Vape Store</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #1a202c;
            color: white;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #2d3748;
            padding: 1rem 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2rem;
        }
        header ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        header ul li {
            margin: 0 1rem;
        }
        header ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.25rem;
        }
        .section {
            padding: 2.5rem 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        .box {
            background-color: #2d3748;
            padding: 2rem;
            border-radius: 0.375rem;
        }
        .input-control {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            background-color: #2d3748;
            color: white;
        }
        .input-control:focus {
            outline: none;
            border-color: #63b3ed;
        }
        .btn {
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            background-color: #e53e3e;
            color: white;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            font-size: 1rem;
        }
        .btn:hover {
            background-color: #c53030;
        }
        .footer {
            background-color: #2d3748;
            text-align: center;
            padding: 2rem 1rem;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php" style="text-decoration:none; color: white;">FKA Vape Store</a></h1>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </div>
    </header>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Tambah Data Produk</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="kategori" required>
                        <option value="">--Pilih--</option>
                        <?php 
                            $kategori_query = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while($row = mysqli_fetch_array($kategori_query)){
                                echo '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
                            }
                        ?>
                    </select>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                    <select class="input-control" name="status">
                        <option value="">--Pilih--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->


    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
</html>
