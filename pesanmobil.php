<?php
include 'koneksi.php';

// Ambil data berdasarkan ID mobil yang dikirim melalui URL
$id_mobil = isset($_GET['id_mobil']) ? $_GET['id_mobil'] : null;
if ($id_mobil) {
    $query = "SELECT * FROM mobil WHERE id_mobil = '$id_mobil'";
    $result = mysqli_query($conn, $query);
    $mobil = mysqli_fetch_assoc($result);
}

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
    <title>Pesan Mobil</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="h3 mb-4 text-gray-800">Form Pesan Mobil</h1>

        <form action="prosesrental.php" method="POST">
            <input type="hidden" name="id_mobil" value="<?= $mobil['id_mobil']; ?>">

            <div class="form-group">
                        <label for="username">Nama Anda:</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>" readonly>
                    </div>

            <!-- Detail Mobil -->
            <div class="form-group">
                <label for="merek">Merek Mobil</label>
                <input type="text" class="form-control" id="merek" value="<?= $mobil['merek']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="harga">Harga Per Hari</label>
                <input type="text" class="form-control" id="harga" value="<?= $mobil['harga']; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="denda">Denda Per Hari</label>
                <input type="text" class="form-control" id="denda" value="<?= $mobil['denda']; ?>" readonly>
            </div>

            <!-- Input Tanggal Rental -->
            <div class="form-group">
                <label for="tgl_rental">Tanggal Rental</label>
                <input type="date" class="form-control" id="tgl_rental" name="tgl_rental" required>
            </div>

            <!-- Input Tanggal Pengembalian -->
            <div class="form-group">
                <label for="tgl_pengembalian">Tanggal Pengembalian</label>
                <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" required>
            </div>

            <!-- Total Harga -->
            <div class="form-group">
                <label for="total">Total Harga</label>
                <input type="text" class="form-control" id="total" name="total" readonly>
            </div>

            <!-- Metode Pembayaran -->
            <div class="form-group">
                <label for="metode_pembayaran">Metode Pembayaran</label>
                <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                    <option value="Cash">Cash</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Pesan</button>
            <a href="dmobil.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script>
        // Script untuk menghitung total harga secara otomatis
        document.getElementById('tgl_pengembalian').addEventListener('change', function () {
            const tanggalRental = new Date(document.getElementById('tgl_rental').value);
            const tanggalPengembalian = new Date(this.value);
            const hargaPerHari = <?= $mobil['harga']; ?>;

            if (tanggalRental && tanggalPengembalian && tanggalRental <= tanggalPengembalian) {
                const selisihHari = (tanggalPengembalian - tanggalRental) / (1000 * 60 * 60 * 24) + 1;
                document.getElementById('total').value = selisihHari * hargaPerHari;
            } else {
                document.getElementById('total').value = '0';
            }
        });
    </script>
</body>

</html>
