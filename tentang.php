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
    <div>
        <h2 class="text-center text-light mt-5">Tentang SIncan KotaKu</h2><br>
            <p class="text-center text-light fw-semibold">Penanganan bencana perlu didukung oleh kemampuan mengumpulkan dan menyediakan data 
            dan informasi yang akurat, sehingga dalam melakukan perencanaan, pelaksanaan maupun antisipasi penanganan 
            bencana dapat dilakukan dengan baik, begitupun informasi yang diberikan atau dikeluarkan untuk masyarakat 
            juga merupakan informasi yang valid dan akurat Sampai sekarang, format data dan informasi bencana juga 
            masih beragam, ditambah perkembangan teknologi informasi yang sangat cepat dan telah masuk keberbagai 
            bidang kehidupan, menjadikan jarak, tempat, dan waktu bukan lagi menjadi kendala yang berarti, maka penyebaran 
            informasi kebencanaan yang resmi oleh pemerintah sangat diperlukaan untuk menghindari penyebaran informasi 
            yang tidak benar yang dapat menyebabkan kepanikan dimasyarakat. Penyelenggaraan Penanggulangan Penanganan 
            Bencana prinsipnya perlu didukung dengan ketersediaan data yang akurat, mutakhir, terpadu, dapat dipertanggungjawabkan, 
            mudah diakses, dan dapat dibagipakaikan. BNPB sendiri telah menyediakan sebuah sarana penyimpanan data dan 
            informasi kebencanaan berupa perangkat lunak aplikasi Data Informasi Bencana Indonesia (DIBI) yang dapat 
            digunakan sebagai alat analisis kejadian dan dampak, selain itu  BNPB telah membangun sebuah aplikasi sistem 
            informasi kebencanaan terpadu untuk mendukung semua proses informasi dan data kebencanaan sejak tahun 2010, 
            seiring berjalannya waktu, melalui Peraturan Presiden nomor 95 tahun 2018 diterbitkan Sistim Pemerintahan 
            Berbasis Elektronik, selain itu Peraturan Kepala BNPB nomor 9 Tahun 2013 tentang Pedoman Pengelolaan Informasi 
            dan Dokumentasi dilingkungan BNPB, Perka Nomor 8 Tahun 2014 tentang Pedoman Pengelolaan Teknologi Informasi 
            Kebencanaan dan yang baru saja diterbitkan yakni Peraturan BNPB Nomor 1 Tahun 2023 Tentang Satu Data Bencana. 
            Lewat satu data bencana diharapkan peran serta baik dari BNPB dan BPBD-BPBD  di tingkat Provinsi maupun Kabupaten/Kota 
            dapat mengintegrasikan data kebencanaan di daerah pada sistem yang telah dibangun, sehingga penyelenggaraan 
            bencana baik pra bencana, saat bencana dan pasca bencana serta proses analisis data dan sistem informasi data 
            berjalan secara optimal, tepat dan akurat serta meningkatkan profesionalisme kerja seluruh karyawan dalam melakukan 
            pengelolaan data dan informasi kebencanaan untuk pengambilan keputusan secara tepat. Berangkat dari keadaan 
            tersebut di atas, perlu di buatkan sebuah sistem informasi pada BPBD Kota Kupang sebagai sebuah sarana 
            penyimpanan data dan informasi kebencanaan berbasis digital, dimana sistem ini akan menjadi data base kebencanaan, 
            sebagai media integrasi bagi pakai data dan informasi, serta media publikasi kepada masyarakat, yang secara keseluruhan 
            merupakan bagian dari Penyelenggaraan Penanggulangan Bencana. Sesuai dengan latar belakang yang telah dijelaskan diatas 
            maka peserta mengangkat gagasan aksi perubahan dengan judul Optimalisasi Sistem Layanan pada BPBD Kota Kupang 
            lewat  “SISTEM INFORMASI KEBENCANAAN KOTA KUPANG” (SIncan-KotaKu). </p>
    </div>
                <p class="text-center fst-italic mt-5 text-light">Ver 1.0 ~ copyright bpbdkotakupang@2024</p>
            </div>
        </div>
    </div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>