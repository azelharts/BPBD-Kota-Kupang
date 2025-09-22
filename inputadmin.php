<?php
    require "session.php";
    require "koneksi.php";
    $queryinput= mysqli_query($con, "SELECT * FROM stakeholder");
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
    <title>Input Admin Stakeholder</title>
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
                    Input Stakeholder
                </li>
            </ol>
        </nav>
        <div class="my-5 col-12 col-md-8">
            <form action="" method="post" class="mt-3" enctype="multipart/form-data">
                <div>
                    <label for="nama" class="fw-semibold">1. User Stakeholder</label>
                    <Input type="text" id="username" name="username" class="form-control" autocomplete="off" required>
                </div>
                <div>
                    <label for="pass" class="fw-semibold">2. Password Stakeholder</label>
                    <Input type="text" id="pass" name="pass" class="form-control" autocomplete="off" required>
                </div>
               
                <div>
                    <button type="submit" name="simpan" class="btn btn-success mt-3">Simpan</button>
                    <a href=dashboard.php button type="submit" name="kembali" class="btn btn-primary mt-3">Kembali</button></a>
                </div>
            </form>
            <?php
                if(isset($_POST['simpan'])){
                    $username= htmlspecialchars($_POST['username']);
                    $pass= htmlspecialchars($_POST['password']);
                    if($username=='')
                {
            ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Nama wajib diisi
                    </div>
            <?php
                }
                    }
                    $querytambah=mysqli_query ($con, "INSERT INTO stakeholder set
                     username= '$_POST[username]', 
                     password= '$_POST[pass]'");
                    if($querytambah){
             ?>
                    <div class="alert alert-primary mt-3" role="alert">
                        Admin Stakeholder berhasil dibuat
                    </div>
            <?php
                    }
                    else{
                        echo mysqli_error($con);
                    }
            ?>       
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>