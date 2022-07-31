        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Finding Hope</a>
            </div> 
               <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> </i> <?php echo $myAdmin; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="editProfile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="" class="logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="Cases.php"><i class="fa fa-fw fa-bar-chart-o"></i> Manage Cases</a>
                    </li>
                    <li>
                        <a href="Finders.php"><i class="fa fa-fw fa-eye"></i> Manage Finders</a>
                    </li>
                    <li>
                        <a href="blog.php"><i class="fa fa-fw fa-pencil"></i> Blog</a>
                    </li>

                    <?php 
                    if($adminRow['AU_Role'] == "Super Admin"){?>
                    <li>
                        <a href="news.php"><i class="fa fa-fw fa-newspaper-o"></i> News</a>
                    </li>
                    <li>
                        <a href="messages.php"><i class="fa fa-fw fa-envelope"></i> Message</a>
                    </li>
                   <li>
                        <a href="gallery.php"><i class="fa fa-fw fa-image"></i> Gallery</a>
                    </li>
                   <li>
                        <a href="Themes.php"><i class="fa fa-fw fa-desktop"></i> Themes</a>
                    </li>
                   <li>
                        <a href="adminUsers.php"><i class="fa fa-fw fa-users"></i> Admin Users</a>
                    </li>
                    <?php }?>
                   <li>
                        <a href="editProfile.php"><i class="fa fa-fw fa-pencil-square-o"></i> Edit Profile</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>