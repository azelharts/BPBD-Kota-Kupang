<?php 
    require "session.php";
    require "koneksi.php";

    $id = $_GET['p'];
    $query= mysqli_query($con, "SELECT * FROM kejadian WHERE id='$id'");
    $data = mysqli_fetch_array($query);

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
    <title>Badan Penanggulangan Bencana Daerah Kota Kupang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: #fff !important; }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8" id="printableArea">

    <!-- header -->
    <div class="text-center mb-8">
        <img src="images/assets/logo-bpbd.png" alt="Logo BPBD" class="w-20 h-20 mx-auto mb-3">
        <h1 class="text-xl sm:text-2xl font-extrabold text-amber-600">Badan Penanggulangan Bencana Daerah Kota Kupang</h1>
        <h2 class="text-lg sm:text-xl font-bold mt-2">Data Kejadian dan Dampak Bencana</h2>
    </div>

    <!-- photo -->
    <?php if($data['foto']): ?>
        <div class="mb-6 text-center">
            <img src="images/<?= htmlspecialchars($data['foto']) ?>" alt="Foto kejadian" class="inline-block max-w-full max-h-80 rounded-2xl shadow-md">
        </div>
    <?php endif; ?>

    <!-- content cards -->
    <div class="space-y-6">

        <!-- 1. Data Kejadian -->
        <div class="bg-white rounded-2xl shadow-md p-5">
            <h3 class="text-lg font-bold mb-4 border-b pb-2">1. Data Kejadian Bencana</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                <?php
function formatJsonValues($jsonString) {
    $decoded = json_decode($jsonString, true);
    $values = [];

    if (is_array($decoded)) {
        foreach ($decoded as $item) {
            if (isset($item['value'])) {
                $values[] = $item['value'];
            }
        }
    }

    return implode(", ", $values);
}
?>

                <div>
    <span class="font-semibold">Jenis Bencana:</span> 
    <?= htmlspecialchars(formatJsonValues($data['jenis_id'])) ?>
</div>
                <div>
    <span class="font-semibold">Nama Kejadian:</span> 
    <?= htmlspecialchars(formatJsonValues($data['nama'])) ?>
</div>
                <div><span class="font-semibold">Tarikh:</span> <?= htmlspecialchars($data['tanggal']) ?></div>
                <div><span class="font-semibold">Waktu Kejadian:</span> <?= htmlspecialchars($data['waktu']) ?></div>
                <div class="sm:col-span-2">
                    <span class="font-semibold">Lokasi:</span>
                    <ul class="list-disc ml-5 mt-1 space-y-1">
                        <li>Provinsi: Nusa Tenggara Timur</li>
                        <li>Kabupaten/Kota: Kota Kupang</li>
                        <li>Kecamatan: <?= htmlspecialchars(formatJsonValues($data['kecamatan'])) ?></li>
<li>Kelurahan: <?= htmlspecialchars(formatJsonValues($data['kelurahan'])) ?></li>
                        <li>Letak Geografis: <?= htmlspecialchars($data['geografis']) ?></li>
                    </ul>
                </div>
                <div class="sm:col-span-2"><span class="font-semibold">Penyebab Bencana:</span> <?= nl2br(htmlspecialchars($data['sebab'])) ?></div>
                <div class="sm:col-span-2"><span class="font-semibold">Kronologis Bencana:</span> <?= nl2br(htmlspecialchars($data['kronologis'])) ?></div>
                <div class="sm:col-span-2"><span class="font-semibold">Deskripsi Kejadian:</span> <?= nl2br(htmlspecialchars($data['deskripsi'])) ?></div>
                <div><span class="font-semibold">Sumber:</span> <?= htmlspecialchars($data['sumber']) ?></div>
                <div><span class="font-semibold">Kondisi mutakhir:</span> <?= htmlspecialchars($data['kondisi']) ?></div>
                <div><span class="font-semibold">Status Darurat:</span> <?= htmlspecialchars($data['status_darurat']) ?></div>
                <div><span class="font-semibold">Upaya:</span> <?= htmlspecialchars($data['upaya']) ?></div>
                <div><span class="font-semibold">Sebaran Dampak:</span> <?= htmlspecialchars($data['sebaran']) ?></div>
                <div class="sm:col-span-2"><span class="font-semibold">Kode Identitas Bencana:</span> <?= htmlspecialchars($data['kib']) ?></div>
            </div>
        </div>

        <!-- 2. Data Kebutuhan -->
        <div class="bg-white rounded-2xl shadow-md p-5">
            <h3 class="text-lg font-bold mb-4 border-b pb-2">2. Data Kebutuhan</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                <div><span class="font-semibold">Dana:</span> <?= htmlspecialchars($data['dana']) ?> Juta</div>
                <div><span class="font-semibold">Sumber Daya Manusia:</span> <?= htmlspecialchars($data['sdm']) ?></div>
                <div><span class="font-semibold">Sarana Prasarana:</span> <?= htmlspecialchars($data['sarpras']) ?></div>
                <div><span class="font-semibold">Logistik:</span> <?= htmlspecialchars($data['logistik']) ?></div>
                <div class="sm:col-span-2"><span class="font-semibold">Peralatan:</span> <?= htmlspecialchars($data['alat']) ?></div>
            </div>
        </div>

        <!-- 3. Data Akibat Terhadap Manusia -->
        <div class="bg-white rounded-2xl shadow-md p-5 overflow-x-auto">
            <h3 class="text-lg font-bold mb-4 border-b pb-2">3. Data Akibat Terhadap Manusia</h3>
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
                    <?php $korban = ['Meninggal','Hilang','Luka/sakit','Terdampak','Mengungsi'];
                          $fields = ['aml','amp','dwsml','dwsmp','lnml','lnmp','tml','tmp'];
                          foreach($korban as $k): ?>
                    <tr>
                        <td class="p-2 border font-semibold"><?= $k ?></td>
                        <?php foreach($fields as $f): ?>
                            <td class="p-2 border text-center"><?= htmlspecialchars($data[$f]) ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- 4. Kerusakan Sosial Ekonomi -->
        <div class="bg-white rounded-2xl shadow-md p-5 overflow-x-auto">
            <h3 class="text-lg font-bold mb-4 border-b pb-2">4. Data Kerusakan dan Kerugian Sosial Ekonomi</h3>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100"><tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">Ha</th><th class="p-2 border">Taksiran Kerugian (Juta)</th></tr></thead>
                <tbody>
                    <?php $arr = ['Sawah'=>'sawah','Lahan'=>'lahan','Kebun'=>'kebun','Hutan'=>'hutan','Kolam'=>'kolam'];
                          foreach($arr as $label=>$name): ?>
                    <tr>
                        <td class="p-2 border font-semibold"><?= $label ?></td>
                        <td class="p-2 border text-center"><?= htmlspecialchars($data[$name]) ?></td>
                        <td class="p-2 border text-center"><?= htmlspecialchars($data['tx'.$name]) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- >>> NEW TABLE 4 – Kios/Pabrik <<< -->
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

        <!-- 5. Prasarana & Sarana Vital -->
        <div class="bg-white rounded-2xl shadow-md p-5 overflow-x-auto">
            <h3 class="text-lg font-bold mb-4 border-b pb-2">5. Data Kerusakan dan Kerugian Prasarana & Sarana Vital</h3>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100"><tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">Taksiran Kerugian (Juta)</th></tr></thead>
                <tbody>
                    <?php $arr = ['Jaringan Air Bersih/Minum'=>'txair','Jaringan lampu dan lampu penerangan'=>'txlampu','Jaringan telekomunikasi'=>'txkom','Jaringan irigasi'=>'txiri','Jalan (Km)'=>'txjln','jaringan Transportasi'=>'txtrans','Jaringan Pengisian Bahan Bakar Umum'=>'txbbm'];
                          foreach($arr as $label=>$name): ?>
                    <tr>
                        <td class="p-2 border font-semibold"><?= $label ?></td>
                        <td class="p-2 border text-center"><?= htmlspecialchars($data[$name]) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- >>> NEW TABLE 5 – Jembatan <<< -->
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

        <!-- 6. Rumah -->
        <div class="bg-white rounded-2xl shadow-md p-5 overflow-x-auto">
            <h3 class="text-lg font-bold mb-4 border-b pb-2">6. Data Kerusakan dan Kerugian Rumah</h3>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100"><tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">RB</th><th class="p-2 border">RS</th><th class="p-2 border">RR</th><th class="p-2 border">Terendam</th><th class="p-2 border">Taksiran Kerugian (Juta)</th></tr></thead>
                <tbody>
                    <tr>
                        <td class="p-2 border font-semibold">Kerusakan dan kerugian rumah</td>
                        <?php foreach(['rmhb','rmhs','rmhr','rmhtrd'] as $n): ?>
                            <td class="p-2 border text-center"><?= htmlspecialchars($data[$n]) ?></td>
                        <?php endforeach; ?>
                        <td class="p-2 border text-center"><?= htmlspecialchars($data['txrmh']) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 7. Pelayanan Dasar -->
        <div class="bg-white rounded-2xl shadow-md p-5 overflow-x-auto">
            <h3 class="text-lg font-bold mb-4 border-b pb-2">7. Data Kerusakan dan Kerugian Pelayanan Dasar</h3>
            <table class="w-full text-sm border border-gray-200 rounded-lg">
                <thead class="bg-gray-100"><tr><th class="p-2 border">Kerusakan</th><th class="p-2 border">RB</th><th class="p-2 border">RS</th><th class="p-2 border">RR</th><th class="p-2 border">Terendam</th><th class="p-2 border">Taksiran Kerugian (Juta)</th></tr></thead>
                <tbody>
                    <?php $arr = ['Satuan Pendidikan'=>'sko','Rumah Ibadat'=>'ri','Fasilitas Pelayanan Kesehatan'=>'faskes','Kantor'=>'ktr','Pasar'=>'psr'];
                          foreach($arr as $label=>$pre): ?>
                    <tr>
                        <td class="p-2 border font-semibold"><?= $label ?></td>
                        <?php foreach([$pre.'b',$pre.'s',$pre.'r',$pre.'trd'] as $n): ?>
                            <td class="p-2 border text-center"><?= htmlspecialchars($data[$n]) ?></td>
                        <?php endforeach; ?>
                        <td class="p-2 border text-center"><?= htmlspecialchars($data['tx'.$pre]) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- 8. Aset & Layanan -->
        <div class="bg-white rounded-2xl shadow-md p-5">
            <h3 class="text-lg font-bold mb-2 border-b pb-2">8. Data Aset dan Layanan Penanganan Kedaruratan</h3>
            <p class="text-sm"><?= nl2br(htmlspecialchars($data['layanan'])) ?></p>
        </div>
    </div>

    <!-- action buttons -->
    <div class="no-print flex flex-wrap gap-4 justify-center mt-8">
        <form method="post">
            <a href="list-kejadian.php"
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold transition">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>Kembali
                        </a>
        </form>
        <button onclick="window.print()"
                class="inline-flex items-center gap-2 px-5 py-2 rounded-lg bg-amber-500 hover:bg-amber-600 text-white font-semibold transition">
            <i data-lucide="printer" class="w-4 h-4"></i>Print
        </button>
    </div>
</div>

<?php if(isset ($_POST['kembali'])): ?>
    <meta http-equiv="refresh" content="0; url=kejadian.php" />
<?php endif; ?>

<script>lucide.createIcons();</script>
</body>
</html>