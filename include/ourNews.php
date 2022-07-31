			<div class="container newsBox" style="margin-top: 70px;">
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

		                    $newsCount = totalNews();
		                    $newsCount = ceil($newsCount / $pre_page);


		                	$myNews = getNews($page_1, $pre_page);

		                	if (sizeof($myNews) > 0) {
		                		
		                		foreach ($myNews as $key => $row) {?>

									<div class="col-md-12 wow fadeInUp" data-wow-delay="0.5s" style="margin-bottom: 20px;">
						                <div class="blog-contents">
						                  <div class="case-details mx-auto">
						                  	 	<h2><?php echo $row['N_Title']; ?></h2>
						                  	 	<div class="separator_left"></div>
						                    <p class="case-text">Content: <em><?php echo substr($row['N_Content'],0,280); ?></em></p>
						                    <ol class="breadcrumb">
											 <li><p class="case-text">Date: <?php echo $row['N_Date']; ?></p></li>/
											 <li><p class="case-text">BY: Finding Hope</p></li>/
						                     </ol> 

						                     <div class="text-center">
												<a href="watchNews.php?news=<?php echo $row['N_Id']; ?>" class="btn caseBtn hvr-bob">Read More!</a>
											</div>
						                  </div>

						                </div>
						            </div>
								<?php }}else{?>

										<div class="col-md-12 text-center">
											 <p class="case-text">NOTE: <em> No News currently Announced.</em></p>
										</div>

							<?php	} ?>

				</div>
				  				<ul class="pagination pagination-sm justify-content-center">
	  	        <?php
		            for ($i=1; $i <= $newsCount ; $i++) { 
		                if ($i == $page) {
		                	echo "<li class='page-item'><a class='page-link' style='padding:10px; background:#32CD32; color:#FFF; text-decoration:none;' href='news.php?page={$i}'>{$i}</a></li>";
		                }else{
		                echo "<li class='page-item'><a class'page-link' style='padding:10px; background: #333; color:#FFF; text-decoration:none;' href='news.php?page={$i}'>{$i}</a></li>";
		                }
		          	  }
					?>
					
		  				</ul>       
			</div>
		  </div>
		</div>