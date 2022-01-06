function validate(){

	//Get All the User Input
	var userFirstName = document.getElementById('user_first_name');
	var userLastName = document.getElementById('user_last_name');
	var userEmail = document.getElementById('user_email');
	var userPhoneNumber = document.getElementById('user_phone_number');
	var userGender = document.getElementById('user_gender');
	var userDOB = document.getElementById('user_dob');
	var userNewPassword = document.getElementById('user_new_password');
	var userConfirmPassword = document.getElementById('user_confirm_password');
	var userAadharCardNumber = document.getElementById('user_aadharcard_number');
	var userHighestQualification = document.getElementsByName('userHighestQualification');
	var userIdProof = document.getElementById('user_idproof');
	var userTermsAndCond = document.getElementById('user_termsandcond');

	
	//Check for empty value and return false
	if(userFirstName.value.trim() == ""){
		alert("Please Enter First Name");
		return false;
	}
	if(userLastName.value.trim() == ""){
		alert("Please Enter Last Name");
		return false;
	}
	if(userEmail.value.trim() == ""){
		alert("Please Enter Your Email");
		return false;
	}
	if(userPhoneNumber.value.trim() == ""){
		alert("Please Enter Your Phone Number");
		return false;
	}
	if(userGender.options[userGender.selectedIndex].value == ""){
		alert("Please Select a Gender");
		return false;
	}
	if(userDOB.value.trim() == ""){
		alert("Please Enter a Valid Date of Birth");
		return false;
	}
	if(userNewPassword.value.trim() == ""){
		alert("Please Enter a Password");
		return false;
	}
	if(userConfirmPassword.value.trim() == ""){
		alert("Please Confirm Your Password");
		return false;
	}
	if(userAadharCardNumber.value.trim() == ""){
		alert("Please Enter Your Aadhar Card Number");
		return false;
	}

	var test = false;
	var qual = "N/A";
	for(var i = 0 ; i<userHighestQualification.length ; i++){
		if(userHighestQualification[i].checked == true){
			test = true;
			qual = userHighestQualification[i].value;
		}
	}

	if(!test){
		alert("Select Your Qualification");
		return false;
	}


	if(userIdProof.value == ""){
		alert("Please Attach a file");
		return false;
	}


	if(userTermsAndCond.checked == false){
		alert("Please Accept the Terms and Conditions");
		return false;
	}
	
	
	//Pattern Matching

	var r6 = /([a-zA-Z0-9\.-]+)@([a-zA-Z]+)\.([a-z]{2,8})(\.[a-z]{2,8})?/.test(userEmail.value);
	if(!r6){
		alert("Invald Email Id");
		return false;
	}
	
	var r1 = /^[7-9][0-9]{9}$/.test(userPhoneNumber.value);
	if(!r1){
		alert("Invalid phone number");
		return false;
	}

	var r2 = /[a-z]+/.test(userNewPassword.value);
	if(!r2){
		alert("Password must contain atleast one small letter");
		return false;
	}

	var r3 = /[A-Z]+/.test(userNewPassword.value);
	if(!r3){
		alert("Password must contain atleast one capital letter");
		return false;
	}

	var r4 = /[0-9]+/.test(userNewPassword.value);
	if(!r4){
		alert("Password must contain atleast one number");
		return false;
	}

	var r5 = /['!']+|['$']+|['#']+/.test(userNewPassword.value);
	if(!r5){
		alert("Password must contain atleast one special character i.e '!' or '$' or '#'");
		return false;
	}

	if(userNewPassword.value != userConfirmPassword.value){
		alert("Password mismatch");
		return false;
	}
	
	var r7 = /[0-9]{12}/.test(userAadharCardNumber.value);
	if(!r7){
		alert("Invald Aadhar card number");
		return false;
	}

	//Display Details
	var details = "First Name : "+userFirstName.value+"\nLast Name : "+userLastName.value+"\nEmail : "+userEmail.value+"\nPh. No. : "+userPhoneNumber.value+"\nGender : "+userGender.options[userGender.selectedIndex].value+"\nDate of Birth : "+userDOB.value+"\nPassword : "+userNewPassword.value+"\nAadhar Card Number : "+userAadharCardNumber.value+"\nHighest Qualification : "+qual+"";
	window.alert(details);
}
