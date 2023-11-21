<?php
require_once('config.php');

function execute($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($con, 'UTF8');
	//insert, update, delete
	mysqli_query($con, $sql);

	//close connection
	mysqli_close($con);
}

function executeResult($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  	mysqli_set_charset($con, 'UTF8');
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$data   = [];
	while ($row = mysqli_fetch_array($result, 1)) {
		$data[] = $row;
	}

	//close connection
	mysqli_close($con);

	return $data;
}

function executeSingleResult($sql)
{
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
  	mysqli_set_charset($con, 'UTF8');
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result, 1);

	//close connection
	mysqli_close($con);

	return $row;
}

function order_status($sql){
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$sql = "UPDATE order_details SET status = 'Đặt hàng thành công' WHERE 1";
	mysqli_query($con, $sql);
}

function orderstatus($n) {
	switch ($n){
		case 0:
			$status = "Đang chuẩn bị";
			break;
		default:
			$status = 'Đặt hàng thành công';
			break;
	}
	return $status;
}
