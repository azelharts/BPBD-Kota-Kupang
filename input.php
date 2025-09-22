<?php
    require "session.php";
    require "koneksi.php";
    $queryKejadian= mysqli_query($con, "SELECT * FROM kejadian");
    $jumlahKejadian = mysqli_num_rows($queryKejadian);
   
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
    <title>Input Data Kejadian dan Dampak Bencana</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
</head>
<style>
    .no-decoration{
        text-decoration: none;
    }    
</style>
<body>
    <?php require "navigation.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel">
                        <i class="fas fa-home"></i> Dashboard 
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Input Data Kejadian dan Dampak bencana
                </li>
            </ol>
        </nav>
        <div class="my-5 col-12 col-md-8">
            <h3>B.1 Data Kejadian Bencana </h3>
            <form action="" method="post" class="mt-3" enctype="multipart/form-data">
                <div>
                    <label for="nama" class="fw-semibold">1. Nama Kejadian</label>
                    <select name="nama" id="nama" class="form-control" required>
                        <option value="">pilih satu</option>
                        <option value="Banjir rob">Banjir rob</option>
                        <option value="Banjir bandang">Banjir bandang</option>
                        <option value="Banjir dan tanah longsor">Banjir dan tanah longsor</option>
                        <option value="Banjir drainase dan selokan">Banjir drainase dan selokan</option>
                        <option value="Banjir waduk">Banjir waduk</option>
                        <option value="Banjir genangan">Banjir genangan</option>
                        <option value="Tanggul jebol">Tanggul jebol</option>
                        <option value="Longsor">Longsor</option>
                        <option value="Gerakan tanah">Gerakan tanah</option>
                        <option value="Gelombang pasang">Gelombang pasang</option>
                        <option value="Abrasi Pantai">Abrasi Pantai</option>
                        <option value="Puting beliung">Puting beliung</option>
                        <option value="Angin kencang">Angin kencang</option>
                        <option value="Angin topan">Angin topan</option>
                        <option value="Hujan es">Hujan es</option>
                        <option value="Siklon tropis">Siklon tropis</option>
                        <option value="Suhu udara ekstrem">Suhu udara ekstrem</option>
                        <option value="Kekeringan meteorologis">Kekeringan meteorologis</option>
                        <option value="Kekeringan hidrologis">Kekeringan hidrologis</option>
                        <option value="Kekeringan pertanian">Kekeringan pertanian</option>
                        <option value="Kebakaran hutan">Kebakaran hutan</option>
                        <option value="Kebakaran lahan">Kebakaran lahan</option>
                        <option value="Kebakaran lahan gambut">Kebakaran lahan gambut</option>
                        <option value="Gempa tektonik">Gempa tektonik</option>
                        <option value="Gempa vulkanik">Gempa vulkanik</option>
                        <option value="Gempabumi runtuhan">Gempabumi runtuhan</option>
                        <option value="Tsunami seismogenik">Tsunami seismogenik</option>
                        <option value="Tsunami nonseismik">Tsunami nonseismik</option>
                        <option value="Tsunami lokal">Tsunami lokal</option>
                        <option value="Tsunami regional">Tsunami regional</option>
                        <option value="Tsunami jarak">Tsunami jarak</option>
                        <option value="Tsunami meteorologi">Tsunami meteorologi</option>
                        <option value="Mikrotsunami">Mikrotsunami</option>
                        <option value="Awan panas guguran-aliran piroklastik guguran">Awan panas guguran-aliran piroklastik guguran</option>
                        <option value="Awan panas-aliran piroklastik">Awan panas-aliran piroklastik</option>
                        <option value="Banjir lahar">Banjir lahar</option>
                        <option value="Hujan abu vulkanik">Hujan abu vulkanik</option>
                        <option value="Gas vulkanik beracun">Gas vulkanik beracun</option>
                        <option value="Wabah penyakit">Wabah penyakit</option>
                        <option value="Epidemi">Epidemi</option>
                        <option value="Kebakaran gedung dan pemukiman">Kebakaran gedung dan pemukiman</option>
                        <option value="Kegagalan industri">Kegagalan industri</option>
                        <option value="Kecelakaan industri">Kecelakaan industri</option>
                        <option value="Konflik Sosial">Konflik Sosial</option>
                        <option value="Teror">Teror</option>
                        <option value="Kerusuhan Sosial">Kerusuhan Sosial</option>
                    </select>
                </div>
                <div>
                    <label for="jenis" class="fw-semibold">2. Jenis Kejadian</label>    
                    <select name="jenis" id="jenis" class="form-control" required>
                        <option value="pilih">pilih satu</option>
                        <option value="Bencana Alam">Bencana Alam</option>
                        <option value="Bencana NonAlam">Bencana NonAlam</option>
                        <option value="Bencana Sosial">Bencana Sosial</option>
                    </select>
                </div>
                <div>
                    <label for="tanggal" class="fw-semibold">3. Tanggal Kejadian</label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>
                <div>
                    <label for="waktu" class="fw-semibold">4. Waktu Kejadian</label>
                    <input type="time" class="form-control" name="waktu" required>
                </div>
                <div>
                    <label for="lokasi" class="fw-semibold">5. Lokasi</label><br>
                    Provinsi
                    <select name="provinsi" id="provinsi" class="form-control" required>
                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                    </select>
                    Kabupaten/Kota
                    <select name="kabkota" id="kabkota" class="form-control" required>
                        <option value="Kota Kupang">Kota Kupang</option>
                    </select>
                    Kecamatan
                    <select name="kecamatan" id="kecamatan" class="form-control" required>
                        <option value="pilih">pilih satu</option>
                        <option value="Alak">Kecamatan Alak</option>
                        <option value="Kota Raja">Kecamatan Kota Raja</option>
                        <option value="Kota Lama">Kecamatan Kota Lama</option>
                        <option value="Oebobo">Kecamatan Oebobo</option>
                        <option value="Kelapa Lima">Kecamatan Kelapa Lima</option>
                        <option value="Maulafa">Kecamatan Maulafa</option>
                    </select>
                    Kelurahan
                    <select name="kelurahan" id="kelurahan" class="form-control" required>
                        <option value="">pilih satu</option>
                        <option value="Alak">Alak</option>
                        <option value="Batuplat">Batuplat</option>
                        <option value="Fatufeto">Fatufeto</option>
                        <option value="Mantasi">Mantasi</option>
                        <option value="Manulai II">Manulai II</option>
                        <option value="Manutapen">Manutapen</option>
                        <option value="Naioni">Naioni</option>
                        <option value="Namosain">Namosain</option>
                        <option value="Nunbaun Delha">Nunbaun Delha</option>
                        <option value="Nunbaun Sabu">Nunbaun Sabu</option>
                        <option value="Nunhila">Nunhila</option>
                        <option value="Penkase Oeleta">Penkase Oeleta</option>
                        <option value="Kelapa Lima">Kelapa Lima</option>
                        <option value="Lasiana">Lasiana</option>
                        <option value="Oesapa">Oesapa</option>
                        <option value="Oesapa Barat">Oesapa Barat</option>
                        <option value="Oesapa Selatan">Oesapa Selatan</option>
                        <option value="Airnona">Airnona</option>
                        <option value="Bakunase">Bakunase</option>
                        <option value="Bakunase II">Bakunase II</option>
                        <option value="Fontein">Fontein</option>
                        <option value="Kuanino">Kuanino</option>
                        <option value="Naikoten I">Naikoten I</option>
                        <option value="Naikoten II">Naikoten II</option>
                        <option value="Nunleu">Nunleu</option>
                        <option value="Air Mata">Air Mata</option>
                        <option value="Bonipoi">Bonipoi</option>
                        <option value="Fatubesi">Fatubesi</option>
                        <option value="Lai-lai Bisi Kopan">Lai-lai Bisi Kopan</option>
                        <option value="Merdeka">Merdeka</option>
                        <option value="Nefonaek">Nefonaek</option>
                        <option value="Oeba">Oeba</option>
                        <option value="Pasir Panjang">Pasir Panjang</option>
                        <option value="Solor">Solor</option>
                        <option value="Tode Kisar">Tode Kisar</option>
                        <option value="Belo">Belo</option>
                        <option value="Fatukoa">Fatukoa</option>
                        <option value="Kolhua">Kolhua</option>
                        <option value="Maulafa">Maulafa</option>
                        <option value="Naikolan">Naikolan</option>
                        <option value="Naimata">Naimata</option>
                        <option value="Oepura">Oepura</option>
                        <option value="Penfui">Penfui</option>
                        <option value="Sikumana">Sikumana</option>
                        <option value="Fatululi">Fatululi</option>
                        <option value="Kayu Putih">Kayu Putih</option>
                        <option value="Liliba">Liliba</option>
                        <option value="Oebobo">Oebobo</option>
                        <option value="Oebufu">Oebufu</option>
                        <option value="Oetete">Oetete</option>
                        <option value="Tuak Daun Merah">Tuak Daun Merah</option>
                    </select>
                    Letak Geografis
                    <input type="text" class="form-control" name="geografis" required>
                </div>
                <div>
                    <label for="sebab" class="fw-semibold">6. Sebab Kejadian</label>
                    <textarea name="sebab" class="form-control" id="sebab" cols="30" rows="5"></textarea>
                </div>
                <div>
                    <label for="kronologis" class="fw-semibold">7. Kronologis Kejadian</label>
                    <textarea name="kronologis" class="form-control" id="kronologis" cols="30" rows="5"></textarea>
                </div>
                <div>
                    <label for="deskripsi" class="fw-semibold">8. Deskripsi Kejadian</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5"></textarea>
                </div>
                <div>
                    <label for="sumber" class="fw-semibold">9. Sumber Informasi</label>
                    <input type="text" class="form-control" name="sumber">
                </div>
                <div>
                    <label for="kondisi" class="fw-semibold">10. Kondisi mutakhir</label>
                    <input type="text" class="form-control" name="kondisi">
                </div>
                <div>
                    <label for="status_darurat" class="fw-semibold">11. Status Darurat</label>
                    <input type="text" class="form-control" name="status_darurat" required>
                </div>
                <div>
                    <label for="upaya" class="fw-semibold">12. Upaya</label>
                    <input type="text" class="form-control" name="upaya" required>
                </div>
                <div>
                    <label for="sebaran" class="fw-semibold">13. Sebaran Dampak</label>
                    <input type="text" class="form-control" name="sebaran" required>
                </div>
                <div>
                    <label for="foto" class="fw-semibold">14. Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                </div>
                <div>
                    <label for="kib" class="fw-semibold">15. Kode Identitas Bencana</label>
                    <input type="text" class="form-control" name="kib" id=""kib>
                </div>
                <div>
                    <h3 class="mt-5">B.2 Data Kebutuhan Bencana </h3>
                </div>
                <div>
                    <label for="dana" class="mt-3 fw-semibold">1. Dana</label>
                    <input type="text" class="form-control" name="dana">
                </div>
                <div>
                    <label for="sdm" class="fw-semibold">2. Sumber Daya Manusia</label>
                    <input type="text" class="form-control" name="sdm">
                </div>
                <div>
                    <label for="sarpras" class="fw-semibold">3. Sarana Prasarana</label>
                    <input type="text" class="form-control" name="sarpras">
                </div>
                <div>
                    <label for="logistik" class="fw-semibold">4. Logistik</label>
                    <input type="text" class="form-control" name="logistik">
                </div>
                <div>
                    <label for="alat" class="fw-semibold">5. Peralatan</label>
                    <input type="text" class="form-control" name="alat">
                </div>
                <div>
                    <h3 class="mt-5">B.3 Data Akibat Terhadap Manusia </h3>
                </div>
                <div class="table-responsive mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center">Korban </th>
                            <th colspan="2" class="text-center">Anak-anak</th>
                            <th colspan="2" class="text-center">Dewasa</th>
                            <th colspan="2" class="text-center">Lansia</th>
                            <th colspan="2" class="text-center">Total</th>
                        </tr>
                        <tr>
                            <td class="text-center">L</td>
                            <td class="text-center">P</td>
                            <td class="text-center">L</td>
                            <td class="text-center">P</td>
                            <td class="text-center">L</td>
                            <td class="text-center">P</td>
                            <td class="text-center">L</td>
                            <td class="text-center">P</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold">Meninggal</td>
                            <td><input type="text" name="aml" size="8"></td>
                            <td><input type="text" name="amp" size="8"></td>
                            <td><input type="text" name="dwsml" size="8"></td>
                            <td><input type="text" name="dwsmp" size="8"></td>
                            <td><input type="text" name="lnml" size="8"></td>
                            <td><input type="text" name="lnmp" size="8"></td>
                            <td><input type="text" name="tml" size="8"></td>
                            <td><input type="text" name="tmp" size="8"></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Hilang</td>
                            <td><input type="text" name="ahl" size="8"></td>
                            <td><input type="text" name="ahp" size="8"></td>
                            <td><input type="text" name="dwshl" size="8"></td>
                            <td><input type="text" name="dwshp" size="8"></td>
                            <td><input type="text" name="lnhl" size="8"></td>
                            <td><input type="text" name="lnhp" size="8"></td>
                            <td><input type="text" name="thl" size="8"></td>
                            <td><input type="text" name="thp" size="8"></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Luka/sakit</td>
                            <td><input type="text" name="alkl" size="8"></td>
                            <td><input type="text" name="alkp" size="8"></td>
                            <td><input type="text" name="dwsll" size="8"></td>
                            <td><input type="text" name="dwslp" size="8"></td>
                            <td><input type="text" name="lnll" size="8"></td>
                            <td><input type="text" name="lnlp" size="8"></td>
                            <td><input type="text" name="tll" size="8"></td>
                            <td><input type="text" name="tlp" size="8"></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Terdampak</td>
                            <td><input type="text" name="atl" size="8"></td>
                            <td><input type="text" name="atp" size="8"></td>
                            <td><input type="text" name="dwstl" size="8"></td>
                            <td><input type="text" name="dwstp" size="8"></td>
                            <td><input type="text" name="lntl" size="8"></td>
                            <td><input type="text" name="lntp" size="8"></td>
                            <td><input type="text" name="ttl" size="8"></td>
                            <td><input type="text" name="ttp" size="8"></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Mengungsi</td>
                            <td><input type="text" name="aul" size="8"></td>
                            <td><input type="text" name="aup" size="8"></td>
                            <td><input type="text" name="dwsul" size="8"></td>
                            <td><input type="text" name="dwsup" size="8"></td>
                            <td><input type="text" name="lnul" size="8"></td>
                            <td><input type="text" name="lnup" size="8"></td>
                            <td><input type="text" name="tul" size="8"></td>
                            <td><input type="text" name="tup" size="8"></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div>
                    <h3 class="mt-5">B.4 Data Kerusakan dan Kerugian Sosial Ekonomi </h3>
                </div>
                <div class="table-responsive mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kerusakan</th>
                            <th>Ha</th>
                            <th>Taksiran Kerugian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold">Sawah</td>
                            <td><input type="text" name="sawah" size="10"></td>
                            <td><input type="text" name="txsawah" size="20"> Juta</td>
                            
                        </tr>
                        <tr>
                            <td class="fw-semibold">Lahan</td>
                            <td><input type="text" name="lahan" size="10"></td>
                            <td><input type="text" name="txlahan" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Kebun</td>
                            <td><input type="text" name="kebun" size="10"></td>
                            <td><input type="text" name="txkebun" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Hutan</td>
                            <td><input type="text" name="hutan" size="10"></td>
                            <td><input type="text" name="txhutan" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Kolam</td>
                            <td><input type="text" name="kolam" size="10"></td>
                            <td><input type="text" name="txkolam" size="20"> Juta</td>
                        </tr>
            </table>
                <div class="table-responsive mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Kerusakan</th>
                            <th>RB</th>
                            <th>RS</th>
                            <th>RR</th>
                            <th>Terendam</th>
                            <th>Taksiran Kerugian</th>
                        </tr>
                    </thead>
                        <tr>
                            <td class="fw-semibold">Kios/Toko</td>
                            <td><input type="text" name="kb" size="10"></td>
                            <td><input type="text" name="ks" size="10"></td>
                            <td><input type="text" name="kr" size="10"></td>
                            <td><input type="text" name="ktrd" size="10"></td>
                            <td><input type="text" name="txkios" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Pabrik</td>
                            <td><input type="text" name="pb" size="10"></td>
                            <td><input type="text" name="ps" size="10"></td>
                            <td><input type="text" name="pr" size="10"></td>
                            <td><input type="text" name="ptrd" size="10"></td>
                            <td><input type="text" name="txpabrik" size="20"> Juta</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div>
                    <h3 class="mt-5">B.5 Data kerusakan dan kerugian prasarana dan sarana vital </h3>
                </div>
                <div class="table-responsive mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kerusakan</th>
                            <th>Taksiran Kerugian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold">Jaringan Air Bersih/Minum</td>
                            <td><input type="text" name="txair" size="20"> Juta</td>
                            
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan lampu dan lampu penerangan</td>
                            <td><input type="text" name="txlampu" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan telekomunikasi</td>
                            <td><input type="text" name="txkom" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan irigasi</td>
                            <td><input type="text" name="txiri" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jalan (Km)</td>
                            <td><input type="text" name="txjln" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">jaringan Transportasi</td>
                            <td><input type="text" name="txtrans" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan Pengisian Bahan Bakar Umum</td>
                            <td><input type="text" name="txbbm" size="20"> Juta</td>
                        </tr>
            </table>
            </div>
            <div class="table-responsive mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Kerusakan</th>
                            <th>RB (meter)</th>
                            <th>RS (meter)</th>
                            <th>RR (meter)</th>
                            <th>Terendam (meter)</th>
                            <th>Taksiran Kerugian</th>
                        </tr>
                    </thead>
                        <tr>
                            <td class="fw-semibold">Jembatan</td>
                            <td><input type="text" name="jb" size="10"></td>
                            <td><input type="text" name="js" size="10"></td>
                            <td><input type="text" name="jr" size="10"></td>
                            <td><input type="text" name="jtrd" size="10"></td>
                            <td><input type="text" name="txjembatan" size="20"> Juta</td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <div>
                    <h3 class="mt-5">B.6  Data kerusakan dan kerugian rumah </h3>
                </div>
                <div class="table-responsive mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Kerusakan</th>
                            <th>RB</th>
                            <th>RS</th>
                            <th>RR</th>
                            <th>Terendam</th>
                            <th>Taksiran Kerugian</th>
                        </tr>
                    </thead>
                        <tr>
                            <td class="fw-semibold">Kerusakan dan kerugian rumah</td>
                            <td><input type="text" name="rmhb" size="5"></td>
                            <td><input type="text" name="rmhs" size="5"></td>
                            <td><input type="text" name="rmhr" size="5"></td>
                            <td><input type="text" name="rmhtrd" size="5"></td>
                            <td><input type="text" name="txrmh" size="20"> Juta</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
                <div>
                    <h3 class="mt-5">B.7  Data kerusakan dan kerugian pelayanan dasar </h3>
                </div>
                <div class="table-responsive mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Kerusakan</th>
                            <th>RB</th>
                            <th>RS</th>
                            <th>RR</th>
                            <th>Terendam</th>
                            <th>Taksiran Kerugian</th>
                        </tr>
                    </thead>
                        <tr>
                            <td class="fw-semibold">Satuan Pendidikan</td>
                            <td><input type="text" name="skob" size="5"></td>
                            <td><input type="text" name="skos" size="5"></td>
                            <td><input type="text" name="skor" size="5"></td>
                            <td><input type="text" name="skotrd" size="5"></td>
                            <td><input type="text" name="txsko" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Rumah Ibadat</td>
                            <td><input type="text" name="rib" size="5"></td>
                            <td><input type="text" name="ris" size="5"></td>
                            <td><input type="text" name="rir" size="5"></td>
                            <td><input type="text" name="ritrd" size="5"></td>
                            <td><input type="text" name="txri" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Fasilitas Pelayanan Kesehatan</td>
                            <td><input type="text" name="faskesb" size="5"></td>
                            <td><input type="text" name="faskess" size="5"></td>
                            <td><input type="text" name="faskesr" size="5"></td>
                            <td><input type="text" name="faskestrd" size="5"></td>
                            <td><input type="text" name="txfaskes" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Kantor</td>
                            <td><input type="text" name="ktrb" size="5"></td>
                            <td><input type="text" name="ktrs" size="5"></td>
                            <td><input type="text" name="ktrr" size="5"></td>
                            <td><input type="text" name="ktrtrd" size="5"></td>
                            <td><input type="text" name="txktr" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Pasar</td>
                            <td><input type="text" name="psrb" size="5"></td>
                            <td><input type="text" name="psrs" size="5"></td>
                            <td><input type="text" name="psrr" size="5"></td>
                            <td><input type="text" name="psrtrd" size="5"></td>
                            <td><input type="text" name="txpsr" size="20"> Juta</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                    <h3 class="mt-5">B.8  Data Aset dan layanan penanganan kedaruratan</h3>
                    <div>
                    <label for="layanan" class="fw-semibold">Barang yang digunakan untuk melayani penanganan darurat bencana:</label>
                    <textarea class="form-control" name="layanan" id="layanan" cols="30" rows="5"></textarea>
                    </div>
            </div>
                <div>
                    <button type="submit" name="simpan" class="btn btn-success mt-3">Simpan</button>
                    <a href=kejadian-detail.php button type="submit" name="kembali" class="btn btn-primary mt-3">Kembali</button></a>
                </div>

            </form>
            <?php
                if(isset($_POST['simpan'])){
                    $nama= htmlspecialchars($_POST['nama']);
                    $jenis= htmlspecialchars($_POST['jenis']);
                    $tanggal= htmlspecialchars($_POST['tanggal']);
                    $waktu= htmlspecialchars($_POST['waktu']);
                    $provinsi= htmlspecialchars($_POST['provinsi']);
                    $kabkota= htmlspecialchars($_POST['kabkota']);
                    $kecamatan= htmlspecialchars($_POST['kecamatan']);
                    $kelurahan= htmlspecialchars($_POST['kelurahan']);
                    $geografis= htmlspecialchars($_POST['geografis']);
                    $sebab= htmlspecialchars($_POST['sebab']);
                    $kronologis= htmlspecialchars($_POST['kronologis']);
                    $deskripsi= htmlspecialchars($_POST['deskripsi']);
                    $sumber= htmlspecialchars($_POST['sumber']);
                    $kondisi= htmlspecialchars($_POST['kondisi']);
                    $status_darurat= htmlspecialchars($_POST['status_darurat']);

                    $target_dir = "image/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];
                    $random_name = generateRandomString (20);
                    $new_name = $random_name . "." . $imageFileType;
                 
                    if($nama=='' || $jenis=='' || $tanggal=='' || $waktu=='' || $kelurahan=='' || $status_darurat=='')
                    {
                    ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Nama, Jenis, Tanggal, Waktu, Lokasi, dan status darurat wajib diisi
                        </div>
                    <?php
                    }
                    else{
                        if($nama_file!='')
                        {
                            if($image_size > 5000000)
                            {
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                File tidak boleh lebih dari 5 Mb
                                </div>
                            <?php
                            }
                            else{
                            if($imageFileType!='jpg' && $imageFileType !='png' && $imageFileType !='gif')
                            {
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                File foto Wajib bertype jpg atau png atau gif
                                </div>
                            <?php
                            }
                            else{
                                move_uploaded_file($_FILES["foto"]["tmp_name"],
                                $target_dir . $new_name);
                                
                            } 
                        }
                    }
                        $querytambah=mysqli_query ($con, "insert into kejadian set
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
                        layanan= '$_POST[layanan]'");
            
                    if($querytambah){
             ?>
                <div class="alert alert-primary mt-3" role="alert">
                    Data Kejadian dan Dampak Bencana Berhasil Tersimpan
                    
                </div>
                <meta http-equiv="refresh" content="2; url=input.php" />
            <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
                }
            }
            ?>
             

        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

</body>
</html>