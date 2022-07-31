                    



<?php


require("functions/initi.php");


	$finders = getFinders();

	if (sizeof($finders) > 0) {
		
		$sno = 1;
		foreach ($finders as $key => $row) {
              
               if ($row['F_Status'] == "Verifeid") {
               
              
			                         echo "<tr class='success'>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['F_Name']}</td>";
                                        echo "<td class='text-center'>{$row['F_Email']}</td>";
                                        echo "<td class='text-center'>{$row['F_Phone']}</td>";
                                        echo "<td class='text-center'>{$row['F_Status']}</td>";
                                        echo "<td class='text-center'><Button class='btn btn-info getFinder'  data-toggle='modal' data-target='#myModal' id={$row['MC_Id']}><i class='fa fa-eye'></i> View</Button></td>";
                                        echo "<td class='text-center'>
                                       
                                        <Button class='btn btn-warning' data-toggle='tooltip' data-placement='bottom' title='Un-Verify Finder' onclick='unVerifyFinder({$row['MC_Id']})'><i class='fa fa-close'></i> Un-Verifeid</Button>
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Finder' onclick='deleteFinder({$row['F_Id']})'><i class='fa fa-trash'></i></Button>

                                        </td>";
                                   echo "</tr>";

                              }


                              else{
                                      
                                        echo "<tr>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['F_Name']}</td>";
                                        echo "<td class='text-center'>{$row['F_Email']}</td>";
                                        echo "<td class='text-center'>{$row['F_Phone']}</td>";
                                        echo "<td class='text-center'>{$row['F_Status']}</td>";
                                        echo "<td class='text-center'><Button class='btn btn-info getFinder'  data-toggle='modal' data-target='#myModal' id={$row['MC_Id']}><i class='fa fa-eye'></i> View</Button></td>";
                                        echo "<td class='text-center'>
                                        <Button class='btn btn-success' data-toggle='tooltip' data-placement='bottom' title='Verify Finder' onclick='verifyFinder({$row['MC_Id']})'><i class='fa fa-check'></i> Verifeid</Button>
                                       
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Finder' onclick='deleteFinder({$row['F_Id']})'><i class='fa fa-trash'></i></Button>

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




