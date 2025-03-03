<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<style>
    /* Purple gradient background for the navbar-nav, sidebar, and accordion */
.navbar-nav, 
.sidebar, 
.accordion {
  background-color:rgb(255, 255, 255); /* Purple color */
}

/* If you want to apply a gradient effect */
.sidebar, 
.accordion {
  background: linear-gradient(to right,rgb(0, 0, 0),rgb(0, 0, 0)); /* Purple gradient */
}

.sidebar-dark .nav-link {
  color: white; /* Text color in sidebar */
}

.navbar-nav .nav-link {
  color: white; /* Text color in navbar */
}

.accordion-button {
  color: white; /* Text color of accordion buttons */
}

.accordion-button:not(.collapsed) {
  background-color: #6f42c1; /* Active state for accordion */
  color: white;
}

</style>
    <title>Rental Mobil hasvi</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">RENTAL MOBIL hasvi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="menu.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Nav Item - Data Mobil -->
            <li class="nav-item">
                <a class="nav-link" href="datamobil.php">
                    <i class="fas fa-fw fa-car"></i>
                    <span>Data Mobil</span>
                </a>
            </li>

            <!-- Nav Item - Data Customer -->
            <li class="nav-item">
                <a class="nav-link" href="datacustomer.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Customer</span>
                </a>
            </li>

            <!-- Nav Item - Rental -->
            <li class="nav-item">
                <a class="nav-link" href="datarental.php">
                    <i class="fas fa-fw fa-calendar "></i>
                    <span>Data Transaksi Rental</span>
                </a>
            </li>

            <!-- Nav Item - Pengembalian -->
            <li class="nav-item">
                <a class="nav-link" href="datapengembalian.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pengembalian</span>
                </a>
            </li>

            <!-- Divider -->
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Logout Button -->
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                <i class="fas fa-sign-out-alt fa-fw"></i>
                                <span style="font-weight: bold; color: black;">Logout</span>
                            </a>
                        </li>
                    </ul>

                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <!-- Content Here -->
                        </div>
                    </div>
                </div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
