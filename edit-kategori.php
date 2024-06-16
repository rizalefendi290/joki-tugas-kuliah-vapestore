<?php 
	session_start();
	include 'db.php';


	$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($kategori) == 0){
		echo '<script>window.location="data-kategori.php"</script>';
	}
	$k = mysqli_fetch_object($kategori);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukawarung</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
	<style>
		body {
			background-color: #1a202c;
			color: white;
			font-family: 'Quicksand', sans-serif;
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
			max-width: 1200px;
			margin: 0 auto;
			padding: 0 1rem;
		}
		.box {
			background-color: #2d3748;
			padding: 2rem;
			border-radius: 0.375rem;
		}
		.input-control {
			width: calc(100% - 20px); /* Menyesuaikan dengan gaya input lainnya */
			padding: 10px;
			margin-bottom: 10px;
			border: 1px solid #4a5568;
			border-radius: 0.375rem;
			font-size: 14px;
			box-sizing: border-box;
			background-color: #2d3748;
			color: white;
		}
		.input-control:focus {
			outline: none;
			border-color: #63b3ed;
		}
		.btn {
			padding: 0.5rem 1rem;
			border-radius: 0.375rem;
			background-color: #63b3ed;
			color: white;
			border: none;
			cursor: pointer;
			display: inline-block;
			text-align: center;
			text-decoration: none;
		}
		.btn:hover {
			background-color: #4299e1;
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
			<h1><a href="dashboard.php">Bukawarung</a></h1>
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
			<h3>Edit Data Kategori</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k->category_name ?>" required>
					<input type="submit" name="submit" value="Submit" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nama = ucwords($_POST['nama']);

						$update = mysqli_query($conn, "UPDATE tb_category SET 
												category_name = '".$nama."'
												WHERE category_id = '".$k->category_id."' ");

						if($update){
							echo '<script>alert("Edit data berhasil")</script>';
							echo '<script>window.location="data-kategori.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}

					}
				?>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2020 - Bukawarung.</small>
		</div>
	</footer>
</body>
</html>