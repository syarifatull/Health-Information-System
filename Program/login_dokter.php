<?php

//panggil koneksi database
include "koneksi.php";

$pass = md5($_POST['password']);
$id_dokter = mysqli_escape_string($koneksi, $_POST['username']);
$password_dokter = mysqli_escape_string($koneksi, $pass);

//cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM data_dokter WHERE id_dokter = '$id_dokter ' ");
$user_valid = mysqli_fetch_array($cek_user);
//uji jika username terdaftar
if ($user_valid) {
    //jika username terdaftar
    //cek password sesuai atau tidak
    if ($password_dokter == $user_valid['password_dokter']) {
        //jika password sesuai
        //buat session
        session_start();
        $_SESSION['id_dokter'] = $user_valid['id_dokter'];
        $_SESSION['nama_dokter'] = $user_valid['nama_dokter'];

        //uji level user
        header('location:dokter.php');
        
        
    } else {
        echo "<script>alert('Maaf, Login Gagal, Password Anda tidak sesuai!');document.location='index_login_dokter.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Login Gagal, ID Anda tidak sesuai!');document.location='index_login_dokter.php'</script>";
}
