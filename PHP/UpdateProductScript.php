<?php 
	//Fetching Data
	$productID = $_POST['productID'];
	$productType = $_POST['productType'];
	$productCustomerName = $_POST['productCustomerName']; 
	$productCustomerNumber = $_POST['productCustomerNumber']; 
	$productPrice = $_POST['productPrice']; 
	$productWeight = $_POST['productWeight'];
	$productPurity = $_POST['productPurity'];
	$productSellingDate = $_POST['productSellingDate'];
	
	//Fetch Link
	$data = simplexml_load_file('path.xml');
	$link = $data->protocol.$data->ip.$data->path;

	//File upload logic
	$productImageName = $_FILES['productImage']['name'];
	$productImageType = $_FILES['productImage']['type'];
	$productImageTempLoc = $_FILES['productImage']['tmp_name'];
	$fileLocation = "UploadedImages/Products/".$productImageName;
	move_uploaded_file($productImageTempLoc, $fileLocation);
	$productNote = $_POST['productNote'];
	
	$query = "UPDATE PRODUCTS SET ";
	$originalLength = strlen($query);

	if($productType) {
		if($productType != -1) $query = $query."TYPE='$productType', ";
	}
	if($productCustomerName) $query = $query."CUSTOMER_NAME='$productCustomerName', ";
	if($productCustomerNumber) $query = $query."CUSTOMER_NUMBER='$productCustomerNumber', ";
	if($productPrice) $query = $query."PRICE='$productPrice', ";
	if($productWeight) $query = $query."WEIGHT='$productWeight', ";
	if($productPurity) {
		if($productPurity != -1) $query = $query."PURITY='$productPurity', ";
	}
	if($productSellingDate) $query = $query."SELLING_DATE='$productSellingDate', ";
	if($productImageName) $query = $query."IMAGE_PATH='$fileLocation', ";
	if($productNote) $query = $query."NOTE='$productNote', ";
	
	$newLength = strlen($query);
	
	if($originalLength == $newLength){ //Query didnt change
		echo "<script> alert('Please enter data that has to be updated'); location.href='$link'; </script>";
	}
	else{ //Query Changed
		$query = trim($query,", ");
	}
	
	$query = $query." WHERE SRNO='$productID'";
	
	$connection = mysqli_connect("localhost","root","","WT_PROJECT");
	if($connection){
		$result = mysqli_query($connection,$query);

		if($result) printHTML("success");
		else printHTML("failed");
	}
	
	function printHTML($state){
		
		$pf = fopen('_path.txt','r');
		$lines = file('_path.txt');
		$link = $lines[0];
		
		if($state == "success"){
			echo "<script> alert('Data updated successfully..!'); location.href='$link'; </script>";
		}
		
		else{
			echo "<script> alert('Failed to update data..!'); location.href='$link'; </script>";	
		}
	}
?>