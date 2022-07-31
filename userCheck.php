<?php

require("functions/initi.php");


if (isset($_POST['loginUser'])) {

	$signupError ="";

	
	$uEmail      		  = getCleanInput($_POST['uEmail']);
    $uPassword 	  		  = getCleanInput($_POST['uPassword']);
    $remmember 			  = $_POST['remMe'];
	$uPassword 	          = myCrypt($uPassword);

		$userCheck = userAcountData($uEmail);
		if(sizeof($userCheck) > 0) {
		
		foreach ($userCheck as $key => $row) {
			$dbEmail     =  $row['U_Email'];
			$dbPass      =  $row['U_Password'];
			$dbOldPass 	 =  $row['U_OldPassword'];
		}
		if ($uPassword == $dbOldPass ) {
			  $loginError = "Old Password.";	
		}else if ($uPassword != $dbPass ) {
			 $loginError = "Wrong Password.";	
		}
	}else{
			$loginError = "Invalid User.";
		}

		if (!empty($loginError)) {
			echo errorMessage($loginError);
		}else{
			if(myUserLogin($uEmail, $uPassword, $remmember)){
				echo 1;
			}
		}


}



?>