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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.17.9/dist/tagify.css">
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.17.9/dist/tagify.min.js"></script>
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
  <input name="nama" id="nama" placeholder="ketik / pilih" required
         class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
</div>

                <div>
  <label class="block text-sm font-semibold mb-1">2. Jenis Kejadian</label>
  <input name="jenis" id="jenis" placeholder="ketik / pilih" required
         class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
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
  <input name="kecamatan" id="kecamatan" placeholder="ketik / pilih" required
         class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
</div>
                <div>
  <label class="block text-sm font-semibold mb-1">Kelurahan</label>
  <input name="kelurahan" id="kelurahan" placeholder="ketik / pilih" required
         class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
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
            <a href="list-kejadian.php" name="kembali" class="inline-flex items-center gap-2 px-6 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold transition">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
            </a>
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

    <?php
if (isset($_POST["simpan"])) {
    /* ---------- 0.  helper: turn Tagify JSON string into MySQL JSON string ---------- */
    function toJsonArray($postKey) {
        // Tagify sends: '["item1","item2"]'  or  empty string
        $raw = $_POST[$postKey] ?? '';
        if (!$raw)  return '[]';                 // real empty JSON array
        // validate it is already a JSON array
        $decoded = json_decode($raw, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $raw;                         // already good JSON
        }
        return '[]';
    }

    /* ---------- 1.  basic fields (single value) ---------- */
    $tanggal       = htmlspecialchars($_POST["tanggal"]);
    $waktu         = htmlspecialchars($_POST["waktu"]);
    $provinsi      = htmlspecialchars($_POST["provinsi"]);
    $kabkota       = htmlspecialchars($_POST["kabkota"]);
    $geografis     = htmlspecialchars($_POST["geografis"]);
    $sebab         = htmlspecialchars($_POST["sebab"] ?? '');
    $kronologis    = htmlspecialchars($_POST["kronologis"] ?? '');
    $deskripsi     = htmlspecialchars($_POST["deskripsi"] ?? '');
    $sumber        = htmlspecialchars($_POST["sumber"] ?? '');
    $kondisi       = htmlspecialchars($_POST["kondisi"] ?? '');
    $status_darurat= htmlspecialchars($_POST["status_darurat"]);
    $upaya         = htmlspecialchars($_POST["upaya"] ?? '');
    $sebaran       = htmlspecialchars($_POST["sebaran"] ?? '');
    $kib           = htmlspecialchars($_POST["kib"] ?? '');
    $dana          = htmlspecialchars($_POST["dana"] ?? '');
    $sdm           = htmlspecialchars($_POST["sdm"] ?? '');
    $sarpras       = htmlspecialchars($_POST["sarpras"] ?? '');
    $logistik      = htmlspecialchars($_POST["logistik"] ?? '');
    $alat          = htmlspecialchars($_POST["alat"] ?? '');

    /* ---------- 2.  multi-value fields (JSON) ---------- */
    $nama      = toJsonArray("nama");
    $jenis     = toJsonArray("jenis");
    $kecamatan = toJsonArray("kecamatan");
    $kelurahan = toJsonArray("kelurahan");

    /* ---------- 3.  foto upload (your old logic) ---------- */
    $new_name = '';
    if (!empty($_FILES["foto"]["name"])) {
        $target_dir   = "images/";
        $imageFileType= strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
        $random_name  = generateRandomString(20);
        $new_name     = $random_name . "." . $imageFileType;
        if (in_array($imageFileType, ["jpg","png","gif"]) && $_FILES["foto"]["size"] <= 5000000) {
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
        }
    }

    /* ---------- 4.  build the giant INSERT ---------- */
    $cols = [];
    $vals = [];
    // kejadian core
    $cols[] = "jenis_id";   $vals[] = "'".$jenis."'";
    $cols[] = "nama";       $vals[] = "'".$nama."'";
    $cols[] = "tanggal";    $vals[] = "'".$tanggal."'";
    $cols[] = "waktu";      $vals[] = "'".$waktu."'";
    $cols[] = "provinsi";   $vals[] = "'".$provinsi."'";
    $cols[] = "kabkota";    $vals[] = "'".$kabkota."'";
    $cols[] = "kecamatan";  $vals[] = "'".$kecamatan."'";
    $cols[] = "kelurahan";  $vals[] = "'".$kelurahan."'";
    $cols[] = "geografis";  $vals[] = "'".$geografis."'";
    $cols[] = "sebab";      $vals[] = "'".$sebab."'";
    $cols[] = "kronologis"; $vals[] = "'".$kronologis."'";
    $cols[] = "deskripsi";  $vals[] = "'".$deskripsi."'";
    $cols[] = "sumber";     $vals[] = "'".$sumber."'";
    $cols[] = "kondisi";    $vals[] = "'".$kondisi."'";
    $cols[] = "status_darurat"; $vals[] = "'".$status_darurat."'";
    $cols[] = "upaya";      $vals[] = "'".$upaya."'";
    $cols[] = "sebaran";    $vals[] = "'".$sebaran."'";
    $cols[] = "kib";        $vals[] = "'".$kib."'";
    $cols[] = "dana";       $vals[] = "'".$dana."'";
    $cols[] = "sdm";        $vals[] = "'".$sdm."'";
    $cols[] = "sarpras";    $vals[] = "'".$sarpras."'";
    $cols[] = "logistik";   $vals[] = "'".$logistik."'";
    $cols[] = "alat";       $vals[] = "'".$alat."'";
    $cols[] = "foto";       $vals[] = "'".$new_name."'";

    // all the 100+ numeric fields (keep your old list)
    $numericFields = [
        "aml","amp","dwsml","dwsmp","lnml","lnmp","tml","tmp",
        "ahl","ahp","dwshl","dwshp","lnhl","lnhp","thl","thp",
        "alkl","alkp","dwsll","dwslp","lnll","lnlp","tll","tlp",
        "atl","atp","dwstl","dwstp","lntl","lntp","ttl","ttp",
        "aul","aup","dwsul","dwsup","lnul","lnup","tul","tup",
        "sawah","txsawah","lahan","txlahan","kebun","txkebun",
        "hutan","txhutan","kolam","txkolam",
        "kb","ks","kr","ktrd","txkios",
        "pb","ps","pr","ptrd","txpabrik",
        "txair","txlampu","txkom","txiri","txjln","txtrans","txbbm",
        "jb","js","jr","jtrd","txjembatan",
        "rmhb","rmhs","rmhr","rmhtrd","txrmh",
        "skob","skos","skor","skotrd","txsko",
        "rib","ris","rir","ritrd","txri",
        "faskesb","faskess","faskesr","faskestrd","txfaskes",
        "ktrb","ktrs","ktrr","ktrtrd","txktr",
        "psrb","psrs","psrr","psrtrd","txpsr",
        "layanan"
    ];
    foreach ($numericFields as $f) {
        $cols[] = $f;
        $vals[] = "'" . htmlspecialchars($_POST[$f] ?? '') . "'";
    }

    $sql = "INSERT INTO kejadian (" . implode(",", $cols) . ") VALUES (" . implode(",", $vals) . ")";
    $ok  = mysqli_query($con, $sql);

    if ($ok) { ?>
        <div class="alert alert-primary mt-3" role="alert">
            Data Kejadian dan Dampak Bencana Berhasil Tersimpan
        </div>
        <meta http-equiv="refresh" content="2; url=list-kejadian.php" />
    <?php } else {
        echo "<div class='alert alert-danger mt-3'>Gagal: " . mysqli_error($con) . "</div>";
    }
}
?>
</main>

<script>lucide.createIcons();</script>
<script>
/* whitelist data */
const namaList = [
  "Banjir rob","Banjir bandang","Banjir dan tanah longsor","Banjir drainase dan selokan",
  "Banjir waduk","Banjir genangan","Tanggul jebol","Longsor","Gerakan tanah",
  "Gelombang pasang","Abrasi Pantai","Puting beliung","Angin kencang","Angin topan",
  "Hujan es","Siklon tropis","Suhu udara ekstrem","Kekeringan meteorologis",
  "Kekeringan hidrologis","Kekeringan pertanian","Kebakaran hutan","Kebakaran lahan",
  "Kebakaran lahan gambut","Gempa tektonik","Gempa vulkanik","Gempabumi runtuhan",
  "Tsunami seismogenik","Tsunami nonseismik","Tsunami lokal","Tsunami regional",
  "Tsunami jarak","Tsunami meteorologi","Mikrotsunami",
  "Awan panas guguran-aliran piroklastik guguran","Awan panas-aliran piroklastik",
  "Banjir lahar","Hujan abu vulkanik","Gas vulkanik beracun","Wabah penyakit",
  "Epidemi","Kebakaran gedung dan pemukiman","Kegagalan industri",
  "Kecelakaan industri","Konflik Sosial","Teror","Kerusuhan Sosial"
];
const jenisList = ["Bencana Alam","Bencana NonAlam","Bencana Sosial"];
const kecList  = ["Alak","Kota Raja","Kota Lama","Oebobo","Kelapa Lima","Maulafa"];
const kelList  = [
  "Alak","Batuplat","Fatufeto","Mantasi","Manulai II","Manutapen","Naioni","Namosain",
  "Nunbaun Delha","Nunbaun Sabu","Nunhila","Penkase Oeleta","Kelapa Lima","Lasiana",
  "Oesapa","Oesapa Barat","Oesapa Selatan","Airnona","Bakunase","Bakunase II",
  "Fontein","Kuanino","Naikoten I","Naikoten II","Nunleu","Air Mata","Bonipoi",
  "Fatubesi","Lai-lai Bisi Kopan","Merdeka","Nefonaek","Oeba","Pasir Panjang",
  "Solor","Tode Kisar","Belo","Fatukoa","Kolhua","Maulafa","Naikolan","Naimata",
  "Oepura","Penfui","Sikumana","Fatululi","Kayu Putih","Liliba","Oebobo","Oebufu",
  "Oetete","Tuak Daun Merah"
];

/* turn each input into a pill-style multi-select */
["#nama","#jenis","#kecamatan","#kelurahan"].forEach(sel=>{
  new Tagify(document.querySelector(sel), {
    whitelist: sel==="#nama"?namaList : sel==="#jenis"?jenisList : sel==="#kecamatan"?kecList : kelList,
    maxTags: 20,
    dropdown: { enabled: 0, maxItems: 50, highlightFirst: true }
  });
});
</script>
</body>
</html>