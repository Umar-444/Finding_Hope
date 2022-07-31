                    



<?php


require("functions/initi.php");


	$posts = getBlogPost();

	if (sizeof($posts) > 0) {
		
		$sno = 1;
		foreach ($posts as $key => $row) {

               $pContent = substr($row['B_Content'],0,50);
               
               if ($row['B_Status'] == "Published") {
               
              

			                         echo "<tr class='success'>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['B_Title']}</td>";

                                        $sql="SELECT * FROM admin_user WHERE AU_Id = '{$row['AU_Id']}'";
                                        $result = myQuery($sql);
                                        while ($myRow = myFetchArray($result)) {
                                            

                                             echo "<td class='text-center'>{$myRow['AU_Name']}</td>";
                                            
                                        }
                                        echo "<td class='text-center'>{$pContent}</td>";
                                        echo "<td class='text-center'>{$row['B_Date']}</td>";
                                        echo "<td class='text-center'>{$row['B_Status']}</td>";
                                        echo "<td class='text-center'><Button class='btn btn-info getPost' id='{$row['B_Id']}' data-toggle='modal' data-target='#myModalUpdate' data-toggle='tooltip' data-placement='bottom' title='View & Update'><i class='fa fa-eye'></i> View</Button></td>";
                                        echo "<td class='text-center'>
                                        
                                        <Button class='btn btn-warning' data-toggle='tooltip' data-placement='bottom' title='Draft Post' onclick='draftPost({$row['B_Id']})'><i class='fa fa-close'></i> Draft</Button>
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Post' onclick='deletePost({$row['B_Id']})'><i class='fa fa-trash'></i></Button>

                                        </td>";
                                   echo "</tr>";

                              }else{

               $pContent = substr($row['B_Content'],0,50);

                                        echo "<tr>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['B_Title']}</td>";
                                                                               
                                        $sql="SELECT * FROM admin_user WHERE AU_Id = '{$row['AU_Id']}'";
                                        $result = myQuery($sql);
                                        while ($myRow = myFetchArray($result)) {
                                            

                                             echo "<td class='text-center'>{$myRow['AU_Name']}</td>";
                                            
                                        }
                                        echo "<td class='text-center'>{$pContent}</td>";
                                        echo "<td class='text-center'>{$row['B_Date']}</td>";
                                        echo "<td class='text-center'>{$row['B_Status']}</td>";
                                        echo "<td class='text-center'><Button class='btn btn-info getPost' id='{$row['B_Id']}' data-toggle='modal' data-target='#myModalUpdate' data-toggle='tooltip' data-placement='bottom' title='View & Update'><i class='fa fa-eye'></i> View</Button></td>";
                                        echo "<td class='text-center'>
                                        <Button class='btn btn-success' data-toggle='tooltip' data-placement='bottom' title='Published Post' onclick='publishedPost({$row['B_Id']})'><i class='fa fa-check'></i> Publish</Button>
                                       
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Case' onclick='deletePost({$row['B_Id']})'><i class='fa fa-trash'></i></Button>

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