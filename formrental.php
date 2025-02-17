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
    <title>Form Rental</title>
    <!-- Bootstrap CSS -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Rental</h1>
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Isi Format Berikut :</h5>
            </div>
            <div class="card-body">
                <form action="prosesrental.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Nama Anda:</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="merek">Merek Mobil</label>
                        <select id="merek" name="merek" onchange="updateMerek()" class="form-control" required>
                            <option value="" disabled selected>Pilih Merek</option>
                            <?php
                            include 'koneksi.php';
                            $result_merek = mysqli_query($conn, "SELECT merek, harga, denda FROM mobil");
                            if ($result_merek) {
                                while ($row = mysqli_fetch_assoc($result_merek)) {
                                    $merek = htmlspecialchars($row['merek'], ENT_QUOTES, 'UTF-8');
                                    $harga = htmlspecialchars($row['harga'], ENT_QUOTES, 'UTF-8');
                                    $denda = htmlspecialchars($row['denda'], ENT_QUOTES, 'UTF-8');
                                    echo "<option value='{$merek}' data-harga='{$harga}' data-denda='{$denda}'>{$merek}</option>";
                                }
                            } else {
                                die("Query Error: " . mysqli_error($conn));
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" readonly>
                    </div>

                    <div class="form-group">
                        <label for="denda">Denda (jika telat)</label>
                        <input type="text" class="form-control" id="denda" name="denda" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tgl_rental">Tanggal Rental</label>
                        <input type="date" class="form-control" id="tgl_rental" name="tgl_rental" onchange="calculateTotal()" required>
                    </div>

                    <div class="form-group">
                        <label for="tgl_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" onchange="calculateTotal()" required>
                    </div>

                    <div class="form-group">
                        <label for="total">Total Harga</label>
                        <input type="text" class="form-control" id="total" name="total" readonly>
                    </div>

                    <div class="form-group">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                            <option value="Cash">Cash</option>
                            <option value="Transfer Bank">Transfer Bank</option>
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

    <script>
        function updateMerek() {
            const merekDropdown = document.getElementById('merek');
            const selectedOption = merekDropdown.options[merekDropdown.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            const denda = selectedOption.getAttribute('data-denda');

            document.getElementById('harga').value = harga || '';
            document.getElementById('denda').value = denda || '';
        }
    </script>

<script>
    function calculateTotal() {
        const tglRental = document.getElementById('tgl_rental').value;
        const tglPengembalian = document.getElementById('tgl_pengembalian').value;
        const harga = document.getElementById('harga').value;

        // Pastikan tanggal dan harga terisi
        if (tglRental && tglPengembalian && harga) {
            const rentalDate = new Date(tglRental);
            const returnDate = new Date(tglPengembalian);

            // Hitung selisih hari
            const timeDiff = returnDate - rentalDate;
            const dayDiff = Math.ceil(timeDiff / (1000 * 60 * 60 * 24)); // Konversi ms ke hari

            // Validasi jika tanggal rental lebih besar dari tanggal pengembalian
            if (dayDiff < 0) {
                alert("Tanggal pengembalian harus setelah tanggal rental.");
                document.getElementById('total').value = '';
                return;
            }

            // Hitung total harga
            const totalPrice = dayDiff * parseFloat(harga);

            // Tampilkan total harga
            document.getElementById('total').value = totalPrice.toFixed();
        }
    }
</script>
</body>

</html>