<?php
// Koneksi ke database
include 'koneksi.php';

// Periksa apakah ada ID customer yang diberikan
if (isset($_GET['id_customer'])) {
    $id_customer = $_GET['id_customer'];

    // Ambil data customer berdasarkan ID
    $query = "SELECT * FROM customer WHERE id_customer = '$id_customer'";
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
    $id_customer = $_POST['id_customer'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $no_ktp = $_POST['no_ktp'];

    // Update data customer ke database
    $update_query = "UPDATE customer SET 
                        username = '$username', 
                        alamat = '$alamat', 
                        no_hp = '$no_hp', 
                        no_ktp = '$no_ktp' 
                    WHERE id_customer = '$id_customer'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>
        alert('Data customer berhasil diperbaharui.');
        window.location.href = 'datacustomer.php';
    </script>";
    } else {
        echo "Gagal memperbarui data customer: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Customer</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Data Customer</h1>
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Edit Data Customer</h5>
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
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $row['no_hp']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_ktp">Nomor KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?php echo $row['no_ktp']; ?>" required>
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
