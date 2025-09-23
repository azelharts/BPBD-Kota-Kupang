<?php
    require "session.php"; 
    require "koneksi.php";
    $querycuaca = mysqli_query($con, "SELECT * FROM cuaca");
    $data_cuaca = [];
    while ($row = mysqli_fetch_assoc($querycuaca)) {
        $data_cuaca[] = $row;
    }
    $jumlahcuaca = count($data_cuaca);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prakiraan Cuaca</title>
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
                <a href="dashboard.php" class="hover:text-amber-600">Dashboard</a>
            </li>
            <li>/</li>
            <li class="text-amber-600 font-medium">Data Prakiraan Cuaca Wilayah Perairan</li>
        </ol>
    </nav>

    <!-- heading -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <h1 class="text-2xl md:text-3xl font-extrabold">List Data Prakiraan Cuaca Wilayah Perairan</h1>
        <span class="text-sm text-gray-500 mt-2 md:mt-0"><?= $jumlahcuaca ?> total prakiraan</span>
    </div>

    <!-- empty state -->
    <?php if($jumlahcuaca == 0): ?>
        <div class="bg-white rounded-2xl shadow-md p-8 text-center">
            <i data-lucide="cloud-off" class="w-16 h-16 text-gray-300 mx-auto mb-4"></i>
            <p class="text-gray-600">Belum ada data prakiraan cuaca.</p>
            <a href="inputcuaca.php" class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-lg bg-amber-500 hover:bg-amber-600 text-white font-semibold transition">
                <i data-lucide="plus" class="w-4 h-4"></i>Tambah Prakiraan
            </a>
        </div>

    <!-- data grid / table -->
    <?php else: ?>
        <!-- card grid on mobile -->
        <div class="grid md:hidden grid-cols-1 gap-4">
            <?php foreach ($data_cuaca as $d): ?>
                <div class="bg-white rounded-2xl shadow-md p-4 flex items-center justify-between">
                    <div>
                        <span class="text-xs text-gray-500">#<?= $d['id'] ?></span>
                        <h3 class="font-bold text-gray-900"><?= htmlspecialchars($d['nama']) ?></h3>
                    </div>
                    <a href="cuaca-detail.php?p=<?= $d['id'] ?>" class="p-2 rounded-lg bg-blue-100 hover:bg-blue-200 text-blue-700 transition" title="Lihat detail">
                        <i data-lucide="eye" class="w-5 h-5"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- table on desktop -->
        <div class="hidden md:block bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="p-4 text-left">Kode</th>
                            <th class="p-4 text-left">Nama</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($data_cuaca as $d): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="p-4 font-semibold text-amber-600">#<?= $d['id'] ?></td>
                                <td class="p-4 font-medium"><?= htmlspecialchars($d['nama']) ?></td>
                                <td class="p-4">
                                    <div class="flex items-center justify-center">
                                        <a href="cuaca-detail.php?p=<?= $d['id'] ?>" class="p-2 rounded-lg bg-blue-100 hover:bg-blue-200 text-blue-700 transition" title="Lihat detail">
                                            <i data-lucide="eye" class="w-5 h-5"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</main>

<script>lucide.createIcons();</script>
</body>
</html>