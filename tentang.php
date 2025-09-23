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
    <title>BPBD – Tentang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>

<body class="bg-gray-900 text-gray-100">
<?php require "navbar.php"; ?>

<main class="max-w-4xl mx-auto px-4 pt-32 pb-16">
    <!-- heading -->
    <h1 class="text-3xl md:text-4xl font-extrabold text-center text-white mb-10">
        Tentang <span class="text-amber-400">SIncan KotaKu</span>
    </h1>

    <!-- content -->
    <div class="prose prose-invert prose-amber max-w-none text-justify leading-relaxed space-y-5 text-gray-200">
        <p>
            Penanganan bencana perlu didukung oleh kemampuan mengumpulkan dan menyediakan data dan informasi yang akurat,
            sehingga dalam melakukan perencanaan, pelaksanaan maupun antisipasi penanganan bencana dapat dilakukan dengan baik.
            Begitupun informasi yang diberikan atau dikeluarkan untuk masyarakat juga merupakan informasi yang valid dan akurat.
        </p>
        <p>
            Sampai sekarang, format data dan informasi bencana juga masih beragam, ditambah perkembangan teknologi informasi
            yang sangat cepat dan telah masuk ke berbagai bidang kehidupan, menjadikan jarak, tempat, dan waktu bukan lagi
            menjadi kendala yang berarti. Maka penyebaran informasi kebencanaan yang resmi oleh pemerintah sangat diperlukan
            untuk menghindari penyebaran informasi yang tidak benar yang dapat menyebabkan kepanikan di masyarakat.
        </p>
        <p>
            Penyelenggaraan Penanggulangan Bencana prinsipnya perlu didukung dengan ketersediaan data yang akurat, mutakhir,
            terpadu, dapat dipertanggungjawabkan, mudah diakses, dan dapat dibagipakaikan. BNPB telah menyediakan sarana
            berupa aplikasi Data Informasi Bencana Indonesia (DIBI) dan sistem informasi kebencanaan terpadu sejak 2010.
        </p>
        <p>
            Lewat Peraturan BNPB Nomor 1 Tahun 2023 Tentang Satu Data Bencana, diharapkan peran serta BNPB dan BPBD di
            tingkat Provinsi maupun Kabupaten/Kota dapat mengintegrasikan data kebencanaan pada sistem yang telah dibangun,
            sehingga penyelenggaraan bencana—pra, saat, maupun pasca—serta proses analisis data berjalan secara optimal,
            tepat dan akurat.
        </p>
        <p>
            Berangkat dari keadaan tersebut, perlu dibuatkan sebuah sistem informasi pada BPBD Kota Kupang sebagai sarana
            penyimpanan data dan informasi kebencanaan berbasis digital. Sistem ini akan menjadi database kebencanaan,
            media integrasi bagi pakai data dan informasi, serta media publikasi kepada masyarakat, yang secara keseluruhan
            merupakan bagian dari Penyelenggaraan Penanggulangan Bencana.
        </p>
        <p>
            Sesuai dengan latar belakang yang telah dijelaskan, peserta mengangkat gagasan aksi perubahan dengan judul
            <span class="font-semibold text-amber-400">“Optimalisasi Sistem Layanan pada BPBD Kota Kupang lewat SISTEM INFORMASI KEBENCANAAN KOTA KUPANG (SIncan-KotaKu)”</span>.
        </p>
    </div>

    <!-- footer line -->
    <p class="text-center text-sm text-gray-400 italic mt-10">Ver 1.0 ~ copyright bpbdkotakupang@2024</p>
</main>

<script>lucide.createIcons();</script>
</body>
</html>