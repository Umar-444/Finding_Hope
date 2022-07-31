
	<header class="myNavbar fixed-top" id="myNavbar"> 
		<center>
			<nav class="navbar navbar-expand-lg">
			  <div class="container">
  <a class="navbar-brand brand" href="index.php">finding <i class="fa fa-twitter"></i> Hope</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars" style="color: #FFF;"></i>
  </button>
<?php $page=getcurrentpagename(); ?>
			  
			  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
			    <ul class="nav navbar-nav">
			      <li class="nav-item">
			        <a class="hvr-bob nav-link <?php if($page == 'index.php') {?>nav-link-active <?php } ?>" href="index.php">Home</a>
			      </li>
			      <li class="nav-item">
			        <a class="hvr-bob nav-link <?php if($page == 'aboutUs.php') {?>nav-link-active <?php } ?>" href="aboutUs.php"> About Us</a>
			      </li>
			      <li class="nav-item ">
			        <a class="hvr-bob nav-link <?php if($page == 'reportcase.php') {?>nav-link-active <?php } ?>" href="reportcase.php">Report Case</a>
			      </li>
			      <li class="nav-item">
			        <a class="hvr-bob nav-link <?php if($page == 'blog.php') {?>nav-link-active <?php } ?>" href="blog.php">Blog</a>
			      </li>
			      <li class="nav-item">
			        <a class="hvr-bob nav-link <?php if($page == 'gallery.php') {?>nav-link-active <?php } ?>" href="gallery.php">Gallery</a>
			      </li>
			      <li class="nav-item">
			        <a class="hvr-bob nav-link <?php if($page == 'news.php') {?>nav-link-active <?php } ?>" href="news.php">News</a>
			      </li>
			      <li class="nav-item">
			        <a class="hvr-bob nav-link <?php if($page == 'contactUs.php') {?>nav-link-active <?php } ?>" href="contactUs.php">Contact Us</a>
			      </li>
			      	<?php
							if (userloggedIn()){

								?>

						 	<li class="nav-item dropdown dmenu">
				            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
				              <?php echo $userRow['U_Name']; ?>
				            </a>
				            <div class="dropdown-menu sm-menu">

				              <a class="dropdown-item" href="userProfile.php"><i class="fa fa-user"></i> Profile</a>

				              <a class="dropdown-item" href="userCases.php"><i class="fa fa-file"></i> My Case</a>

				              <a class="dropdown-item" id="logout" href=""><i class="fa fa-sign-out"></i> Logout</a>

				            </div>
				            </li>
							 	<?php } else {?>

							<li class="nav-item">
							    <a class="nav-link <?php if($page == 'login.php') {?>nav-link-active <?php } ?>" href="login.php"><i class="fa fa-user"></i> LOGIN</a>
							</li>

							<?php } ?>
			    </ul>
			  </div>
			</div>
			</nav>

	</header>