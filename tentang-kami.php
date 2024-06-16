<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukawarung</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
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
		}
        .header, .search, .footer {
			background-color: #2d3748;
		}
		header {
			background-color: #2d3748;
            justify-content: space-between;
            align-items: center;
            display: flex;
		}
		header h1 {
			margin: 0;
			font-size: 2rem;
		}
        .header nav ul {
			display: flex;
			list-style: none;
			padding: 0;
			margin: 0;
		}
		header ul {
			list-style: none;
			padding: 0;
			margin: 0;
			display: flex;
			justify-content:right;
		}
        .header nav ul li {
			margin-left: 1rem;
		}
		.header nav ul li a {
			color: white;
			text-decoration: none;
			font-size: 1rem;
		}
		.search {
			background-color: #2d3748;
			padding: 1rem 0;
			text-align: center;
		}
		.search form {
			display: inline-block;
		}
		.search input[type="text"] {
			padding: 0.5rem 1rem;
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
		.card {
			background-color: #2d3748;
			border: none;
			border-radius: 0.375rem;
			overflow: hidden;
			margin-bottom: 1.5rem;
			text-align: center;
			padding: 1rem;
		}
		.card img {
			width: 100%;
			border-radius: 0.375rem 0.375rem 0 0;
		}
		.card-title {
			font-size: 1.25rem;
			margin: 1rem 0 0.5rem;
		}
		.card-text {
			color: #a0aec0;
			font-size: 1rem;
		}
		.footer {
			background-color: #2d3748;
			text-align: center;
			padding: 2.5rem 1rem;
		}
		.footer h4, .footer p, .footer small {
			margin: 0.5rem 0;
		}
		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 0 1rem;
		}
		.row {
			display: flex;
			flex-wrap: wrap;
			margin: 0 -1rem;
		}
		.col-4, .col-6 {
			padding: 0 1rem;
			flex: 1;
		}
		.col-4 {
			max-width: 33.333%;
		}
		.col-6 {
			max-width: 50%;
		}
		@media (max-width: 768px) {
			.col-4, .col-6 {
				max-width: 100%;
			}
		}
	</style>
</head>
<body>
	<!-- header -->
	<header class="header">
		<div class="container">
			<h1><a href="index.php" style="text-decoration:none; color:white;">Bukawarung</a></h1>
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

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- Profile Team -->
	<div class="container section">
		<h1 class="text-4xl my-10">Profile Tim</h1>
		<div class="row">
			<div class="col-4">
				<div class="card">
					<img src="img/pisca.jpg" alt="">
					<div class="card-body">
						<h5 class="card-title">Nama : Piska Puji Lestari</h5>
						<p class="card-text">NPM : 2118320708</p>
						<p class="card-text">Prodi : Pendidikan Teknologi Informasi</p>
						<p class="card-text">Deskripsi : Terus belajar dan mengembangkan diri dapat memberikan rasa pencapaian dan kepuasan.</p>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<img src="produk/barang1.jpg" alt="">
					<div class="card-body">
						<h5 class="card-title">Nama</h5>
						<p class="card-text">Prodi</p>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
					<img src="produk/barang1.jpg" alt="">
					<div class="card-body">
						<h5 class="card-title">Nama</h5>
						<p class="card-text">Prodi</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Us -->
	<div class="container section">
		<h1 class="text-4xl mb-10">Contact Us</h1>
		<div class="row">
			<div class="col-6">
				<form>
					<div class="mb-3">
						<label for="email" class="form-label">Email address</label>
						<input type="email" class="form-control" id="email" placeholder="name@example.com" style="width: 100%; padding: 0.5rem; border-radius: 0.375rem; border: 1px solid #4a5568; background-color: #2d3748; color: white;">
					</div>
					<div class="mb-3">
						<label for="message" class="form-label">Message</label>
						<textarea class="form-control" id="message" rows="3" style="width: 100%; padding: 0.5rem; border-radius: 0.375rem; border: 1px solid #4a5568; background-color: #2d3748; color: white;"></textarea>
					</div>
					<button type="submit" class="btn" style="padding: 0.5rem 1rem; border-radius: 0.375rem; background-color: #e53e3e; color: white; border: none; cursor: pointer;">Kirim</button>
				</form>
			</div>
			<div class="col-6">
				<div class="row">
					<div class="col-6">
						<h1>icon</h1>
						<h1>icon</h1>
					</div>
					<div class="col-6">
						<h1>email</h1>
						<h1>phone</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p>Jl. Example No. 123, Jakarta</p>
			<h4>Email</h4>
			<p>example@example.com</p>
			<h4>No. Hp</h4>
			<p>+628123456789</p>
			<small>&copy; 2024 - Bukawarung.</small>
		</div>
	</div>
</body>
</html>
