</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- Optional for carousel styling -->
    <style>
        .carousel-item {
            height: 300px;
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-item img {
            max-height: 100%;
            object-fit: cover;
        }

        .arrow-container {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
        }

        .arrow-container .fa-arrow-left,
        .arrow-container .fa-arrow-right {
            font-size: 2rem;
            color: white;
            cursor: pointer;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar (same as previous code) -->

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar (same as previous code) -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row for Car Gallery -->
                    <div class="row">
                        <!-- Carousel Container -->
                        <div class="col-12">
                            <div id="carCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <!-- First Carousel Item -->
                                    <div class="carousel-item active">
                                        <img src="path/to/car1.jpg" class="d-block w-100" alt="Car 1">
                                        <div class="arrow-container">
                                            <i class="fas fa-arrow-left" data-target="#carCarousel" data-slide="prev"></i>
                                            <i class="fas fa-arrow-right" data-target="#carCarousel" data-slide="next"></i>
                                        </div>
                                    </div>
                                    <!-- Second Carousel Item -->
                                    <div class="carousel-item">
                                        <img src="path/to/car2.jpg" class="d-block w-100" alt="Car 2">
                                        <div class="arrow-container">
                                            <i class="fas fa-arrow-left" data-target="#carCarousel" data-slide="prev"></i>
                                            <i class="fas fa-arrow-right" data-target="#carCarousel" data-slide="next"></i>
                                        </div>
                                    </div>
                                    <!-- Third Carousel Item -->
                                    <div class="carousel-item">
                                        <img src="path/to/car3.jpg" class="d-block w-100" alt="Car 3">
                                        <div class="arrow-container">
                                            <i class="fas fa-arrow-left" data-target="#carCarousel" data-slide="prev"></i>
                                            <i class="fas fa-arrow-right" data-target="#carCarousel" data-slide="next"></i>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

    </div>
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
