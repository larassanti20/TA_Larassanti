<?php

$host = "localhost";
$user = "root";
$pwd = "";
$dbname = "db_tugasakhir";

$koneksi = mysqli_connect($host,$user,$pwd,$dbname);

if ($koneksi->connect_errno > 0) {
	die('Unable to connect to database[' . $conn-
	connect_errno . ']');
}

function query($query) {
	global $koneksi;
	$hasil = mysqli_query($koneksi, $query);
	$rows=[];
	while($row = mysqli_fetch_assoc($hasil)) {
		$rows[] = $row;
	}
	return $rows;
}


?>
