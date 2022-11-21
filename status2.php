<?php
error_reporting(E_ALL ^ E_DEPRECATED);


$con = mysqli_connect("localhost", "root", " ", "finalproject_tal");
//$con = mysqli_connect("localhost", "annisa", "annisapoltek", "finalproject_tal");



$SQL = "INSERT INTO sensor_getar (nilai_getar,kondisi_mesin) VALUES (" . $_GET['getar'] . ", " . $_GET['kondisiGetar'] . ")";
mysqli_query($conn, $SQL);

$SQL = "INSERT INTO sensor_suhu (nilai_suhu,kondisi_mesin) VALUES (" . $_GET['suhu'] . ",  " . $_GET['kondisiSuhu'] . ")";
mysqli_query($conn, $SQL);
