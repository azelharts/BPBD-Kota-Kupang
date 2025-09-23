<?php
require "session.php";
require "koneksi.php";

$querykejadian = mysqli_query($con, "SELECT * FROM kejadian");
$jumlahkejadian = mysqli_num_rows($querykejadian);

$queryinput = mysqli_query($con, "SELECT * FROM cuaca");
$jumlahinput = mysqli_num_rows($queryinput);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>

<body class="bg-gray-50 text-gray-800">
<?php require "navbar-dashboard.php"; ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-12">
    <!-- breadcrumb -->
    <nav class="text-sm text-gray-500 mb-6">
        <ol class="flex items-center space-x-2">
            <li class="flex items-center gap-1">
                <i data-lucide="home" class="w-4 h-4"></i>
                <span class="text-amber-600 font-medium">Dashboard</span>
            </li>
        </ol>
    </nav>

    <!-- greeting -->
    <h1 class="text-2xl md:text-3xl font-extrabold mb-8">Halo, <?= htmlspecialchars(
        $_SESSION["username"]
    ) ?></h1>

    <!-- summary cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <!-- Data Kejadian -->
        <div class="bg-emerald-500 rounded-2xl shadow-lg p-6 text-white">
            <div class="flex flex-col items-center justify-between h-full">
                <div>
                    <div class="flex items-start gap-x-4 h-full">
                        <i data-lucide="file-text" class="w-14 h-14 opacity-20"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Data Kejadian & Dampak Bencana</h3>
                            <div class="flex justify-between items-center">
                                <p class="text-sm opacity-90 mt-1"><?= $jumlahkejadian ?> kejadian</p>
                                <a href="list-kejadian.php" class="inline-flex items-center gap-1 text-sm mt-3 border border-white/30 rounded-full px-3 py-1 hover:bg-white/10">
                        Lihat Detail <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Data Cuaca -->
        <div class="bg-amber-500 rounded-2xl shadow-lg p-6 text-white">
            <div class="flex flex-col items-center justify-between h-full">
                <div>
                    <div class="flex items-start gap-x-4 h-full">
                        <i data-lucide="cloud-rain" class="w-14 h-14 opacity-20"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Data Prakiraan Cuaca Wilayah Perairan</h3>
                            <div class="flex justify-between items-center">
                                <p class="text-sm opacity-90 mt-1"><?= $jumlahinput ?> prakiraan</p>
                                <a href="list-cuaca.php" class="inline-flex items-center gap-1 text-sm mt-3 border border-white/30 rounded-full px-3 py-1 hover:bg-white/10">
                        Lihat Detail <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Disaster map -->
    <section>
        <h2 class="text-xl font-bold mb-4">Peta Kebencanaan Kota Kupang</h2>
        <div class="aspect-video w-full rounded-2xl overflow-hidden shadow-lg">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125666.24984448765!2d123.53231649798145!3d-10.174940697042773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c569b6760b37163%3A0x26030bfcc0920532!2sKupang%2C%20Kota%20Kupang%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sid!2sid!4v1720509366298!5m2!1sid!2sid"
                    class="w-full h-full border-0"
                    allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</main>

<script>lucide.createIcons();</script>
</body>
</html>