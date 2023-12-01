<?php
session_start();
require_once "inc/Koneksi.php";
require_once "app/Spp.php";

$user = new App\Spp();

if (isset($_POST['btn-login'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  if ($user->login($username, $password)) {
    header("Location: index.php?page=dashboard");
  } else {
    echo '
        <script>
            alert("Username / Password Salah");
        </script>
        ';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>E-Spp - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="src/css/sb-admin-2.min.css" rel="stylesheet" />

  <!-- Icon -->
  <link rel="icon" href="src/img/icon.ico" type="image/x-ico">

</head>

<body class="bg-gradient-primary">
  <!-- <div class="d-flex justify-content-center mt-3">
    <img src="src/img/logo.png" alt="" width="150" class="dt-center">
  </div> -->
  <h1 class="text-center text-white mt-3"><strong>E-SPP ~~ </strong>Aplikasi Pembayaran SPP</h1>
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8 col-md-4">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Form!</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username"
                        aria-describedby="emailHelp" placeholder="Enter Email Address..." autofocus />
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                        name="password" placeholder="Password" />
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary btn-user btn-block" name="btn-login">Login</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>

</html>