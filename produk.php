<?php 
error_reporting(0);
include 'db.php';

// Mengambil informasi kontak admin
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

// Inisialisasi variabel pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';
$kategori = isset($_GET['kat']) ? $_GET['kat'] : '';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FKA Vape Store</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap">
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
        header {
            background-color: #2d3748;
            padding: 1rem 0;
        }
        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 a {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
        }
        header ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        header ul li {
            margin-left: 1rem;
        }
        header ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }
        .search {
            background-color: #2d3748;
            padding: 1rem 0;
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
        .col-4 {
            flex: 1;
            min-width: 300px;
            background-color: #2d3748;
            padding: 1rem;
            border-radius: 0.375rem;
            text-align: center;
            transition: transform 0.3s ease;
        }
        .col-4:hover {
            transform: scale(1.05);
        }
        .col-4 img {
            width: 250px;
            height: 200px;
            border-radius: 0.375rem;
        }
        .col-4 .nama {
            font-size: 1.25rem;
            margin: 1rem 0 0.5rem;
        }
        .col-4 .harga {
            color: #a0aec0;
            font-size: 1rem;
        }
        .footer {
            background-color: #2d3748;
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
                <input type="text" name="search" placeholder="Cari Produk" value="<?php echo htmlspecialchars($search); ?>">
                <input type="hidden" name="kat" value="<?php echo htmlspecialchars($kategori); ?>">
                <input type="submit" name="cari" value="Cari Produk">
            </form>
        </div>
    </div>

    <!-- new product -->
    <div class="section">
        <div class="container">
            <h3>Produk</h3>
            <div class="box">
                <?php 
                // Query untuk mendapatkan produk berdasarkan pencarian dan kategori
                $whereClause = "";
                if (!empty($search) || !empty($kategori)) {
                    $whereClause = "AND product_name LIKE ? AND category_id LIKE ?";
                }

                $stmt = $conn->prepare("SELECT * FROM tb_product WHERE product_status = 1 $whereClause ORDER BY product_id DESC");
                
                // Bind parameter untuk prepared statement
                if (!empty($search) || !empty($kategori)) {
                    $searchParam = "%$search%";
                    $stmt->bind_param("ss", $searchParam, $kategori);
                }

                $stmt->execute();
                $result = $stmt->get_result();

                if($result->num_rows > 0){
                    while($p = $result->fetch_assoc()){
                ?>  
                    <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>" style="text-decoration:none; color:white;">
                        <div class="col-4">
                            <img src="produk/<?php echo $p['product_image'] ?>">
                            <p class="nama"><?php echo htmlspecialchars(substr($p['product_name'], 0, 30)); ?></p>
                            <p class="harga">Rp. <?php echo number_format($p['product_price']); ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                    <p>Produk tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo htmlspecialchars($a->admin_address); ?></p>

            <h4>Email</h4>
            <p><?php echo htmlspecialchars($a->admin_email); ?></p>

            <h4>No. Hp</h4>
            <p><?php echo htmlspecialchars($a->admin_telp); ?></p>
            <small>&copy; 2024 - FKA Vape Store</small>
        </div>
    </div>
</body>
</html>
