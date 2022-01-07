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
		if($state == "success"){
			echo "<script> alert('Record deleted'); location.href='http://localhost/EXP/EXP7/Home.html'; </script>";
		}
		
		else{
			echo "<script> alert('Deletion Failed'); location.href='http://localhost/EXP/EXP7/remove_product.html'; </script>";	
		}
	}
?>