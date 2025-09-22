<?php
    require "session.php";
    require "koneksi.php";
    $queryinput= mysqli_query($con, "SELECT * FROM cuaca");
    $jumlahinput = mysqli_num_rows($queryinput);
   
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
    <title>Update Prakiraan Cuaca</title>
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
                    Input Prakiraan Cuaca
                </li>
            </ol>
        </nav>
        <div class="my-5 col-12 col-md-8">
            <form action="" method="post" class="mt-3" enctype="multipart/form-data">
                <div>
                    <label for="nama" class="fw-semibold">1. Nama prakiraan</label>
                    <Input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="foto" class="fw-semibold">2. Foto Prakiraan</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                </div>
                <div>
                    <button type="submit" name="simpan" class="btn btn-success mt-3">Simpan</button>
                    <a href=listcuaca.php button type="submit" name="kembali" class="btn btn-primary mt-3">Kembali</button></a>
                </div>

            </form>
            <?php
                if(isset($_POST['simpan'])){
                    $nama= htmlspecialchars($_POST['nama']);
                    $target_dir = "image/";
                    $nama_file = basename($_FILES["foto"]["name"]);
                    $target_file = $target_dir . $nama_file;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $image_size = $_FILES["foto"]["size"];
                    $random_name = generateRandomString (20);
                    $new_name = $random_name . "." . $imageFileType;
                 
                    if($nama=='')
                    {
                    ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Nama wajib diisi
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
                    $querytambah=mysqli_query ($con, "UPDATE cuaca set 
                    nama='$_POST[nama]', 
                    foto='$new_name'");
                    if($querytambah){
             ?>
                <div class="alert alert-primary mt-3" role="alert">
                    Data Prakiraan Cuaca Berhasil Diperbaharui
                </div>
                <meta http-equiv="refresh" content="2; url=inputcuaca.php" />
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