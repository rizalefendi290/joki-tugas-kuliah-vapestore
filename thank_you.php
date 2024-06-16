<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <style>
        body, h1, h2, h3, p, ul, li, form, input, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #1a202c;
            color: #fff;
            line-height: 1.6;
            margin: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: #2d3748;
            padding: 20px 0;
            margin-bottom: 20px;
        }
        header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        header h1 a {
            color: #fff;
            text-decoration: none;
            font-size: 24px;
        }
        header nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        header nav ul li {
            margin-right: 20px;
        }
        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }
        header nav ul li a:hover {
            color: #38c172;
        }
        .py-6 {
            padding-top: 24px;
            padding-bottom: 24px;
        }
        .text-2xl {
            font-size: 24px;
            margin-bottom: 16px;
            color: #fff;
        }
    </style>
</head>
<body>

<header>
    <div class="container">
        <h1><a href="index.php">Bukawarung</a></h1>
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

<div class="container py-6">
    <h2 class="text-2xl">Terima Kasih!</h2>
    <p>Pesanan Anda telah kami terima dan sedang diproses.</p>
    <p>Anda akan segera mendapatkan email konfirmasi dengan detail pesanan Anda.</p>
</div>

<footer>
    <div class="container">
        <p>&copy; 2024 - Bukawarung</p>
    </div>
</footer>

</body>
</html>
