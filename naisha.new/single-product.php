<?php 
include 'db_function.php';
$id = $_GET['id'];
$produk = getProdukById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $produk['nama_produk']; ?> - Naisha</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f9f9f9;
        }
        .product-img {
            width: 300px;
            height: 300px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        h2 {
            margin-top: 20px;
            font-size: 28px;
            color: #333;
        }
        p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }
        .price {
            font-size: 22px;
            color: #009688;
            font-weight: bold;
            margin-top: 15px;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 30px;
            text-decoration: none;
            color: #009688;
            font-weight: bold;
            border: 2px solid #009688;
            padding: 8px 16px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .back-btn:hover {
            background-color: #009688;
            color: white;
        }
    </style>
</head>
<body>

    <!-- Tombol Balik -->
    <a href="produk.php" class="back-btn">← Kembali ke Produk</a>

    <!-- Detail Produk -->
    <h2><?php echo $produk['nama_produk']; ?></h2>

    <!-- GAMBAR -->
    <img src="assets/images/<?php echo $produk['gambar']; ?>" alt="<?php echo $produk['nama_produk']; ?>" class="product-img">

    <!-- Deskripsi -->
    <p><?php echo $produk['deskripsi']; ?></p>

    <!-- Harga -->
    <p class="price">Harga: Rp<?php echo number_format($produk['harga'], 0, ',', '.'); ?></p>

</body>
</html>
