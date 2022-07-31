                    



<?php


require("functions/initi.php");


	$messages = getMessages();

	if (sizeof($messages) > 0) {
		
		$sno = 1;
		foreach ($messages as $key => $row) {
              
               if ($row['M_Status'] == "Seen") {
               
              
			                         echo "<tr class='success'>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['S_Name']}</td>";

                                       echo "<td class='text-center'>{$row['S_Email']}</td>";
                                        echo "<td class='text-center'>{$row['S_Subject']}</td>";
                                        echo "<td class='text-center'>{$row['M_Date']}</td>";

                                        echo "<td class='text-center'>{$row['M_Status']}</td>";
                                        echo "<td class='text-center'>{$row['R_Status']}</td>";
                                        
                                        echo "<td class='text-center'><Button class='btn btn-info getMessage' data-toggle='modal' data-target='#myModal' id={$row['M_Id']}><i class='fa fa-eye'></i> View</Button></td>";
                                        echo "

                                        <td class='text-center'>
                                        
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Message' onclick='deleteMessage({$row['M_Id']})'><i class='fa fa-trash'></i></Button>

                                        </td>";
                                   echo "</tr>";

                              }else{
                                       echo "<tr>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['S_Name']}</td>";
                                        echo "<td class='text-center'>{$row['S_Email']}</td>";
                                        echo "<td class='text-center'>{$row['S_Subject']}</td>";
                                        echo "<td class='text-center'>{$row['M_Date']}</td>";
                                        echo "<td class='text-center'>{$row['M_Status']}</td>";
                                        echo "<td class='text-center'>{$row['R_Status']}</td>";
                                             echo "<td class='text-center'><Button class='btn btn-info getMessage' data-toggle='modal' data-target='#myModal' id={$row['M_Id']}><i class='fa fa-eye' ></i>View</Button></td>";
                                        echo "<td class='text-center'>
                                       
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Message' onclick='deleteMessage({$row['M_Id']})'><i class='fa fa-trash'></i></Button>

                                        </td>";
                                   echo "</tr>";
                              }

                                   $sno++;
		}
	}else{

          echo 0;
     }


	



?>



<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
});
</script>