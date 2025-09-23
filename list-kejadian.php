<?php
require "session.php";
require "koneksi.php";

$queryKejadian = mysqli_query($con, "SELECT * FROM kejadian");
$kejadianData = [];
while ($row = mysqli_fetch_assoc($queryKejadian)) {
    $kejadianData[] = $row;
}
$jumlahKejadian = count($kejadianData);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kejadian dan Dampak Bencana</title>
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
            <li class="text-amber-600 font-medium">Data Kejadian & Dampak Bencana</li>
        </ol>
    </nav>

    <!-- heading -->
    <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-6">
        <h1 class="text-2xl md:text-3xl font-extrabold">List Data Kejadian & Dampak Bencana</h1>
        <span class="text-sm text-gray-500 mt-2 md:mt-0"><?= $jumlahKejadian ?> total kejadian</span>
    </div>
    <div class="flex justify-end mb-8">
        <a href="input-kejadian.php" class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-lg bg-amber-500 hover:bg-amber-600 text-white font-semibold transition">
                <i data-lucide="plus" class="w-4 h-4"></i>Tambah Kejadian
            </a>
    </div>

    <!-- empty state -->
    <?php if ($jumlahKejadian == 0): ?>
        <div class="bg-white rounded-2xl shadow-md p-8 text-center border border-gray-700/15">
            <i data-lucide="folder-open" class="w-16 h-16 text-gray-300 mx-auto mb-4"></i>
            <p class="text-gray-600">Belum ada data kejadian.</p>
        </div>

    <!-- data grid / table -->
    <?php else: ?>
        <!-- card grid on mobile -->
        <div class="hidden md:block bg-white rounded-2xl shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-4 text-left align-top">Kode</th>
                    <th class="p-4 text-left align-top">Nama</th>
                    <th class="p-4 text-left align-top">Jenis</th>
                    <th class="p-4 text-left align-top">Tanggal</th>
                    <th class="p-4 text-left align-top">Waktu</th>
                    <th class="p-4 text-left align-top">Provinsi</th>
                    <th class="p-4 text-left align-top">Sebab</th>
                    <th class="p-4 text-left align-top">Kronologis</th>
                    <th class="p-4 text-left align-top">Deskripsi</th>
                    <th class="p-4 text-left align-top">Sumber</th>
                    <th class="p-4 text-left align-top">Kondisi</th>
                    <th class="p-4 text-left align-top">Status Darurat</th>
                    <th class="p-4 text-center align-top">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach ($kejadianData as $d): ?>
                    <tr class="hover:bg-gray-50 transition align-top">
                        <td class="p-4 font-semibold text-amber-600 align-top">#<?= $d[
                            "id"
                        ] ?></td>
                        <td class="p-4 align-top"><?= htmlspecialchars(
                            $d["nama"]
                        ) ?></td>
                        <td class="p-4 align-top"><?= htmlspecialchars(
                            $d["jenis_id"]
                        ) ?></td>
                        <td class="p-4 align-top"><?= htmlspecialchars(
                            $d["tanggal"]
                        ) ?></td>
                        <td class="p-4 align-top"><?= htmlspecialchars(
                            $d["waktu"]
                        ) ?></td>
                        <td class="p-4 align-top"><?= htmlspecialchars(
                            $d["provinsi"]
                        ) ?></td>
                        
                        <!-- truncated fields -->
                        <td class="p-4 max-w-[150px] truncate align-top" title="<?= htmlspecialchars(
                            $d["sebab"]
                        ) ?>">
                            <?= htmlspecialchars($d["sebab"]) ?>
                        </td>
                        <td class="p-4 max-w-[180px] truncate align-top" title="<?= htmlspecialchars(
                            $d["kronologis"]
                        ) ?>">
                            <?= htmlspecialchars($d["kronologis"]) ?>
                        </td>
                        <td class="p-4 max-w-[200px] truncate align-top" title="<?= htmlspecialchars(
                            $d["deskripsi"]
                        ) ?>">
                            <?= htmlspecialchars($d["deskripsi"]) ?>
                        </td>
                        <td class="p-4 max-w-[150px] truncate align-top" title="<?= htmlspecialchars(
                            $d["sumber"]
                        ) ?>">
                            <?= htmlspecialchars($d["sumber"]) ?>
                        </td>
                        <td class="p-4 max-w-[150px] truncate align-top" title="<?= htmlspecialchars(
                            $d["kondisi"]
                        ) ?>">
                            <?= htmlspecialchars($d["kondisi"]) ?>
                        </td>
                        <td class="p-4 max-w-[120px] truncate align-top" title="<?= htmlspecialchars(
                            $d["status_darurat"]
                        ) ?>">
                            <span class="px-2 py-1 rounded-full text-xs bg-amber-100 text-amber-700">
                                <?= htmlspecialchars($d["status_darurat"]) ?>
                            </span>
                        </td>
                        
                        <!-- action -->
                        <td class="p-4 align-top">
                            <div class="flex items-center justify-center gap-2">
                                <a href="kejadian-detail.php?p=<?= $d["id"] ?>" 
                                   class="p-2 rounded-lg bg-blue-100 hover:bg-blue-200 text-blue-700 transition" 
                                   title="Detail">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </a>
                                <a href="preview.php?p=<?= $d["id"] ?>" 
                                   class="p-2 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 transition" 
                                   title="Print">
                                    <i data-lucide="printer" class="w-4 h-4"></i>
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