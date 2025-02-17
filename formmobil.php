<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Tambah Mobil</h1>
        <div class="card shadow">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Tambah Mobil</h5>
            </div>
            <div class="card-body">
                <form action="prosesmobil.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="gambar">Gambar Mobil</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="merek">Merek Mobil</label>
                        <input type="text" class="form-control" id="merek" name="merek" placeholder="Contoh: Toyota Avanza" required>
                    </div>
                    <div class="form-group">
                        <label for="no_plat">Nomor Plat</label>
                        <input type="text" class="form-control" id="no_plat" name="no_plat" placeholder="Contoh: BM 1234 XY" required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga"required>
                    </div>

                    <div class="form-group">
                        <label for="denda">Denda</label>
                        <input type="text" class="form-control" id="denda" name="denda"required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Tersedia">Tersedia</option>
                            <option value="Disewa">Disewa</option>
                            <option value="Dalam Perbaikan">Dalam Perbaikan</option>
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
