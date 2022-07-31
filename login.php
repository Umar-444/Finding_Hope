<?php

require("functions/initi.php");

?>

<!DOCTYPE html>
<html>

<?php  require("include/header.php"); ?> 
<body>

<?php

require("include/menu.php");

?>

<!-- Header BOx Start -->
<div class="container">
	<div class="col-md-10 headerBox mx-auto wow fadeInUp" data-wow-delay="1.0s">
		<div>
			<h1 class="myHeaderTitle">Login</h1>
		</div>
		<div class="separator_auto"></div>
	</div>
</div>
<!-- Header BOx End -->



<div id="myBody">
			
			<div class="container">
					<h2 class="bodyTitle wow fadeInUp" data-wow-delay="1.0s">Login <span class="myColor">here.</span></h2>
					<div class="separator_leftColor wow fadeInUp" data-wow-delay="1.0s"></div>
			</div>

							<?php
							require("include/loginForm.php");
							?>

			<br>
				
				<div id="error"></div>
			


			

	
</div>


<?php
require("include/footer.php");
require("include/jqueryLabs.php");
?>
<script type="text/javascript" src="js/main2.js"></script>


</body>
</html>