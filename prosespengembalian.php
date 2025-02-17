<?php
include 'koneksi.php';

$username = $_POST['username'];
$tgl_pengembalian = $_POST['tgl_pengembalian'];
$denda = $_POST['denda'];
$status = $_POST['status'];

$query = "INSERT INTO pengembalian (username, tgl_pengembalian, denda, status) VALUES ('$username', '$tgl_pengembalian', '$denda', '$status')";

if (mysqli_query($conn, $query)) {
    echo "<script>
        alert('Data telah tersimpan.');
        window.location.href = 'datapengembalian.php';
    </script>";
} else {
    echo "<script>
        alert('Terjadi kesalahan: " . mysqli_error($conn) . "');
        window.location.href = 'datapengembalian.php';
    </script>";
}

mysqli_close($conn);
?>
