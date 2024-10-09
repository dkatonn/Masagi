<?php
    require "koneksi.php";

    $makanan = htmlspecialchars($_GET['makanan']);
    $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama='$makanan'");
    $produk = mysqli_fetch_array($queryProduk);

    $queryProdukTerkait = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]'  LIMIT 4");
    //$queryProdukTerkait = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masagi | Detail Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?> 
    
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <img src="image/<?php echo $produk['foto']; ?>" class="w-100" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $produk['nama']; ?></h1>
                    <p class="fs-5">
                        <?php echo $produk['detail']; ?>
                    </p>
                    <p class="fs-2">
                        Rp.<?php echo $produk['harga']; ?>
                    </p>
                    <p class="fs-4">Status Ketersedian : <strong><?php echo $produk['ketersediaan_stok']; ?></strong></p>
                    <form method="POST" action="keranjang.php?id=<?php echo $produk['id']; ?>"></form>
                    <!-- qty produk -->
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="qty-d-flex">
                                <h6>Berapa Banyak :</h6>
                                <div class="px-4 d-flex">
                                    <button class="qty-up border bg-light"><i class="fas fa-angle-up"></i></button>
                                    <input type="text" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                    <button class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                </div>
                            </>
                        </div>
                            <div class="pt-4 div-col-9">
                                <div class="col col-lg-5 mb-3">
                                    <button type="submit" class="btn btn-danger form-control">Beli Sekarang</button>
                                </div>
                                <div class="col-lg-5 mb-3">
                                    <button type="submit" class="btn btn-warning form-control">Tambahkan Ke Keranjang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- !qty produk -->
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 warna1">
        <div class="container">
            <h2 class="text-center text-white mb-2">Produk Yang Serupa</h2>

            <div class="row">
                <?php while($data=mysqli_fetch_array($queryProdukTerkait)){ ?>
                <div class="col-md-6 col-lg-3 mb-3">
                    <a href="produk-detail.php?makanan=<?php echo $data['nama']; ?>">
                        <img src="image/<?php echo $data['foto']; ?>" class="img-fluid img-thumbnail produk-terkait" alt="">
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>    
</body>
</html>