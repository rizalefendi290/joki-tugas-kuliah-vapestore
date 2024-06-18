<?php 
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FKA Vape Store</title>
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<style>
		body {
			background-color: #1a202c;
			color: white;
			font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
            width: 200px; /* Ukuran logo disesuaikan */
            height: 200px;
			align-items: center;
			margin-left: 200px;
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
		.banner-thumbnail {
			text-align: center;
			margin: 2.5rem 4rem;
		}
		.banner-thumbnail img {
			max-width: 100%;
		}
		.kategori {
			background-color: #1a202c;
			padding: 2.5rem 0;
		}
		.kategori h3, .produk-terbaru h3, .section-welcome h1 {
			text-align: center;
			margin-bottom: 1.5rem;
		}
		.kategori .grid {
			display: grid;
			grid-template-columns: repeat(2, 1fr);
			gap: 1rem;
		}
		.kategori .grid a {
			text-align: center;
			display: block;
			padding: 1rem;
			border-radius: 0.375rem;
			background-color: #2d3748;
			text-decoration: none;
			color: white;
			transition: background-color 0.3s;
		}
		.kategori .grid a:hover {
			background-color: #4a5568;
		}
		.kategori .grid img {
			width: 50px;
			margin-bottom: 0.5rem;
		}
		.produk-terbaru {
			padding: 2.5rem 0;
		}
		.produk-terbaru .grid {
			display: grid;
			grid-template-columns: repeat(1, 1fr);
			gap: 1.5rem;
		}
		.produk-terbaru .grid .card {
			background-color: #2d3748;
			border-radius: 0.375rem;
			overflow: hidden;
			transition: transform 0.3s;
		}
		.produk-terbaru .grid .card:hover {
			transform: scale(1.05);
		}
		.produk-terbaru .grid .card img {
			width: 100%;
			height: 300px;
		}
		.produk-terbaru .grid .card .content {
			padding: 1rem;
		}
		.produk-terbaru .grid .card .content h5 {
			font-size: 1.25rem;
			margin-bottom: 0.5rem;
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
		}
		.section-welcome {
			padding: 2.5rem 0;
			text-align: center;
		}
		@media (min-width: 768px) {
			.kategori .grid {
				grid-template-columns: repeat(4, 1fr);
			}
			.produk-terbaru .grid {
				grid-template-columns: repeat(3, 1fr);
			}
		}
		.section {
            background-color: #2d3748;
            padding: 50px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .container-thumbnail {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 kolom dengan lebar yang sama */
            gap: 20px; /* Jarak antar elemen */
        }
        .col {
            background-color: transparent;
			padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
			text-align: center;
        }
        .col img {
            max-width: 100%;
            height: 400px;
            display: block;
			border-radius: 15px;
			transition: transform 0.3s ease;
        }
		.col:hover img {
            transform: scale(1.1); /* Zoom sedikit saat dihover */
        }
        .col h1 {
            font-size: 1.2rem;
            color: white;
            line-height: 1.4;
        }
	</style>
</head>
<body>

	<!-- Header -->
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
	<!-- Search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk">
				<button type="submit" name="cari">Cari Produk</button>
			</form>
		</div>
	</div>

	<!-- Banner Thumbnail -->
	<div class="banner-thumbnail">
		<img src="img/thumbnail.png" alt="Thumbnail">
	</div>

	<!-- Kategori -->
	<div class="kategori">
		<div class="container">
			<h3>Kategori</h3>
			<div class="grid">
				<?php 
					$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
				<a href="produk.php?kat=<?php echo $k['category_id'] ?>">
					<img src="img/icon-kategori.png" alt="Icon Kategori">
					<p><?php echo $k['category_name'] ?></p>
				</a>
				<?php }}else{ ?>
				<p class="text-center">Kategori tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- Section Welcome -->
	<div class="section-welcome">
		<div class="container">
			<h1>WELCOME TO VAPESTORE</h1>
		</div>
	</div>
	<div class="section">
		<div class="container-thumbnail">
			<div class="col">
				<img src="img/liquid.png" alt="">
				<h1>Producer of the vapeZOO eliquids. Currently consist of 26 different premium flavors.</h1>
			</div>
			<div class="col">
				<img src="img/thumbnail1.png" alt="">
				<h1>Sole Authorized Distributor for Craving Vapor for South East Asia</h1>
			</div>
			<div class="col">
				<img src="img/batre.png" alt="">
				<h1>vapeZOO is the Exclusive Distributor for NPE/Molicel Vape Batteries.</h1>
			</div>
			<div class="col">
				<img src="img/kapas.png" alt="">
				<h1>Exclusive Distributor for Cloud9 Cotton Australia for Indonesia and Malaysia.  #TheBestVapingExperienxe</h1>
			</div>
		</div>
	</div>
	<!-- Produk Terbaru -->
	<div class="produk-terbaru">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="grid">
				<?php 
					$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 3");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>
				<div class="card">
					<a href="detail-produk.php?id=<?php echo $p['product_id'] ?>" style="text-decoration:none; color:white; text-align: center">
						<img src="produk/<?php echo $p['product_image'] ?>" alt="<?php echo $p['product_name'] ?>">
						<div class="content">
							<h5><?php echo substr($p['product_name'], 0, 30) ?></h5>
							<p>Rp. <?php echo number_format($p['product_price']) ?></p>
						</div>
					</a>
				</div>
				<?php }}else{ ?>
				<p class="text-center">Produk tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p><?php echo $a->admin_address ?></p>

			<h4>Email</h4>
			<p><?php echo $a->admin_email ?></p>

			<h4>No. Hp</h4>
			<p><?php echo $a->admin_telp ?></p>

			<small>&copy; 2024 - FKA Vape Store</small>
		</div>
	</footer>

</body>
</html>
