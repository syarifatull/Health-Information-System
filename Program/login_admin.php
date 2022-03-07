<?php

//panggil koneksi database
include "koneksi.php";

$pass = md5($_POST['password']);
$id_staff = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $pass);

//cek username, terdaftar atau tidak
$cek_user = mysqli_query($koneksi, "SELECT * FROM data_staff WHERE id_staff= '$id_staff' ");
$user_valid = mysqli_fetch_array($cek_user);
//uji jika username terdaftar
if ($user_valid) {
    //jika username terdaftar
    //cek password sesuai atau tidak
    if ($password == $user_valid['password']) {
        //jika password sesuai
        //buat session
        session_start();
        $_SESSION['id_staff'] = $user_valid['id_staff'];
        $_SESSION['nama_staff'] = $user_valid['nama_staff'];
        $_SESSION['status'] = $user_valid['status'];

        //uji level user
        if ($_SESSION['status'] == "Administrasi") {
            header('location:admin_kunjungan.php');
        } else {
            echo "<script>alert('Maaf, Login Gagal, Anda bukan Staff Administrasi');document.location='index_login_admin.php'</script>";
        }        
        
    } else {
        echo "<script>alert('Maaf, Login Gagal, Password Anda tidak sesuai!');document.location='index_login_admin.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Login Gagal, ID Anda tidak terdaftar!');document.location='index_login_admin.php'</script>";
}
