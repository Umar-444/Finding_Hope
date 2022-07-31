                    



<?php


require("functions/initi.php");


	$albums = getAlbums();

	if (sizeof($albums) > 0) {
		
		$sno = 1;
		foreach ($albums as $key => $row) {
              
               if ($row['GA_Status'] == "Published") {
               
              
			                         echo "<tr class='success'>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['GA_Name']}</td>";
                                       // echo "<td class='text-center'>{$row['GA_SubHeading']}</td>";

                                      $sql="SELECT * FROM album_images WHERE Img_AlbumId = '{$row['GA_Id']}'";
                                        $result = myQuery($sql);
                                        $totalImages = myNumRowsCount($result);
                                
                                            
                                        

                                        echo "<td class='text-center'>{$totalImages}</td>";
                                        echo "<td class='text-center'>{$row['GA_Status']}</td>";
                                       
                             echo "<td class='text-center'>

                                        <Button class='btn btn-info getAlbum' data-toggle='modal' data-target='#myModalUpdate'
                                        data-toggle='tooltip' data-placement='bottom' title='View & Update Album'  
                                         id='{$row['GA_Id']}'><i class='fa fa-eye'></i> View</Button></td>";
                                        
                                        
                                        echo"
                                        <td class='text-center'>
                                          
 
                                         
                                       
                                        <Button class='btn btn-warning' data-toggle='tooltip' data-placement='bottom' title='Un-Published Album' onclick='unpublishedAlbum({$row['GA_Id']})'><i class='fa fa-close'></i> Un-Publish</Button>
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Album' onclick='deleteAlbum({$row['GA_Id']})'><i class='fa fa-trash'></i></Button>

                                        </td>";
                                   echo "</tr>";

                              }else{
                                       echo "<tr>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['GA_Name']}</td>";
                                       // echo "<td class='text-center'>{$row['GA_SubHeading']}</td>";
                                        
                                      $sql="SELECT * FROM album_images WHERE Img_AlbumId = '{$row['GA_Id']}'";
                                        $result = myQuery($sql);
                                        $totalImages = myNumRowsCount($result);
                                
                                            
                                        

                                        echo "<td class='text-center'>{$totalImages}</td>";

                                 
                                        echo "<td class='text-center'>{$row['GA_Status']}</td>";
                                        
                                        echo "<td class='text-center'>

                                        <Button class='btn btn-info getAlbum' data-toggle='modal' data-target='#myModalUpdate'
                                        data-toggle='tooltip' data-placement='bottom' title='View & Update Album'  
                                         id='{$row['GA_Id']}'><i class='fa fa-eye'></i> View</Button></td>";
                                        
                                       



                                        echo "<td class='text-center'>

                                          <Button class='btn btn-success' data-toggle='tooltip' data-placement='bottom' title='Publish Album' onclick='publishedAlbum({$row['GA_Id']})'><i class='fa fa-check'></i> Publish</Button>
                                     
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Album' onclick='deleteAlbum({$row['GA_Id']})'><i class='fa fa-trash'></i></Button>

                                        </td>";
                                   echo "</tr>";
                              }

                                   $sno++;
		}
	}


	



?>



<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>