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
    <title>Badan Penanggulangan Bencana Daerah Kota Kupang</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">

    <div class="text-center">
        <img src="image/logo2.png" class="rounded" width="100" height="100" alt="...">
        <h3 class="mt-2">Badan Penanggulangan Bencana Daerah Kota Kupang</h3>
    </div><br>
        <h2 class="text-center">Data Kejadian dan Dampak Bencana</h2>

        <div class="my-5 col-md-8">
            <form action="" method="post" enctype="multipart/form-data">
            <h5>1. Data Kejadian Bencana</h5>
                <div>
                    <label for="jenis" class="fw-semibold">Jenis Bencana    : </label>    
                    <?php echo $data['jenis_id'];?>
                </div>    
                <div>
                    <label for="nama" class="fw-semibold">Nama Kejadian  : </label>
                    <?php echo $data['nama'];?>
                </div>
                <div>
                    <label for="tanggal" class="fw-semibold">Tarikh :</label>
                    <?php echo $data['tanggal'];?>
                </div>
                <div>
                    <label for="waktu" class="fw-semibold">Waktu Kejadian   :</label>
                    <?php echo $data['waktu'];?>
                </div>
                <div>
                    <label for="lokasi" class="fw-semibold">Lokasi</label><br>
                    a. Provinsi         : Nusa Tenggara Timur<br>
                    b. Kabupaten/Kota   : Kota Kupang <br>
                    c. Kecamatan        : <?php echo $data['kecamatan'];?><br>
                    d. Kelurahan        : <?php echo $data['kelurahan'];?><br>
                    <label for="geografis" class="fw-semibold">Letak Geografis:</label>
                    <?php echo $data['geografis'];?>
                </div>
                <div>
                    <label for="sebab" class="fw-semibold">Penyebab Bencana:</label>
                    <?php echo $data['sebab'];?>
                </div>
                <div>
                    <label for="kronologis" class="fw-semibold">Kronologis Bencana:</label>
                    <?php echo $data['kronologis'];?>
                </div>
                <div>
                    <label for="deskripsi" class="fw-semibold">Deskripsi Kejadian</label>
                    <?php echo $data['deskripsi'];?>
                </div>
                <div>
                    <label for="sumber" class="fw-semibold">Sumber</label>
                    <?php echo $data['sumber'];?>
                </div>
                <div>
                    <label for="kondisi" class="fw-semibold">Kondisi mutakhir: </label>
                    <?php echo $data['kondisi'];?>
                </div>
                <div>
                    <label for="status_darurat" class="fw-semibold">Status Darurat: </label>
                    <?php echo $data['status_darurat'];?>
                </div>
                <div>
                    <label for="upaya" class="fw-semibold">Upaya: </label>
                    <?php echo $data['upaya'];?>
                </div>
                <div>
                    <label for="sebaran" class="fw-semibold">Sebaran Dampak: </label>
                    <?php echo $data['sebaran'];?>
                </div>
                <div>
                    <label for="CurrentFoto" class="fw-semibold">Foto/dokumentasi lapangan:</label>
                    <img src="image/<?php echo $data['foto']?>" class="form-control" alt="" width="300px"> 
                </div>
                <div>
                    <label for="kib" class="fw-semibold">15. Kode Identitas Bencana: </label>
                    <?php echo $data['kib'];?>
                </div>

            <div>
                <h5 class="mt-5">2. Data Kebutuhan</h5>
            </div>
                <div>
                    <label for="dana" class="mt-1 fw-semibold">Dana:</label>
                    <?php echo $data['dana'];?>
                </div>
                <div>
                    <label for="sdm" class="fw-semibold">Sumber Daya Manusia:</label>
                    <?php echo $data['sdm'];?>
                </div>
                <div>
                    <label for="sarpras" class="fw-semibold">Sarana Prasarana:</label>
                    <?php echo $data['sarpras'];?>
                </div>
                <div>
                    <label for="logistik" class="fw-semibold">Logistik:</label>
                    <?php echo $data['logistik'];?>
                </div>
                <div>
                    <label for="alat" class="fw-semibold">Peralatan:</label>
                    <?php echo $data['alat'];?>
                </div>
                <div>
                    <h5 class="mt-5">3. Data Akibat Terhadap Manusia</h5>
                </div>
                <div class="table-responsive mt-3">
                <table class="table table-bordered text-center width:50%;">
                    <thead>
                        <tr>
                            <th rowspan="2">Korban </th>
                            <th colspan="2">Anak-anak</th>
                            <th colspan="2">Dewasa</th>
                            <th colspan="2">Lansia</th>
                            <th colspan="2">Total</th>
                        </tr>
                        <tr>
                            <td>L</td>
                            <td>P</td>
                            <td>L</td>
                            <td>P</td>
                            <td>L</td>
                            <td>P</td>
                            <td>L</td>
                            <td>P</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold">Meninggal</td>
                            <td><?php echo $data['aml'];?></td>
                            <td><?php echo $data['amp'];?></td>
                            <td><?php echo $data['dwsml'];?></td>
                            <td><?php echo $data['dwsmp'];?></td>
                            <td><?php echo $data['lnml'];?></td>
                            <td><?php echo $data['lnmp'];?></td>
                            <td><?php echo $data['tml'];?></td>
                            <td><?php echo $data['tmp'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Hilang</td>
                            <td><?php echo $data['ahl'];?></td>
                            <td><?php echo $data['ahp'];?></td>
                            <td><?php echo $data['dwshl'];?></td>
                            <td><?php echo $data['dwshp'];?></td>
                            <td><?php echo $data['lnhl'];?></td>
                            <td><?php echo $data['lnhp'];?></td>
                            <td><?php echo $data['thl'];?></td>
                            <td><?php echo $data['thp'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Luka/sakit</td>
                            <td><?php echo $data['alkl'];?></td>
                            <td><?php echo $data['alkp'];?></td>
                            <td><?php echo $data['dwsll'];?></td>
                            <td><?php echo $data['dwslp'];?></td>
                            <td><?php echo $data['lnll'];?></td>
                            <td><?php echo $data['lnlp'];?></td>
                            <td><?php echo $data['tll'];?></td>
                            <td><?php echo $data['tlp'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Terdampak</td>
                            <td><?php echo $data['atl'];?></td>
                            <td><?php echo $data['atp'];?></td>
                            <td><?php echo $data['dwstl'];?></td>
                            <td><?php echo $data['dwstp'];?></td>
                            <td><?php echo $data['lntl'];?></td>
                            <td><?php echo $data['lntp'];?></td>
                            <td><?php echo $data['ttl'];?></td>
                            <td><?php echo $data['ttp'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Mengungsi</td>
                            <td><?php echo $data['aul'];?></td>
                            <td><?php echo $data['aup'];?></td>
                            <td><?php echo $data['dwsul'];?></td>
                            <td><?php echo $data['dwsup'];?></td>
                            <td><?php echo $data['lnul'];?></td>
                            <td><?php echo $data['lnup'];?></td>
                            <td><?php echo $data['tul'];?></td>
                            <td><?php echo $data['tup'];?></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div>
                <h5 class="mt-5">4. Data Kerusakan dan Kerugian Sosial Ekonomi </h5>
                </div>
                <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kerusakan</th>
                            <th>Ha</th>
                            <th>Taksiran Kerugian (Juta)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold">Sawah</td>
                            <td><?php echo $data['sawah'];?></td>
                            <td><?php echo $data['txsawah'];?></td>
                            
                        </tr>
                        <tr>
                            <td class="fw-semibold">Lahan</td>
                            <td><?php echo $data['lahan'];?></td>
                            <td><?php echo $data['txlahan'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Kebun</td>
                            <td><?php echo $data['kebun'];?></td>
                            <td><?php echo $data['txkebun'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Hutan</td>
                            <td><?php echo $data['hutan'];?></td>
                            <td><?php echo $data['txhutan'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Kolam</td>
                            <td><?php echo $data['kolam'];?></td>
                            <td><?php echo $data['txkolam'];?></td>
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
                            <th>Taksiran Kerugian (Juta)</th>
                        </tr>
                    </thead>
                        <tr>
                            <td class="fw-semibold">Kios/Toko</td>
                            <td><?php echo $data['kb'];?></td>
                            <td><?php echo $data['ks'];?></td>
                            <td><?php echo $data['kr'];?></td>
                            <td><?php echo $data['ktrd'];?></td>
                            <td><?php echo $data['txkios'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Pabrik</td>
                            <td><?php echo $data['pb'];?></td>
                            <td><?php echo $data['ps'];?></td>
                            <td><?php echo $data['pr'];?></td>
                            <td><?php echo $data['ptrd'];?></td>
                            <td><?php echo $data['txpabrik'];?></td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div>
                    <h5 class="mt-5">5. Data kerusakan dan kerugian prasarana dan sarana vital </h5>
                </div>
                <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kerusakan</th>
                            <th>Taksiran Kerugian (Juta)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-semibold">Jaringan Air Bersih/Minum</td>
                            <td><?php echo $data['txair'];?></td>
                            
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan lampu dan lampu penerangan</td>
                            <td><?php echo $data['txlampu'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan telekomunikasi</td>
                            <td><?php echo $data['txkom'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan irigasi</td>
                            <td><?php echo $data['txiri'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jalan (Km)</td>
                            <td><?php echo $data['txjln'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">jaringan Transportasi</td>
                            <td><?php echo $data['txtrans'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Jaringan Pengisian Bahan Bakar Umum</td>
                            <td><?php echo $data['txbbm'];?></td>
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
                            <th>Taksiran Kerugian (Juta)</th>
                        </tr>
                    </thead>
                        <tr>
                            <td class="fw-semibold">Jembatan</td>
                            <td><?php echo $data['jb'];?></td>
                            <td><?php echo $data['js'];?></td>
                            <td><?php echo $data['jr'];?></td>
                            <td><?php echo $data['jtrd'];?></td>
                            <td><?php echo $data['txjembatan'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <div>
                    <h5 class="mt-5">6. Data kerusakan dan kerugian rumah </h5>
                </div>
                <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Kerusakan</th>
                            <th>RB</th>
                            <th>RS</th>
                            <th>RR</th>
                            <th>Terendam</th>
                            <th>Taksiran Kerugian (Juta)</th>
                        </tr>
                    </thead>
                        <tr>
                            <td class="fw-semibold">Kerusakan dan kerugian rumah</td>
                            <td><?php echo $data['rmhb'];?></td>
                            <td><?php echo $data['rmhs'];?></td>
                            <td><?php echo $data['rmhr'];?></td>
                            <td><?php echo $data['rmhtrd'];?></td>
                            <td><?php echo $data['txrmh'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
                <div>
                    <h5 class="mt-5">7. Data kerusakan dan kerugian pelayanan dasar </h5>
                </div>
                <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>Kerusakan</th>
                            <th>RB (meter)</th>
                            <th>RS (meter)</th>
                            <th>RR (meter)</th>
                            <th>Terendam (meter)</th>
                            <th>Taksiran Kerugian (Juta)</th>
                        </tr>
                    </thead>
                        <tr>
                            <td class="fw-semibold">Satuan Pendidikan</td>
                            <td><?php echo $data['skob'];?></td>
                            <td><?php echo $data['skos'];?></td>
                            <td><?php echo $data['skor'];?></td>
                            <td><?php echo $data['skotrd'];?></td>
                            <td><?php echo $data['txsko'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Rumah Ibadat</td>
                            <td><?php echo $data['tmp'];?></td>
                            <td><?php echo $data['tmp'];?></td>
                            <td><?php echo $data['tmp'];?></td>
                            <td><?php echo $data['tmp'];?></td>
                            <td><?php echo $data['tmp'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Fasilitas Pelayanan Kesehatan</td>
                            <td><?php echo $data['faskesb'];?></td>
                            <td><?php echo $data['faskess'];?></td>
                            <td><?php echo $data['faskesr'];?></td>
                            <td><?php echo $data['faskestrd'];?></td>
                            <td><?php echo $data['txfaskes'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Kantor</td>
                            <td><?php echo $data['ktrb'];?></td>
                            <td><?php echo $data['ktrs'];?></td>
                            <td><?php echo $data['ktrr'];?></td>
                            <td><?php echo $data['ktrtrd'];?></td>
                            <td><?php echo $data['txktr'];?></td>
                        </tr>
                        <tr>
                            <td class="fw-semibold">Pasar</td>
                            <td><?php echo $data['psrb'];?></td>
                            <td><?php echo $data['psrs'];?></td>
                            <td><?php echo $data['psrr'];?></td>
                            <td><?php echo $data['psrtrd'];?></td>
                            <td><?php echo $data['txpsr'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                    <h5 class="mt-5">8. Data Aset dan layanan penanganan kedaruratan</h5>
                    <div>
                    <label for="layanan" class="fw-semibold">Barang yang digunakan untuk melayani penanganan darurat bencana:</label>
                    <?php echo $data['layanan'];?>
                    </div>
            </div>

                <div>
                    <button type="submit" name="kembali" class="btn btn-primary mt-3">Kembali</button>   
                    <button type="submit" name="print" class="btn btn-primary mt-3" onclick="printDiv('printableArea')"> Print</button>
                     <script>function printDiv(divName) {window.print();} </script>       
                </div>
            </form>
            <?php
                  if(isset ($_POST['kembali'])){
            ?>
                <meta http-equiv="refresh" content="0; url=stakeholder.php" />
            <?php
                    }
            ?>
        </div>
    </div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
   // window.print();
</script>
</body>
</html>