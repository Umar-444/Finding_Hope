<?php


function redirect($location){
	return header("location: {$location}");
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


function getcurrentpagename()
{
    return basename($_SERVER['PHP_SELF']);
}




function errorMessage($errorMessage){
    $errorMessage = <<<DELIMITER
  <div class="alert alert-danger col-md-4 alert-dismissable mx-auto">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> $errorMessage
</div>
DELIMITER;

return $errorMessage;
}


function getCurrentPage(){
	return basename($_SERVER['PHP_SELF']);
}


function getEncrptedPassword($myPassword){
	return md5($myPassword);
}

function emailAcountExist($email){

	$sql = "SELECT User_Id FROM users WHERE U_Email = '{$email}'";
	$result = myQuery($sql);

	if (myNumRowsCount($result) == 1 ) {
		return true;
	}else{
		return false;
	}

}

function signUpUser($name, $email, $password){
	
	$sql = "INSERT INTO users(U_Name, U_Email, U_Password)";
	$sql .= "VALUES('{$name}', '{$email}', '{$password}' )";
	$result = myQuery($sql);

	if ($result) {
		return true;
	}else{
		return false;
	}
}


function userAcountData($userEmail){
	$userData = array();

	$sql = "SELECT U_Email,U_Password,U_OldPassword FROM users WHERE U_Email = '{$userEmail}'";
	$result= myQuery($sql); 
	while ($row = myFetchArray($result)){

		$userDataRow['U_Email']        = $row['U_Email'];
	 	$userDataRow['U_Password']     = $row['U_Password'];
		$userDataRow['U_OldPassword']  = $row['U_OldPassword'];

		array_push($userData,$userDataRow);
	}
	return $userData;
}



function userAcountScode($userEmail){
	$userCode = array();

	$sql = "SELECT U_SecurityCode FROM users WHERE U_Email = '{$userEmail}' ";
	$result= myQuery($sql); 
	while ($row = myFetchArray($result)){
		$userCodeRow['U_SecurityCode']  = $row['U_SecurityCode'];

		array_push($userCode,$userCodeRow);
	}
	return $userCode;
}


function userloggedIn(){
		if (isset($_SESSION['U_Email']) || isset($_COOKIE['U_Email'])) {
				return true;
	}
	else{
		return false;
	}
}

function myUserLogin($email, $password, $remmember){

	$sql = "SELECT * FROM users WHERE U_Email = '{$email}' ";
	$result = myQuery($sql);
	if (myNumRowsCount($result) == 1){
		$row = myFetchArray($result);

		$dbId	 		= $row['User_Id'];
		$dbName 		= $row['U_Name'];
		$dbEmail 		= $row['U_Email'];
		$dbPassword 	= $row['U_Password'];

		if ($email == $dbEmail && $password == $dbPassword ) {

				if ($remmember == "RemmemberMe") {
                        setcookie('U_Email', $dbEmail, time() + 1200);                                    
                       }
		
			$_SESSION['User_Id'] = $dbEmail;
			$_SESSION['U_Name'] = $dbName;
			$_SESSION['U_Email'] = $dbEmail;
			$_SESSION['User_TOKEN'] = md5($dbId . $dbEmail . $dbPassword);
			
			return true;
		}
		return true;
	}
	else{
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

function token_generator(){
	$token = $_SESSION['token']=md5(uniqid(mt_rand(), true));
	return $token;
}

function send_email($email, $subject, $msg, $header){
	
	return mail($email, $subject, $msg, $header);
}




function checkForgotUserEmail(){
	if (isset($_POST['forgotPassword'])) {
		
			if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']){

			$u_email = getCleanInput($_POST['myUserEmail']);
			
			if(emailAcountExist($u_email))
			{
				echo $validation = validationCode($u_email);
				
				// setcookie('access_code', $validation, time()+86400);
				
				
				$sql="UPDATE users SET U_SecurityCode ='{$validation}' WHERE U_Email ='{$u_email}' ";
				$result=myQuery($sql);
				confirmQuery($result);
				
				$subject = "Reset Your Password";
				$msg = "Here Is Your Code : $validation
				Click On the Link Given Below to reset Your Account password

				 http://localhost/finding hope/code.php?email=$u_email&code=$validation";
			
				$header ="From: noreply@findinghope.com";
				
						if(send_email($u_email, $subject, $msg, $header)){

						echo "Your Validation Code Has Been Send to Your Email. Check your Email.";
						
						}
						else{	

							echo "Server breakdown";
						}
	
			}else if (empty($u_email)){
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
			

		 $u_email     		= getCleanInput($_POST['uEmail']);
		 $validation   		= getCleanInput($_POST['uCode']);
	     $validationEnter 	= getCleanInput($_POST['enterCode']);

	     $myCode = userAcountScode($u_email);
			if (sizeof($myCode) == 1) {
				foreach ($myCode as $key => $row) {
					$dbCode = $row['U_SecurityCode'];
				}
			
						if($validation == $validationEnter && $validationEnter == $dbCode){	

							$sql = "SELECT User_Id FROM users WHERE U_Email = '{$u_email}' AND U_SecurityCode = '{$validationEnter}' ";
							$result = myQuery($sql);
							
							if(myNumRowsCount($result) == 1){

							 echo "resetUserPassword.php?email=$u_email&code=$validationEnter";
								}

					}
					}else{
										echo 0;
					}
				}
			}



function resetUserPassword(){
	if (isset($_POST['recoverPassword'])) {

		if(isset($_SESSION['token']) && isset($_POST['token'])) {

		
			if(isset($_POST['myEmail']) && isset($_POST['myCode'])){
				
				$email = getCleanInput($_POST['myEmail']);
				$code = getCleanInput($_POST['myCode']);
				$newPass = getCleanInput($_POST['newPass']);
				$confirmPass = getCleanInput($_POST['newPass']);
								
				if ($_POST['token'] === $_SESSION['token']){
				
					if($newPass === $confirmPass){
						$newPass = myCrypt($newPass);
							$sql="UPDATE users SET U_Password = '{$newPass}' ,U_OldPassword = '', U_SecurityCode = '' WHERE U_Email = '{$email}' ";
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








function insertCase(){

	if (isset($_POST['caseSubmit'])) {

		$caseError = "";
		

	 		$caseName     	= getCleanInput($_POST['caseName']);
	 		$caseFName    	= getCleanInput($_POST['fatherName']);
	 		$caseAge      	= getCleanInput($_POST['age']);
			$caseGender   	= getCleanInput($_POST['gender']);
	 		$caseEye      	= getCleanInput($_POST['eyeColor']);
	 		$caseHair     	= getCleanInput($_POST['hairColor']);
	 		$caseMental   	= getCleanInput($_POST['mHealth']);
	 		$caseDisability	= getCleanInput($_POST['disability']);
	 		$caseBodyMark   = getCleanInput($_POST['idenMark']);
	 		$caseProvince   = getCleanInput($_POST['caseProvince']);
	 		$caseCity   	= getCleanInput($_POST['caseCity']);
	 		$caseDistrict   = getCleanInput($_POST['caseDistrict']);
	 		
	 		$caseImg		= $_FILES['caseImg']['name'];
	 		$caseImgtype	= $_FILES['caseImg']['type'];
	 		$caseImgTmp		= $_FILES['caseImg']['tmp_name'];
	 		
	 		$caseReporterName      = getCleanInput($_POST['caseReporter']);
	 		$caseReporterRelation  = getCleanInput($_POST['crType']);
	 		$caseReporterPhone     = getCleanInput($_POST['casePhone']);
	 		$caseAdd1   	       = getCleanInput($_POST['caseAdd1']);
	 		$caseAdd2	           = getCleanInput($_POST['caseAdd2']);
	 		$caseAbout   	       = getCleanInput($_POST['caseAbout']);
	 		$caseReporterEmail     = $_SESSION['U_Email'];



	 		$ext = explode(".", $caseImg);
	 		$ext = end($ext);
	 		$caseImgNew = date("ymd")."_".time() .".".$ext;
	 		$Path = "admin/images/case/";
	 		$caseImgPath = $Path.basename($caseImgNew);

	 		$date = date("d-m-Y");

	 			if (move_uploaded_file($caseImgTmp, $caseImgPath)) {
	 				
	 					$sql = "INSERT INTO missing_cases(MC_Name, MC_FName, MC_Age, MC_Gender, MC_EyeColor, MC_HairColor, MC_MHealth, MC_Disability, MC_IdenMark, P_Name, C_Name, D_Name, MC_ImageLoc, MC_CurrentStatus, MC_ReporterName, MC_RRelation, MC_RPhone, MC_RAddress1, MC_RAddress2, MC_RCInfo, MC_ReporterEmail,  MC_CaseStatus, MC_Date)";

	 					$sql .="VALUES('{$caseName}', 
	 					'{$caseFName}', '{$caseAge}',
	 					 '{$caseGender}', '{$caseEye}',
	 					  '{$caseHair}', '{$caseMental}',
	 					   '{$caseDisability}', '{$caseBodyMark}',
	 					    '{$caseProvince}', '{$caseCity}',
	 					    '{$caseDistrict}', '{$caseImgPath}',
	 					     'Missing', '{$caseReporterName}',
	 					      '{$caseReporterRelation}', '{$caseReporterPhone}',
	 					       '{$caseAdd1}', '{$caseAdd2}',
	 					        '{$caseAbout}', '{$caseReporterEmail}',
	 					         'Un-Varifeid', '{$date}') ";
	 					
	 					$result = myQuery($sql);
	 					$confirm = confirmQuery($result);

	 					
	 					if ($confirm) {
	 					 	echo "Case Submited";
	 					 	}
	 					 	else{
	 				        echo $confirm;
	 			  		   }
	 			      }
	 		}
}


function getMissingCases($page, $perPage){
		

		$caseData= array();

		$sql = "SELECT * FROM missing_cases WHERE MC_CaseStatus = 'Verifeid' LIMIT $page, $perPage";
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
		$caseDataRow['MC_Date']    			=  $row['MC_Date'];
		$caseDataRow['MC_CaseStatus']    	=  $row['MC_CaseStatus'];
		array_push($caseData, $caseDataRow);
	}
	return $caseData;
}



function getMissingCasesId($id){
		

		$caseData= array();

		$sql = "SELECT * FROM missing_cases WHERE MC_ID = '{$id}' ";
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
		$caseDataRow['MC_Date']    			=  $row['MC_Date'];
		$caseDataRow['MC_CaseStatus']    	=  $row['MC_CaseStatus'];
		array_push($caseData, $caseDataRow);
	}
	return $caseData;
}



function changeCaseStatus(){
		if (isset($_POST['currentStatus'])) {
		 $currentStatus = $_POST['currentStatus'];
		 $currentStatusId = $_POST['id'];

		 		 if ($currentStatus == "Found") {
		 			$sql = "UPDATE missing_cases SET MC_CurrentStatus = 'Found' WHERE MC_Id = '{$currentStatusId}' ";
					$result = myQuery($sql);
					if ($result){
						Echo "Your Child is Found.";
					}else{
						Echo "Error is Occured.";
					}
		 }


		 else if ($currentStatus == "Missing") {
		 			$sql = "UPDATE missing_cases SET MC_CurrentStatus = 'Missing' WHERE MC_Id = '{$currentStatusId}' ";
					$result = myQuery($sql);
					if ($result){
						Echo "Your Child Or Person is Still Missing..";
					}else{
						Echo "Error is Occured.";
					}
				 }
			}
}

function getUserCases($user){
		

		$caseData= array();

		$sql = "SELECT * FROM missing_cases WHERE MC_ReporterEmail = '{$user}' ";
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
		$caseDataRow['MC_Date']    			=  $row['MC_Date'];
		$caseDataRow['MC_CaseStatus']    	=  $row['MC_CaseStatus'];
		array_push($caseData, $caseDataRow);
	}
	return $caseData;
}


function getSearchCases($name, $age, $city, $province){
		

		$caseData= array();

		$sql = "SELECT * FROM missing_cases WHERE MC_Name = '{$name}' OR MC_Age = '{$age}' OR C_Name = '{$city}' OR P_Name = '{$province}' ";
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
		$caseDataRow['MC_Date']    			=  $row['MC_Date'];
		$caseDataRow['MC_CaseStatus']    	=  $row['MC_CaseStatus'];
		array_push($caseData, $caseDataRow);
	}
	return $caseData;
}



function totalCases(){

	$sql = "SELECT * FROM missing_cases WHERE MC_CaseStatus = 'Verifeid'";
	$result = myQuery($sql);

	return myNumRowsCount($result);

}



function getBlogPost($page, $perPage){
		

		$blogData= array();

		$sql = "SELECT * FROM blog WHERE B_Status = 'Published'  ORDER BY B_Id DESC LIMIT $page, $perPage";
		$result = myQuery($sql);
		while ($row = myFetchArray($result)) {
		$blogDataRow['B_Id']				=  $row['B_Id'];
		$blogDataRow['B_Title']    			=  $row['B_Title'];
		$blogDataRow['AU_Id']    			=  $row['AU_Id'];
		$blogDataRow['B_FImage']			=  $row['B_FImage'];
		$blogDataRow['B_Content']    		=  $row['B_Content'];
		$blogDataRow['B_Date']    		    =  $row['B_Date'];
		$blogDataRow['B_Status']    		=  $row['B_Status'];
		array_push($blogData, $blogDataRow);
	}
	return $blogData;
}


function getBlogPostbyId($postId){
		

		$blogData= array();

		$sql = "SELECT * FROM blog WHERE B_Id = '{$postId}' ";
		$result = myQuery($sql);
		while ($row = myFetchArray($result)) {
		$blogDataRow['B_Id']				=  $row['B_Id'];
		$blogDataRow['B_Title']    			=  $row['B_Title'];
		$blogDataRow['AU_Id']    			=  $row['AU_Id'];
		$blogDataRow['B_FImage']			=  $row['B_FImage'];
		$blogDataRow['B_Content']    		=  $row['B_Content'];
		$blogDataRow['B_Date']    		    =  $row['B_Date'];
		$blogDataRow['B_Status']    		=  $row['B_Status'];
		array_push($blogData, $blogDataRow);
	}
	return $blogData;
}



function totalPost(){

	$sql = "SELECT * FROM blog WHERE B_Status = 'Published'";
	$result = myQuery($sql);

	return myNumRowsCount($result);

}




function getNews($page, $perPage){
		

		$newsData= array();

		$sql = "SELECT * FROM news WHERE N_Status = 'Published' LIMIT $page, $perPage";
		$result = myQuery($sql);
			while ($row = myFetchArray($result)) {
		$newsDataRow['N_Id']				=  $row['N_Id'];
		$newsDataRow['N_Title']    			=  $row['N_Title'];
	
		$newsDataRow['N_Content']			=  $row['N_Content'];
		$newsDataRow['N_Date']    			=  $row['N_Date'];
		$newsDataRow['N_Status']    		=  $row['N_Status'];

		array_push($newsData, $newsDataRow);
	}
	return $newsData;
}


function getNewsHeading(){
		

		$newsData= array();

		$sql = "SELECT * FROM news WHERE N_Status = 'Published' ";
		$result = myQuery($sql);
			while ($row = myFetchArray($result)) {
		$newsDataRow['N_Id']				=  $row['N_Id'];
		$newsDataRow['N_Title']    			=  $row['N_Title'];
	
		$newsDataRow['N_Content']			=  $row['N_Content'];
		$newsDataRow['N_Date']    			=  $row['N_Date'];
		$newsDataRow['N_Status']    		=  $row['N_Status'];

		array_push($newsData, $newsDataRow);
	}
	return $newsData;
}


function getNewsbyId($newsId){
		

		$newsData= array();

		$sql = "SELECT * FROM news WHERE N_Id = '{$newsId}' ";
		$result = myQuery($sql);
			while ($row = myFetchArray($result)) {
		$newsDataRow['N_Id']				=  $row['N_Id'];
		$newsDataRow['N_Title']    			=  $row['N_Title'];
		$newsDataRow['N_Content']			=  $row['N_Content'];
		$newsDataRow['N_Date']    			=  $row['N_Date'];
		$newsDataRow['N_Status']    		=  $row['N_Status'];

		array_push($newsData, $newsDataRow);
	}
	return $newsData;
}

function totalNews(){

	$sql = "SELECT * FROM news WHERE N_Status = 'Published'";
	$result = myQuery($sql);

	return myNumRowsCount($result);

}

function checkCase($id){

	$sql = "SELECT * FROM missing_cases WHERE MC_Id = '{$id}' ";
	$result = myQuery($sql);

	 if(myNumRowsCount($result) == 1)
	 {
	 	return true;
	 }else{
	 	return false;
	 }

}


function catchFinder(){
	if (isset($_POST['insertFinder'])) {
				
				$myCaseId         = getCleanInput($_POST['mCaseId']);
				$finderName   	= getCleanInput($_POST['finderName']);
				$finderEmail 	= getCleanInput($_POST['finderEmail']);
				$finderPhone 	= getCleanInput($_POST['finderPhone']);
				$finderProvince = getCleanInput($_POST['finderProvince']);
				$finderCity 	= getCleanInput($_POST['finderCity']);
				$finderDistrict = getCleanInput($_POST['finderDistrict']);
				$finderAdd1 	= getCleanInput($_POST['finderAdd1']);
				$finderAdd2 	= getCleanInput($_POST['finderAdd2']);

				$verifyCase = checkCase($myCaseId);

				if ($verifyCase) {
					
					$sql = "INSERT INTO finders(F_Name, F_Email, F_Phone, F_Province, F_City, F_District, F_Address1, F_Address2, MC_Id, F_Status)";
					$sql .="VALUES('{$finderName}', '{$finderEmail}', '{$finderPhone}', '{$finderProvince}', '{$finderCity}', '{$finderDistrict}', '{$finderAdd1}', '{$finderAdd2}', '{$myCaseId}', 'Un-Varifeid')";

					$result = myQuery($sql);
					$confirm = confirmQuery($result);
					if ($confirm) {
					 	echo "Finder Info Collected.";
					 } else{
				 	echo "Error While Collecting Info.";
			 }
		}
	}
}





function insertMessage(){

	if (isset($_POST['saveMessage'])) {
	
		$sName         = getCleanInput($_POST['senderName']);
		$sEmail        = getCleanInput($_POST['senderEmail']);
		$sSubjet 	   = getCleanInput($_POST['senderSubject']);
		$sMessage = getCleanInput($_POST['senderMessage']);
		$date = date("d-m-Y");
		$sql = "INSERT INTO messages(S_Name, S_Email, S_Subject, S_Message, M_Date, M_Status, R_Status) ";
		$sql .="VALUES('{$sName}', '{$sEmail}', '{$sSubjet}', '{$sMessage}', '{$date}', 'Un-seen', 'Un-Replied') ";
		$result = myQuery($sql);
		$confirm = confirmQuery($result);
		if ($confirm) {
			echo "Message Delivered.";
		}else{
			echo "Message Not Delivered.";
		}
	}
}






function getGalleryAlbum(){
		

		$albumData= array();

		$sql = "SELECT * FROM gallery_album WHERE GA_Status = 'Published' ";
		$result = myQuery($sql);
			while ($row = myFetchArray($result)) {
		$albumDataRow['GA_Id']				=  $row['GA_Id'];
		$albumDataRow['GA_Name']			=  $row['GA_Name'];
		$albumDataRow['GA_SubHeading']		=  $row['GA_SubHeading'];
		$albumDataRow['GA_FImage']			=  $row['GA_FImage'];
		$albumDataRow['GA_Status']			=  $row['GA_Status'];
		
		
		array_push($albumData, $albumDataRow);
	}
	return $albumData;
}


function getAlbumImages($albumId){
		

		$imgData= array();

		$sql = "SELECT * FROM album_images WHERE Img_AlbumId = '{$albumId}' ";
		$result = myQuery($sql);
			while ($row = myFetchArray($result)) {
		$imgDataRow['Img_Id']				=  $row['Img_Id'];
		$imgDataRow['Img_AlbumId']			=  $row['Img_AlbumId'];
		$imgDataRow['Img_ImgLoc']				=  $row['Img_ImgLoc'];

		
		
		array_push($imgData, $imgDataRow);
	}
	return $imgData;
}






function updateUser(){
	if (isset($_POST['userUpdate'])) {
	 	$myUpdateId 		= getCleanInput($_POST['updateGetId']);
		$updateName 		= getCleanInput($_POST['upUserName']);
		$updatePhone 		= getCleanInput($_POST['upUserPhone']);
		$updateProvince 	= getCleanInput($_POST['upUserPro']);
		$updateCity 		= getCleanInput($_POST['upUserCity']);
		$updateDistrict 	= getCleanInput($_POST['upUserDistrict']);
		$updateAddress 		= getCleanInput($_POST['upUserAdd']);

		$userImg	    = $_FILES['upUserImg']['name'];
	 	$userImgtype	= $_FILES['upUserImg']['type'];
	 	$userImgTmp	    = $_FILES['upUserImg']['tmp_name'];



	 	$sqlImg = "SELECT U_Image FROM users WHERE User_Id = '{$myUpdateId}' ";
			$resultImg  = myQuery($sqlImg);
			$rowImg 	= myFetchArray($resultImg);
			$dbImage 	= $rowImg['U_Image'];

		if (empty($userImg)) {
			$oldImgPath = $dbImage;

			$sql = "UPDATE users SET U_Name = '{$updateName}', U_Phone = '{$updatePhone}', P_Name = '{$updateProvince}', C_Name = '{$updateCity}', D_Name = '{$updateDistrict}',  U_Address = '{$updateAddress}', U_Image = '{$oldImgPath}' WHERE User_Id = '{$myUpdateId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				Echo "Profile Updated.";
			}
			
		}else{
			$ext = explode(".", $userImg);
	 		$ext = end($ext);
	 		$newImgName = date("ymd")."_".time() .".".$ext;
	 		$Path = "admin/images/users/";
	 		$newImgPath = $Path.basename($newImgName);

	 	if (move_uploaded_file($userImgTmp, $newImgPath)) {
	$sql = "UPDATE users SET U_Name = '{$updateName}', U_Phone = '{$updatePhone}', P_Name = '{$updateProvince}', C_Name = '{$updateCity}', D_Name = '{$updateDistrict}',  U_Address = '{$updateAddress}', U_Image = '{$newImgPath}' WHERE User_Id = '{$myUpdateId}' ";
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



function getUser($id){
		

		$userData= array();

		$sql = "SELECT * FROM users WHERE User_Id = '{$id}' ";
		$result = myQuery($sql);
			while ($row = myFetchArray($result)) {
		$userDataRow['User_Id']				=  $row['User_Id'];
		$userDataRow['U_Name']				=  $row['U_Name'];
		$userDataRow['U_Email']				=  $row['U_Email'];
		
		$userDataRow['U_Password']				=  $row['U_Password'];
		$userDataRow['U_OldPassword']				=  $row['U_OldPassword'];
		
		array_push($userData, $userDataRow);
	}
	return $userData;
}





function changePassword(){
	if (isset($_POST['passwordChange'])) {

		$myError = "";
			$myId 			   = getCleanInput($_POST['updatePasswordId']);
			$myOldPassword     = getCleanInput($_POST['oldPassword']);
			$myNewPassword 	   = getCleanInput($_POST['newPassword']);
			$myConfirmPassword = getCleanInput($_POST['newPasswordCon']);
			

			$myOldPassword   =  myCrypt($myOldPassword);
			$newPassword   =  myCrypt($myNewPassword);

			$userDetail = getUser($myId);

			foreach ($userDetail as $key => $row) {
				  $dbPassword 	 = $row['U_Password'];
				  $dbOldPassword = $row['U_OldPassword'];
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
				$sql = "UPDATE users SET U_Password = '{$newPassword}', U_OldPassword = '{$myOldPassword}' WHERE User_Id = '{$myId}' ";
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






function updateUserCase(){
	if (isset($_POST['updateCase'])) {
	 	$myUpdateId 		= getCleanInput($_POST['upCaseId']);
		$updateName 		= getCleanInput($_POST['upCaseName']);
		$updateFName 		= getCleanInput($_POST['upFName']);
		$updateAge 			= getCleanInput($_POST['upAge']);
		$updateGender 		= getCleanInput($_POST['upGender']);
		$updateEye 			= getCleanInput($_POST['upEyeColor']);
		$updateHair 		= getCleanInput($_POST['upHairColor']);
		$updateMental		= getCleanInput($_POST['upCaseMental']);
		$updateDisability 	= getCleanInput($_POST['upCaseDisability']);
		$updateMark 		= getCleanInput($_POST['upCaseMark']);
		$updateProvince 	= getCleanInput($_POST['upCasePro']);
		$updateCity 		= getCleanInput($_POST['upCaseCity']);
		$updateDistrict 	= getCleanInput($_POST['upCaseDis']);
		$updateRName 		= getCleanInput($_POST['upRepName']);
		$updateRRelation 	= getCleanInput($_POST['upRepRelation']);
		$updateRPhone 		= getCleanInput($_POST['upRepPhone']);
		$updateAddress1 		= getCleanInput($_POST['upAdd1']);
		$updateAddress2 		= getCleanInput($_POST['upAdd2']);
		$updateRCinfo			= getCleanInput($_POST['upAboutCase']);


		$caseImg	    = $_FILES['upCaseImg']['name'];
	 	$caseImgtype	= $_FILES['upCaseImg']['type'];
	 	$caseImgTmp	    = $_FILES['upCaseImg']['tmp_name'];



	 	$sqlImg = "SELECT MC_ImageLoc FROM missing_cases WHERE MC_Id = '{$myUpdateId}' ";
			$resultImg  = myQuery($sqlImg);
			$rowImg 	= myFetchArray($resultImg);
			$dbImage 	= $rowImg['MC_ImageLoc'];

		if (empty($caseImg)) {
			$oldCaseImgPath = $dbImage;

			$sql = "UPDATE missing_cases SET MC_Name = '{$updateName}', MC_FName = '{$updateFName}', MC_Age = '{$updateAge}', MC_Gender = '{$updateGender}', MC_EyeColor = '{$updateEye}', MC_HairColor = '{$updateHair}', MC_MHealth = '{$updateMental}', MC_Disability = '{$updateDisability}', P_Name = '{$updateProvince}', C_Name = '{$updateCity}', D_Name = '{$updateDistrict}', MC_ReporterName = '{$updateRName}', MC_RRelation = '{$updateRRelation}', MC_RPhone = '{$updateRPhone}', MC_RAddress1 = '{$updateAddress1}', MC_RAddress2 = '{$updateAddress2}', MC_RCInfo = '{$updateRCinfo}',  MC_ImageLoc = '{$oldCaseImgPath}' WHERE MC_Id = '{$myUpdateId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				Echo "Case Data Updated.";
			}
			
		}else{
			$ext = explode(".", $caseImg);
	 		$ext = end($ext);
	 		$newCaseImgName = date("ymd")."_".time() .".".$ext;
	 		$Path = "admin/images/case/";
	 		$newCaseImgPath = $Path.basename($newCaseImgName);

	 	if (move_uploaded_file($caseImgTmp, $newCaseImgPath)) {
		$sql = "UPDATE missing_cases SET MC_Name = '{$updateName}', MC_FName = '{$updateFName}', MC_Age = '{$updateAge}', MC_Gender = '{$updateGender}', MC_EyeColor = '{$updateEye}', MC_HairColor = '{$updateHair}', MC_MHealth = '{$updateMental}', MC_Disability = '{$updateDisability}', P_Name = '{$updateProvince}', C_Name = '{$updateCity}', D_Name = '{$updateDistrict}', MC_ReporterName = '{$updateRName}', MC_RRelation = '{$updateRRelation}', MC_RPhone = '{$updateRPhone}', MC_RAddress1 = '{$updateAddress1}', MC_RAddress2 = '{$updateAddress2}', MC_RCInfo = '{$updateRCinfo}',  MC_ImageLoc = '{$newCaseImgPath}' WHERE MC_Id = '{$myUpdateId}' ";
			$result = myQuery($sql);
			$confirm = confirmQuery($result);
			if ($confirm) {
				if (!empty($dbImage)) {
					unlink($dbImage); 
				}
				
				Echo "Case Data Updated.";
				}
	 		
	 		}

		}
	}
}


?>