<?php
include 'koneksi.php';

$username = $_POST['username'];
$merek = $_POST['merek'];
$harga = $_POST['harga'];
$denda = $_POST['denda'];
$tgl_rental = $_POST['tgl_rental'];
$tgl_pengembalian = $_POST['tgl_pengembalian'];
$total = $_POST['total'];
$metode_pembayaran = $_POST['metode_pembayaran'];

$query = "INSERT INTO rental (username, merek, harga, denda, tgl_rental, tgl_pengembalian, total, metode_pembayaran) VALUES ('$username', '$merek', '$harga', '$denda', '$tgl_rental', '$tgl_pengembalian', '$total', '$metode_pembayaran')";

if (mysqli_query($conn, $query)) {
    header("Location: invoice.php?id_rental=" . mysqli_insert_id($conn));
    exit;
    echo "<script>
        alert('Data telah tersimpan.');
        window.location.href = 'datarental.php';
    </script>";
} else {
    echo "<script>
        alert('Terjadi kesalahan: " . mysqli_error($conn) . "');
        window.location.href = 'datarental.php';
    </script>";
}

mysqli_close($conn);
