<?php
// Koneksi ke database
include 'koneksi.php';

if(isset($_GET['id_pengembalian'])) {
    $id_pengembalian = $_GET['id_pengembalian'];

    if (!empty($id_pengembalian)) {
        $sql = "DELETE FROM pengembalian WHERE id_pengembalian=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id_pengembalian);

        if ($stmt->execute()) {
            echo "<script>
            alert('Data berhasil dihapus.');
            window.location.href = 'datapengembalian.php';
        </script>";
        } else {
            echo "<script>
            alert('Terjadi kesalahan: " . mysqli_error($conn) . "');
            window.location.href = 'datapengembalian.php';
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