<?php
    require "koneksi.php";
    $queryProduk = mysqli_query($conn, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 3");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masagi | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- Searchbar -->
    <div class="container font-roboto text-center text-black">
                <h1>Masagi</h1>
                <h3>Mau makan apa nih hari ini?</h3>
                <div class="col-md-8 offset-md-2">
                    <form method="get" action="#">
                        <div class="input-group input-group-lg my-3">
                            <input type="search" class="form-control" placeholder="Nama makanan" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                            <button type="submit" class="btn color-warna1 text-dark">Cari</button>
                        </div>
                    </form>                                                                     
                </div>
            </div>
    <!-- !Searchbar -->

<!-- Kategori disini -->
    <div class="container fluid py-3">
        <div class="container text-center">
            <h3>Kategori Pilihan</h3>

            <div class="row mt-3">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-Steak d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Steak">Steak</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-Katsu d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Katsu">Katsu</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-Mie d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Mie">Mie</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid warna3 py-5">
        <div class="container text-white text-center">
            <h3>Tentang Masagi</h3>
            <p class="fs-5">
                Masagi adalah salah satu masakan rumahan yang terletak di Bekasi Timur Regensi. Makanan rumahan ini terbuat dari bahan-bahan yang di buat sendiri
            </p>
        </div>
    </div>

<!--Produk-->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk)){ ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="image-box">
                            <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                            <p class="card-text"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga">Rp.<?php echo $data['harga']; ?></p>
                            <a href="produk-detail.php?makanan=<?php echo $data['nama']; ?>" class="btn btn-primary">Detail Makanan</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-primary mt-3" href="produk.php">Lihat Lebih Banyak</a>  
        </div>
    </div>

    
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

    <!-- Custom JS -->
     <script src="./index.js"></script>
</body>
</html>