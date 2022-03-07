<?php

//panggil koneksi database
include "koneksi.php";

$pass = md5($_POST['password']);
$no_rekmed = mysqli_escape_string($koneksi, $_POST['username']);
$password_pasien = mysqli_escape_string($koneksi, $pass);

//cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM data_umum_pasien WHERE no_rekmed  = '$no_rekmed ' ");
$user_valid = mysqli_fetch_array($cek_user);
//uji jika username terdaftar
if ($user_valid) {
    //jika username terdaftar
    //cek password sesuai atau tidak
    if ($password_pasien == $user_valid['password_pasien']) {
        //jika password sesuai
        //buat session
        session_start();
        $_SESSION['no_rekmed'] = $user_valid['no_rekmed'];
        $_SESSION['nama_pasien'] = $user_valid['nama_pasien'];

        //uji level user
        header('location:pasien.php');
        
        
    } else {
        echo "<script>alert('Maaf, Login Gagal, Password Anda tidak sesuai!');document.location='index_login_pasien.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Login Gagal, No Rekmed Anda tidak sesuai!');document.location='index_login_pasien.php'</script>";
}
