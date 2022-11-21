<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$con = mysqli_connect("localhost", "root", 
" ", "db_tugasakhir");
$SQL = "INSERT INTO sensor_getar 
(nilai_getar,kondisi_mesin) 
VALUES (" . $_GET['getar'] . ", " . $_GET['statusGetar'] . ", " 
. $_GET['statusGetar'] . ")";
mysqli_query($con, $SQL);
$SQL = "INSERT INTO sensor_suhu 
(nilai_suhu,kondisi_mesin) VALUES 
(" . $_GET['suhu'] . ", " . $_GET['statusSuhu'] . ", " . 
$_GET['statusSuhu'] . ")";
mysqli_query($con, $SQL);