<?php 
	include 'db.php';
	session_start();

	if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
		echo '<script>';
		echo 'var isAdmin = false;'; // Set isAdmin menjadi false jika bukan admin
		echo '</script>';
	} else {
		echo '<script>';
		echo 'var isAdmin = true;'; // Set isAdmin menjadi true jika admin
		echo '</script>';
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
		header a{
			text-decoration: none;
			color: white;
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
		.box {
			background-color: #2d3748;
			padding: 2rem;
			border-radius: 0.375rem;
		}
		.table {
			width: 100%;
			border-collapse: collapse;
		}
		.table th, .table td {
			padding: 1rem;
			border: 1px solid #4a5568;
			text-align: left;
		}
		.table th {
			background-color: #4a5568;
		}
		.table tr:nth-child(even) {
			background-color: #2d3748;
		}
		.table tr:nth-child(odd) {
			background-color: #1a202c;
		}
		.table a {
			color: #63b3ed;
			text-decoration: none;
		}
		.table a:hover {
			text-decoration: underline;
		}
		footer {
			background-color: #2d3748;
			text-align: center;
			padding: 2rem 1rem;
		}
		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 0 1rem;
		}
		.btn {
			padding: 0.5rem 1rem;
			border-radius: 0.375rem;
			background-color: #e53e3e;
			color: white;
			border: none;
			cursor: pointer;
			display: inline-block;
			text-align: center;
		}
		.btn:hover {
			background-color: #c53030;
		}
	</style>
	    <script>
        // Script JavaScript untuk menampilkan alert jika bukan admin
        window.onload = function() {
            // Cek apakah pengguna adalah admin
            var isAdmin = "<?php echo isset($_SESSION['role']) && $_SESSION['role'] === 'admin' ?>";
            if (!isAdmin) {
                alert("Anda tidak diizinkan mengakses halaman ini.");
                window.location.href = "index.php"; // Ganti dengan halaman yang sesuai
            }
        };
    </script>
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
			<h3>Data Kategori</h3>
			<div class="box">
				<p><a href="tambah-kategori.php" class="btn">Tambah Data</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
							if(mysqli_num_rows($kategori) > 0){
								while($row = mysqli_fetch_array($kategori)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td>
								<a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || 
								<a href="proses-hapus.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
						<tr>
							<td colspan="3">Tidak ada data</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- footer -->
	<footer>
		<div class="container">
			<small>&copy; 2024 - FKA Vape Store</small>
		</div>
	</footer>
</body>
</html>
