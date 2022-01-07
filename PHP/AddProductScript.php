<?php 
	//Fetching Data
	$productType = $_POST['productType'];
	$productCustomerName = $_POST['productCustomerName']; 
	$productCustomerNumber = $_POST['productCustomerNumber']; 
	$productPrice = $_POST['productPrice']; 
	$productWeight = $_POST['productWeight'];
	$productPurity = $_POST['productPurity'];
	$productSellingDate = $_POST['productSellingDate'];

	//File upload logic
	$productImageName = $_FILES['productImage']['name'];
	$productImageType = $_FILES['productImage']['type'];
	$productImageTempLoc = $_FILES['productImage']['tmp_name'];
	$fileLocation = "UploadedImages/Products/".$productImageName;
	move_uploaded_file($productImageTempLoc, $fileLocation);

	$productNote = $_POST['productNote'];

	$query = "INSERT INTO PRODUCTS(TYPE,CUSTOMER_NAME,CUSTOMER_NUMBER,PRICE,WEIGHT,PURITY,SELLING_DATE,IMAGE_PATH,NOTE) VALUES ('$productType','$productCustomerName','$productCustomerNumber','$productPrice','$productWeight','$productPurity','$productSellingDate','$fileLocation','$productNote')";

	$connection = mysqli_connect("localhost","root","","WT_PROJECT");
	if($connection){
		$result = mysqli_query($connection,$query);

		if($result) printHTML("success");
		else printHTML("failed");
	}
	
	function printHTML($state){
		if($state == "success"){
			echo "<script> alert('Success'); location.href='http://localhost/EXP/EXP7/Home.html'; </script>";
		}
		
		else{
			echo "<script> alert('Failed'); location.href='http://localhost/EXP/EXP7/add_product.html'; </script>";	
		}
	}
?>