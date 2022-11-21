<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['username'])){
    // die("Anda belum login");

    echo "<script>
    alert('anda belum login!');
    window.location='login.php';
    </script>";

}

//cek level user
if($_SESSION['level']!="admin")
{
    die("Anda bukan admin");


}
?>