<?php

require("functions/initi.php");




catchFinder();
insertMessage();

changePassword();
if (isset($_SESSION['U_Email'])) {
	insertCase(); 
	changeCaseStatus();
	updateUserCase();
	updateUser();
}

?>