<?php
// Koneksi ke database
include 'koneksi.php';

if(isset($_GET['id_customer'])) {
    $id_customer = $_GET['id_customer'];

    if (!empty($id_customer)) {
        $sql = "DELETE FROM customer WHERE id_customer=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id_customer);

        if ($stmt->execute()) {
            echo "<script>
            alert('Data berhasil dihapus.');
            window.location.href = 'datacustomer.php';
        </script>";
        } else {
            echo "<script>
            alert('Terjadi kesalahan: " . mysqli_error($conn) . "');
            window.location.href = 'datacustomer.php';
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