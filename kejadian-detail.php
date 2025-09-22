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
    <style>
        form div{
            margin-bottom: 10px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejadian Detail</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php require "navigation.php"; ?>
    <div class="container mt-5">
        <h2> Detail Kejadian dan Dampak Bencana</h2>

        <div class="col-12 col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
            <div>
                    <label for="nama">1. Nama Kejadian</label>
                    <Input type="text" id="nama" name="nama" value="<?php echo $data['nama'];?>"class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="jenis">2. Jenis Kejadian</label>    
                    <select name="jenis" id="jenis" class="form-control" required>
                        <option value="<?php echo $data['jenis_id']; ?>"><?php echo $data 
                        ['jenis_id'];?></option>
                        <option value="alam">Bencana Alam</option>
                        <option value="nonalam">Bencana NonAlam</option>
                        <option value="sosial">Bencana Sosial</option>
                    </select>
                </div>
                <div>
                    <label for="tanggal">3. Tanggal Kejadian</label>
                    <input type="date" value="<?php echo $data['tanggal'];?>"class="form-control" name="tanggal" required>
                </div>
                <div>
                    <label for="waktu">4. Waktu Kejadian</label>
                    <input type="time" value="<?php echo $data['waktu'];?>"class="form-control" name="waktu" required>
                </div>
                <div>
                    <label for="lokasi">5. Lokasi</label><br>
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
                        <option value="<?php echo $data['kecamatan']; ?>"><?php echo $data 
                        ['kecamatan'];?></option>
                        <option value="Alak">Kecamatan Alak</option>
                        <option value="Kota Raja">Kecamatan Kota Raja</option>
                        <option value="Kota Lama">Kecamatan Kota Lama</option>
                        <option value="Oebobo">Kecamatan Oebobo</option>
                        <option value="Kelapa Lima">Kecamatan Kelapa Lima</option>
                        <option value="Maulafa">Kecamatan Maulafa</option>
                    </select>
                    Kelurahan
                    <input type="text" value="<?php echo $data['kelurahan'];?>"class="form-control" name="kelurahan" required>
                    Letak Geografis
                    <input type="text" value="<?php echo $data['geografis'];?>"class="form-control" name="geografis" required>
                </div>
                <div>
                    <label for="sebab">6. Sebab Kejadian</label>
                    <textarea name="sebab" class="form-control" id="sebab" cols="30" rows="5">
                    <?php echo $data['sebab'];?></textarea>
                </div>
                <div>
                    <label for="kronologis">7. Kronologis Kejadian</label>
                    <textarea name="kronologis" class="form-control" id="kronologis" cols="30" rows="5">
                    <?php echo $data['kronologis'];?> </textarea>
                </div>
                <div>
                    <label for="deskripsi">8. Deskripsi Kejadian</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5">
                    <?php echo $data['deskripsi'];?></textarea>
                </div>
                <div>
                    <label for="sumber">9. Sumber Informasi</label>
                    <input type="text" value="<?php echo $data['sumber'];?>"class="form-control" name="sumber">
                </div>
                <div>
                    <label for="kondisi">10. Kondisi mutakhir</label>
                    <input type="text" value="<?php echo $data['kondisi'];?>"class="form-control" name="kondisi">
                </div>
                <div>
                    <label for="status_darurat">11. Status Darurat</label>
                    <input type="text" value="<?php echo $data['status_darurat'];?>"class="form-control" name="status_darurat" required>
                </div>
                <div>
                    <label for="upaya">12. Upaya</label>
                    <input type="text" value="<?php echo $data['upaya'];?>"class="form-control" name="upaya" required>
                </div>
                <div>
                    <label for="sebaran">13. Sebaran Dampak</label>
                    <input type="text" value="<?php echo $data['sebaran'];?>"class="form-control" name="sebaran" required>
                </div>
                <div>
                    <label for="CurrentFoto">14. Foto Sekarang</label>
                    <img src="image/<?php echo $data['foto']?>" alt="" width="300px"> 
                </div>
                <div>
                    <label for="foto">Ganti Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                </div>
                <div>
                    <label for="kib" class="fw-semibold">15. Kode Identitas Bencana</label>
                    <input type="text" value="<?php echo $data['kib'];?>" class="form-control" name="kib" id="kib">
                </div>
                <div>
                    <h3 class="mt-5">B.2 Data Kebutuhan Bencana </h3>
                </div>
                <div>
                    <label for="dana" class="mt-3 fw-semibold">1. Dana</label>
                    <input type="text" value="<?php echo $data['dana'];?>" class="form-control" name="dana">
                </div>
                <div>
                    <label for="sdm" class="fw-semibold">2. Sumber Daya Manusia</label>
                    <input type="text" value="<?php echo $data['sdm'];?>" class="form-control" name="sdm">
                </div>
                <div>
                    <label for="sarpras" class="fw-semibold">3. Sarana Prasarana</label>
                    <input type="text" value="<?php echo $data['sarpras'];?>" class="form-control" name="sarpras">
                </div>
                <div>
                    <label for="logistik" class="fw-semibold">4. Logistik</label>
                    <input type="text" value="<?php echo $data['logistik'];?>"class="form-control" name="logistik">
                </div>
                <div>
                    <label for="alat" class="fw-semibold">5. Peralatan</label>
                    <input type="text" value="<?php echo $data['alat'];?>" class="form-control" name="alat">
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
                            <td><input type="text" value="<?php echo $data['aml'];?>" name="aml" size="8"></td>
                            <td><input type="text" value="<?php echo $data['amp'];?>" name="amp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['dwsml'];?>" name="dwsml" size="8"></td>
                            <td><input type="text" value="<?php echo $data['dwsmp'];?>" name="dwsmp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['lnml'];?>" name="lnml" size="8"></td>
                            <td><input type="text" value="<?php echo $data['lnmp'];?>" name="lnmp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['tml'];?>" name="tml" size="8"></td>
                            <td><input type="text" value="<?php echo $data['tmp'];?>" name="tmp" size="8"></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Hilang</td>
                            <td><input type="text" value="<?php echo $data['ahl'];?>" name="ahl" size="8"></td>
                            <td><input type="text" value="<?php echo $data['ahp'];?>" name="ahp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['dwshl'];?>" name="dwshl" size="8"></td>
                            <td><input type="text" value="<?php echo $data['dwshp'];?>" name="dwshp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['lnhl'];?>" name="lnhl" size="8"></td>
                            <td><input type="text" value="<?php echo $data['lnhp'];?>" name="lnhp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['thl'];?>" name="thl" size="8"></td>
                            <td><input type="text" value="<?php echo $data['thp'];?>" name="thp" size="8"></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Luka/sakit</td>
                            <td><input type="text" value="<?php echo $data['alkl'];?>" name="alkl" size="8"></td>
                            <td><input type="text" value="<?php echo $data['alkp'];?>" name="alkp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['dwsll'];?>" name="dwsll" size="8"></td>
                            <td><input type="text" value="<?php echo $data['dwslp'];?>" name="dwslp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['lnll'];?>" name="lnll" size="8"></td>
                            <td><input type="text" value="<?php echo $data['lnlp'];?>" name="lnlp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['tll'];?>" name="tll" size="8"></td>
                            <td><input type="text" value="<?php echo $data['tlp'];?>" name="tlp" size="8"></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Terdampak</td>
                            <td><input type="text" value="<?php echo $data['atl'];?>" name="atl" size="8"></td>
                            <td><input type="text" value="<?php echo $data['atp'];?>" name="atp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['dwstl'];?>" name="dwstl" size="8"></td>
                            <td><input type="text" value="<?php echo $data['dwstp'];?>" name="dwstp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['lntl'];?>" name="lntl" size="8"></td>
                            <td><input type="text" value="<?php echo $data['lntp'];?>" name="lntp" size="8"></td>
                            <td><input type="text" value="<?php echo $data['ttl'];?>" name="ttl" size="8"></td>
                            <td><input type="text" value="<?php echo $data['ttp'];?>" name="ttp" size="8"></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Mengungsi</td>
                            <td><input type="text" value="<?php echo $data['aul'];?>" name="aul" size="8"></td>
                            <td><input type="text" value="<?php echo $data['aup'];?>" name="aup" size="8"></td>
                            <td><input type="text" value="<?php echo $data['dwsul'];?>" name="dwsul" size="8"></td>
                            <td><input type="text" value="<?php echo $data['dwsup'];?>" name="dwsup" size="8"></td>
                            <td><input type="text" value="<?php echo $data['lnul'];?>"name="lnul" size="8"></td>
                            <td><input type="text" value="<?php echo $data['lnup'];?>" name="lnup" size="8"></td>
                            <td><input type="text" value="<?php echo $data['tul'];?>" name="tul" size="8"></td>
                            <td><input type="text" value="<?php echo $data['tup'];?>" name="tup" size="8"></td>
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
                            <td><input type="text" value="<?php echo $data['sawah'];?>" name="sawah" size="10"></td>
                            <td><input type="text" value="<?php echo $data['txsawah'];?>" name="txsawah" size="20"> Juta</td>
                            
                        </tr>
                        <tr>
                            <td class="fw-semibold">Lahan</td>
                            <td><input type="text" value="<?php echo $data['lahan'];?>" name="lahan" size="10"></td>
                            <td><input type="text" value="<?php echo $data['txlahan'];?>" name="txlahan" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Kebun</td>
                            <td><input type="text" value="<?php echo $data['kebun'];?>" name="kebun" size="10"></td>
                            <td><input type="text" value="<?php echo $data['txkebun'];?>" name="txkebun" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Hutan</td>
                            <td><input type="text" value="<?php echo $data['hutan'];?>" name="hutan" size="10"></td>
                            <td><input type="text" value="<?php echo $data['txhutan'];?>" name="txhutan" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Kolam</td>
                            <td><input type="text" value="<?php echo $data['kolam'];?>" name="kolam" size="10"></td>
                            <td><input type="text" value="<?php echo $data['txkolam'];?>" name="txkolam" size="20"> Juta</td>
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
                            <td><input type="text" value="<?php echo $data['kb'];?>" name="kb" size="10"></td>
                            <td><input type="text" value="<?php echo $data['ks'];?>" name="ks" size="10"></td>
                            <td><input type="text" value="<?php echo $data['kr'];?>" name="kr" size="10"></td>
                            <td><input type="text" value="<?php echo $data['ktrd'];?>" name="ktrd" size="10"></td>
                            <td><input type="text" value="<?php echo $data['txkios'];?>" name="txkios" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Pabrik</td>
                            <td><input type="text" value="<?php echo $data['pb'];?>" name="pb" size="10"></td>
                            <td><input type="text" value="<?php echo $data['ps'];?>" name="ps" size="10"></td>
                            <td><input type="text" value="<?php echo $data['pr'];?>" name="pr" size="10"></td>
                            <td><input type="text" value="<?php echo $data['ptrd'];?>" name="ptrd" size="10"></td>
                            <td><input type="text" value="<?php echo $data['txpabrik'];?>" name="txpabrik" size="20"> Juta</td>
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
                            <td><input type="text" value="<?php echo $data['txair'];?>" name="txair" size="20"> Juta</td>
                            
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan lampu dan lampu penerangan</td>
                            <td><input type="text" value="<?php echo $data['txlampu'];?>" name="txlampu" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan telekomunikasi</td>
                            <td><input type="text" value="<?php echo $data['txkom'];?>" name="txkom" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan irigasi</td>
                            <td><input type="text" value="<?php echo $data['txiri'];?>" name="txiri" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jalan (Km)</td>
                            <td><input type="text" value="<?php echo $data['txjln'];?>" name="txjln" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">jaringan Transportasi</td>
                            <td><input type="text" value="<?php echo $data['txtrans'];?>" name="txtrans" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan Pengisian Bahan Bakar Umum</td>
                            <td><input type="text" value="<?php echo $data['txbbm'];?>" name="txbbm" size="20"> Juta</td>
                        </tr>
            </table>
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
                            <td class="fw-semibold">Jembatan</td>
                            <td><input type="text" value="<?php echo $data['jb'];?>" name="jb" size="10"></td>
                            <td><input type="text" value="<?php echo $data['js'];?>" name="js" size="10"></td>
                            <td><input type="text" value="<?php echo $data['jr'];?>" name="jr" size="10"></td>
                            <td><input type="text" value="<?php echo $data['jtrd'];?>" name="jtrd" size="10"></td>
                            <td><input type="text" value="<?php echo $data['txjembatan'];?>" name="txjembatan" size="20"> Juta</td>
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
                            <td><input type="text" value="<?php echo $data['rmhb'];?>" name="rmhb" size="5"></td>
                            <td><input type="text" value="<?php echo $data['rmhs'];?>" name="rmhs" size="5"></td>
                            <td><input type="text" value="<?php echo $data['rmhr'];?>" name="rmhr" size="5"></td>
                            <td><input type="text" value="<?php echo $data['rmhtrd'];?>" name="rmhtrd" size="5"></td>
                            <td><input type="text" value="<?php echo $data['txrmh'];?>" name="txrmh" size="20"> Juta</td>
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
                            <td><input type="text" value="<?php echo $data['skob'];?>" name="skob" size="5"></td>
                            <td><input type="text" value="<?php echo $data['skos'];?>" name="skos" size="5"></td>
                            <td><input type="text" value="<?php echo $data['skor'];?>" name="skor" size="5"></td>
                            <td><input type="text" value="<?php echo $data['skotrd'];?>" name="skotrd" size="5"></td>
                            <td><input type="text" value="<?php echo $data['txsko'];?>" name="txsko" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Rumah Ibadat</td>
                            <td><input type="text" value="<?php echo $data['tmp'];?>" name="rib" size="5"></td>
                            <td><input type="text" value="<?php echo $data['tmp'];?>" name="ris" size="5"></td>
                            <td><input type="text" value="<?php echo $data['tmp'];?>" name="rir" size="5"></td>
                            <td><input type="text" value="<?php echo $data['tmp'];?>" name="ritrd" size="5"></td>
                            <td><input type="text" value="<?php echo $data['tmp'];?>" name="txri" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Fasilitas Pelayanan Kesehatan</td>
                            <td><input type="text" value="<?php echo $data['faskesb'];?>" name="faskesb" size="5"></td>
                            <td><input type="text" value="<?php echo $data['faskess'];?>" name="faskess" size="5"></td>
                            <td><input type="text" value="<?php echo $data['faskesr'];?>" name="faskesr" size="5"></td>
                            <td><input type="text" value="<?php echo $data['faskestrd'];?>" name="faskestrd" size="5"></td>
                            <td><input type="text" value="<?php echo $data['txfaskes'];?>" name="txfaskes" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Kantor</td>
                            <td><input type="text" value="<?php echo $data['ktrb'];?>" name="ktrb" size="5"></td>
                            <td><input type="text" value="<?php echo $data['ktrs'];?>" name="ktrs" size="5"></td>
                            <td><input type="text" value="<?php echo $data['ktrr'];?>" name="ktrr" size="5"></td>
                            <td><input type="text" value="<?php echo $data['ktrtrd'];?>" name="ktrtrd" size="5"></td>
                            <td><input type="text" value="<?php echo $data['txktr'];?>" name="txktr" size="20"> Juta</td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Pasar</td>
                            <td><input type="text" value="<?php echo $data['psrb'];?>" name="psrb" size="5"></td>
                            <td><input type="text" value="<?php echo $data['psrs'];?>" name="psrs" size="5"></td>
                            <td><input type="text" value="<?php echo $data['psrr'];?>" name="psrr" size="5"></td>
                            <td><input type="text" value="<?php echo $data['psrtrd'];?>" name="psrtrd" size="5"></td>
                            <td><input type="text" value="<?php echo $data['txpsr'];?>" name="txpsr" size="20"> Juta</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                    <h3 class="mt-5">B.8  Data Aset dan layanan penanganan kedaruratan</h3>
                    <div>
                    <label for="layanan" class="fw-semibold">Barang yang digunakan untuk melayani penanganan darurat bencana:</label>
                    <input type="text" value="<?php echo $data['layanan'];?>" class="form-control" name="layanan" id="layanan">
                </div>
            </div>
                <div>
                    <button type="submit" name="simpan" class="btn btn-success mt-3">Simpan</button>
                    <button type="submit" name="kembali" class="btn btn-primary mt-3">Kembali</button>
                    <button type="submit" name="hapus" class="btn btn-danger mt-3 me-5">Hapus</button>
                                   
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
                    $upaya= htmlspecialchars($_POST['upaya']);
                    $sebaran= htmlspecialchars($_POST['sebaran']);
                   
                    $target_dir = "image/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];
                    $random_name = generateRandomString (20);
                    $new_name = $random_name . "." . $imageFileType;
                    
                    if($nama=='' || $jenis=='' || $tanggal=='' || $waktu=='' || $kelurahan=='' || $status_darurat==''){
            ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Nama, Jenis, Tanggal, Waktu, Lokasi, dan status darurat wajib diisi
                        </div>
            <?php
                }
                else{
                    $queryUpdate = mysqli_query ($con, "UPDATE kejadian SET jenis_id='$jenis',
                    nama='$nama', tanggal='$tanggal', waktu='$waktu', provinsi='$provinsi', kabkota='$kabkota',
                    kecamatan='$kecamatan', kelurahan='$kelurahan', geografis='$geografis', sebab='$sebab',
                    kronologis='$kronologis', deskripsi='$deskripsi', sumber='$sumber', kondisi='$kondisi',
                    status_darurat='$status_darurat', upaya='$upaya', sebaran='$sebaran' WHERE id=$id");

                    if($nama_file!=''){
                        if($image_size > 5000000){
            ?>
                        <div class="alert alert-warning mt-3" role="alert">
                         File tidak boleh lebih dari 5 Mb
                        </div>
            <?php
                        }
                        else{
                        if($imageFileType!='jpg' && $imageFileType !='png' && $imageFileType !='gif'){
            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File foto Wajib bertype jpg atau png atau gif
                            </div>
            <?php
                        }
                        else{
                            move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir . $new_name);
                            $queryUpdate = mysqli_query($con, "UPDATE kejadian SET foto='$new_name' WHERE id='$id'");
                            
                            if($queryUpdate){
            ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    Kejadian berhasil diupdate
                                </div>

                                <meta http-equiv="refresh" content="2; url=kejadian.php" />
            <?php
                            }
                            else{
                                echo mysqli_error ($con);
                            }
                        }
                    }
                }
            }
        }
                if(isset ($_POST['hapus'])){
                    $queryHapus = mysqli_query($con, "DELETE FROM kejadian WHERE id='$id'");

                    if($queryHapus){
            ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    Kejadian berhasil dihapus
                                </div>
                                <meta http-equiv="refresh" content="2; url=kejadian.php" />
            <?php
                    }
                }
                
                if(isset ($_POST['kembali'])){
            ?>
                <meta http-equiv="refresh" content="0; url=kejadian.php" />
            <?php
                    }
        ?>
        </div>
    </div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>