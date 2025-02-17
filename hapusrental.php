<?php
// Koneksi ke database
include 'koneksi.php';

if(isset($_GET['id_rental'])) {
    $id_rental = $_GET['id_rental'];

    if (!empty($id_rental)) {
        $sql = "DELETE FROM rental WHERE id_rental=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id_rental);

        if ($stmt->execute()) {
            echo "<script>
            alert('Data berhasil dihapus.');
            window.location.href = 'datarental.php.php';
        </script>";
        } else {
            echo "<script>
            alert('Terjadi kesalahan: " . mysqli_error($conn) . "');
            window.location.href = 'datarental.php.php';
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