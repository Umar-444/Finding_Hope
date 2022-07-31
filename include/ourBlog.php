
<div class="container blogBox">
	<div class="row">
	<div class="col-lg-12 mx-auto">
		<div class="row">
                	<?php

                	$pre_page = 4;

                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }
                    else{
                        $page = "";
                    }

                    if($page == "" || $page == 1){
                        $page_1 = 0;
                    }
                    else{
                        $page_1 = ($page * 4) - 4;
                    }

                    $postCount = totalPost();
                    $postCount = ceil($postCount / $pre_page);


                	$myPost = getBlogPost($page_1, $pre_page);

                	if (sizeof($myPost) > 0) {
                		
                		foreach ($myPost as $key => $row) {?>

							<div class="col-md-12 wow fadeInUp" data-wow-delay="1.0s">
				                <div class="blog-contents">
				                  <div class="blog-img text-center">
				                    <img src="admin/<?php echo $row['B_FImage']; ?>" class="img-fluid">
				                  </div>
				                  <div class="case-details mx-auto">
				                  	 	<h2><?php echo $row['B_Title']; ?></h2>
				                  	 	<div class="separator_left"></div>
				                     <ol class="breadcrumb">

				                     	 <?php 
				                     	  $sql="SELECT AU_Name,AU_Email FROM admin_user WHERE AU_Id = '{$row['AU_Id']}'";
                                        $result = myQuery($sql);
                                        while ($myRow = myFetchArray($result)) {
                                            

                                             echo "<li><p class='case-text'>Written By: {$myRow['AU_Name']}</p></li>/";
                                              echo "<li><p class='case-text'>Email: {$myRow['AU_Email']}</p></li>/";
                                          
                                          
                                            
                                        }?>

				                        <li><p class="case-text">Date: <?php echo $row['B_Date']; ?></p></li>/
				                     </ol> 
				                    <p class="case-text">Content: <em><?php echo substr($row['B_Content'],0,280); ?></em></p>
				                     <div class="text-center">
										<a href="watchBlog.php?post=<?php echo $row['B_Id']; ?>" class="btn caseBtn hvr-bob">Read More!</a>
									</div>
				                  </div>

				                </div>
				            </div>
						<?php }} ?>

		</div>
		  				<ul class="pagination pagination-sm justify-content-center">
  	        <?php
            for ($i=1; $i <= $postCount ; $i++) { 
                if ($i == $page) {
                	echo "<li class='page-item'><a class='page-link' style='padding:10px; background:#32CD32; color:#FFF; text-decoration:none;' href='blog.php?page={$i}'>{$i}</a></li>";
                }else{
                echo "<li class='page-item'><a class'page-link' style='padding:10px; background: #333; color:#FFF; text-decoration:none;' href='blog.php?page={$i}'>{$i}</a></li>";
                }
          	  }
			?>
			
  				</ul>        
        </ul>
	</div>
  </div>
</div>