<?php
require("connection.php");

session_start();

function sql($qry){
	global $con;
	$result = $qry;
	// print_r($result);
	// die();
	$run = mysqli_query($con, $result);
	return $run;
}

function insert($table, $data){
	global $con;
	// $sql = "INSERT INTO table(a, b) VALUES('x', 'y')";
	$sql = "INSERT INTO ".$table."(".implode(',', array_keys($data)).") VALUES('".implode("','", array_values($data))."')";
	// print_r($sql);
	// die();
	mysqli_query($con, $sql);
}

function select($qry){
	global $con;
	$run = mysqli_query($con, $qry);
	return $run;
}

function update($table, $data, $where){
	global $con;
	// $sql = "UPDATE student SET firstname='fn', lastname='ln' WHERE id='id'";
	$cols = array();
	foreach($data as $k=>$v){
		$cols[] = "$k='$v'";
	}
	$sql = "UPDATE ".$table." SET ".implode(",", $cols)." WHERE ".$where;
	// print_r($sql);
	// die();
	$run = mysqli_query($con, $sql);
	return $run;
}

function delete($table, $where){
	global $con;
	// $sql = "DELETE FROM table WHERE id=id";
	$sql = "DELETE FROM ".$table." WHERE ".$where;
	$run = mysqli_query($con, $sql);
	return $run;
}

function search($table, $where){
	global $con;
	// $sql = "DELETE FROM table WHERE id=id";
	$sql = "Select * FROM ".$table." WHERE ".$where;
	$run = mysqli_query($con, $sql);
	return $run;
}