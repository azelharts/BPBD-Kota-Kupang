<?php
function generateRandomString($length = 10)
{
    $characters =
        "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $charactersLength = strlen($characters);
    $randomString = "";
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPBD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>

<body class="bg-gray-900 text-white">
<?php require "navbar.php"; ?>

<!-- HERO SECTION -->
<section class="max-w-5xl mx-auto px-4 pt-32 pb-16 text-center">
    <h1 class="text-3xl md:text-4xl font-extrabold mb-8">POSKO BPBD KOTA KUPANG</h1>

    <!-- Call Center -->
    <div class="mb-8">
        <div class="flex items-center justify-center gap-2 text-amber-400 mb-2">
            <i data-lucide="phone-call" class="w-6 h-6"></i>
            <h2 class="text-xl font-semibold">Call Center</h2>
        </div>
        <p class="text-lg">081239940976</p>
    </div>

    <!-- Address -->
    <div class="mb-10">
        <div class="flex items-center justify-center gap-2 text-amber-400 mb-2">
            <i data-lucide="map-pin" class="w-6 h-6"></i>
            <h2 class="text-xl font-semibold">Alamat</h2>
        </div>
        <p class="max-w-2xl mx-auto">
            Jalan Sam Ratulangi III, Nomor 7, Kelapa Lima, Kota Kupang, 85228
        </p>
    </div>

    <!-- Google Map -->
    <div class="w-full aspect-video rounded-2xl overflow-hidden shadow-lg">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d150.04108831380054!2d123.62423338210239!3d-10.148690968574044!2m3!1f195.18987341772214!2f45!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x2c5683315931b0bd%3A0x21662bbf23869e13!2sPosko%20Bencana%20BPBD%20Kota%20Kupang!5e1!3m2!1sid!2sid!4v1720509867313!5m2!1sid!2sid"
            class="w-full h-full"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    <!-- Footer line -->
    <p class="text-sm text-gray-400 italic mt-6">Ver 1.0 ~ copyright bpbdkotakupang@2024</p>
</section>

<script>
    lucide.createIcons();
</script>
</body>
</html>