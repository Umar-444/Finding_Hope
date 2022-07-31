<?php require("functions/initi.php"); ?>

<!DOCTYPE html>
<html>

<?php  require("include/header.php"); ?> 

<body>

<?php require("include/menu.php"); ?>



<div id="myBody" style="margin-top: 150px;">
			
			<div class="container">
					<h2 class="bodyTitle wow fadeInUp" data-wow-delay="1.0s">Forgot <span class="myColor">Password</span></h2>
					<div class="separator_leftColor wow fadeInUp" data-wow-delay="1.0s"></div>
			</div>
			<br>

			<div class="container">
				<div class="col-md-4 mx-auto wow fadeInUp" data-wow-delay="1.0s">
						<form  class="forgotForm" id="forgotForm" method="POST" action="processPassword.php">
						      
                             <input type="hidden" name="token" value="<?php echo token_generator();?>">
                                <input type="hidden" name="forgotPassword">
			  				<div class="form-group">
			    				<label>Email</label>
			    				<input type="email" class="form-control" id="myUserEmail" name="myUserEmail" placeholder="User Email">
	
			    				
			  				</div>

			  				<div class="text-center">
			  					<button type="submit" class="btn form-btn1 hvr-bob"><i class="fa fa-key"></i> Get Code</button>
			  					
			  				</div>
						</form>
				</div>
			</div>
			<br>
				<div id="error"></div>
			


			

	
</div>


<?php


require("include/footer.php");


require("include/jqueryLabs.php");
?>

	<script type="text/javascript">

/*
     $(document).ready(function(){
       $('#forgotForm').submit(function(evt){
            evt.preventDefault();
            var url = $(this).attr('action');
            var forgotData = $(this).serialize();
            $.post(url, forgotData, function(forgotReturn){
                if (!forgotReturn.error) {
                        alert(forgotReturn);
                        window.location = 'login.php';
                    }
            });
        });
    });
    */

    // MINIFY CODE


    $(document).ready(function(){$("#forgotForm").submit(function(t){t.preventDefault();var o=$(this).attr("action"),i=$(this).serialize();$.post(o,i,function(t){t.error||(alert(t),window.location="login.php")})})});
</script>

</body>
</html>