<?php

require("functions/initi.php");


if (isset($_POST['userName'])) {

	$signupError ="";

	$uName        = getCleanInput($_POST['userName']);
	$uEmail       = getCleanInput($_POST['userEmail']);
	$uPassword 	  = getCleanInput($_POST['userPass']);
	$uPassword2   = getCleanInput($_POST['userPass2']);
	if ($uPassword == $uPassword2) {
		$uPassword 	  = myCrypt($uPassword);
	}else{
		$signupError = "Please Check Your Password.";

	}
	
	
	if (emailAcountExist($uEmail)) {
		$signupError = "Email Already Exist.";
	}

	if (!empty($signupError)) {
	echo $signupError;
	}else{
		if (signUpUser($uName, $uEmail, $uPassword)) {
			Echo "Registered.";
		}else{
			echo "Error in Registration."; 
		}
	}
}



?>