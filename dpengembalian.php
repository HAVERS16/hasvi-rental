<?php
// Periksa apakah sesi sudah dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil username dari sesi
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengembalian</title>
    <!-- Bootstrap CSS -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Pengembalian</h1>
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Isi Keterangan</h5>
            </div>
            <div class="card-body">
                <form action="prosespengembalian.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Nama Anda:</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" required>
                    </div>
                    <div class="form-group">
                        <label for="denda">Denda</label>
                        <input type="text" class="form-control" id="denda" name="denda" placeholder="Jika tidak ada isi(-)" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Selesai">Selesai</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>