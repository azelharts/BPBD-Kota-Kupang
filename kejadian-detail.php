<?php
require "session.php";
require "koneksi.php";

$id = $_GET["p"];
$query = mysqli_query($con, "SELECT * FROM kejadian WHERE id='$id'");
$data = mysqli_fetch_array($query);

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
    <title>Kejadian Detail</title>
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
            <li><a href="list-kejadian.php" class="hover:text-amber-600">Data Kejadian & Dampak Bencana</a></li>
            <li>/</li>
            <li class="text-amber-600 font-medium">Detail #<?= $data[
                "id"
            ] ?></li>
        </ol>
    </nav>

    <!-- heading -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <h1 class="text-2xl md:text-3xl font-extrabold">Detail Kejadian & Dampak Bencana</h1>
        <span class="text-sm text-gray-500 mt-2 md:mt-0">Kode: #<?= $data[
            "id"
        ] ?></span>
    </div>

    <!-- photo -->
    <?php if ($data["foto"]): ?>
        <div class="mb-6">
            <img src="images/<?= htmlspecialchars(
                $data["foto"]
            ) ?>" alt="Foto kejadian" class="w-full max-w-2xl rounded-2xl shadow-md">
        </div>
    <?php endif; ?>

    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data" class="space-y-6">
        <!-- B.1 -->
        <div class="bg-white rounded-2xl shadow-md p-6 space-y-4">
            <h2 class="text-lg font-bold mb-2">B.1 Data Kejadian Bencana</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
  <label class="block text-sm font-semibold mb-1">1. Nama Kejadian</label>
  <input name="nama" id="nama" value="<?= htmlspecialchars($data['nama']) ?>"
         placeholder="ketik / pilih" required
         class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
</div>
                <div>
  <label class="block text-sm font-semibold mb-1">2. Jenis Kejadian</label>
  <input name="jenis" id="jenis" value="<?= htmlspecialchars($data['jenis_id']) ?>"
         placeholder="ketik / pilih" required
         class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
</div>
                <div>
                    <label class="block text-sm font-semibold mb-1">3. Tanggal Kejadian</label>
                    <input type="date" name="tanggal" value="<?= $data[
                        "tanggal"
                    ] ?>" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">4. Waktu Kejadian</label>
                    <input type="time" name="waktu" value="<?= $data[
                        "waktu"
                    ] ?>" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div class="col-span-full mt-4">
                    <label class="block text-sm font-semibold">5. Lokasi</label>
                </div>
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
  <input name="kecamatan" id="kecamatan" value="<?= htmlspecialchars($data['kecamatan']) ?>"
         placeholder="ketik / pilih" required
         class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
</div>
                <div>
  <label class="block text-sm font-semibold mb-1">Kelurahan</label>
  <input name="kelurahan" id="kelurahan" value="<?= htmlspecialchars($data['kelurahan']) ?>"
         placeholder="ketik / pilih" required
         class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
</div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold mb-1">Letak Geografis</label>
                    <input type="text" name="geografis" value="<?= htmlspecialchars(
                        $data["geografis"]
                    ) ?>" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
            </div>

            <!-- Textareas -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">6. Sebab Kejadian</label>
                    <textarea name="sebab" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400"><?= htmlspecialchars(
                        $data["sebab"]
                    ) ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">7. Kronologis Kejadian</label>
                    <textarea name="kronologis" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400"><?= htmlspecialchars(
                        $data["kronologis"]
                    ) ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">8. Deskripsi Kejadian</label>
                    <textarea name="deskripsi" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400"><?= htmlspecialchars(
                        $data["deskripsi"]
                    ) ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">9. Sumber Informasi</label>
                    <input type="text" name="sumber" value="<?= htmlspecialchars(
                        $data["sumber"]
                    ) ?>" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">10. Kondisi Mutakhir</label>
                    <input type="text" name="kondisi" value="<?= htmlspecialchars(
                        $data["kondisi"]
                    ) ?>" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">11. Status Darurat</label>
                    <input type="text" name="status_darurat" value="<?= htmlspecialchars(
                        $data["status_darurat"]
                    ) ?>" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">12. Upaya</label>
                    <input type="text" name="upaya" value="<?= htmlspecialchars(
                        $data["upaya"]
                    ) ?>" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">13. Sebaran Dampak</label>
                    <input type="text" name="sebaran" value="<?= htmlspecialchars(
                        $data["sebaran"]
                    ) ?>" required class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">14. Kode Identitas Bencana (KIB)</label>
                    <input type="text" name="kib" value="<?= htmlspecialchars(
                        $data["kib"]
                    ) ?>" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">15. Ganti Foto</label>
                    <input type="file" name="foto" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
            </div>
        </div>

        <!-- B.2 -->
        <div class="bg-white rounded-2xl shadow-md p-6">
            <h2 class="text-lg font-bold mb-4">B.2 Data Kebutuhan Bencana</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">1. Dana (Juta)</label>
                    <input type="text" name="dana" value="<?= htmlspecialchars(
                        $data["dana"]
                    ) ?>" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">2. Sumber Daya Manusia</label>
                    <input type="text" name="sdm" value="<?= htmlspecialchars(
                        $data["sdm"]
                    ) ?>" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">3. Sarana Prasarana</label>
                    <input type="text" name="sarpras" value="<?= htmlspecialchars(
                        $data["sarpras"]
                    ) ?>" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">4. Logistik</label>
                    <input type="text" name="logistik" value="<?= htmlspecialchars(
                        $data["logistik"]
                    ) ?>" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold mb-1">5. Peralatan</label>
                    <input type="text" name="alat" value="<?= htmlspecialchars(
                        $data["alat"]
                    ) ?>" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400">
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
                <tbody>
                    <?php
                    $korban = [
                        "Meninggal",
                        "Hilang",
                        "Luka/sakit",
                        "Terdampak",
                        "Mengungsi",
                    ];
                    $fields = [
                        "aml",
                        "amp",
                        "dwsml",
                        "dwsmp",
                        "lnml",
                        "lnmp",
                        "tml",
                        "tmp",
                    ];
                    foreach ($korban as $k): ?>
                    <tr>
                        <td class="p-2 border font-semibold"><?= $k ?></td>
                        <?php foreach ($fields as $f): ?>
                            <td class="p-2 border"><input type="text" name="<?= $f ?>" value="<?= htmlspecialchars(
    $data[$f]
) ?>" class="w-full px-2 py-1 border rounded"></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>
        </div>

        <!-- B.4 -->
        <div class="bg-white rounded-2xl shadow-md p-6 overflow-x-auto">
            <h2 class="text-lg font-bold mb-4">B.4 Data Kerusakan dan Kerugian Sosial Ekonomi</h2>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100"><tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">Ha</th><th class="p-2 border">Taksiran Kerugian</th></tr></thead>
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
                        <td class="p-2 border"><input type="text" name="<?= $name ?>" value="<?= htmlspecialchars(
    $data[$name]
) ?>" class="w-full px-2 py-1 border rounded"></td>
                        <td class="p-2 border"><input type="text" name="tx<?= $name ?>" value="<?= htmlspecialchars(
    $data["tx" . $name]
) ?>" class="w-full px-2 py-1 border rounded"> Juta</td>
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
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['kb'];?>" name="kb" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['ks'];?>" name="ks" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['kr'];?>" name="kr" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['ktrd'];?>" name="ktrd" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['txkios'];?>" name="txkios" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="p-2 border font-semibold">Pabrik</td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['pb'];?>" name="pb" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['ps'];?>" name="ps" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['pr'];?>" name="pr" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['ptrd'];?>" name="ptrd" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['txpabrik'];?>" name="txpabrik" size="20"> Juta</td>
                        </tr>
                </tbody>
            </table>
        </div>

        <!-- B.5 -->
        <div class="bg-white rounded-2xl shadow-md p-6 overflow-x-auto">
            <h2 class="text-lg font-bold mb-4">B.5 Data Kerusakan dan Kerugian Prasarana & Sarana Vital</h2>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100"><tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">Taksiran Kerugian</th></tr></thead>
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
                        <td class="p-2 border"><input type="text" name="<?= $name ?>" value="<?= htmlspecialchars(
    $data[$name]
) ?>" class="w-full px-2 py-1 border rounded"> Juta</td>
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
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['jb'];?>" name="jb" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['js'];?>" name="js" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['jr'];?>" name="jr" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['jtrd'];?>" name="jtrd" size="10"></td>
                            <td class="p-2 border"><input class="w-full px-2 py-1 border rounded" type="text" value="<?php echo $data['txjembatan'];?>" name="txjembatan" size="20"> Juta</td>
                        </tr>
                </tbody>
            </table>
        </div>

        <!-- B.6 -->
        <div class="bg-white rounded-2xl shadow-md p-6 overflow-x-auto">
            <h2 class="text-lg font-bold mb-4">B.6 Data Kerusakan dan Kerugian Rumah</h2>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100"><tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">RB</th><th class="p-2 border">RS</th><th class="p-2 border">RR</th><th class="p-2 border">Terendam</th><th class="p-2 border">Taksiran Kerugian</th></tr></thead>
                <tbody>
                    <tr>
                        <td class="p-2 border font-semibold">Kerusakan dan kerugian rumah</td>
                        <?php foreach (
                            ["rmhb", "rmhs", "rmhr", "rmhtrd"]
                            as $n
                        ): ?>
                            <td class="p-2 border"><input type="text" name="<?= $n ?>" value="<?= htmlspecialchars(
    $data[$n]
) ?>" class="w-full px-2 py-1 border rounded"></td>
                        <?php endforeach; ?>
                        <td class="p-2 border"><input type="text" name="txrmh" value="<?= htmlspecialchars(
                            $data["txrmh"]
                        ) ?>" class="w-full px-2 py-1 border rounded"> Juta</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- B.7 -->
        <div class="bg-white rounded-2xl shadow-md p-6 overflow-x-auto">
            <h2 class="text-lg font-bold mb-4">B.7 Data Kerusakan dan Kerugian Pelayanan Dasar</h2>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100"><tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">RB</th><th class="p-2 border">RS</th><th class="p-2 border">RR</th><th class="p-2 border">Terendam</th><th class="p-2 border">Taksiran Kerugian</th></tr></thead>
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
                            <td class="p-2 border"><input type="text" name="<?= $n ?>" value="<?= htmlspecialchars(
    $data[$n]
) ?>" class="w-full px-2 py-1 border rounded"></td>
                        <?php endforeach; ?>
                        <td class="p-2 border"><input type="text" name="tx<?= $pre ?>" value="<?= htmlspecialchars(
    $data["tx" . $pre]
) ?>" class="w-full px-2 py-1 border rounded"> Juta</td>
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
            <textarea name="layanan" rows="3" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-400"><?= htmlspecialchars(
                $data["layanan"]
            ) ?></textarea>
        </div>

        <!-- actions -->
        <div class="flex flex-wrap gap-4">
            <button type="submit" name="simpan" class="inline-flex items-center gap-2 px-6 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-semibold transition">
                <i data-lucide="save" class="w-4 h-4"></i>Simpan
            </button>
            <a href="list-kejadian.php" name="kembali" class="inline-flex items-center gap-2 px-6 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold transition">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
            </a>
            <button type="submit" name="hapus" onclick="return confirm('Hapus data ini?')" class="inline-flex items-center gap-2 px-6 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white font-semibold transition">
                <i data-lucide="trash-2" class="w-4 h-4"></i>Hapus
            </button>
        </div>

        <!-- alerts -->
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
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-lg">Kejadian berhasil diupdate</div>
                <meta http-equiv="refresh" content="2; url=list-kejadian.php" />
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($_POST["hapus"])): ?>
            <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-lg">Kejadian berhasil dihapus</div>
            <meta http-equiv="refresh" content="2; url=list-kejadian.php" />
        <?php endif; ?>
    </form>

    <?php
if (isset($_POST["simpan"])) {
    /* ---------- helper: ensure we always store valid JSON arrays ---------- */
    function toJsonArray($key) {
        $raw = $_POST[$key] ?? '';
        if (!$raw) return '[]';
        $decoded = json_decode($raw, true);
        return (json_last_error() === JSON_ERROR_NONE && is_array($decoded))
               ? $raw : '[]';
    }

    /* ---------- basic single-value fields ---------- */
    $tanggal        = htmlspecialchars($_POST["tanggal"]);
    $waktu          = htmlspecialchars($_POST["waktu"]);
    $provinsi       = htmlspecialchars($_POST["provinsi"]);
    $kabkota        = htmlspecialchars($_POST["kabkota"]);
    $geografis      = htmlspecialchars($_POST["geografis"]);
    $sebab          = htmlspecialchars($_POST["sebab"] ?? '');
    $kronologis     = htmlspecialchars($_POST["kronologis"] ?? '');
    $deskripsi      = htmlspecialchars($_POST["deskripsi"] ?? '');
    $sumber         = htmlspecialchars($_POST["sumber"] ?? '');
    $kondisi        = htmlspecialchars($_POST["kondisi"] ?? '');
    $status_darurat = htmlspecialchars($_POST["status_darurat"]);
    $upaya          = htmlspecialchars($_POST["upaya"] ?? '');
    $sebaran        = htmlspecialchars($_POST["sebaran"] ?? '');
    $kib            = htmlspecialchars($_POST["kib"] ?? '');

    /* ---------- multi-value fields (JSON) ---------- */
    $nama      = toJsonArray("nama");
    $jenis     = toJsonArray("jenis");
    $kecamatan = toJsonArray("kecamatan");
    $kelurahan = toJsonArray("kelurahan");

    /* ---------- foto upload (your old logic) ---------- */
    $new_name = $data["foto"]; // keep existing if no new file
    if (!empty($_FILES["foto"]["name"])) {
        $target_dir    = "images/";
        $imageFileType = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
        $random_name   = generateRandomString(20);
        $new_name      = $random_name . "." . $imageFileType;

        if (in_array($imageFileType, ["jpg", "png", "gif"]) && $_FILES["foto"]["size"] <= 5000000) {
            // delete old file if exists
            if ($data["foto"] && file_exists($target_dir . $data["foto"])) {
                unlink($target_dir . $data["foto"]);
            }
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);
        }
    }

    /* ---------- build the giant UPDATE ---------- */
    $sets = [];
    // core fields
    $sets[] = "jenis_id   = '$jenis'";
    $sets[] = "nama       = '$nama'";
    $sets[] = "tanggal    = '$tanggal'";
    $sets[] = "waktu      = '$waktu'";
    $sets[] = "provinsi   = '$provinsi'";
    $sets[] = "kabkota    = '$kabkota'";
    $sets[] = "kecamatan  = '$kecamatan'";
    $sets[] = "kelurahan  = '$kelurahan'";
    $sets[] = "geografis  = '$geografis'";
    $sets[] = "sebab      = '$sebab'";
    $sets[] = "kronologis = '$kronologis'";
    $sets[] = "deskripsi  = '$deskripsi'";
    $sets[] = "sumber     = '$sumber'";
    $sets[] = "kondisi    = '$kondisi'";
    $sets[] = "status_darurat = '$status_darurat'";
    $sets[] = "upaya      = '$upaya'";
    $sets[] = "sebaran    = '$sebaran'";
    $sets[] = "kib        = '$kib'";
    $sets[] = "foto       = '$new_name'";

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
        $val = htmlspecialchars($_POST[$f] ?? '');
        $sets[] = "$f = '$val'";
    }

    $sql = "UPDATE kejadian SET " . implode(", ", $sets) . " WHERE id = $id";
    $ok  = mysqli_query($con, $sql);

    if ($ok) { ?>
        <div class="alert alert-primary mt-3" role="alert">
            Kejadian berhasil diupdate
        </div>
        <meta http-equiv="refresh" content="2; url=list-kejadian.php" />
    <?php } else {
        echo "<div class='alert alert-danger mt-3'>Gagal: " . mysqli_error($con) . "</div>";
    }
}

if (isset($_POST["hapus"])) {
    // Ambil nama file foto dulu
    $result = mysqli_query($con, "SELECT foto FROM kejadian WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);
    $foto = $row['foto'] ?? '';

    // Hapus file foto di folder jika ada
    if ($foto && file_exists("images/" . $foto)) {
        unlink("images/" . $foto);
    }

    // Hapus data dari database
    $queryHapus = mysqli_query($con, "DELETE FROM kejadian WHERE id='$id'");

    if ($queryHapus) { ?>
        <div class="alert alert-primary mt-3" role="alert">
            Kejadian berhasil dihapus
        </div>
        <meta http-equiv="refresh" content="2; url=list-kejadian.php" />
    <?php } else {
        echo mysqli_error($con);
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