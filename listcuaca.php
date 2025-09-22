<?php
    require "session.php";
    require "koneksi.php";
    $querycuaca= mysqli_query($con, "SELECT * FROM cuaca");
    $jumlahcuaca = mysqli_num_rows($querycuaca);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prakiraan Cuaca</title>
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
                    <a href="dashboard.php">
                        <i class="fas fa-home"></i> Dashboard 
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Data Prakiraan Cuaca Kota Kupang
                </li>
            </ol>
        </nav>
        <div class="mt-3">
            <h2>List Data Prakiraan Cuaca Kota Kupang</h2>
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama </th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($jumlahcuaca==0){
                        ?>    
                            <tr>
                                <td>Tidak ada data prakiraan cuaca</td>
                            </tr>
                        <?php
                            }
                            else{
                                $jumlah = 1;
                                while($data=mysqli_fetch_array($querycuaca)){
                        ?>    
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td>
                                            <a href="cuaca-detail.php?p=<?php echo $data['id']; ?>"
                                            class="btn btn-info"><i class="fas fa-search"></i></a>
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