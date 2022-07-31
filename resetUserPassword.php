<?php require("functions/initi.php"); ?>

<!DOCTYPE html>
<html>

<?php  require("include/header.php"); ?> 

<body>

		<?php require("include/menu.php"); ?>



<div id="myBody" style="margin-top: 150px;">
			
			<div class="container">
					<h2 class="bodyTitle wow fadeInUp" data-wow-delay="1.0s">Reset <span class="myColor">Password</span></h2>
					<div class="separator_leftColor wow fadeInUp" data-wow-delay="1.0s"></div>
			</div>
			<br>

			<div class="container">
				<div class="col-md-4 mx-auto wow fadeInUp" data-wow-delay="1.0s">
						<form  class="forgotForm" id="resetPasswordForm" method="POST" action="processPassword.php">
						      
                             
                             
			  				<div class="form-group">
			    				<label>New Password:</label>
			    				<input type="Password" class="form-control" id="myPassword1" name="myPassword1" placeholder="New Password" required/>
	
			    				
			  				</div>

			  				<div class="form-group">
			    				<label>Confrim Password:</label>
			    				<input type="Password" class="form-control" id="myPassword2" name="myPassword2" placeholder="Confrim Password" required/>
			  				</div>
                            <input type="hidden" name="token" id="myToken" value="<?php echo token_generator();?>">
                           
			  				<div class="text-center">
			  					<button type="submit" class="btn form-btn1 hvr-bob"><i class="fa fa-key"></i> Change Password</button>
			  					
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
    $('#resetPasswordForm').submit(function(evt){
            evt.preventDefault();
            var url = $(this).attr('action');
            var recoverPassword = "recoverPassword";
            var myEmail     = "<?php echo $_GET['email'];?>";
            var myCode      = "<?php echo $_GET['code']; ?>";
            var token       = $('#myToken').val();
            var newPass     = $('#myPassword1').val();
            var confirmPass = $('#myPassword2').val();
            if (newPass == confirmPass) {
                $.post(url, {recoverPassword: recoverPassword, myEmail: myEmail, myCode: myCode, token: token, newPass: newPass, confirmPass: confirmPass}, function(resetPasswordReturn){
                if (!resetPasswordReturn.error) {
                        alert(resetPasswordReturn);
                        window.location = 'login.php';
                    }
            });
        }
        else{
            alert("Password Didn't Match, Check your Password.");
        }
     });
    });
*/

// MINIFY CODE
     $(document).ready(function(){$("#resetPasswordForm").submit(function(o){o.preventDefault();var r=$(this).attr("action"),a=$("#myToken").val(),e=$("#myPassword1").val(),s=$("#myPassword2").val();e==s?$.post(r,{recoverPassword:"recoverPassword",myEmail:"<?php echo $_GET['email'];?>",myCode:"<?php echo $_GET['code']; ?>",token:a,newPass:e,confirmPass:s},function(o){o.error||(alert(o),window.location="login.php")}):alert("Password Didn't Match, Check your Password.")})});

</script>

</body>
</html>