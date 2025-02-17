<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer</title>
    <!-- Bootstrap CSS -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Customer</h1>
        </div>
        <a href="formcustomer.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Customer
        </a>
        <br>
        <br>

        <!-- Tabel Data Customer -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Customer</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                    include 'koneksi.php';

                    $query = "SELECT * FROM customer";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo '<table class="table table-bordered table-striped table-hover" id="dataTable">';
                        echo '<thead class="thead-dark">';
                        echo '<tr>';
                        echo '<th>No</th>';
                        echo '<th>Nama</th>';
                        echo '<th>Alamat</th>';
                        echo '<th>Nomor Handphone</th>';
                        echo '<th>Nomor KTP</th>';
                        echo '<th style="width: 200px;">Aksi</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $no++ . '</td>';
                            echo '<td>' . $row['username'] . '</td>';
                            echo '<td>' . $row['alamat'] . '</td>';
                            echo '<td>' . $row['no_hp'] . '</td>';
                            echo '<td>' . $row['no_ktp'] . '</td>';
                            echo '<td>
                                    <a href="updatecustomer.php?id_customer=' . $row["id_customer"] . '" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="hapuscustomer.php?id_customer=' . $row["id_customer"] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\');"><i class="fas fa-trash"></i> Hapus</a>
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
        <a href="menu.php" class="btn btn-primary">
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