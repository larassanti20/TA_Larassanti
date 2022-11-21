<?php
$host = "localhost";
$user = "root";
$pwd = "";
$dbname = "db_tugasakhir";

function connect_db()
{
	global $host, $user, $pwd, $dbname, $conn;

	$conn = mysqli_connect($host, $user, $pwd, $dbname);

	if ($conn->connect_errno > 0) {
		die('Unable to connect to database[' . $conn->connect_errno . ']');
	}
}
