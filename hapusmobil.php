<?php
// Koneksi ke database
include 'koneksi.php';

if(isset($_GET['id_mobil'])) {
    $id_mobil = $_GET['id_mobil'];

    if (!empty($id_mobil)) {
        $sql = "DELETE FROM mobil WHERE id_mobil=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id_mobil);

        if ($stmt->execute()) {
            echo "<script>
            alert('Data berhasil dihapus.');
            window.location.href = 'datamobil.php';
        </script>";
        } else {
            echo "<script>
            alert('Terjadi kesalahan: " . mysqli_error($conn) . "');
            window.location.href = 'datamobil.php';
        </script>";
        }

        $stmt->close();
    } else {
        echo "Id tidak boleh kosong.";
    }
} else {
    echo "Id tidak ditemukan";
}

$conn->close();
?>