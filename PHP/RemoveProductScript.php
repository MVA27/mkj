<?php 
	//Fetching Data
	$productID = $_REQUEST['productID'];

	$query = "DELETE FROM PRODUCTS WHERE SRNO = '$productID'";

	$connection = mysqli_connect("localhost","root","","WT_PROJECT");
	if($connection){
		$result = mysqli_query($connection,$query);

		if($result) printHTML("success");
		else printHTML("failed");
	}
	
	function printHTML($state){
		
		$data = simplexml_load_file('path.xml');
		$link = $data->protocol.$data->ip.$data->path;
		
		if($state == "success"){
			echo "<script> alert('Record deleted'); location.href='$link'; </script>";
		}
		
		else{
			echo "<script> alert('Deletion Failed'); location.href='$link'; </script>";	
		}
	}
?>