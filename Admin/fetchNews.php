                    



<?php


require("functions/initi.php");


	$news = getNews();

	if (sizeof($news) > 0) {
		
		$sno = 1;
		foreach ($news as $key => $row) {

               $nContent = substr($row['N_Content'],0,50);
              
               if ($row['N_Status'] == "Published") {

               
              
			                         echo "<tr class='success'>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['N_Title']}</td>";
                                       echo "<td class='text-center'>{$nContent}</td>";
                                        echo "<td class='text-center'>{$row['N_Date']}</td>";
                                        echo "<td class='text-center'>{$row['N_Status']}</td>";

                                        echo "<td class='text-center'><Button class='btn btn-info getNews' data-toggle='tooltip' data-placement='bottom' title='View & Update News'  data-toggle='modal' data-target='#myModalUpdate' id='{$row['N_Id']}'><i class='fa fa-eye'></i> View</Button></td>";
                                        echo "<td class='text-center'>
                                        
                                        <Button class='btn btn-warning' data-toggle='tooltip' data-placement='bottom' title='Un-Publish News' onclick='unPublished({$row['N_Id']})'><i class='fa fa-close'></i> Draft</Button>
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete News' onclick='deleteNews({$row['N_Id']})'><i class='fa fa-trash'></i></Button>

                                        </td>";
                                   echo "</tr>";

                              }else{
                                       echo "<tr>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['N_Title']}</td>";
                                       
                                        echo "<td class='text-center'>{$nContent}</td>";
                                        echo "<td class='text-center'>{$row['N_Date']}</td>";
                                        echo "<td class='text-center'>{$row['N_Status']}</td>";

                                        echo "<td class='text-center'><Button class='btn btn-info getNews' data-toggle='tooltip' data-placement='bottom' title='View & Update News' data-toggle='modal' data-target='#myModalUpdate' id='{$row['N_Id']}'><i class='fa fa-eye'></i> View</Button></td>";
                                        echo "<td class='text-center'>
                                        <Button class='btn btn-success' data-toggle='tooltip' data-placement='bottom' title='Publish News' onclick='publishedNews({$row['N_Id']})'><i class='fa fa-check'></i> Publish</Button>
                                       
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete News' onclick='deleteNews({$row['N_Id']})'><i class='fa fa-trash'></i></Button>

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