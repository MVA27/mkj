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
		
	//Connect to Database
	$connection = mysqli_connect("localhost","root","",$databaseName);
	if($connection){
		echo "<script> alert('Successfully connected to Database'); </script>";	
		
		$result = mysqli_query($connection,$query);
		if($result) printHTML("success");	
		else printHTML("failed");
	}
	else{
		echo "<script> alert('Connection Failed'); location.href='http://localhost/EXP/EXP7/add_table.html'; </script>";
	}
	
	function printHTML($state){
		if($state == "success"){
			echo "<script> alert('Table Created Successfully'); location.href='http://localhost/EXP/EXP7/Home.html'; </script>";
		}
		
		else{
			echo "<script> alert('Table Creation Failed'); location.href='http://localhost/EXP/EXP7/add_table.html'; </script>";	
		}
	}
?>