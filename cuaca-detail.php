<?php 
    require "session.php";
    require "koneksi.php";

    $id = $_GET['p'];

    $query= mysqli_query($con, "SELECT * FROM cuaca WHERE id='$id'");
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
        <h2> Data Prakiraan Cuaca Kota Kupang</h2>

        <div class="col-12 col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama">Nama Prakiraan</label>
                    <Input type="text" id="nama" name="nama" value="<?php echo $data['nama'];?>"class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="CurrentFoto">Foto Sekarang</label>
                    <img src="image/<?php echo $data['foto']?>" alt="" width="300px"> 
                </div>
                <div>
                    <label for="foto">Ganti Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                </div>
 
                <div>
                    <button type="submit" name="simpan" class="btn btn-success mt-3">Simpan</button>
                    <button type="submit" name="kembali" class="btn btn-primary mt-3">Kembali</button>
                                   
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
                    
                    if($nama==''){
            ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Nama wajib diisi
                        </div>
            <?php
                }
                else{
                    $queryUpdate = mysqli_query ($con, "UPDATE cuaca SET 
                    nama='$nama' WHERE id=$id");

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
                            $queryUpdate = mysqli_query($con, "UPDATE cuaca SET foto='$new_name' WHERE id='$id'");
                            
                            if($queryUpdate){
            ?>
                                <div class="alert alert-primary mt-3" role="alert">
                                    Kejadian berhasil diupdate
                                </div>

                                <meta http-equiv="refresh" content="2; url=listcuaca.php" />
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
                if(isset ($_POST['kembali'])){
            ?>
                <meta http-equiv="refresh" content="0; url=listcuaca.php" />
            <?php
                    }
        ?>
        </div>
    </div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>