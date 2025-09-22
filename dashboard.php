<?php
    require "session.php";
    require "koneksi.php";

    $querykejadian = mysqli_query ($con, "SELECT * FROM kejadian");
    $jumlahkejadian = mysqli_num_rows($querykejadian);

    $queryinput= mysqli_query($con, "SELECT * FROM cuaca");
    $jumlahinput = mysqli_num_rows($queryinput);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
</head>

<style>
    .kotak {
        border:solid;
    }
    .summary-kejadian{
        background-color: #379777;
        border-radius:15px;
    }

    .summary-cuaca{
        background-color: #FFA823;
        border-radius:15px;
    }
    .no-decoration{
        text-decoration: none;
    }
</style>
<body>
    <?php require "navigation.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i> Dashboard
                </li>
            </ol>
        </nav>
        <h2>Halo <?php echo $_SESSION['username']; ?> </h2>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-kejadian p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-align-justify fa-7x text-white-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-5">Data Kejadian & Dampak Bencana</h3>
                                <p class="fs-8"><?php echo $jumlahkejadian; ?> kejadian</p>
                                <p><a href="kejadian.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-cuaca p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-cloud-rain fa-7x text-white-50"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-5">Data Prakiraan Cuaca Kupang</h3>
                                <p class="fs-8"><?php echo $jumlahinput; ?> prakiraan</p>
                                <p><a href="listcuaca.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 col-12">
            <h3 class="fs-5 mt-3">Peta Kebencanaan Kota Kupang</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125666.24984448765!2d123.53231649798145!3d-10.174940697042773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c569b6760b37163%3A0x26030bfcc0920532!2sKupang%2C%20Kota%20Kupang%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sid!2sid!4v1720509366298!5m2!1sid!2sid" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>