<?php 
	error_reporting(0);
	session_start();
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);

	// Menambah produk ke keranjang
	if (isset($_POST['add_to_cart'])) {
	    $product_id = $_POST['product_id'];
	    $quantity = $_POST['quantity'];

	    if (!isset($_SESSION['cart'])) {
	        $_SESSION['cart'] = array();
	    }

	    if (isset($_SESSION['cart'][$product_id])) {
	        $_SESSION['cart'][$product_id] += $quantity;
	    } else {
	        $_SESSION['cart'][$product_id] = $quantity;
	    }

	    header("Location: pesanan.php");
	    exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FKA Vape Store</title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
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
		}
		.header, .search, .footer {
			background-color: #2d3748;
			padding: 1rem 0;
		}
		.header .container {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.header h1 a {
			color: white;
			text-decoration: none;
			font-size: 1.5rem;
		}
		.header ul {
			display: flex;
			list-style: none;
			padding: 0;
			margin: 0;
		}
		.header ul li {
			margin-left: 1rem;
		}
		.header ul li a {
			color: white;
			text-decoration: none;
			font-size: 1rem;
		}
		.search form {
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.search input[type="text"] {
			padding: 0.5rem 1rem;
			margin-right: 0.5rem;
			border-radius: 0.375rem 0 0 0.375rem;
			border: none;
			background-color: #4a5568;
			color: white;
		}
		.search input[type="submit"] {
			padding: 0.5rem 1rem;
			border-radius: 0 0.375rem 0.375rem 0;
			background-color: #e53e3e;
			color: white;
			border: none;
			cursor: pointer;
		}
		.search input[type="submit"]:hover {
			background-color: #c53030;
		}
		.section {
			padding: 2.5rem 0;
		}
		.box {
			display: flex;
			flex-wrap: wrap;
			gap: 2rem;
		}
		.col-2 {
			flex: 1;
			min-width: 300px;
		}
		.col-2 img {
			width: 100%;
			border-radius: 0.375rem;
		}
		.col-2 h3 {
			font-size: 1.5rem;
			margin-bottom: 1rem;
		}
		.col-2 h4 {
			font-size: 1.25rem;
			margin-bottom: 1rem;
		}
		.col-2 p {
			margin-bottom: 1rem;
		}
		.col-2 form {
			margin-top: 1rem;
		}
		.col-2 form input[type="number"] {
			padding: 0.5rem;
			border-radius: 0.375rem;
			border: 1px solid #4a5568;
			margin-right: 0.5rem;
			width: 60px;
		}
		.col-2 form button {
			padding: 0.5rem 1rem;
			border-radius: 0.375rem;
			background-color: #38c172;
			color: white;
			border: none;
			cursor: pointer;
		}
		.col-2 form button:hover {
			background-color: #2d995b;
		}
		.footer {
			text-align: center;
			padding: 2.5rem 1rem;
		}
		.footer h4 {
			margin-bottom: 0.5rem;
		}
		.footer p {
			margin-bottom: 1rem;
		}
		.footer small {
			display: block;
			margin-top: 1rem;
		}		.container {
			width: 90%;
			max-width: 1200px;
			margin: 0 auto;
		}
		.header, .search, .footer {
			background-color: #2d3748;
			padding: 1rem 0;
		}
        .header {
			display: flex;
            background-color: #2d3748;
            color: white;
            padding: 1rem 0;
            position: relative;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header .container {
            display: flex;
            flex-direction: row;
            justify-content:space-between;
            align-items: center;
			padding: 10px 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 2rem;
            font-weight: bold;
        }
        .header img {
            width: 150px; /* Ukuran logo disesuaikan */
            height: 150px;
			align-items: center;
			margin-left: 180px;
        }
        .navbar ul {
			justify-content: center;
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .navbar ul li {
            margin: 0 10px;
        }
        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .navbar ul li a:hover {
            background-color: #4a5568;
        }
		.search form {
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.search input {
			padding: 0.5rem 1rem;
			margin-right: 0.5rem;
			border-radius: 0.375rem 0 0 0.375rem;
			border: none;
			background-color: #4a5568;
			color: white;
		}
		.search button {
			padding: 0.5rem 1rem;
			border-radius: 0 0.375rem 0.375rem 0;
			background-color: #e53e3e;
			color: white;
			border: none;
			cursor: pointer;
		}
		.search button:hover {
			background-color: #c53030;
		}
	</style>
</head>
<body>
	<!-- header -->
	<header class="header">
    <div class="container">
        <div>
            <h1>FKA VapeStore</h1>
        </div>
		<img src="img/logo.png" alt="Logo Bukawarung" width="300px" height="200px">
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="tentang-kami.php">Contact Us</a></li>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="keluar.php">Keluar</a></li>
            </ul>
        </nav>
    </div>
</header>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- product detail -->
	<div class="section">
		<div class="container">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="produk/<?php echo $p->product_image ?>" width="100%">
				</div>
				<div class="col-2">
					<h3><?php echo $p->product_name ?></h3>
					<h4>Rp. <?php echo number_format($p->product_price) ?></h4>
					<p>Deskripsi :<br>
						<?php echo $p->product_description ?>
					</p>
					<form method="POST" action="">
						<input type="hidden" name="product_id" value="<?php echo $p->product_id ?>">
						<input type="number" name="quantity" value="1" min="1">
						<button type="submit" name="add_to_cart">Tambah ke Keranjang</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p><?php echo $a->admin_address ?></p>

			<h4>Email</h4>
			<p><?php echo $a->admin_email ?></p>

			<h4>No. Hp</h4>
			<p><?php echo $a->admin_telp ?></p>
			<small>&copy; 2024 - FKA Vape Store.</small>
		</div>
	</div>
</body>
</html>
