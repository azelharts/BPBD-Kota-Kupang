<?php
require "session.php";
require "koneksi.php";
$queryKejadian = mysqli_query($con, "SELECT * FROM kejadian");
$jumlahKejadian = mysqli_num_rows($queryKejadian);

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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Kejadian dan Dampak Bencana</title>
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
            <li class="text-amber-600 font-medium">Input Kejadian & Dampak Bencana</li>
        </ol>
    </nav>

    <!-- heading -->
    <h1 class="text-2xl md:text-3xl font-extrabold mb-8">B.1 Data Kejadian Bencana</h1>

    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data" class="space-y-6">
        <!-- B.1 -->
        <div class="bg-white rounded-2xl shadow-md p-6 space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">1. Nama Kejadian</label>
                    <select name="nama" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                        <option value="">pilih satu</option>
                        <option>Banjir rob</option><option>Banjir bandang</option><option>Banjir dan tanah longsor</option><option>Banjir drainase dan selokan</option><option>Banjir waduk</option><option>Banjir genangan</option><option>Tanggul jebol</option><option>Longsor</option><option>Gerakan tanah</option><option>Gelombang pasang</option><option>Abrasi Pantai</option><option>Puting beliung</option><option>Angin kencang</option><option>Angin topan</option><option>Hujan es</option><option>Siklon tropis</option><option>Suhu udara ekstrem</option><option>Kekeringan meteorologis</option><option>Kekeringan hidrologis</option><option>Kekeringan pertanian</option><option>Kebakaran hutan</option><option>Kebakaran lahan</option><option>Kebakaran lahan gambut</option><option>Gempa tektonik</option><option>Gempa vulkanik</option><option>Gempabumi runtuhan</option><option>Tsunami seismogenik</option><option>Tsunami nonseismik</option><option>Tsunami lokal</option><option>Tsunami regional</option><option>Tsunami jarak</option><option>Tsunami meteorologi</option><option>Mikrotsunami</option><option>Awan panas guguran-aliran piroklastik guguran</option><option>Awan panas-aliran piroklastik</option><option>Banjir lahar</option><option>Hujan abu vulkanik</option><option>Gas vulkanik beracun</option><option>Wabah penyakit</option><option>Epidemi</option><option>Kebakaran gedung dan pemukiman</option><option>Kegagalan industri</option><option>Kecelakaan industri</option><option>Konflik Sosial</option><option>Teror</option><option>Kerusuhan Sosial</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">2. Jenis Kejadian</label>
                    <select name="jenis" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                        <option value="">pilih satu</option>
                        <option>Bencana Alam</option><option>Bencana NonAlam</option><option>Bencana Sosial</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">3. Tanggal Kejadian</label>
                    <input type="date" name="tanggal" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">4. Waktu Kejadian</label>
                    <input type="time" name="waktu" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
            </div>

            <!-- Lokasi -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Provinsi</label>
                    <select name="provinsi" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                        <option>Nusa Tenggara Timur</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Kabupaten/Kota</label>
                    <select name="kabkota" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                        <option>Kota Kupang</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Kecamatan</label>
                    <select name="kecamatan" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                        <option value="">pilih satu</option>
                        <option>Alak</option><option>Kota Raja</option><option>Kota Lama</option><option>Oebobo</option><option>Kelapa Lima</option><option>Maulafa</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Kelurahan</label>
                    <select name="kelurahan" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                        <option value="">pilih satu</option>
                        <option>Alak</option><option>Batuplat</option><option>Fatufeto</option><option>Mantasi</option><option>Manulai II</option><option>Manutapen</option><option>Naioni</option><option>Namosain</option><option>Nunbaun Delha</option><option>Nunbaun Sabu</option><option>Nunhila</option><option>Penkase Oeleta</option><option>Kelapa Lima</option><option>Lasiana</option><option>Oesapa</option><option>Oesapa Barat</option><option>Oesapa Selatan</option><option>Airnona</option><option>Bakunase</option><option>Bakunase II</option><option>Fontein</option><option>Kuanino</option><option>Naikoten I</option><option>Naikoten II</option><option>Nunleu</option><option>Air Mata</option><option>Bonipoi</option><option>Fatubesi</option><option>Lai-lai Bisi Kopan</option><option>Merdeka</option><option>Nefonaek</option><option>Oeba</option><option>Pasir Panjang</option><option>Solor</option><option>Tode Kisar</option><option>Belo</option><option>Fatukoa</option><option>Kolhua</option><option>Maulafa</option><option>Naikolan</option><option>Naimata</option><option>Oepura</option><option>Penfui</option><option>Sikumana</option><option>Fatululi</option><option>Kayu Putih</option><option>Liliba</option><option>Oebobo</option><option>Oebufu</option><option>Oetete</option><option>Tuak Daun Merah</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold mb-1">Letak Geografis</label>
                    <input type="text" name="geografis" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
            </div>

            <!-- Textareas -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">5. Sebab Kejadian</label>
                    <textarea name="sebab" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">6. Kronologis Kejadian</label>
                    <textarea name="kronologis" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">7. Deskripsi Kejadian</label>
                    <textarea name="deskripsi" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">8. Sumber Informasi</label>
                    <input type="text" name="sumber" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">9. Kondisi Mutakhir</label>
                    <input type="text" name="kondisi" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">10. Status Darurat</label>
                    <input type="text" name="status_darurat" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">11. Upaya</label>
                    <input type="text" name="upaya" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">12. Sebaran Dampak</label>
                    <input type="text" name="sebaran" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">13. Foto</label>
                    <input type="file" name="foto" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">14. Kode Identitas Bencana (KIB)</label>
                    <input type="text" name="kib" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
            </div>
        </div>

        <!-- B.2 -->
        <div class="bg-white rounded-2xl shadow-md p-6">
            <h2 class="text-lg font-bold mb-4">B.2 Data Kebutuhan Bencana</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">1. Dana (Juta)</label>
                    <input type="text" name="dana" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">2. Sumber Daya Manusia</label>
                    <input type="text" name="sdm" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">3. Sarana Prasarana</label>
                    <input type="text" name="sarpras" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">4. Logistik</label>
                    <input type="text" name="logistik" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold mb-1">5. Peralatan</label>
                    <input type="text" name="alat" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
            </div>
        </div>

        <!-- B.3 -->
        <div class="bg-white rounded-2xl shadow-md p-6 overflow-x-auto">
            <h2 class="text-lg font-bold mb-4">B.3 Data Akibat Terhadap Manusia</h2>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th rowspan="2" class="p-2 border">Korban</th>
                        <th colspan="2" class="p-2 border">Anak-anak</th>
                        <th colspan="2" class="p-2 border">Dewasa</th>
                        <th colspan="2" class="p-2 border">Lansia</th>
                        <th colspan="2" class="p-2 border">Total</th>
                    </tr>
                    <tr>
                        <th class="p-2 border">L</th><th class="p-2 border">P</th>
                        <th class="p-2 border">L</th><th class="p-2 border">P</th>
                        <th class="p-2 border">L</th><th class="p-2 border">P</th>
                        <th class="p-2 border">L</th><th class="p-2 border">P</th>
                    </tr>
                </thead>

                <?php
                    $korban = [
                        "Meninggal" => ["aml","amp","dwsml","dwsmp","lnml","lnmp","tml","tmp"],
                        "Hilang" => ["ahl","ahp","dwshl","dwshp","lnhl","lnhp","thl","thp"],
                        "Luka/sakit" => ["alkl","alkp","dwsll","dwslp","lnll","lnlp","tll","tlp"],
                        "Terdampak" => ["atl","atp","dwstl","dwstp","lntl","lntp","ttl","ttp"],
                        "Mengungsi" => ["aul","aup","dwsul","dwsup","lnul","lnup","tul","tup"],
                    ];
                ?>
                <tbody>
                    <?php foreach ($korban as $label => $names): ?>
                        <tr>
                            <td class="p-2 border font-semibold"><?= $label ?></td>
                            <?php foreach ($names as $name): ?>
                                <td class="p-2 border">
                                    <input type="text" name="<?= $name ?>" class="w-full px-2 py-1 border rounded">
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- B.4 -->
        <div class="bg-white rounded-2xl shadow-md p-6 overflow-x-auto">
            <h2 class="text-lg font-bold mb-4">B.4 Data Kerusakan dan Kerugian Sosial Ekonomi</h2>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">Ha</th><th class="p-2 border">Taksiran Kerugian</th></tr>
                </thead>
                <tbody>
                    <?php
                    $arr = [
                        "Sawah" => "sawah",
                        "Lahan" => "lahan",
                        "Kebun" => "kebun",
                        "Hutan" => "hutan",
                        "Kolam" => "kolam",
                    ];
                    foreach ($arr as $label => $name): ?>
                    <tr>
                        <td class="p-2 border font-semibold"><?= $label ?></td>
                        <td class="p-2 border"><input type="text" name="<?= $name ?>" class="w-full px-2 py-1 border rounded"></td>
                        <td class="p-2 border"><input type="text" name="tx<?= $name ?>" class="w-full px-2 py-1 border rounded"> Juta</td>
                    </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>

            <table class="w-full text-sm border border-gray-200 rounded-lg mt-12">
                <thead class="bg-gray-100">
                    <tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">RB</th><th class="p-2 border">RS</th><th class="p-2 border">RR</th><th class="p-2 border">Terendam</th><th class="p-2 border">Taksiran Kerugian</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2 border font-semibold">Kios/Toko</td>
                        <?php foreach (["kb", "ks", "kr", "ktrd"] as $n): ?>
                            <td class="p-2 border"><input type="text" name="<?= $n ?>" class="w-full px-2 py-1 border rounded"></td>
                        <?php endforeach; ?>
                        <td class="p-2 border"><input type="text" name="txkios" class="w-full px-2 py-1 border rounded"> Juta</td>
                    </tr>
                    <tr>
                        <td class="p-2 border font-semibold">Pabrik</td>
                        <?php foreach (["pb", "ps", "pr", "ptrd"] as $n): ?>
                            <td class="p-2 border"><input type="text" name="<?= $n ?>" class="w-full px-2 py-1 border rounded"></td>
                        <?php endforeach; ?>
                        <td class="p-2 border"><input type="text" name="txpabrik" class="w-full px-2 py-1 border rounded"> Juta</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- B.5 -->
        <div class="bg-white rounded-2xl shadow-md p-6 overflow-x-auto">
            <h2 class="text-lg font-bold mb-4">B.5 Data Kerusakan dan Kerugian Prasarana & Sarana Vital</h2>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">Taksiran Kerugian</th></tr>
                </thead>
                <tbody>
                    <?php
                    $arr = [
                        "Jaringan Air Bersih/Minum" => "txair",
                        "Jaringan lampu dan lampu penerangan" => "txlampu",
                        "Jaringan telekomunikasi" => "txkom",
                        "Jaringan irigasi" => "txiri",
                        "Jalan (Km)" => "txjln",
                        "jaringan Transportasi" => "txtrans",
                        "Jaringan Pengisian Bahan Bakar Umum" => "txbbm",
                    ];
                    foreach ($arr as $label => $name): ?>
                    <tr>
                        <td class="p-2 border font-semibold"><?= $label ?></td>
                        <td class="p-2 border"><input type="text" name="<?= $name ?>" class="w-full px-2 py-1 border rounded"> Juta</td>
                    </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>

            <table class="w-full text-sm border border-gray-200 rounded-lg mt-12">
                <thead class="bg-gray-100">
                    <tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">RB (meter)</th><th class="p-2 border">RS (meter)</th><th class="p-2 border">RR (meter)</th><th class="p-2 border">Terendam (meter)</th><th class="p-2 border">Taksiran Kerugian</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2 border font-semibold">Jembatan</td>
                        <?php foreach (["jb", "js", "jr", "jtrd"] as $n): ?>
                            <td class="p-2 border"><input type="text" name="<?= $n ?>" class="w-full px-2 py-1 border rounded"></td>
                        <?php endforeach; ?>
                        <td class="p-2 border"><input type="text" name="txjembatan" class="w-full px-2 py-1 border rounded"> Juta</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- B.6 -->
        <div class="bg-white rounded-2xl shadow-md p-6 overflow-x-auto">
            <h2 class="text-lg font-bold mb-4">B.6 Data Kerusakan dan Kerugian Rumah</h2>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">RB</th><th class="p-2 border">RS</th><th class="p-2 border">RR</th><th class="p-2 border">Terendam</th><th class="p-2 border">Taksiran Kerugian</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="p-2 border font-semibold">Kerusakan dan kerugian rumah</td>
                        <?php foreach (
                            ["rmhb", "rmhs", "rmhr", "rmhtrd"]
                            as $n
                        ): ?>
                            <td class="p-2 border"><input type="text" name="<?= $n ?>" class="w-full px-2 py-1 border rounded"></td>
                        <?php endforeach; ?>
                        <td class="p-2 border"><input type="text" name="txrmh" class="w-full px-2 py-1 border rounded"> Juta</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- B.7 -->
        <div class="bg-white rounded-2xl shadow-md p-6 overflow-x-auto">
            <h2 class="text-lg font-bold mb-4">B.7 Data Kerusakan dan Kerugian Pelayanan Dasar</h2>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">RB</th><th class="p-2 border">RS</th><th class="p-2 border">RR</th><th class="p-2 border">Terendam</th><th class="p-2 border">Taksiran Kerugian</th></tr>
                </thead>
                <tbody>
                    <?php
                    $arr = [
                        "Satuan Pendidikan" => "sko",
                        "Rumah Ibadat" => "ri",
                        "Fasilitas Pelayanan Kesehatan" => "faskes",
                        "Kantor" => "ktr",
                        "Pasar" => "psr",
                    ];
                    foreach ($arr as $label => $pre): ?>
                    <tr>
                        <td class="p-2 border font-semibold"><?= $label ?></td>
                        <?php foreach (
                            [$pre . "b", $pre . "s", $pre . "r", $pre . "trd"]
                            as $n
                        ): ?>
                            <td class="p-2 border"><input type="text" name="<?= $n ?>" class="w-full px-2 py-1 border rounded"></td>
                        <?php endforeach; ?>
                        <td class="p-2 border"><input type="text" name="tx<?= $pre ?>" class="w-full px-2 py-1 border rounded"> Juta</td>
                    </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>
        </div>

        <!-- B.8 -->
        <div class="bg-white rounded-2xl shadow-md p-6">
            <h2 class="text-lg font-bold mb-4">B.8 Data Aset dan Layanan Penanganan Kedaruratan</h2>
            <label class="block text-sm font-semibold mb-1">Barang yang digunakan untuk melayani penanganan darurat bencana</label>
            <textarea name="layanan" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400"></textarea>
        </div>

        <!-- actions -->
        <div class="flex flex-wrap gap-4">
            <button type="submit" name="simpan" class="px-6 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-semibold transition">Simpan</button>
            <a href="kejadian-detail.php" class="px-6 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold transition">Kembali</a>
        </div>

        <!-- alert -->
        <?php if (isset($_POST["simpan"])): ?>
            <?php if (
                empty($_POST["nama"]) ||
                empty($_POST["jenis"]) ||
                empty($_POST["tanggal"]) ||
                empty($_POST["waktu"]) ||
                empty($_POST["kelurahan"]) ||
                empty($_POST["status_darurat"])
            ): ?>
                <div class="mt-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-2 rounded-lg">Nama, Jenis, Tanggal, Waktu, Lokasi, dan status darurat wajib diisi</div>
            <?php else: ?>
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-lg">Data Kejadian dan Dampak Bencana Berhasil Tersimpan</div>
                <meta http-equiv="refresh" content="2; url=input-kejadian.php" />
            <?php endif; ?>
        <?php endif; ?>
    </form>

    <?php if (isset($_POST["simpan"])) {
        $nama = htmlspecialchars($_POST["nama"]);
        $jenis = htmlspecialchars($_POST["jenis"]);
        $tanggal = htmlspecialchars($_POST["tanggal"]);
        $waktu = htmlspecialchars($_POST["waktu"]);
        $provinsi = htmlspecialchars($_POST["provinsi"]);
        $kabkota = htmlspecialchars($_POST["kabkota"]);
        $kecamatan = htmlspecialchars($_POST["kecamatan"]);
        $kelurahan = htmlspecialchars($_POST["kelurahan"]);
        $geografis = htmlspecialchars($_POST["geografis"]);
        $sebab = htmlspecialchars($_POST["sebab"]);
        $kronologis = htmlspecialchars($_POST["kronologis"]);
        $deskripsi = htmlspecialchars($_POST["deskripsi"]);
        $sumber = htmlspecialchars($_POST["sumber"]);
        $kondisi = htmlspecialchars($_POST["kondisi"]);
        $status_darurat = htmlspecialchars($_POST["status_darurat"]);

        $target_dir = "image/";
        $nama_file = basename($_FILES["foto"]["name"]);
        $target_file = $target_dir . $nama_file;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $image_size = $_FILES["foto"]["size"];
        $random_name = generateRandomString(20);
        $new_name = $random_name . "." . $imageFileType;

        if (
            $nama == "" ||
            $jenis == "" ||
            $tanggal == "" ||
            $waktu == "" ||
            $kelurahan == "" ||
            $status_darurat == ""
        ) { ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Nama, Jenis, Tanggal, Waktu, Lokasi, dan status darurat wajib diisi
                        </div>
                    <?php } else {if ($nama_file != "") {
                if ($image_size > 5000000) { ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                File tidak boleh lebih dari 5 Mb
                                </div>
                            <?php } else {if (
                        $imageFileType != "jpg" &&
                        $imageFileType != "png" &&
                        $imageFileType != "gif"
                    ) { ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                File foto Wajib bertype jpg atau png atau gif
                                </div>
                            <?php } else {move_uploaded_file(
                            $_FILES["foto"]["tmp_name"],
                            $target_dir . $new_name
                        );}}
            }
            $querytambah = mysqli_query(
                $con,
                "insert into kejadian set
                        jenis_id= '$_POST[jenis]', 
                        nama= '$_POST[nama]',
                        tanggal= '$_POST[tanggal]', 
                        waktu= '$_POST[waktu]', 
                        provinsi= '$_POST[provinsi]', 
                        kabkota= '$_POST[kabkota]', 
                        kecamatan= '$_POST[kecamatan]', 
                        kelurahan= '$_POST[kelurahan]',
                        geografis= '$_POST[geografis]', 
                        sebab= '$_POST[sebab]', 
                        kronologis= '$_POST[kronologis]', 
                        deskripsi= '$_POST[deskripsi]', 
                        sumber= '$_POST[sumber]', 
                        kondisi= '$_POST[kondisi]', 
                        status_darurat= '$_POST[status_darurat]', 
                        upaya= '$_POST[upaya]', 
                        sebaran= '$_POST[sebaran]', 
                        foto='$new_name',
                        kib= '$_POST[kib]', 
                        dana= '$_POST[dana]', 
                        sdm= '$_POST[sdm]', 
                        sarpras= '$_POST[sarpras]', 
                        logistik= '$_POST[logistik]', 
                        alat= '$_POST[alat]', 
                        aml= '$_POST[aml]', 
                        amp= '$_POST[amp]',
                        dwsml= '$_POST[dwsml]', 
                        dwsmp= '$_POST[dwsmp]', 
                        lnml= '$_POST[lnml]', 
                        lnmp= '$_POST[lnmp]', 
                        tml= '$_POST[tml]', 
                        tmp= '$_POST[tmp]', 
                        ahl= '$_POST[ahl]', 
                        ahp= '$_POST[ahp]', 
                        dwshl= '$_POST[dwshl]', 
                        dwshp= '$_POST[dwshp]', 
                        lnhl= '$_POST[lnhl]', 
                        lnhp= '$_POST[lnhp]', 
                        thl= '$_POST[thl]', 
                        thp= '$_POST[thp]', 
                        alkl= '$_POST[alkl]', 
                        alkp= '$_POST[alkp]',
                        dwsll= '$_POST[dwsll]', 
                        dwslp= '$_POST[dwslp]', 
                        lnll= '$_POST[lnll]', 
                        lnlp= '$_POST[lnlp]', 
                        tll= '$_POST[tll]', 
                        tlp= '$_POST[tlp]', 
                        atl= '$_POST[atl]', 
                        atp= '$_POST[atp]', 
                        dwstl= '$_POST[dwstl]', 
                        dwstp= '$_POST[dwstp]', 
                        lntl= '$_POST[lntl]', 
                        lntp= '$_POST[lntp]', 
                        ttl= '$_POST[ttl]', 
                        ttp= '$_POST[ttp]', 
                        aul= '$_POST[aul]', 
                        aup= '$_POST[aup]', 
                        dwsul= '$_POST[dwsul]', 
                        dwsup= '$_POST[dwsup]', 
                        lnul= '$_POST[lnul]', 
                        lnup= '$_POST[lnup]', 
                        tul= '$_POST[tul]', 
                        tup= '$_POST[tup]', 
                        sawah= '$_POST[sawah]', 
                        txsawah= '$_POST[txsawah]', 
                        lahan= '$_POST[lahan]', 
                        txlahan= '$_POST[txlahan]', 
                        kebun= '$_POST[kebun]', 
                        txkebun= '$_POST[txkebun]', 
                        hutan= '$_POST[hutan]',
                        txhutan= '$_POST[txhutan]', 
                        kolam= '$_POST[kolam]', 
                        txkolam= '$_POST[txkolam]', 
                        kb= '$_POST[kb]', 
                        ks= '$_POST[ks]', 
                        kr= '$_POST[kr]', 
                        ktrd= '$_POST[ktrd]', 
                        txkios= '$_POST[txkios]', 
                        pb= '$_POST[pb]', 
                        ps= '$_POST[ps]', 
                        pr= '$_POST[pr]', 
                        ptrd= '$_POST[ptrd]', 
                        txpabrik= '$_POST[txpabrik]', 
                        txair= '$_POST[txair]', 
                        txlampu= '$_POST[txlampu]',
                        txkom= '$_POST[txlampu]', 
                        txiri= '$_POST[txiri]', 
                        txjln= '$_POST[txjln]', 
                        txtrans= '$_POST[txtrans]', 
                        txbbm= '$_POST[txbbm]', 
                        jb= '$_POST[jb]', 
                        js= '$_POST[js]', 
                        jr= '$_POST[jr]', 
                        jtrd= '$_POST[jtrd]', 
                        txjembatan= '$_POST[txjembatan]', 
                        rmhb= '$_POST[rmhb]', 
                        rmhs= '$_POST[rmhs]', 
                        rmhr= '$_POST[rmhr]', 
                        rmhtrd= '$_POST[rmhtrd]',
                        txrmh= '$_POST[txrmh]', 
                        skob= '$_POST[skob]', 
                        skos= '$_POST[skos]', 
                        skor= '$_POST[skor]', 
                        skotrd= '$_POST[skotrd]', 
                        txsko= '$_POST[txsko]', 
                        rib= '$_POST[rib]', 
                        ris= '$_POST[ris]', 
                        rir= '$_POST[rir]', 
                        ritrd= '$_POST[ritrd]', 
                        txri= '$_POST[txri]', 
                        faskesb= '$_POST[faskesb]', 
                        faskess= '$_POST[faskess]', 
                        faskesr= '$_POST[faskesr]',
                        faskestrd= '$_POST[faskestrd]', 
                        txfaskes= '$_POST[txfaskes]', 
                        ktrb= '$_POST[ktrb]', 
                        ktrs= '$_POST[ktrs]', 
                        ktrr= '$_POST[ktrr]', 
                        ktrtrd= '$_POST[ktrtrd]', 
                        txktr= '$_POST[txktr]', 
                        psrb= '$_POST[psrb]', 
                        psrs= '$_POST[psrs]', 
                        psrr= '$_POST[psrr]', 
                        psrtrd= '$_POST[psrtrd]', 
                        txpsr= '$_POST[txpsr]',
                        layanan= '$_POST[layanan]'"
            );

            if ($querytambah) { ?>
                <div class="alert alert-primary mt-3" role="alert">
                    Data Kejadian dan Dampak Bencana Berhasil Tersimpan
                    
                </div>
                <meta http-equiv="refresh" content="2; url=list-kejadian.php" />
            <?php } else {echo mysqli_error($con);}}
    } ?>
</main>

<script>lucide.createIcons();</script>
</body>
</html>