                    



<?php


require("functions/initi.php");


	$cases = getMissingCases();

	if (sizeof($cases) > 0) {
		
		$sno = 1;
		foreach ($cases as $key => $row) {
              
               if ($row['MC_CaseStatus'] == "Verifeid") {
               
              
			                         echo "<tr class='success'>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['MC_Id']}</td>";
                                        echo "<td class='text-center'>{$row['MC_Name']}</td>";
                                        echo "<td class='text-center'>{$row['MC_Age']}</td>";
                                        echo "<td class='text-center'>{$row['MC_Gender']}</td>";
                                        echo "<td class='text-center'>{$row['MC_CurrentStatus']}</td>";
                                        echo "<td class='text-center'>{$row['MC_ReporterName']}</td>";
                                        echo "<td class='text-center'>{$row['MC_RPhone']}</td>";
                                        echo "<td class='text-center'>{$row['MC_CaseStatus']}</td>";
                                        echo "<td class='text-center'>{$row['MC_Date']}</td>";
                                        echo "<td class='text-center'><Button class='btn btn-info getCase'  data-toggle='modal' data-target='#myModal' id={$row['MC_Id']}><i class='fa fa-eye'></i> View</Button></td>";
                                        echo "<td class='text-center'>
                                        
                                        <Button class='btn btn-warning' data-toggle='tooltip' data-placement='bottom' title='Un-Verify Case' onclick='unVerifyCase({$row['MC_Id']})'><i class='fa fa-close'></i> Un-Verified</Button>
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Case' onclick='deleteCase({$row['MC_Id']})'><i class='fa fa-trash'></i></Button>

                                        </td>";
                                   echo "</tr>";

                              }


                              else{
                                        echo "<tr>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['MC_Id']}</td>";
                                        echo "<td class='text-center'>{$row['MC_Name']}</td>";
                                        echo "<td class='text-center'>{$row['MC_Age']}</td>";
                                        echo "<td class='text-center'>{$row['MC_Gender']}</td>";
                                        echo "<td class='text-center'>{$row['MC_CurrentStatus']}</td>";
                                        echo "<td class='text-center'>{$row['MC_ReporterName']}</td>";
                                        
                                        echo "<td class='text-center'>{$row['MC_RPhone']}</td>";
                                        echo "<td class='text-center'>{$row['MC_CaseStatus']}</td>";
                                        echo "<td class='text-center'>{$row['MC_Date']}</td>";
                                         echo "<td class='text-center'><Button class='btn btn-info getCase'  data-toggle='modal' data-target='#myModal' id={$row['MC_Id']}><i class='fa fa-eye'></i> View</Button></td>";
                                        echo "<td class='text-center'>
                                        <Button class='btn btn-success' data-toggle='tooltip' data-placement='bottom' title='Verify Case' onclick='verifyCase({$row['MC_Id']})'><i class='fa fa-check'></i> Verified</Button>
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Case' onclick='deleteCase({$row['MC_Id']})'><i class='fa fa-trash'></i></Button>

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




