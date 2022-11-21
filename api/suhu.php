<?php
	require_once("../config.php");
	connect_db(); 

	$result=$conn->query("SELECT DATE_FORMAT(time_update, '%e-%b-%Y %H:%i:%S') AS time_update,  nilai_suhu, kondisi_mesin FROM sensor_suhu ORDER BY id DESC LIMIT 20");
	
	mysqli_close($conn);

	while ($row = $result->fetch_assoc()){
		$data[] = $row;
	};

	$dataset = array(
		'data' => $data
	);
	
	echo json_encode( $dataset );
?>
