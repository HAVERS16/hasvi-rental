<?php
include 'koneksi.php';

$username = $_POST['username'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$no_ktp = $_POST['no_ktp'];

$query = "INSERT INTO customer (username, alamat, no_hp, no_ktp) VALUES ('$username', '$alamat', '$no_hp', '$no_ktp')";

if (mysqli_query($conn, $query)) {
    echo "<script>
        alert('Data telah tersimpan.');
        window.location.href = 'datacustomer.php';
    </script>";
} else {
    echo "<script>
        alert('Terjadi kesalahan: " . mysqli_error($conn) . "');
        window.location.href = 'datacustomer.php';
    </script>";
}

mysqli_close($conn);
?>
