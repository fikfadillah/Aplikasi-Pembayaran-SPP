<?php
require_once "inc/Koneksi.php";
require_once "app/Spp.php";
session_start();
ob_start();

if (empty($_SESSION["user"]) || !isset($_SESSION["user"])) {
    header("Location: login.php");
}

// Laporan ERROR
error_reporting(E_ALL);

// Deklarasi Objek Spp
$data = new App\Spp();

// Autoload
require_once __DIR__ . '../vendor/autoload.php';

// Whoops
// $whoops = new \Whoops\Run;
// $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
// $whoops->register();


$username = $_SESSION["user"]["nama_lengkap"];
$role     = $_SESSION["user"]["role"];


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Spp - Aplikasi Pembayaran SPP</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="src/datatables/datatables.min.css">
    <link href="src/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="src/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet">

    <!-- Icon -->
    <link rel="icon" href="src/img/icon.ico" type="image/x-ico">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="src/img/logo.png" alt="" width="50">
                </div>
                <div class="sidebar-brand-text mx-3">E-Spp</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php
            if ($role == "Admin") {
                ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Admin Access
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=data-petugas">
                        <i class="fa-solid fa-database"></i>
                        <span>Data Petugas</span></a>
                </li>
                </li>

                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Master
                </div>

                <!-- Nav Item - Data Siswa -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=data-siswa">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Data Siswa</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=data-kelas">
                        <i class="fa-solid fa-chalkboard-user"></i>
                        <span>Data Kelas</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=data-spp">
                        <i class="fa-solid fa-book-open"></i>
                        <span>Data SPP</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <div class="sidebar-heading">
                    Menu Master
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=pembayaran-spp">
                        <i class="fa-solid fa-money-check"></i>
                        <span>Pembayaran SPP</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=laporan-pembayaran">
                        <i class="fa-solid fa-clipboard"></i>
                        <span>Laporan Pembayaran</span></a>
                </li>
            <?php } else if ($role == "Petugas") { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?page=dashboard">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Data Master
                    </div>

                    <!-- Nav Item - Data Siswa -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=data-siswa">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <span>Data Siswa</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=data-kelas">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <span>Data Kelas</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=data-spp">
                            <i class="fa-solid fa-book-open"></i>
                            <span>Data SPP</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="sidebar-heading">
                        Menu Master
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=pembayaran-spp">
                            <i class="fa-solid fa-money-check"></i>
                            <span>Pembayaran SPP</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=laporan-pembayaran">
                            <i class="fa-solid fa-clipboard"></i>
                            <span>Laporan Pembayaran</span></a>
                    </li>
            <?php } else { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?page=dashboard">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>
                    <hr class="sidebar-divider d-none d-md-block">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=laporan-pembayaran">
                            <i class="fa-solid fa-clipboard"></i>
                            <span>Laporan Pembayaran</span></a>
                    </li>
            <?php } ?>

            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?= $username; ?>
                                </span>
                                <img class="img-profile rounded-circle" src="src/img/undraw_profile.svg">

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if (isset($_GET["page"])) {
                        require $_GET["page"] . ".php";
                    } else {

                    }
                    ?>
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="src/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="src/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="src/js/demo/chart-area-demo.js"></script>
        <script src="src/js/demo/chart-pie-demo.js"></script>
        <script src="src/datatables/datatables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

        <script>
            new DataTable('#table', {
                info: false,
                ordering: true,
                paging: true
            });

            $(document).ready(function () {
                $('#table-laporan').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
        </script>
</body>

</html>