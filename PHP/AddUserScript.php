<?php
	require "ReadPath.php";
	
	$userFirstName = $_REQUEST['userFirstName'];
	$userLastName = $_REQUEST['userLastName']; 
	$userEmail = $_REQUEST['userEmail']; 
	$userPhoneNumber = $_REQUEST['userPhoneNumber']; 
	$userGender = $_REQUEST['userGender']; 
	$userDateOfBirth = $_REQUEST['userDateOfBirth']; 
	$userPassword = $_REQUEST['userPassword']; 
	$userAadharCardNumber = $_REQUEST['userAadharCardNumber'];
	$userHighestQualification = $_REQUEST['userHighestQualification'];
	
	$userIdProofFileName = $_FILES['userIdProofFile']['name'];
	$userIdProofFileType = $_FILES['userIdProofFile']['type'];
	$userIdProofFileTmpLoc = $_FILES['userIdProofFile']['tmp_name'];
	$fileLocation = "UploadedImages/User/".$userIdProofFileName;
	move_uploaded_file($userIdProofFileTmpLoc, $fileLocation);
	
	
	$query = "INSERT INTO USERS(FIRST_NAME,LAST_NAME,EMAIL,PH_NUMBER,GENDER,DOB,PASSWORD,AADHAR_NO,QUALIFICATION,ID_PROOF) VALUES ('$userFirstName','$userLastName','$userEmail','$userPhoneNumber','$userGender','$userDateOfBirth','$userPassword','$userAadharCardNumber','$userHighestQualification','$fileLocation')";

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
			echo "<script> alert('Data Insertion Successful'); location.href='$link'; </script>";
		}
		
		else{
			echo "<script> alert('Data Insertion Failed'); location.href='$link'; </script>";	
		}
	}
?>