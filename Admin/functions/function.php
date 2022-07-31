<?php




function redirect($location){
	return header("location: {$location}");
}

function myClean($string){
	return htmlentities($string);
}



function errorMessage($errorMessage){
    $errorMessage = <<<DELIMITER
  <div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> $errorMessage
</div>
DELIMITER;

return $errorMessage;
}

function getEncrptedPassword($myPassword){
	return md5($myPassword);
}

function getEncryptedUserSession($id, $email, $password){
 return md5($id . $email . $password);
}

function emailAcountExist($email){

	$sql = "SELECT AU_Email FROM admin_user WHERE AU_Email = '{$email}'";
	$result = myQuery($sql);

	if (myNumRowsCount($result) == 1 ) {
		return true;
	}else{
		return false;
	}
}


function validationCode($email){
  return md5($email. date('ymd') . time());
}


function myCrypt($password){
	$salt= "iamadminoffindinghope2";
	$hash_Code = "$2y$10$";
	$rend_salt = $hash_Code . $salt;
	return crypt($password, $rend_salt);
}

function newAdminUser(){
	if(isset($_POST['createAdmin'])){
			$adminName  = getCleanInput($_POST['adminName']);
			$adminEmail = getCleanInput($_POST['adminEmail']);
			$adminPass1 = getCleanInput($_POST['adminPassword1']);
			$adminPass2 = getCleanInput($_POST['adminPassword2']);
			$adminPhone = getCleanInput($_POST['adminPhone']);
			$adminRole  = getCleanInput($_POST['adminRole']);

			if ($adminPass1 == $adminPass2) {
				$adminPassword = myCrypt($adminPass1);
			}

			
			if (!emailAcountExist($adminEmail)) {
				$adminPassword = myCrypt($adminPass1);
				$sCode = validationCode($adminEmail);
				$sql = "INSERT INTO admin_user(AU_Name, AU_Email, AU_Password, AU_Phone, AU_Role, AU_AcountStatus)";
				$sql .="VALUES('{$adminName}', '{$adminEmail}', '{$adminPassword}', '{$adminPhone}', '{$adminRole}', 1) ";
				$result = myQuery($sql);
				$confirm = confirmQuery($result);
				if ($confirm) {
				 	  echo "Admin Created";
				 } else{
				 	echo $confirm;
				 }
			}else{
				echo "Email Already Registerd.";
			}		 
		}
	}



function myAdminLogin($email, $password, $remmember){

	$password = myCrypt($password);

	$sql = "SELECT * FROM admin_user WHERE AU_Email = '{$email}' AND AU_Password = '{$password}' AND AU_AcountStatus = 1 ";

	$result = myQuery($sql);

	if (myNumRowsCount($result) == 1) {
		$row = myFetchArray($result);
		
		$dbId 			= $row['AU_Id'];
		$dbName 		= $row['AU_Name'];
		$dbEmail 		= $row['AU_Email'];
		$dbPassword 	= $row['AU_Password'];
		$dbRole    		= $row['AU_Password'];
		$dbAcountStatus = $row['AU_AcountStatus'];

		if ($email == $dbEmail && $password == $dbPassword && $dbAcountStatus == 1) {
				 
				 if ($remmember == "on") {
                        setcookie('AU_Email', $dbEmail, time() + 120);                                    
                       }
            $_SESSION['AU_Id']    = $dbId;
			$_SESSION['AU_Name']  = $dbName;
			$_SESSION['AU_Email'] = $dbEmail;
			$_SESSION['AU_Role']  = $dbRole;
			$_SESSION['AU_TOKEN'] = md5($dbId . $dbEmail . $dbPassword);
			return true;
		}
		return true;
	}
	else{
		return false;
	}
}


function myAdminLoginAjex($email, $password, $remmember){


	$sql = "SELECT * FROM admin_user WHERE AU_Email = '{$email}' AND AU_Password = '{$password}' AND AU_AcountStatus = 1 ";

	$result = myQuery($sql);

	if (myNumRowsCount($result) == 1) {
		$row = myFetchArray($result);
		
		$dbId 			= $row['AU_Id'];
		$dbName 		= $row['AU_Name'];
		$dbEmail 		= $row['AU_Email'];
		$dbPassword 	= $row['AU_Password'];
		$dbRole    		= $row['AU_Password'];
		$dbAcountStatus = $row['AU_AcountStatus'];

		if ($email == $dbEmail && $password == $dbPassword && $dbAcountStatus == 1) {
				 
				 if ($remmember == "RemmemberMe"){
                        setcookie('AU_Email', $dbEmail, time() + 1200);                                    
                    }

            $_SESSION['AU_Id']    = $dbId;
			$_SESSION['AU_Name']  = $dbName;
			$_SESSION['AU_Email'] = $dbEmail;
			$_SESSION['AU_Role']  = $dbRole;
			$_SESSION['AU_TOKEN'] = md5($dbId . $dbEmail . $dbPassword);
			return true;
		}
		return true;
	}
	else{
		return false;
	}
}


function adminAcountData($adminEmail){
	$adminData = array();

	$sql = "SELECT * FROM admin_user WHERE AU_Email = '{$adminEmail}'";
	$result= myQuery($sql);
	while ($row = myFetchArray($result)){

		$adminDataRow['AU_Email']        = $row['AU_Email'];
	    $adminDataRow['AU_Password']     = $row['AU_Password'];
		$adminDataRow['AU_OldPassword']  = $row['AU_OldPassword'];
		$adminDataRow['AU_Role']         = $row['AU_Role'];
		$adminDataRow['AU_AcountStatus'] = $row['AU_AcountStatus'];

		array_push($adminData,$adminDataRow);
	}
	return $adminData;
}

function adminAcountCode($adminEmail){
	$adminCode = array();

	$sql = "SELECT AU_SecurityCode FROM admin_user WHERE AU_Email = '{$adminEmail}' ";
	$result= myQuery($sql);
	while ($row = myFetchArray($result)){
		$adminCodeRow['AU_SecurityCode'] = $row['AU_SecurityCode'];
		array_push($adminCode, $adminCodeRow);
	}
	return $adminCode;
}


function adminAcountDataById($id){
	$adminData = array();

	$sql = "SELECT * FROM admin_user WHERE AU_Id = '{$id}' ";
	$result= myQuery($sql);
	while ($row = myFetchArray($result)){

		$adminDataRow['AU_Email']        = $row['AU_Email'];
	    $adminDataRow['AU_Password']     = $row['AU_Password'];
		$adminDataRow['AU_OldPassword']  = $row['AU_OldPassword'];
		$adminDataRow['AU_Role']         = $row['AU_Role'];
		$adminDataRow['AU_AcountStatus'] = $row['AU_AcountStatus'];
		$adminDataRow['AU_Image'] 		 = $row['AU_Image'];

		array_push($adminData,$adminDataRow);
	}
	return $adminData;
}


function getAdminUsers(){

	$adminData= array();

	$sql = "SELECT * FROM admin_user";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {
		$adminDataRow['AU_Id']				=  $row['AU_Id'];
		$adminDataRow['AU_Name']			=  $row['AU_Name'];
		$adminDataRow['AU_Email']			=  $row['AU_Email'];
		$adminDataRow['AU_DOB']			    =  $row['AU_DOB'];
		$adminDataRow['AU_Password']		=  $row['AU_Password'];
		$adminDataRow['AU_OldPassword']		=  $row['AU_OldPassword'];
		$adminDataRow['AU_Phone']		    =  $row['AU_Phone'];
		$adminDataRow['P_Name']				=  $row['P_Name'];
		$adminDataRow['C_Name']				=  $row['C_Name'];
		$adminDataRow['D_Name']				=  $row['D_Name'];
		$adminDataRow['AU_Address']			=  $row['AU_Address'];
		$adminDataRow['AU_Image']			=  $row['AU_Image'];
		$adminDataRow['AU_Role']			=  $row['AU_Role'];
		$adminDataRow['AU_AcountStatus']	=  $row['AU_AcountStatus'];
			
	
		array_push($adminData, $adminDataRow);
	}
	return $adminData;
}


function deleteAdmin(){
	
	if (isset($_POST['deleteAdmin'])) {
		$deleteId = $_POST['id'];
			
			$sql = "DELETE FROM admin_user WHERE AU_Id='{$deleteId}'";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			$deleteAdminPost = deleteAdminPost($deleteId);
			if ($confirm) {
				echo "Admin Account Deleted";
			}else{
			echo "Admin can't be deleted due to some Error.";
		}
	}
}


function changeAdminRole(){
	if (isset($_POST['myAdmin'])) {
		 $adminRole = $_POST['myAdmin'];

		 if (isset($_POST['id'])) {
		 	$adminRoleId = $_POST['id'];
		 }
		 

		 if ($adminRole == "Super Admin") {
		 			$sqlSAdmin = "UPDATE admin_user SET AU_Role = '{$adminRole}' WHERE AU_Id = '{$adminRoleId}' ";
					$resultSAdmin = myQuery($sqlSAdmin);
					if ($resultSAdmin){
						Echo "Promoted To Super Admin.";
					}else{
						echo "Error is Occured.";
					}
		 }


		 else if ($adminRole == "Admin") {
		 			$sqlAdmin = "UPDATE admin_user SET AU_Role = '{$adminRole}' WHERE AU_Id = '{$adminRoleId}' ";
					$resultAdmin = myQuery($sqlAdmin);
					if ($resultAdmin){
						Echo "Promoted To Admin.";
					}else{
						echo "Error is Occured.";
				}
		 }
	}
}




function changeAdminStatus(){
		if (isset($_POST['adminStatus'])) {
		 $adminStatus = $_POST['adminStatus'];
		 if (isset($_POST['id'])) {
		 	$adminStatusId = $_POST['id'];
		 }
		 

		 		 if ($adminStatus == "Active Admin") {
		 			$sql = "UPDATE admin_user SET AU_AcountStatus = 1 WHERE AU_Id = '{$adminStatusId}' ";
					$result = myQuery($sql);
					if ($result){
						Echo "Admin Activated.";
					}else{
						Echo "Error is Occured.";
					}
		 }


		 else if ($adminStatus == "De-Active Admin") {
		 			$sql = "UPDATE admin_user SET AU_AcountStatus = 0 WHERE AU_Id = '{$adminStatusId}' ";
					$result = myQuery($sql);
					if ($result){
						Echo "Admin De-Activated.";
					}else{
						Echo "Error is Occured.";
					}
				 }
			}
}



function updateAdmin(){
	if (isset($_POST['updateMyAdmin'])) {
		$myUpdateId 		= getCleanInput($_POST['myUpdateId']);
		$updateName 		= getCleanInput($_POST['adminName']);
		$updateDob 			= getCleanInput($_POST['adminDOB']);
		$updatePhone 		= getCleanInput($_POST['adminPhone']);
		$updateProvince 	= getCleanInput($_POST['adminProvince']);
		$updateCity 		= getCleanInput($_POST['adminCity']);
		$updateDistrict 	= getCleanInput($_POST['adminDistrict']);
		$updateAddress 		= getCleanInput($_POST['adminAddress']);

		$adminImg	    = $_FILES['adminImage']['name'];
	 	$adminImgtype	= $_FILES['adminImage']['type'];
	 	$adminImgTmp	= $_FILES['adminImage']['tmp_name'];



	 	$sqlImg = "SELECT AU_Image FROM admin_user WHERE AU_Id = '{$myUpdateId}' ";
			$resultImg  = myQuery($sqlImg);
			$rowImg 	= myFetchArray($resultImg);
			$dbImage 	= $rowImg['AU_Image'];

		if (empty($adminImg)) {
			$oldImgPath = $dbImage;

			$sql = "UPDATE admin_user SET AU_Name = '{$updateName}', AU_DOB = '{$updateDob}', P_Name = '{$updateProvince}', C_Name = '{$updateCity}', D_Name = '{$updateDistrict}',  AU_Address = '{$updateAddress}', AU_Phone = '{$updatePhone}', AU_Image = '{$oldImgPath}' WHERE AU_Id = '{$myUpdateId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				Echo "Profile Updated.";
			}
			
		}else{
			$ext = explode(".", $adminImg);
	 		$ext = end($ext);
	 		$newImgName = date("ymd")."_".time() .".".$ext;
	 		$Path = "images/admin/";
	 		$newImgPath = $Path.basename($newImgName);

	 	if (move_uploaded_file($adminImgTmp, $newImgPath)) {
	 	$sql = "UPDATE admin_user SET AU_Name = '{$updateName}', AU_DOB = '{$updateDob}', P_Name = '{$updateProvince}', C_Name = '{$updateCity}', D_Name = '{$updateDistrict}', AU_Address = '{$updateAddress}', AU_Phone = '{$updatePhone}', AU_Image = '{$newImgPath}' WHERE AU_Id = '{$myUpdateId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				if (!empty($dbImage)) {
					unlink($dbImage); 
				}
				
				Echo "Profile Updated.";
				}
	 		
	 		}

		}
	}
}

function changePassword(){
	if (isset($_POST['myPass'])) {

		$myError = "";
			$myId = getCleanInput($_POST['changeId']);
			$myOldPassword     = getCleanInput($_POST['oldPassword']);
			$myNewPassword 	   = getCleanInput($_POST['newPassword']);
			$myConfirmPassword = getCleanInput($_POST['newPasswordConfirm']);
			

			$myOldPassword   =  myCrypt($myOldPassword);
			$newPassword   =  myCrypt($myNewPassword);

			$adminDetail = adminAcountDataById($myId);

			foreach ($adminDetail as $key => $row) {
				  $dbPassword 	 = $row['AU_Password'];
				  $dbOldPassword = $row['AU_OldPassword'];
			}			
		
			if ($myOldPassword != $dbPassword) {
					$myError = "Old Password Didn't Match. Enter Correct Old Password.";
			}else if ($newPassword == $dbPassword) {
					$myError = "New Password Match With Current Password. Please Enter New Password.";
			}else if ($newPassword == $dbOldPassword) {
					$myError = "You Have Used This Password. Please Enter Password That is Never Used. ";
			}


			if (!empty($myError)) {
				echo $myError;
			}else{
				$sql = "UPDATE admin_user SET AU_Password = '{$newPassword}', AU_OldPassword = '{$myOldPassword}' WHERE AU_Id = '{$myId}' ";
				$result = myQuery($sql);
				$confirm = confirmQuery($result);
				if ($confirm) {
					echo "Password Changed.";
				}else{
					echo "Error While Changing Password.";
				}
			}


	}
}


function loggedIn(){
		if (isset($_SESSION['AU_Email']) || isset($_COOKIE['AU_Email'])) {
				return true;
	}
	else{
		return false;
	}
}



function token_generator(){
	$token = $_SESSION['token']=md5(uniqid(mt_rand(), true));
	return $token;
}

function send_email($email, $subject, $msg, $header){
	
	return mail($email, $subject, $msg, $header);
}




function checkForgotEmail(){
	if (isset($_POST['forgotPassword'])) {
		
			if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']){

			$a_email = getCleanInput($_POST['myAdminEmail']);
			
			if(emailAcountExist($a_email))
			{
				$validation = validationCode($a_email);
				
				
				$sql="UPDATE admin_user SET AU_SecurityCode ='{$validation}' WHERE AU_Email ='{$a_email}' ";
				$result=myQuery($sql);
				confirmQuery($result);
				
				$subject = "Reset Your Password";
				$msg = "Here Is Your Code : $validation

				Click On the Link Given Below to reset Your Account password

				 http://localhost/finding hope/admin/code.php?email=$a_email&code=$validation";
			
				$header ="From: noreply@findinghope.com";
				
						if(send_email($a_email, $subject, $msg, $header)){

						echo "Your Validation Code Has Been Send to Your Email. Check your Email Please.";
						
						}
						else{	

							echo "Server breakdown";
						}
	
			}else if (empty($a_email)){
				echo "please Enter Your Email";
			}
			else {
			echo "SORRY! This email does not exist";	
			}
		}
				
	}
}





function verifyCode(){
	if(isset($_POST['resetPassword'])){
			

		 $a_email     		= getCleanInput($_POST['aEmail']);
		 $validation   		= getCleanInput($_POST['aCode']);
	     $validationEnter 	= getCleanInput($_POST['enterCode']);
							
							$myCode = adminAcountCode($a_email);

							if (sizeof($myCode) == 1) {
						 		foreach ($myCode as $key => $row) {
								
								$dbCode = $row['AU_SecurityCode'];
							}
							


						if($validation == $validationEnter && $dbCode == $validationEnter){		
							$sql = "SELECT AU_Id FROM admin_user WHERE AU_Email = '{$a_email}' AND AU_SecurityCode = '{$validationEnter}' ";
							$result=myQuery($sql);
							if(myNumRowsCount($result) == 1){
							 echo "resetAdminPassword.php?email=$a_email&code=$validationEnter";
						}

					}
				
				} else{
					echo 0;
			}
	}
}

function resetAdminPassword(){
	if (isset($_POST['recoverPassword'])) {

		if(isset($_SESSION['token']) && isset($_POST['token'])) {

		
			if(isset($_POST['myEmail']) && isset($_POST['myCode'])){
				
				$email 		 = getCleanInput($_POST['myEmail']);
				$code    	 = getCleanInput($_POST['myCode']);
				$newPass 	 = getCleanInput($_POST['newPass']);
				$confirmPass = getCleanInput($_POST['newPass']);

					$myCode = adminAcountCode($email);
							foreach ($myCode as $key => $row) {
								$dbCode = $row['AU_SecurityCode'];
							}

								
				if ($_POST['token'] === $_SESSION['token']){
				
				 if ($code === $dbCode){

					if($newPass === $confirmPass){
						$newPass = myCrypt($newPass);
							$sql="UPDATE admin_user SET AU_Password = '{$newPass}',AU_OldPassword = '', AU_SecurityCode = '' WHERE AU_Email = '{$email}' AND AU_SecurityCode = '{$code}' ";
			 			 $result= myQuery($sql);
			 			 $confirm = confirmQuery($result);
			 			 if ($confirm) {
			 			 	echo "Password Recover Process Complete. You Can Use Your New Password.";
			 			 }

					}
			}
		}
			}
			}
		
	}

	
	}



/* Cases Php Code */


 function getSpicificCase($id){

	$caseImgData= array();

	$sql = "SELECT * FROM missing_cases WHERE MC_Id='{$id}'";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {

		$caseImgDataRow['MC_ImageLoc']			=  $row['MC_ImageLoc'];

		array_push($caseImgData, $caseImgDataRow);
	}
	return $caseImgData;

 }


function getMissingCases(){

	$caseData= array();

	$sql = "SELECT * FROM missing_cases";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {
		$caseDataRow['MC_Id']				=  $row['MC_Id'];
		$caseDataRow['MC_Name']				=  $row['MC_Name'];
		$caseDataRow['MC_FName']			=  $row['MC_FName'];
		$caseDataRow['MC_Age']    			=  $row['MC_Age'];
		$caseDataRow['MC_Gender']			=  $row['MC_Gender'];
		$caseDataRow['MC_EyeColor']			=  $row['MC_EyeColor'];
		$caseDataRow['MC_HairColor']		=  $row['MC_HairColor'];
		$caseDataRow['MC_MHealth']    		=  $row['MC_MHealth'];
		$caseDataRow['MC_Disability']		=  $row['MC_Disability'];
		$caseDataRow['MC_IdenMark']			=  $row['MC_IdenMark'];
		$caseDataRow['P_Name']				=  $row['P_Name'];
		$caseDataRow['C_Name']   			=  $row['C_Name'];
		$caseDataRow['D_Name']				=  $row['D_Name'];
		$caseDataRow['MC_ImageLoc']			=  $row['MC_ImageLoc'];
		$caseDataRow['MC_CurrentStatus']	=  $row['MC_CurrentStatus'];
		$caseDataRow['MC_ReporterName']		=  $row['MC_ReporterName'];
		$caseDataRow['MC_RRelation']    	=  $row['MC_RRelation'];
		$caseDataRow['MC_RPhone']			=  $row['MC_RPhone'];
		$caseDataRow['MC_RAddress1']		=  $row['MC_RAddress1'];
		$caseDataRow['MC_RAddress2']		=  $row['MC_RAddress2'];
		$caseDataRow['MC_RCInfo']			=  $row['MC_RCInfo'];
		$caseDataRow['MC_ReporterEmail']	=  $row['MC_ReporterEmail'];
		$caseDataRow['MC_CaseStatus']    	=  $row['MC_CaseStatus'];
		$caseDataRow['MC_Date']    			=  $row['MC_Date'];
		
		array_push($caseData, $caseDataRow);
	}
	return $caseData;
}




function verifyCase(){
	if (isset($_POST['verifyCase'])) {
		$verifyId = $_POST['id'];
		$sql = "UPDATE missing_cases SET MC_CaseStatus = 'Verifeid' WHERE MC_Id = '{$verifyId}'";
		$result = myQuery($sql);
		if ($result) {
			Echo "Case Verifeid & Published.";
		}else{
			echo "Error is Occured.";
		}
	}

}

function unVerifyCase(){
	if (isset($_POST['unVerifyCase'])) {
		$unVerifyId = $_POST['id'];
		$sql = "UPDATE missing_cases SET MC_CaseStatus = 'Un-Verifeid' WHERE MC_Id = '{$unVerifyId}'";
		$result = myQuery($sql);
		if ($result) {
			echo "Case has been Un-Verifeid";
		}else{
			echo "Error is Occured.";
		}
	}

}

function deleteCase(){
	if (isset($_POST['deleteCase'])) {
		$deleteId = $_POST['id'];

		$getRecord = getSpicificCase($deleteId);
		foreach ($getRecord as $key => $row) {
			$image = "../".$row['MC_ImageLoc'];
		}
		if (unlink($image)) {
			
			$sql = "DELETE FROM missing_cases WHERE MC_Id='{$deleteId}'";
			$result = myQuery($sql);
				deleteCaseFinders($deleteId);
			if ($result) {
				echo "Case Deleted";
			}

		}else{
			echo "Case can't be deleted due to some Error.";
		}

	}

}


function deleteCaseFinders($caseId){
	
			$sql = "DELETE FROM finders WHERE MC_Id='{$caseId}'";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				return true;
			}

		else{
			return false;
		}
	}





/* Blog Section Php Code */

function getBlogPost(){

	$blogData= array();

	$sql = "SELECT * FROM blog";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {
		$blogDataRow['B_Id']				=  $row['B_Id'];
		$blogDataRow['B_Title']				=  $row['B_Title'];
		$blogDataRow['AU_Id']				=  $row['AU_Id'];
		$blogDataRow['B_FImage']			=  $row['B_FImage'];
		$blogDataRow['B_Content']    		=  $row['B_Content'];
		$blogDataRow['B_Date']				=  $row['B_Date'];
		$blogDataRow['B_Status']			=  $row['B_Status'];	
	
		array_push($blogData, $blogDataRow);
	}
	return $blogData;
}





function insertBlogPost(){
	if (isset($_POST['postSubmit'])) {
			$pTitle    	= getCleanInput($_POST['postTitle']);
	 		$pStatus    = getCleanInput($_POST['postStatus']);
			$pContent  	= getCleanInput($_POST['postContent']);

			$pImg		= $_FILES['postImg']['name'];
	 		$pImgtype	= $_FILES['postImg']['type'];
	 		$pImgTmp	= $_FILES['postImg']['tmp_name'];
	 		
	 		$adminId    = $_SESSION['AU_Id'];



	 		$ext = explode(".", $pImg);
	 		$ext = end($ext);
	 		$pImgNew = date("ymd")."_".time() .".".$ext;
	 		$Path = "images/blog/";
	 		$pImgPath = $Path.basename($pImgNew);

	 		$date = date("d-M-Y");

	 	if (move_uploaded_file($pImgTmp, $pImgPath)) {
	 		$sql = "INSERT INTO blog(B_Title, AU_Id, B_FImage, B_Content, B_Date, B_Status)";
	 					

	 		$sql .="VALUES('{$pTitle}', '{$adminId}', '{$pImgPath}', '{$pContent}', '{$date}', '{$pStatus}')";

	 		$result = myQuery($sql);

	 		$confirm = confirmQuery($result);

	 		if ($confirm) {
	 			echo "Post Created.";
	 		}

	 	}

	 	else{
	 		Echo "Error Occured.";
	 	}
	

	}
}


function updateBlogPost(){
	if (isset($_POST['postUpdate'])) {
		$myUpdateId 		= getCleanInput($_POST['myUpdateId']);
		$updatePostTitle 	= getCleanInput($_POST['postUpTitle']);
		$updatePostStatus 	= getCleanInput($_POST['postUpStatus']);
		$updatePostContent	= getCleanInput($_POST['postUpContent']);
		

		$updatePostImg	    = $_FILES['postUpImg']['name'];
	 	$updatePostImgType	= $_FILES['postUpImg']['type'];
	 	$updatePostImgTmp	= $_FILES['postUpImg']['tmp_name'];



	 	$sqlImg = "SELECT B_FImage FROM blog WHERE B_Id = '{$myUpdateId}' ";
			$resultImg  = myQuery($sqlImg);
			$rowImg 	= myFetchArray($resultImg);
			$dbImage 	= $rowImg['B_FImage'];

		if (empty($updatePostImg)) {
			$oldPostImgPath = $dbImage;

			$sql = "UPDATE blog SET B_Title = '{$updatePostTitle}', B_Status = '{$updatePostStatus}', B_FImage = '{$oldPostImgPath}', B_Content = '{$updatePostContent}'  WHERE B_Id = '{$myUpdateId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				Echo "Profile Updated.";
			}
			
		}else{
			$ext = explode(".", $updatePostImg);
	 		$ext = end($ext);
	 		$newPostImgName = date("ymd")."_".time() .".".$ext;
	 		$Path = "images/blog/";
	 		$newPostImgPath = $Path.basename($newPostImgName);

	 	if (move_uploaded_file($updatePostImgTmp, $newPostImgPath)) {
	 		$sql = "UPDATE blog SET B_Title = '{$updatePostTitle}', B_Status = '{$updatePostStatus}', B_FImage = '{$newPostImgPath}', B_Content = '{$updatePostContent}'  WHERE B_Id = '{$myUpdateId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				if (!empty($dbImage)) {
					unlink($dbImage); 
				}
				
				Echo "Profile Updated.";

			}
	 		
	 		}

		}

	}
}


 function getSpicificPost($id){

	$blogImgData= array();

	$sql = "SELECT * FROM blog WHERE B_Id='{$id}'";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {

		$blogImgDataRow['B_FImage']	=  $row['B_FImage'];

		array_push($blogImgData, $blogImgDataRow);
	}
	return $blogImgData;

 }

 function getAdminPost($id){

	$blogImgData= array();

	$sql = "SELECT * FROM blog WHERE AU_Id='{$id}'";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {

		$blogImgDataRow['B_FImage']	=  $row['B_FImage'];

		array_push($blogImgData, $blogImgDataRow);
	}
	return $blogImgData;

 }




function changeBlogStatus(){
		if (isset($_POST['blogStatus'])) {
		 $blogStatus = $_POST['blogStatus'];
		 $blogStatusId = $_POST['id'];

		 		 if ($blogStatus == "Published Post") {
		 			$sql = "UPDATE blog SET B_Status = 'Published' WHERE B_Id = '{$blogStatusId}' ";
					$result = myQuery($sql);
					if ($result){
						Echo "Post Published.";
					}else{
						Echo "Error is Occured.";
					}
		 }


		 else if ($blogStatus == "Draft Post") {
		 			$sql = "UPDATE blog SET B_Status = 'Draft' WHERE B_Id = '{$blogStatusId}' ";
					$result = myQuery($sql);
					if ($result){
						Echo "Post Placed in Draft.";
					}else{
						Echo "Error is Occured.";
					}
				 }
			}
}



function deletePost(){
	
	if (isset($_POST['deletePost'])) {
		$deleteId = $_POST['id'];

		$getPost = getSpicificPost($deleteId);
		foreach ($getPost as $key => $row) {
			$image = $row['B_FImage'];
		}
		if (unlink($image)) {
			
			$sql = "DELETE FROM blog WHERE B_Id='{$deleteId}'";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				echo "Post Deleted";
			}

		}else{
			echo "Post can't be deleted due to some Error.";
		}

	}

}

function deleteAdminPost($adminId){
	

		$getPost = getAdminPost($adminId);
		foreach ($getPost as $key => $row) {
			$image = $row['B_FImage'];

		unlink($image);
		}


		
			
			$sql = "DELETE FROM blog WHERE AU_Id = '{$adminId}'";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				return true;
			}

		else{
			return false;
		}
}





function confirmQuery($result){
   
    global $myConnection;
   
    if (!$result){

        die('QUERY FAILED.' . mysqli_error($myConnection));
      return false;
   		 }

    else{
    	return true;
    }

}


/* News Section Php Code */






function getNews(){

	$newsData= array();

	$sql = "SELECT * FROM news";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {
		$newsDataRow['N_Id']				=  $row['N_Id'];
		$newsDataRow['N_Title']				=  $row['N_Title'];
		$newsDataRow['N_Content']    		=  $row['N_Content'];
		$newsDataRow['N_Date']				=  $row['N_Date'];
		$newsDataRow['N_Status']			=  $row['N_Status'];	
	
		array_push($newsData, $newsDataRow);
	}
	return $newsData;
}


function insertNews(){
	
	if (isset($_POST['insertNews'])) {
		
			$nTitle    	= getCleanInput($_POST['newsTitle']);
	 		$nStatus    = getCleanInput($_POST['newsStatus']);
			$nContent  	= getCleanInput($_POST['newsContent']);
			


	 		$date = date("d-M-Y");

	 		$sql = "INSERT INTO news(N_Title, N_Content, N_Date, N_Status)";
	 					

	 		$sql .="VALUES('{$nTitle}', '{$nContent}', '{$date}', '{$nStatus}')";

	 		$result = myQuery($sql);

	 		$confirm = confirmQuery($result);

	 		if ($confirm) {
	 			echo "News Added.";
	 		} else{
	 		echo "Error Occured.";
	 	}

	}
}



function updateNews(){
	if (isset($_POST['newsUpdate'])) {
		$myUpdateId 		= getCleanInput($_POST['myUpdateId']);
		$updateTitle 		= getCleanInput($_POST['newsUpTitle']);
		$updateStatus 		= getCleanInput($_POST['newsUpStatus']);
		$updateContent 		= getCleanInput($_POST['newsUpContent']);
	

			$sql = "UPDATE news SET N_Title = '{$updateTitle}', N_Status = '{$updateStatus}', N_Content = '{$updateContent}' WHERE N_Id = '{$myUpdateId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				Echo "News Updated.";
			}
			
		
	 		
 	}

}





function changeNewsStatus(){

		if (isset($_POST['newsStatus'])) {
		
		 $newsStatus = getCleanInput($_POST['newsStatus']);

		 if (isset($_POST['id'])) {
		 	 $newsStatusId = $_POST['id'];
		 }

		

		 		 if ($newsStatus == "Published News") {

		 			$sql = "UPDATE news SET N_Status = 'Published' WHERE N_Id = '{$newsStatusId}' ";

					$result = myQuery($sql);
					if ($result){
						Echo "News Published.";
					}else{
						Echo "Error is Occured.";
					}
		 }


		 else if ($newsStatus == "Draft News") {
		 			$sql = "UPDATE news SET N_Status = 'Draft' WHERE N_Id = '{$newsStatusId}' ";
					$result = myQuery($sql);
					if ($result){
						Echo "News Placed in Draft.";
						}else{
						Echo "Error is Occured.";
						}
			 }
	}
}



function delNews(){
	
	if (isset($_POST['deleteNews'])) {
		$deleteId = $_POST['id'];
			
			$sql = "DELETE FROM news WHERE N_Id='{$deleteId}'";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				echo "News Deleted";
			}else{
			echo "News can't be deleted due to some Error.";
		}
	}
}


function finderVarificationStatus(){
		if (isset($_POST['finderVarification'])) {
		 $finderStatus = $_POST['finderVarification'];
		 $findersStatusCaseId = $_POST['id'];

		 		 if ($finderStatus == "Verify Finder") {
						$sql = "UPDATE finders SET F_Status = 'Verifeid' WHERE MC_Id = '{$findersStatusCaseId}' ";
								$result = myQuery($sql);
								if ($result){
										$sqlMissing = "UPDATE missing_cases SET MC_CurrentStatus = 'Found' WHERE MC_Id = '{$findersStatusCaseId}' ";
										$resultMissing = myQuery($sqlMissing);
										if ($resultMissing) {
											echo "Finder Verified";
										}else{
											echo "Error";
										}
								}else{
									echo "Error is Occured.";
								}
		 }


		 else if ($finderStatus == "Un-Verify Finder") {
		 							$sql = "UPDATE finders SET F_Status = 'Un-Verifeid' WHERE MC_Id = '{$findersStatusCaseId}' ";
								$result = myQuery($sql);
								if ($result){
										$sqlMissing = "UPDATE missing_cases SET MC_CurrentStatus = 'Missing' WHERE MC_Id = '{$findersStatusCaseId}' ";
										$resultMissing = myQuery($sqlMissing);
										if ($resultMissing) {
											echo "Finder Un-Verified";
										}else{
											echo "Error";
										}
								}else{
									echo "Error is Occured.";
								}


				 }


			}
}




function verifyFinder(){
	if (isset($_POST['verifyFinder'])) {
		$verifyFinderId = $_POST['id'];
		$sql = "UPDATE finders SET F_Status = 'Verifeid' WHERE MC_Id = '{$verifyFinderId}' ";
		$result = myQuery($sql);
		if ($result){
				$sqlMissing = "UPDATE missing_cases SET MC_CurrentStatus = 'Found' WHERE MC_Id = '{$verifyFinderId}' ";
				$resultMissing = myQuery($sqlMissing);
				if ($resultMissing) {
					echo "Finder Verified";
				}else{
					echo "Error";
				}
		}else{
			echo "Error is Occured.";
		}
	}

}

function unVerifyFinder(){
	if (isset($_POST['unVerifyFinder'])) {
		$unVerifyFinderId = $_POST['id'];
		$sql = "UPDATE finders SET F_Status = 'Un-Verifeid' WHERE MC_Id = '{$unVerifyFinderId}' ";
		$result = myQuery($sql);
		if ($result){
				$sqlMissing = "UPDATE missing_cases SET MC_CurrentStatus = 'Missing' WHERE MC_Id = '{$unVerifyFinderId}' ";
				$resultMissing = myQuery($sqlMissing);
				if ($resultMissing) {
					echo "Finder Un-Verifeid.";
				}else{
					echo "Error";
				}
		}else{
			echo "Error is Occured.";
		}
	}

}




function delFinder(){
	
	if (isset($_POST['deleteFinder'])) {
		$deleteId = $_POST['id'];
			
			$sql = "DELETE FROM finders WHERE F_Id='{$deleteId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				echo "Finder Deleted";
			}else{
			echo "Finder can't be deleted due to some Error.";
		}
	}
}

function getFinders(){

	$finderData= array();

	$sql = "SELECT * FROM finders";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {
		$finderDataRow['F_Id']				=  $row['F_Id'];
		$finderDataRow['F_Name']			=  $row['F_Name'];
		$finderDataRow['F_Email']			=  $row['F_Email'];
		$finderDataRow['F_Phone']			=  $row['F_Phone'];
		$finderDataRow['F_Province']		=  $row['F_Province'];
		$finderDataRow['F_City']     		=  $row['F_City'];
		$finderDataRow['F_District']		=  $row['F_District'];
		$finderDataRow['F_Address1']		=  $row['F_Address1'];
		$finderDataRow['F_Address2']		=  $row['F_Address2'];
		$finderDataRow['MC_Id']				=  $row['MC_Id'];
		$finderDataRow['F_Status']			=  $row['F_Status'];
	
		array_push($finderData, $finderDataRow);
	}
	return $finderData;
}





function changeMyTheme(){
	if (isset($_POST['changeTheme'])) {
		$changeTheme = getCleanInput($_POST['myTheme']);
        $sqlUn = "SELECT * FROM themes WHERE T_Status = 'Selected' ";
        $resultUn  = myQuery($sqlUn);
        $row =myFetchArray($resultUn);
        $unSelectTheme = $row['T_File'];

        $sqlUn2 = "UPDATE themes SET T_Status = 'Un-Selected' WHERE T_File = '{$unSelectTheme}' ";
        $resultUn2 = myQuery($sqlUn2);
  

  if (confirmQuery($resultUn2)) {

        $sqlSe = "UPDATE themes SET T_Status = 'Selected' WHERE T_File = '{$changeTheme}' ";
        $resultSe = myQuery($sqlSe);
        if ($resultSe) {
            echo "Theme Change Successfully.";
        }
    }
	}
}




function getMessages(){

	$messageData= array();

	$sql = "SELECT * FROM messages";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {
		$messageDataRow['M_Id']				=  $row['M_Id'];
		$messageDataRow['S_Name']			=  $row['S_Name'];
		$messageDataRow['S_Email']			=  $row['S_Email'];
		$messageDataRow['S_Subject']		=  $row['S_Subject'];
		$messageDataRow['S_Message']		=  $row['S_Message'];
		$messageDataRow['M_Date']			=  $row['M_Date'];
		$messageDataRow['M_Reply']			=  $row['M_Reply'];
		$messageDataRow['M_Status']			=  $row['M_Status'];
		$messageDataRow['R_Status']			=  $row['R_Status'];
		
		array_push($messageData, $messageDataRow);
	}
	return $messageData;
}


function getSpecificMessages($id){

	$messageData= array();

	$sql = "SELECT * FROM messages WHERE M_ID = '{$id}' ";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {
		$messageDataRow['M_Id']				=  $row['M_Id'];
		$messageDataRow['S_Name']			=  $row['S_Name'];
		$messageDataRow['S_Email']			=  $row['S_Email'];
		$messageDataRow['S_Subject']		=  $row['S_Subject'];
		$messageDataRow['S_Message']		=  $row['S_Message'];
		$messageDataRow['M_Date']			=  $row['M_Date'];
		$messageDataRow['R_Status']			=  $row['R_Status'];
		
		array_push($messageData, $messageDataRow);
	}
	return $messageData;
}

function delMessage(){
	
	if (isset($_POST['deleteMessage'])) {
		$deleteId = $_POST['id'];
			
			$sql = "DELETE FROM messages WHERE M_Id='{$deleteId}'";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				echo "Message Deleted";
			}else{
			echo "Message can't be deleted due to some Error.";
		}
	}
}

function seenMessage($id){
	
			
			$sql = "UPDATE messages SET M_Status = 'Seen' WHERE M_Id='{$id}'";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);

}


function messageReply(){

	if (isset($_POST['myMessageReply'])) {
		
		$replyId      = getCleanInput($_POST['replyId']);
		$replyMessage = getCleanInput($_POST['replyMessage']);

		$getSenderEmail = getSpecificMessages($replyId);
 
		foreach ($getSenderEmail as $key => $row) {

		 $senderSub   = $row['S_Subject'];
		 $senderEmail = $row['S_Email'];

		}

		$header ="From: noreply@findinghope.com";

		send_email($senderEmail, $senderSub, $replyMessage, $header);

		$sqlReply = "UPDATE messages SET M_Reply = '{$replyMessage}', R_Status = 'Replied' WHERE M_Id = '{$replyId}' ";

		$result = myQuery($sqlReply);

		$confirm = confirmQuery($result);
		
		if ($confirm) {
			Echo "Message Replied.";
		}

	}
}





//Gallery Function
//Create New Album

function insertAlbum(){
	if (isset($_POST['albumCreate'])) {
			$aName    	= getCleanInput($_POST['albumName']);
	 		$aStatus    = getCleanInput($_POST['albumStatus']);
			$aSubheading  	= getCleanInput($_POST['albumSub']);

			$aImg		= $_FILES['albumImg']['name'];
	 		$aImgtype	= $_FILES['albumImg']['type'];
	 		$aImgTmp	= $_FILES['albumImg']['tmp_name'];

	 		$ext = explode(".", $aImg);
	 		$ext = end($ext);
	 		$aImgNew = date("ymd")."_".time() .".".$ext;
	 		$Path = "images/album/";
	 		$aImgPath = $Path.basename($aImgNew);

	 		$date = date("d-M-Y");

	 	if (move_uploaded_file($aImgTmp, $aImgPath)) {
	 		$sql = "INSERT INTO gallery_album(GA_Name, GA_SubHeading, GA_FImage, GA_Status)";
	 					

	 		$sql .="VALUES('{$aName}', '{$aSubheading}', '{$aImgPath}', '{$aStatus}' )";

	 		$result = myQuery($sql);

	 		$confirm = confirmQuery($result);

	 		if ($confirm) {
	 			echo "Album Created.";
	 		}

	 	}

	 	else{
	 		Echo "Error Occured.";
	 	}
	

	}
}



// Get album Data

function getAlbums(){

	$galleryData= array();

	$sql = "SELECT * FROM gallery_album";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {
		$galleryDataRow['GA_Id']			=  $row['GA_Id'];
		$galleryDataRow['GA_Name']			=  $row['GA_Name'];
		$galleryDataRow['GA_SubHeading']	=  $row['GA_SubHeading'];
		$galleryDataRow['GA_FImage']		=  $row['GA_FImage'];
		$galleryDataRow['GA_Status']		=  $row['GA_Status'];
		
		array_push($galleryData, $galleryDataRow);
	}
	return $galleryData;
}


function getAlbumImg($albumId){

	$imgData= array();

	$sql = "SELECT * FROM album_images WHERE Img_AlbumId = '{$albumId}' ";
	$result = myQuery($sql);

	while ($row = myFetchArray($result)) {
		$imgDataRow['Img_Id']				=  $row['Img_Id'];
		
		$imgDataRow['Img_ImgLoc']			=  $row['Img_ImgLoc'];

		
		array_push($imgData, $imgDataRow);
	}
	return $imgData;
}




// add picture to album

function addAlbumImage(){
	if (isset($_POST['addImage'])) {
			$albumId    	= getCleanInput($_POST['imageAlbum']);


			$albumImg		= $_FILES['imgAlbum']['name'];
	 		$albumImgtype	= $_FILES['imgAlbum']['type'];
	 		$albumImgTmp	= $_FILES['imgAlbum']['tmp_name'];

	 		$ext = explode(".", $albumImg);
	 		$ext = end($ext);
	 		$albumImgNew = date("ymd")."_".time() .".".$ext;
	 		$Path = "images/album/";
	 		$albumImgPath = $Path.basename($albumImgNew);

	 		$date = date("d-M-Y");

	 	if (move_uploaded_file($albumImgTmp, $albumImgPath)) {
	 		$sql = "INSERT INTO album_images(img_AlbumId, Img_ImgLoc)";
	 		$sql .="VALUES('{$albumId}', '{$albumImgPath}')";
	 		$result = myQuery($sql);
	 		$confirm = confirmQuery($result);

	 		if ($confirm) {
	 			echo "Picture Added in Album.";
	 		}

	 	}

	 	else{
	 		Echo "Error Occured.";
	 	}

	}
}



// Published or Un-Published Album

function changeAlbumStatus(){
		if (isset($_POST['albumStatus'])) {

		 $albumStatus = $_POST['albumStatus'];

		 if (isset($_POST['id'])) {
		 	 $albumStatusId = getCleanInput($_POST['id']);
		 }

		

		 		 if ($albumStatus == "Published Album") {
						$sql = "UPDATE gallery_album SET GA_Status = 'Published' WHERE GA_Id = '{$albumStatusId}' ";
								$result = myQuery($sql);
								$confirm = confirmQuery($result);
								if ($confirm) {
									echo "Album Published";
								}
								else{
									echo "Error is Occured.";
								}
		 
}

		 else if ($albumStatus == "Un-Published Album") {

								$sql = "UPDATE gallery_album SET GA_Status = 'Un-Published' WHERE GA_Id = '{$albumStatusId}' ";
								$result = myQuery($sql);
								$confirm = confirmQuery($result);
								if ($confirm) {
									echo "Album Un-Published";
								}
								else{
									echo "Error is Occured.";
								}
}


				 }


	}



function updateAlbum(){
	if (isset($_POST['albumUpdate'])) {
		$myUpdateId 		= getCleanInput($_POST['albumUpdateId']);
		$updateName 		= getCleanInput($_POST['upAlbumName']);
		$updateSub			= getCleanInput($_POST['upAlbumSub']);
		$updateAlbumStatus 	= getCleanInput($_POST['upAlbumStatus']);
		
		

		$updateAlbumImg	    = $_FILES['upAlbumImg']['name'];
	 	$updateAlbumImgType	= $_FILES['upAlbumImg']['type'];
	 	$updateAlbumImgTmp	= $_FILES['upAlbumImg']['tmp_name'];



	 	$sqlImg = "SELECT GA_FImage FROM gallery_album WHERE GA_Id = '{$myUpdateId}' ";
			$resultImg  = myQuery($sqlImg);
			$rowImg 	= myFetchArray($resultImg);
			$dbImage 	= $rowImg['GA_FImage'];

		if (empty($updateAlbumImg)) {
			$oldAlbumImgPath = $dbImage;

			$sql = "UPDATE gallery_album SET GA_Name = '{$updateName}', GA_SubHeading = '{$updateSub}', GA_Status = '{$updateAlbumStatus}', GA_FImage = '{$oldAlbumImgPath}' WHERE GA_Id = '{$myUpdateId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				Echo "Album Updated.";
			}
			
		}else{
			$ext = explode(".", $updateAlbumImg);
	 		$ext = end($ext);
	 		$newAlbumImgName = date("ymd")."_".time() .".".$ext;
	 		$Path = "images/album/";
	 		$newAlbumImgPath = $Path.basename($newAlbumImgName);

	 	if (move_uploaded_file($updateAlbumImgTmp, $newAlbumImgPath)) {
	 		$sql = "UPDATE gallery_album SET GA_Name = '{$updateName}', GA_SubHeading = '{$updateSub}', GA_Status = '{$updateAlbumStatus}', GA_FImage = '{$newAlbumImgPath}' WHERE GA_Id = '{$myUpdateId}' ";
	 	
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				if (!empty($dbImage)) {
					unlink($dbImage); 
				}
				
				Echo "Album Updated.";

			}
	 		
	 	}

		}

	}
}


function deleteAlbum(){
  if (isset($_POST['deleteAlbum'])) {
  $deleteAlbumId = $_POST['id'];

    $sql = "SELECT GA_FImage FROM gallery_album WHERE GA_Id = '{$deleteAlbumId}' ";
    $result = myQuery($sql);
    $row = myFetchArray($result);
    $albumDeletePath = $row['GA_FImage'];

	if (unlink($albumDeletePath)) {
      $sql2  = "DELETE FROM gallery_album WHERE GA_Id = '{$deleteAlbumId}'";
      $result2 = myQuery($sql2);
      if ($result2) {
            deleteAlbumImages($deleteAlbumId);
            
            echo "Album has been successfully deleted.";     
         }
     }

   }
}





function deleteAlbumImages($myAlbumId){
	

		$getImgs = getAlbumImg($myAlbumId);
		foreach ($getImgs as $key => $row) {
			$image = $row['Img_ImgLoc'];

			unlink($image);

			}
			
			$sql = "DELETE FROM album_images WHERE Img_AlbumId = '{$myAlbumId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				return true;
			}else{
			return false;
		}
		}







?>