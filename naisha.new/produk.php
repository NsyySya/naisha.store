<?php
// Menyertakan db_function.php untuk koneksi database dan fungsi
include('db_function.php');

// Mengambil daftar produk
$produk = [];
if (isset($_GET['varian'])) {
    $varian = $_GET['varian'];
    $produk = getProdukByVarian($varian);
} else {
    $produk = getAllProduk();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Naisha - Products</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Pre Header -->
    <div id="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span>The Products</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/images/header-logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item active"><a class="nav-link" href="produk.php">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Featured Items -->
    <div class="featured-page">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="section-heading">
                        <div class="line-dec"></div>
                        <h1>Featured Items</h1>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div id="filters" class="button-group">
                        <a href="produk.php" class="btn btn-primary">All Products</a>
                        <a href="produk.php?varian=Gamis" class="btn btn-primary">Gamis</a>
                        <a href="produk.php?varian=Kerudung" class="btn btn-primary">Kerudung</a>
                        <a href="produk.php?varian=Rok" class="btn btn-primary">Rok</a>
                        <a href="produk.php?varian=Baju Atasan" class="btn btn-primary">Baju Atasan</a>
                        <a href="produk.php?varian=Aksesoris" class="btn btn-primary">Aksesoris</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Grid -->
    <section class="produk">
        <div class="container">
            <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 600;">Semua Produk</h2>
            <div class="product-grid">
                <?php foreach ($produk as $p) : ?>
                    <div class="product-card animate">
                        <a href="single-product.php?id=<?php echo $p['id']; ?>">
                            <img src="assets/images/<?php echo $p['gambar']; ?>" alt="<?php echo $p['nama_produk']; ?>">
                        </a>
                        <h6><?php echo $p['nama_produk']; ?></h6>
                        <a href="single-product.php?id=<?php echo $p['id']; ?>" class="btn-naisha">Lihat Detail</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo">
                        <img src="assets/images/header-logo.png" alt="">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="social-icons">
                        <ul>
                        <li><a href="https://www.instagram.com/naisha_store02?igsh=MXdjd3N3b2l6NGlpdA=="><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/isotope.js"></script>
</body>

</html>
