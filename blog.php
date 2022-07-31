<?php

require("functions/initi.php");

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


<?php  
require('include/header.php');
 ?> 

<body>


	<?php

require("include/menu.php");

?>
<!-- Header BOx Start -->
<div class="container">
	<div class="col-md-10 headerBox mx-auto wow fadeInUp" data-wow-delay="1.0s">
		<div>
			<h1 class="myHeaderTitle">OUR BLOG</h1>
		</div>
		<div class="separator_auto"></div>
	</div>
</div>
<!-- Header BOx End -->

<div id="myBody">

	<div class="container">
		<h2 class="bodyTitle wow fadeInUp" data-wow-delay="1.0s">Our Recent <span class="myColor">Activities</span></h2>
		<div class="separator_leftColor wow fadeInUp" data-wow-delay="1.0s"></div>
	</div>



<?php

require("include/ourBlog.php");

?>



</div>





<?php

require("include/footer.php");

require("include/jqueryLabs.php");
?>

</body>
</html>


