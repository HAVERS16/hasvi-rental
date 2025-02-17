<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
        </div>
        <br>
        <br>

        <!-- Tabel Data Mobil -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Mobil</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                    include 'koneksi.php';

                    $query = "SELECT * FROM mobil";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="table table-bordered table-striped table-hover" id="dataTable">';
                        echo '<thead class="thead-dark">';
                        echo '<tr>';
                        echo '<th>No</th>';
                        echo '<th>Gambar</th>';
                        echo '<th>Merek</th>';
                        echo '<th>Nomor Plat</th>';
                        echo '<th>Harga</th>';
                        echo '<th>Denda</th>';
                        echo '<th>Status</th>';
                        echo '<th style="width: 200px;">Aksi</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $no++ . '</td>';
                            echo '<td><img src="uploads/' . $row['gambar'] . '" alt="Gambar Mobil" width="100"></td>';
                            echo '<td>' . $row['merek'] . '</td>';
                            echo '<td>' . $row['no_plat'] . '</td>';
                            echo '<td>' . $row['harga'] . '</td>';
                            echo '<td>' . $row['denda'] . '</td>';
                            echo '<td>' . $row['status'] . '</td>';
                            echo '<td>
                                    <a href="pesanmobil.php?id_mobil=' . $row["id_mobil"] . '" class="btn btn-sm btn-success">
                                        <i class="fas fa-car"></i> Pesan
                                    </a>
                                </td>';
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo '<p class="text-center text-gray-500">Tidak ada data ditemukan.</p>';
                    }

                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
        <a href="menucustomer.php" class="btn btn-primary">
            <i class="fas fa-plus2"></i> <-- Kembali
                </a>
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