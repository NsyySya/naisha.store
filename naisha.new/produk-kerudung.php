<?php 
include 'db_function.php';
$produk = getProdukByVarian('kerudung'); 
?>
<?php include 'header.php'; ?>
<section class="produk">
    <div class="container">
        <h2>Produk Kerudung</h2>
        <div class="row">
            <?php foreach ($produk as $p) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="uploads/<?php echo $p['gambar']; ?>" class="card-img-top" alt="<?php echo $p['nama_produk']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $p['nama_produk']; ?></h5>
                            <p class="card-text"><?php echo $p['deskripsi']; ?></p>
                            <a href="single-product.php?id=<?php echo $p['id']; ?>" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
