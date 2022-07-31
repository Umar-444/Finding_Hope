<?php

require("functions/initi.php");

if (isset($_POST['logout'])) {

if (isset($_COOKIE['AU_Email'])) {
    unset($_COOKIE['AU_Email']);
  	setcookie('AU_Email', '', time() - 120);
}

unset($_SESSION['AU_Id']);
unset($_SESSION['AU_Name']);
unset($_SESSION['AU_Email']);
unset($_SESSION['AU_Role']);
unset($_SESSION['AU_TOKEN']);

if (empty($_SESSION['AU_Id']) && empty($_SESSION['AU_Name']) && empty($_SESSION['AU_Email'])  && empty($_SESSION['AU_Role']) && empty($_SESSION['AU_TOKEN'])) {
	echo 0;
}

}


// // session_destroy();
// // session_destroy destroy all session variable that currently set thats why i use unset()
// redirect("login.php");


 
?>