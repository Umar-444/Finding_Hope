<?php  require("functions/initi.php");

if (userloggedIn()) {

  $myUser ="";

if (isset($_SESSION['U_Email'])) {
     $myUser = $_SESSION['U_Email'];
       
}else {
   $myUser = $_COOKIE['U_Email'];
}

$sqlUser = "SELECT * FROM users WHERE U_Email = '{$myUser}' ";
$userResult = myQuery($sqlUser);
$userRow = myFetchArray($userResult); 

  
}




?> 


<!DOCTYPE html>

<html>

<?php  require("include/header.php"); ?> 

<body>

<?php require("include/menu.php"); ?>

<!-- Search BOx Start -->
<?php require("include/searchBar.php"); ?>
<!-- Search BOx End -->
<?php require("include/searchData.php"); ?>





<?php
require("include/footer.php");
require("include/jqueryLabs.php");
?>

</body>
</html>