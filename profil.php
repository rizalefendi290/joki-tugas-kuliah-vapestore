<?php 
session_start();
include 'db.php';

// Check if session id is set, else set a default id for demonstration purposes
if(!isset($_SESSION['id'])) {
    $_SESSION['id'] = 1; // Default admin ID
}

// Fetch admin details from the database
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '".$_SESSION['id']."' ");
$d = mysqli_fetch_object($query);
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
        header a{
            text-decoration: none;
            color: white;
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
        .input-control {
            width: 100%;
            padding: 0.5rem;
            border-radius: 0.375rem;
            border: 1px solid #4a5568;
            background-color: #2d3748;
            color: white;
            margin-bottom: 1rem;
        }
        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            background-color: #e53e3e;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #c53030;
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
    </style>
</head>
<body>
    <!-- header -->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Bukawarung</a></h1>
            <ul>
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
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->nama ?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                    <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->no_telp ?>" required>
                    <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->email ?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->alamat ?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </form>
            </div>

            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                    <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
                </form>
                <?php 
                    if(isset($_POST['ubah_password'])){

                        $pass1  = $_POST['pass1'];
                        $pass2  = $_POST['pass2'];

                        if($pass2 != $pass1){
                            echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                        }else{

                            $u_pass = mysqli_query($conn, "UPDATE users SET 
                                        password = '".MD5($pass1)."'
                                        WHERE id = '".$d->id."' ");
                            if($u_pass){
                                echo '<script>alert("Ubah data berhasil")</script>';
                                echo '<script>window.location="profil.php"</script>';
                            }else{
                                echo 'gagal '.mysqli_error($conn);
                            }
                        }

                    }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <div class="container">
            <small>&copy; 2020 - Bukawarung.</small>
        </div>
    </footer>
</body>
</html>
