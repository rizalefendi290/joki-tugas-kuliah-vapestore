<?php 
session_start();
include 'db.php';

// Set a default admin ID for demonstration purposes
$default_admin_id = 1;

// Fetch admin details from the database
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$default_admin_id'");
$d = mysqli_fetch_object($query);

// Set session variables for demonstration
$_SESSION['a_global'] = $d;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FKA Vape Store</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
		header a{
			text-decoration: none;
			color: white;
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
			text-align: center;
		}
		.box h4 {
			margin: 0;
			font-size: 1.5rem;
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
			<h1><a href="dashboard.php">FKA Vape Store</a></h1>
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
			<h3>Dashboard</h3>
			<div class="box">
				<h4>Selamat Datang <?php echo $_SESSION['a_global']->nama ?> di FKA Vape Store</h4>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<small>&copy; 2024 - FKA Vape Store</small>
		</div>
	</footer>
</body>
</html>
