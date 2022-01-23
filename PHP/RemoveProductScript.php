<?php 
	//Fetching Data
	$productID = $_REQUEST['productID'];

	$query = "DELETE FROM PRODUCTS WHERE SRNO = '$productID'";

	$db_cred = simplexml_load_file('db.xml');
	$connection = mysqli_connect($db_cred->db_server,$db_cred->user_name,$db_cred->password,$db_cred->db_name);
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