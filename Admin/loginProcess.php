<?php


require("functions/initi.php");

if (isset($_POST['loginAdmin'])) {
		
	
	$loginError="";
	$adminEmail      		  = getCleanInput($_POST['email']);
    $adminPassword 	  		  = getCleanInput($_POST['password']);
  	$remmember 			      = $_POST['remMe'];
	$adminPassword 	          = myCrypt($adminPassword);

 
		$adminData = adminAcountData($adminEmail);

		if (sizeof($adminData) > 0) {
			 foreach ($adminData as $key => $row) {
				
				$dbEmail        = $row['AU_Email'];
				$dbPass         = $row['AU_Password'];
				$dbOldPass      = $row['AU_OldPassword'];
				$dbAdminStatus  = $row['AU_AcountStatus'];

			 }
		}

	if (!emailAcountExist($adminEmail)){
 
 			$loginError = "This Account Dosen't exits.";
	} else if ($adminPassword != $dbPass){
		$loginError = "Wrong Password.";
		
	}else if ($adminPassword == $dbOldPass) {
		$loginError = "You Have Enter Old Password.";
	}else if ($dbAdminStatus == 0) {
		$loginError = "You Account is Disable.";
	}



	if (!empty($loginError)) {
		 echo errorMessage($loginError);
	}else{
		if (myAdminLoginAjex($adminEmail, $adminPassword, $remmember)) {
			echo 1;
		}
	}



	





	
}



?>