<?php
	require_once("../config.php");
	connect_db(); 

	$result=$conn->query("SELECT DATE_FORMAT(time_update, '%e-%b-%Y %H:%i:%S') AS time_update, nilai_getar, kondisi_mesin FROM sensor_getar ORDER BY id DESC LIMIT 20");
	
	mysqli_close($conn);

	while ($row = $result->fetch_assoc()){
		$data[] = $row;
	};

	$data = array(
		'data' => $data
	);

	header('Content-type: application/json');
	echo json_encode( $data );
?>
