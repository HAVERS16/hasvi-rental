<?php
// Koneksi ke database
include 'koneksi.php';

// Periksa apakah ada ID mobil yang diberikan
if (isset($_GET['id_mobil'])) {
    $id_mobil = $_GET['id_mobil'];

    // Ambil data mobil berdasarkan ID
    $query = "SELECT * FROM mobil WHERE id_mobil = '$id_mobil'";
    $result = mysqli_query($conn, $query);

    // Jika data ditemukan
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Data mobil tidak ditemukan.";
        exit;
    }
} else {
    echo "ID mobil tidak ditemukan.";
    exit;
}

// Proses form submit (update data)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_mobil = $_POST['id_mobil'];
    $merek = $_POST['merek'];
    $no_plat = $_POST['no_plat'];
    $status = $_POST['status'];

    // Proses upload gambar
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $gambar = $_FILES['gambar'];
        $gambar_name = $gambar['name'];
        $gambar_tmp = $gambar['tmp_name'];
        $gambar_ext = pathinfo($gambar_name, PATHINFO_EXTENSION);

        if (in_array($gambar_ext, ['jpg', 'jpeg', 'png'])) {
            $new_gambar_name = 'mobil_' . time() . '.' . $gambar_ext;
            $upload_dir = 'uploads/';
            move_uploaded_file($gambar_tmp, $upload_dir . $new_gambar_name);
        } else {
            echo "Jenis file tidak diizinkan.";
            exit;
        }
    } else {
        $new_gambar_name = $row['gambar']; // Gunakan gambar lama jika tidak diunggah baru
    }

    // Update data mobil ke database
    $update_query = "UPDATE mobil SET 
                        merek = '$merek', 
                        no_plat = '$no_plat', 
                        status = '$status', 
                        gambar = '$new_gambar_name' 
                    WHERE id_mobil = '$id_mobil'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>
        alert('Data mobil berhasil diperbaharui.');
        window.location.href = 'datamobil.php';
    </script>";
    } else {
        echo "Gagal memperbarui data mobil: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mobil</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Data Mobil</h1>
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Edit Data Mobil</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- Hidden input untuk ID mobil -->
                    <input type="hidden" name="id_mobil" value="<?php echo $row['id_mobil']; ?>">

                    <div class="form-group">
                        <label for="gambar">Gambar Mobil</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                        <small>Gambar saat ini: <img src="uploads/<?php echo $row['gambar']; ?>" alt="Gambar Mobil" width="100"></small>
                    </div>
                    <div class="form-group">
                        <label for="merek">Merek Mobil</label>
                        <input type="text" class="form-control" id="merek" name="merek" value="<?php echo $row['merek']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_plat">Nomor Plat</label>
                        <input type="text" class="form-control" id="no_plat" name="no_plat" value="<?php echo $row['no_plat']; ?>" required>
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
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Tersedia" <?php echo ($row['status'] == 'Tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                            <option value="Disewa" <?php echo ($row['status'] == 'Disewa') ? 'selected' : ''; ?>>Disewa</option>
                            <option value="Dalam Perbaikan" <?php echo ($row['status'] == 'Dalam Perbaikan') ? 'selected' : ''; ?>>Dalam Perbaikan</option>
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
