<?php
// db_function.php
// Sambungan ke database
$koneksi = mysqli_connect('localhost', 'root', '', 'naisha');

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil semua produk
function getAllProduk() {
    global $koneksi;
    $query = "SELECT * FROM produk ORDER BY id DESC"; 
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_error($koneksi));
    }

    $produk = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $produk[] = $row;
    }
    return $produk;
}

// Ambil produk by varian
function getProdukByVarian($varian) {
    global $koneksi;
    $query = "SELECT * FROM produk WHERE varian = '$varian'";
    $result = mysqli_query($koneksi, $query);

    $produk = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $produk[] = $row;
    }
    return $produk;
}

// Cari produk
function searchProduk($keyword) {
    global $koneksi;
    $keyword = mysqli_real_escape_string($koneksi, $keyword);
    $query = "SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi LIKE '%$keyword%' ORDER BY updated_at DESC";
    $result = mysqli_query($koneksi, $query);

    $produk = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $produk[] = $row;
    }
    return $produk;
}

// Tambah produk
function tambahProduk($data) {
    global $koneksi;
    $nama = mysqli_real_escape_string($koneksi, $data['nama_produk']);
    $deskripsi = mysqli_real_escape_string($koneksi, $data['deskripsi']);
    $harga = (int)$data['harga'];
    $gambar = mysqli_real_escape_string($koneksi, $data['gambar']);
    $varian = mysqli_real_escape_string($koneksi, $data['varian']);

    $query = "INSERT INTO produk (nama_produk, deskripsi, harga, gambar, varian, updated_at) 
              VALUES ('$nama', '$deskripsi', '$harga', '$gambar', '$varian', NOW())";
    return mysqli_query($koneksi, $query);
}

// Edit produk
function editProduk($id, $data) {
    global $koneksi;
    $nama = mysqli_real_escape_string($koneksi, $data['nama_produk']);
    $deskripsi = mysqli_real_escape_string($koneksi, $data['deskripsi']);
    $harga = (int)$data['harga'];
    $gambar = mysqli_real_escape_string($koneksi, $data['gambar']);
    $varian = mysqli_real_escape_string($koneksi, $data['varian']);

    $query = "UPDATE produk SET 
                nama_produk='$nama', 
                deskripsi='$deskripsi', 
                harga='$harga', , 
                gambar='$gambar', 
                varian='$varian',
                updated_at=NOW()
              WHERE id=$id";
    return mysqli_query($koneksi, $query);
}

// Ambil produk by id
function getProdukById($id) {
    global $koneksi;
    $query = "SELECT * FROM produk WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}
?>
