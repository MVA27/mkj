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

	$db_cred = simplexml_load_file('db.xml');
	$connection = mysqli_connect($db_cred->db_server,$db_cred->user_name,$db_cred->password,$db_cred->db_name);
	if($connection){
		$result = mysqli_query($connection,$query);

		if($result) printHTML("success");
		else printHTML("failed");
	}
	
	function printHTML($state){
		
		$data = simplexml_load_file('path.xml');
		$link = $data->protocol.$data->ip.$data->path.$data->add_product;
		
		if($state == "success"){
			echo "<script> alert('Data Insertion Successful'); location.href='$link'; </script>";
		}
		
		else{
			echo "<script> alert('Data Insertion Failed'); location.href='$link'; </script>";	
		}
	}
?>