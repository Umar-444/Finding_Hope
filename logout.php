<?php

include("functions/initi.php");

if (isset($_POST['logout'])) {
    

if (isset($_COOKIE['U_Email'])) {
    
    unset($_COOKIE['U_Email']);

    setcookie('U_Email', '', time() - 1200);
}

if (session_destroy()){
    echo 0;
}

}
 
?>