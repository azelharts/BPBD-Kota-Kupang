<?php
    session_start();
    require "koneksi.php";

    $prakiraan= mysqli_query($con, "SELECT * FROM cuaca");
    $tampil = mysqli_fetch_array($prakiraan);
    $result= mysqli_query($con, "SELECT * FROM galeri");

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
    <title>BPBD</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    .main{
        height: 100vh;
    }

    .login-box{
        width: 500px;
        height: 350px;
        box-sizing: border-box;
        border-radius: 10px;
    }

</style>

<body>

<div class="container-fluid banner2">
        <div class="container-fluid">
        <div class="text-center">
        <img src="image/bpbd.png" class="rounded mt-3" width="175pc" alt="...">
        </div><br>
        <h1 class="text-center fw-bold text-light">HAI ADMIN SINCAN</h1>

        <div class="main d-flex flex-column justify-content-center align-items-center">
            <div class="login-box p-5 shadow text-light">
                <p>silahkan masukkan username & password!</p>
                <form action=""method="post" >
                    <div>
                        <label for="username" class="text-light">Username</label>
                        <input type="text" class="form-control" name="username"
                        id="username">
                    </div>
                    <div>
                        <label for="password" class="text-light">Password</label>
                        <input type="password" class="form-control" name="password"
                        id="password">
                    </div>
                    <div>
                        <button class="btn btn-warning  form-control mt-3 fw-bold" type="submit"
                        name="loginbtn">Login</button>
                    </div>
                    <div><a href="index.php" button class="btn btn-warning form-control mt-3 fw-bold" type="submit"
                        name="loginbtn">Kembali</button></a>
                    </div>
                </form>
            </div>
        </div>
            <div class="mt-3" style="width: 500px">
                <?php
                    if(isset($_POST['loginbtn'])){
                        $username = htmlspecialchars($_POST['username']);
                        $password = htmlspecialchars($_POST['password']);

                        $query = mysqli_query ($con, "SELECT * FROM users WHERE 
                        username='$username'");
                        $countdata = mysqli_num_rows ($query);
                        $data = mysqli_fetch_array($query);

                        if($countdata>0){
                            if (password_verify($password, $data['password'])) {
                                $_SESSION['username'] = $data['username'];
                                $_SESSION['login'] = true;
                                header('location:dashboard.php');
                            }
                            else{
                                ?>
                                <div class="alert alert-warning" role="alert">
                                    password salah
                                </div>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <div class="alert alert-warning" role="alert">
                                Akun tidak tersedia
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
                <p class="fw-bold text-center text-light mt-5">Badan Penanggulangan Bencana Daerah Kota Kupang</p>
                <p class="fas fa-telephone text-center text-light">Call Center 081239940976</p>
                <p class="text-center fst-italic mt-2 text-light">Ver 1.0 ~ copyright bpbdkotakupang@2024</p>
        </div>
    </div>
</div>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>