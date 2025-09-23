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
    <title>BPBD Kota Kupang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        /* minimal slider dots */
        .dot{background:#fff;opacity:.4;width:6px;height:6px;border-radius:50%;cursor:pointer;transition:opacity .3s}
        .dot.active{opacity:1}
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<?php require "navbar.php"; ?>

<!-- ========== HERO SLIDER ========== -->
<section class="relative w-full h-[100svh] overflow-hidden pt-16">
    <!-- slides -->
    <div id="slides" class="relative w-full h-full">
        <?php for($i=1;$i<=5;$i++): ?>
        <div class="slide absolute inset-0 transition-opacity duration-700 <?= $i===1 ? 'opacity-100' : 'opacity-0' ?>">
            <img src="images/slider<?= $i ?>.png" alt="" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40 w-full flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <p class="font-semibold mb-2">SELAMAT DATANG DI</p>
                    <h2 class="text-3xl md:text-5xl font-extrabold mb-2">SIncan <span class="text-amber-400">Kotaku</span></h2>
                    <p class="font-medium mb-6">-- Sistem Informasi Kebencanaan Kota Kupang --</p>
                    <a href="dashboard.php" class="inline-block bg-red-600 hover:bg-red-700 px-6 py-3 rounded-lg font-semibold transition">Dashboard</a>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>

    <!-- prev / next -->
    <button onclick="changeSlide(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 p-2 rounded-full bg-white/20 hover:bg-white/40 text-white transition">
        <i data-lucide="chevron-left" class="w-6 h-6"></i>
    </button>
    <button onclick="changeSlide(1)" class="absolute right-4 top-1/2 -translate-y-1/2 p-2 rounded-full bg-white/20 hover:bg-white/40 text-white transition">
        <i data-lucide="chevron-right" class="w-6 h-6"></i>
    </button>

    <!-- dots -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2">
        <?php for($i=1;$i<=5;$i++): ?>
        <span class="dot <?= $i===1 ? 'active' : '' ?>" onclick="currentSlide(<?= $i ?>)"></span>
        <?php endfor; ?>
    </div>
</section>

<!-- ========== WEATHER CARD ========== -->
<section class="max-w-5xl mx-auto px-4 py-10">
    <h3 class="text-2xl font-bold text-center mb-6">Info Prakiraan Cuaca</h3>
    <div class="bg-white rounded-2xl shadow-md p-6 text-center">
        <img src="image/<?= $tampil['foto'] ?>" alt="" class="mx-auto max-w-full h-[800px] object-cover rounded-xl">
        <p class="mt-4 text-lg font-medium text-gray-700"><?= $tampil['nama'] ?></p>
    </div>
</section>

<!-- ========== FOOTER ========== -->
<footer class="text-center pb-10">
    <p class="font-bold text-gray-700">Badan Penanggulangan Bencana Daerah Kota Kupang</p>
    <p class="flex items-center justify-center gap-2 text-gray-600 mt-2">
        <i data-lucide="phone" class="w-4 h-4"></i>Call Center 081239940976
    </p>
    <p class="text-sm text-gray-500 italic mt-2">Ver 1.0 ~ copyright bpbdkotakupang@2024</p>
</footer>

<script>
    lucide.createIcons();
    let idx = 1;
    const slides = document.querySelectorAll('.slide');
    const dots   = document.querySelectorAll('.dot');

    function show(n){
        idx = (n > slides.length) ? 1 : (n < 1) ? slides.length : n;
        slides.forEach(s => s.classList.add('opacity-0'));
        dots.forEach(d => d.classList.remove('active'));
        slides[idx-1].classList.remove('opacity-0');
        dots[idx-1].classList.add('active');
    }
    function changeSlide(d){ show(idx += d); }
    function currentSlide(n){ show(idx = n); }

    /* auto-advance (optional) */
    setInterval(()=> changeSlide(1), 6000);
</script>
</body>
</html>