<?php
// mengaktifkan session pada php 
session_start();

// panggil program koneksi database 
include 'koneksi.php';

// menangkap data yang dikirim dari form login 
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai 
$sql = mysqli_query($conn, "select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan 
$result = mysqli_num_rows($sql);

// cek apakah username dan password di temukan pada database 
if ($result > 0) {
    $data = mysqli_fetch_assoc($sql);

    // cek jika user login sebagai admin 
    if ($data['level'] == "admin") {

        // buat session login dan username 
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        // alihkan ke halaman dashboard admin 
        header("location:menu.php");

        // cek jika user login sebagai customer 
    } else if ($data['level'] == "customer") {
        // buat session login dan username 
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "customer";
        // alihkan ke halaman dashboard customer 
        header("location:menucustomer.php");
    } else {
        // alihkan ke halaman login kembali 
        echo "Data not found";
        header("location:index.html?pesan=gagal");
    }
} else {
    header("location:index.html?pesan=gagal");
}
?>

