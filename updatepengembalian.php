<?php
// Koneksi ke database
include 'koneksi.php';

// Periksa apakah ada ID pengembalian yang diberikan
if (isset($_GET['id_pengembalian'])) {
    $id_pengembalian = $_GET['id_pengembalian'];

    // Ambil data pengembalian berdasarkan ID
    $query = "SELECT * FROM pengembalian WHERE id_pengembalian = '$id_pengembalian'";
    $result = mysqli_query($conn, $query);

    // Jika data ditemukan
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Data customer tidak ditemukan.";
        exit;
    }
} else {
    echo "ID customer tidak ditemukan.";
    exit;
}

// Proses form submit (update data)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_pengembalian = $_POST['id_pengembalian'];
    $username = $_POST['username'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $denda = $_POST['denda'];
    $status = $_POST['status'];

    // Update data pengembalian ke database
    $update_query = "UPDATE pengembalian SET 
                        username = '$username', 
                        tgl_pengembalian = '$tgl_pengembalian', 
                        denda = '$denda', 
                        status = '$status' 
                    WHERE id_pengembalian = '$id_pengembalian'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>
        alert('Data pengembalian berhasil diperbaharui.');
        window.location.href = 'datapengembalian.php';
    </script>";
    } else {
        echo "Gagal memperbarui data pengembalian: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengembalian</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Data Pengembalian</h1>
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Edit Data Pengembalian</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- Hidden input untuk ID customer -->
                    <input type="hidden" name="id_customer" value="<?php echo $row['id_customer']; ?>">

                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value="<?php echo $row['tgl_pengembalian']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="denda">Denda</label>
                        <input type="text" class="form-control" id="denda" name="denda" value="<?php echo $row['denda']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Selesai" <?php echo ($row['status'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                            <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
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
