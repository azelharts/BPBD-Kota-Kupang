<?php
session_start();
require "koneksi.php";

if (isset($_POST["loginbtn"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    $query = mysqli_query(
        $con,
        "SELECT * FROM users WHERE username='$username'"
    );
    $countdata = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);

    if ($countdata > 0 && password_verify($password, $data["password"])) {
        $_SESSION["username"] = $data["username"];
        $_SESSION["login"] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = $countdata > 0 ? "Password salah" : "Akun tidak tersedia";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPBD – Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white flex items-center justify-center px-4">
    <?php require "navbar.php"; ?>

    <div class="w-full max-w-md mt-12">
        <!-- logo -->
        <div class="flex justify-center mb-6">
            <img src="image/bpbd.png" alt="BPBD" class="w-28 drop-shadow-lg">
        </div>

        <!-- heading -->
        <h1 class="text-2xl md:text-3xl font-bold text-center mb-8">Hai Admin SIncan</h1>

        <!-- login card -->
        <div class="bg-white/10 backdrop-blur-sm rounded-2xl shadow-xl p-6 md:p-8 space-y-6">
            <p class="text-center text-gray-300">Silakan masukkan username & password</p>

            <form action="" method="post" class="space-y-5">
                <!-- username -->
                <div>
                    <label for="username" class="block text-sm font-medium mb-1">Username</label>
                    <div class="relative">
                        <i data-lucide="user" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        <input type="text" name="username" id="username" required
                               class="w-full pl-10 pr-3 py-2 rounded-lg bg-white/10 border border-white/20 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400">
                    </div>
                </div>

                <!-- password -->
                <div>
                    <label for="password" class="block text-sm font-medium mb-1">Password</label>
                    <div class="relative">
                        <i data-lucide="lock" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400"></i>
                        <input type="password" name="password" id="password" required
                               class="w-full pl-10 pr-3 py-2 rounded-lg bg-white/10 border border-white/20 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400">
                    </div>
                </div>

                <!-- buttons -->
                <button type="submit" name="loginbtn"
                        class="w-full bg-amber-500 hover:bg-amber-600 text-gray-900 font-bold py-2 rounded-lg transition">
                    Login
                </button>

                <a href="index.php"
                   class="w-full inline-flex items-center justify-center gap-2 bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 rounded-lg transition">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>Kembali
                </a>
            </form>
        </div>

        <!-- alerts -->
        <?php if (!empty($error)): ?>
        <div class="mt-4 bg-yellow-500/20 border border-yellow-500 text-yellow-300 px-4 py-2 rounded-lg text-center">
            <?= $error ?>
        </div>
        <?php endif; ?>

        <!-- footer -->
        <div class="mt-8 text-center text-gray-400 text-sm space-y-1">
            <p class="font-bold">Badan Penanggulangan Bencana Daerah Kota Kupang</p>
            <p class="flex items-center justify-center gap-2">
                <i data-lucide="phone" class="w-4 h-4"></i>Call Center 081239940976
            </p>
            <p class="italic">Ver 1.0 ~ copyright bpbdkotakupang@2024</p>
        </div>
    </div>

<script>lucide.createIcons();</script>
</body>
</html>