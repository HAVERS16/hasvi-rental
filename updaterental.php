<?php
// Koneksi ke database
include 'koneksi.php';

// Periksa apakah ada ID rental yang diberikan
if (isset($_GET['id_rental'])) {
    $id_rental = $_GET['id_rental'];

    // Ambil data rental berdasarkan ID
    $query = "SELECT * FROM rental WHERE id_rental = '$id_rental'";
    $result = mysqli_query($conn, $query);

    // Jika data ditemukan
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Data rental tidak ditemukan.";
        exit;
    }
} else {
    echo "ID rental tidak ditemukan.";
    exit;
}

// Proses form submit (update data)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_rental = $_POST['id_rental'];
    $username = $_POST['username'];
    $merek = $_POST['merek'];
    $harga = $_POST['harga'];
    $denda = $_POST['denda'];
    $tgl_rental = $_POST['tgl_rental'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $total = $_POST['total'];
    $metode_pembayaran = $_POST['metode_pembayaran'];

    // Update data rental ke database
    $update_query = "UPDATE rental SET 
                        username = '$username', 
                        merek = '$merek', 
                        harga = '$harga', 
                        denda = '$denda', 
                        tgl_rental = '$tgl_rental', 
                        tgl_pengembalian = '$tgl_pengembalian', 
                        total = '$total', 
                        metode_pembayaran = '$metode_pembayaran' 
                    WHERE id_rental = '$id_rental'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>
        alert('Data rental berhasil diperbaharui.');
        window.location.href = 'datarental.php';
    </script>";
    } else {
        echo "Gagal memperbarui data rental: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Rental</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Data Rental</h1>
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Edit Data Rental</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- Hidden input untuk ID rental -->
                    <input type="hidden" name="id_rental" value="<?php echo $row['id_rental']; ?>">

                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="merek">Merek Mobil</label>
                        <input type="text" class="form-control" id="merek" name="merek" value="<?php echo $row['merek']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="denda">Denda</label>
                        <input type="text" class="form-control" id="denda" name="denda" value="<?php echo $row['denda']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="tgl_rental">Tanggal Rental</label>
                        <input type="date" class="form-control" id="tgl_rental" name="tgl_rental" value="<?php echo $row['tgl_rental']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value="<?php echo $row['tgl_pengembalian']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="total">Total</label>
                        <input type="text" class="form-control" id="total" name="total" value="<?php echo $row['total']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                            <option value="Cash" <?php echo ($row['metode_pembayaran'] == 'Cash') ? 'selected' : ''; ?>>Cash</option>
                            <option value="Transfer Bank" <?php echo ($row['metode_pembayaran'] == 'Transfer Bank') ? 'selected' : ''; ?>>Transfer Bank</option>
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
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
