<?php 
	include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
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
			color: white;
		}
		.table td {
			background-color: #2d3748;
		}
		.table a {
			color: #63b3ed;
			text-decoration: none;
		}
		.table a:hover {
			text-decoration: underline;
		}
		.footer {
			background-color: #2d3748;
			text-align: center;
			padding: 2rem 1rem;
			position: absolute;
			bottom: 0;
			width: 100%;
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
			text-decoration: none;
		}
		.btn:hover {
			background-color: #c53030;
		}
	</style>
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php" style="text-decoration:none; color:white;">Bukawarung</a></h1>
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
			<h3>Data Produk</h3>
			<div class="box">
				<p><a href="tambah-produk.php" class="btn" >Tambah Data</a></p>
				<table class="table">
					<thead>
						<tr>
							<th width="60px">No</th>
							<th>Kategori</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Gambar</th>
							<th>Status</th>
							<th width="150px">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
							if(mysqli_num_rows($produk) > 0){
								while($row = mysqli_fetch_array($produk)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td><?php echo $row['product_name'] ?></td>
							<td>Rp. <?php echo number_format($row['product_price']) ?></td>
							<td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="produk/<?php echo $row['product_image'] ?>" width="50px"> </a></td>
							<td><?php echo ($row['product_status'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
							<td>
								<a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> || 
								<a href="proses-hapus.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
						<tr>
							<td colspan="7">Tidak ada data</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- footer -->

</body>
</html>
