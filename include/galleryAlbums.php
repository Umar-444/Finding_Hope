
	<div class="container" id="gallery">
		<div class="row">


				<?php

                	$myAlbums = getGalleryAlbum();

                	if (sizeof($myAlbums) > 0) {
                		
                		foreach ($myAlbums as $key => $row) {

                			?>
                       		

                       		<div class="col-md-4 text-center galleryBox">
								<a href="galleryalbum.php?albumName=<?php echo $row['GA_Name']; ?>&albumId=<?php echo $row['GA_Id']; ?>">
									<img src="admin/<?php echo $row['GA_FImage']; ?>" class="img-fluid">
									<div class="details">
										<h4><?php echo $row['GA_Name']; ?></h4>
					                	<span><?php echo $row['GA_SubHeading']; ?></span>
									</div>
							</a>
							</div>   
                                          
                                            
                                 
						<?php }} ?>

                   
			
		</div>
	</div>
