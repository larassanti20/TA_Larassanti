<?php
error_reporting(E_ALL ^ E_DEPRECATED);

require_once("config.php");
connect_db();

$getar = $_GET['getar'];
$statusGetar = $_GET['statusGetar'];
$suhu = $_GET['suhu'];
$statusSuhu = $_GET['statusSuhu'];

$sqlGetar = "INSERT INTO sensor_getar (nilai_getar,kondisi_mesin) VALUES ($getar, '$statusGetar')";

if($conn->query($sqlGetar)) {
    echo "Data input getar success!";
} else {
    echo "Data input getar failed!";
}


$sqlSuhu = "INSERT INTO sensor_suhu (nilai_suhu,kondisi_mesin) VALUES ($suhu,  '$statusSuhu')";
if($conn->query($sqlSuhu)) {
    echo "Data input suhu success!";
} else {
    echo "Data input suhu failed!";
}