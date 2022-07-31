			<div class="container">
				<div class="col-md-4 mx-auto wow fadeInUp" data-wow-delay="1.0s">
						<form class="loginForm" id="loginForm" method="POST">
			  				<div class="form-group">
			    				<label>Email</label>
			    				<input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="User Email">
	
			    				<p id="e_error"></p>
			  				</div>
			  				<div class="form-group">
			   					<label>Password</label>
			    				<input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="User Password">
			    				<p id="p_error"></p>
			 				</div>
			 				<div class="form-group form-check">
			    				<input type="checkbox" class="form-check-input" id="remMe" name="remMe">
			    				<label class="form-check-label">Remmember me</label>
			  				</div>

			  				<div class="text-center">
			  					<button type="submit" class="btn form-btn1"><i class="fa fa-key"></i> Login</button>
			  					<a href="userRegistration.php" class="btn form-btn2">Register</a>
			  				</div>
			  			<div class="text-center" style="margin-top: 10px;">
                            <a href="forgotPassword.php">Forgot Password !</a>
                            </div>

						</form>
				</div>
			</div>