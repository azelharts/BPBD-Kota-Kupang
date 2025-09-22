<?php
    
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
    <div class="container-fluid belakang">
        <div class="container-fluid">
            <div class="text-center mt-3">
                <h2 class="fw-bold text-center text-light mt-3">POSKO BPBD KOTA KUPANG</h2>
                <h3 class="bx bxs-phone-call text-center text-light mt-5">Call Center</h3>
                <h5 class="text-center text-light">Posko BPBD Kota Kupang 081239940976</h5><br>
                <h3 class="fas fa-telephone text-center mt-5 text-light">Alamat</h3>
                <h5 class="text-center text-light">Jalan Sam Ratulangi III, Nomor 7, Kelapa Lima, Kota Kupang, 85228</h5><br>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d150.04108831380054!2d123.62423338210239!3d-10.148690968574044!2m3!1f195.18987341772214!2f45!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x2c5683315931b0bd%3A0x21662bbf23869e13!2sPosko%20Bencana%20BPBD%20Kota%20Kupang!5e1!3m2!1sid!2sid!4v1720509867313!5m2!1sid!2sid" width="1440" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <p class="text-center fst-italic mt-2 text-light">Ver 1.0 ~ copyright bpbdkotakupang@2024</p>
            </div>
        </div>
    </div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>