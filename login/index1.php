<?php
session_start();
include '../config/koneksi.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username' AND password = '$password'");

    $queryPegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE username = '$username' AND password = '$password'");

    $loginData = mysqli_fetch_assoc($query);
    $dataPegawai = mysqli_fetch_assoc($queryPegawai);
    $loginCheck = mysqli_num_rows($query);

    if ($loginCheck > 0) {
        $_SESSION['login'] = $loginData;
        echo "<script>alert('Anda berhasil login')</script>";
        header("location:../index1.php?pesan=input");
    } else {
        if ($dataPegawai) {
            $_SESSION['login'] = $dataPegawai;
            echo "<script>alert('Anda berhasil login')</script>";
            header("location:../index1.php?pesan=input");
        } else {
            echo "<script>alert('Username atau Password anda salah')</script>";
            header("location:../index1.php?pesan=input");
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>IT Helpdesk</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="control/login.php" method="post">
                
                    <span class="login100-form-title">
                        IT Helpdesk
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Valid username is required">
                        <input class="input100" type="text" name="username" id="username" placeholder="username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" id="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <input class="login100-form-btn" type="submit" value="Login">
                    </div>

                    <div class="text-center p-t-12">
                        
                    </div>

                    <div class="text-center p-t-136">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>