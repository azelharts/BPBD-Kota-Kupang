<?php
    require "session.php";
    require "koneksi.php";
    $queryKejadian= mysqli_query($con, "SELECT * FROM kejadian");
    $jumlahKejadian = mysqli_num_rows($queryKejadian);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kejadian dan Dampak Bencana</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
</head>
<style>
    .no-decoration{
        text-decoration: none;
    }    
</style>
<body>
    <?php require "navigation2.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="stakeholder.php">
                        <i class="fas fa-home"></i> Dashboard 
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Data Kejadian dan Dampak bencana
                </li>
            </ol>
        </nav>
        <div class="mt-3">
            <h2>List Data Kejadian dan Dampak Bencana</h2>
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama </th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Provinsi</th>
                            <th>Sebab</th>
                            <th>Kronologis</th>
                            <th>Deskripsi</th>
                            <th>Sumber</th>
                            <th>Kondisi</th>
                            <th>Status Darurat</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($jumlahKejadian==0){
                        ?>    
                            <tr>
                                <td>Tidak ada data kejadian</td>
                            </tr>
                        <?php
                            }
                            else{
                                $jumlah = 1;
                                while($data=mysqli_fetch_array($queryKejadian)){
                        ?>    
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['jenis_id']; ?></td>
                                    <td><?php echo $data['tanggal']; ?></td>
                                    <td><?php echo $data['waktu']; ?></td>
                                    <td><?php echo $data['provinsi']; ?></td>
                                    <td><?php echo $data['sebab']; ?></td>
                                    <td><?php echo $data['kronologis']; ?></td>
                                    <td><?php echo $data['deskripsi']; ?></td>
                                    <td><?php echo $data['sumber']; ?></td>
                                    <td><?php echo $data['kondisi']; ?></td>
                                    <td><?php echo $data['status_darurat']; ?></td>
            
                                    <td>
                                            <a href="preview2.php?p=<?php echo $data['id']; ?>"
                                            class="btn btn-info"><i class="fas fa-print"></i></a>
                                    </td>
                                </tr>
                        <?php    
                            }
                            $jumlah++;
                        }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

</body>
</html>