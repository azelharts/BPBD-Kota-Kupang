<?php
    require "koneksi.php";
    $prakiraan= mysqli_query($con, "SELECT * FROM cuaca");
    $tampil = mysqli_fetch_array($prakiraan);
    function generateRandomString($length = 10){
        $characters ='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i <$length; $i++){
            $randomString .=$characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPBD</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
   
</style>

<body>
<?php require "navbar.php"; ?>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-wrap="true" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"  aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"  aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"  aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"  aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="8000">
        <img src="image/slider1.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <p class="fw-semibold mt-3">SELAMAT DATANG DI</p>
            <h5 class="roboto-black">SIncan <span style="color:white;">Kotaku </span></h5>
            <p class="fw-semibold"> -- Sistem Informasi Kebencanaan Kota Kupang -- </p>
            <a href="tentang.php" class="btn btn-danger text-white mt-3 fw-semibold">Tentang</a>
        </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
        <img src="image/slider2.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <p class="fw-semibold mt-3">SELAMAT DATANG DI</p>
            <h5 class="roboto-black">SIncan Kotaku</h5>
            <p class="fw-semibold"> -- Sistem Informasi Kebencanaan Kota Kupang -- </p>
            <a href="tentang.php" class="btn btn-danger text-white mt-3 fw-semibold">Tentang</a>
        </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
        <img src="image/slider3.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <p class="fw-semibold mt-3">SELAMAT DATANG DI</p>
            <h5 class="roboto-black">SIncan Kotaku</h5>
            <p class="fw-semibold"> -- Sistem Informasi Kebencanaan Kota Kupang -- </p>
            <a href="tentang.php" class="btn btn-danger text-white mt-3 fw-semibold">Tentang</a>
        </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
        <img src="image/slider4.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <p class="fw-semibold mt-3">SELAMAT DATANG DI</p>
            <h5 class="roboto-black">SIncan Kotaku</h5>
            <p class="fw-semibold"> -- Sistem Informasi Kebencanaan Kota Kupang -- </p>
            <a href="tentang.php" class="btn btn-danger text-white mt-3 fw-semibold">Tentang</a>
        </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
        <img src="image/slider5.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <p class="fw-semibold mt-3">SELAMAT DATANG DI</p>
            <h5 class="roboto-black">SIncan Kotaku</h5>
            <p class="fw-semibold"> -- Sistem Informasi Kebencanaan Kota Kupang -- </p>
            <a href="tentang.php" class="btn btn-danger text-white mt-3 fw-semibold">Tentang</a>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <div class="container-fluid">
            <div class="my-2 col-md-12">             
                <h3 class="text-center mt-1">Info prakiraan cuaca</h3>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="text-center"><img src="image/<?php echo $tampil['foto']?>" alt="" width="500px"></div>
                <div class="text-center"><?php echo $tampil['nama'];?></div>
                </form>
            </div>   
        </div> 
        <p class="fw-bold text-center mt-5">Badan Penanggulangan Bencana Daerah Kota Kupang</p>
                <p class="fas fa-telephone text-center">Call Center 081239940976</p>
                <p class="text-center fst-italic mt-2">Ver 1.0 ~ copyright bpbdkotakupang@2024</p>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>