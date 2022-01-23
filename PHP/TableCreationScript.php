<?php
	//Read Form Data
	$tableName = $_GET['tableName'];
	$databaseName = $_GET['databaseName'];
	$columnNames = $_GET['columnNames'];
	$crnstName = $_GET['crnstName'];
	
	//Construct the query 
	$query = "CREATE TABLE ".$tableName."(";
	$n = count($columnNames);
	for($i = 0 ; $i < $n; $i++) {
		if($i == $n-1) $query = $query . $columnNames[$i];
		else $query = $query . $columnNames[$i] . ",";
	}
	
	if($crnstName == "") $query = $query.")";
	else $query = $query.",".$crnstName.")";

	//Fetch Link
	$data = simplexml_load_file('path.xml');
	$link = $data->protocol.$data->ip.$data->path;

	//Connect to Database
	$db_cred = simplexml_load_file('db.xml');
	$connection = mysqli_connect($db_cred->db_server,$db_cred->user_name,$db_cred->password,$db_cred->db_name);
	if($connection){
		echo "<script> alert('Successfully connected to Database'); </script>";	
		
		$result = mysqli_query($connection,$query);
		if($result) printHTML("success");	
		else printHTML("failed");
	}
	else{
		echo "<script> alert('Connection Failed'); location.href='$link'; </script>";
	}
	
	function printHTML($state){
		
		if($state == "success"){
			echo "<script> alert('Table Created Successfully'); location.href='$link'; </script>";
		}
		
		else{
			echo "<script> alert('Table Creation Failed'); location.href='$link'; </script>";	
		}
	}
?>