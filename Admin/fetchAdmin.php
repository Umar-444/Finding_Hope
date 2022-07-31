                    



<?php


require("functions/initi.php");


	$admins = getAdminUsers();

	if (sizeof($admins) > 0) {
		
		$sno = 1;
		foreach ($admins as $key => $row) {
              
               if ($row['AU_AcountStatus'] == 1) {
               
              
			                         echo "<tr class='warning'>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['AU_Name']}</td>";
                                        echo "<td class='text-center'>{$row['AU_Email']}</td>";
                                        echo "<td class='text-center'>{$row['AU_Phone']}</td>";
                                        echo "<td class='text-center'>{$row['AU_Role']}</td>";
                                        
                                        $sql ="SELECT AU_AcountStatus FROM admin_user WHERE AU_Id = '".$row['AU_Id']."' ";
                                        $result= myQuery($sql);
                                        while ($statusRow = myFetchArray($result)) {
                                             $myStatus = $statusRow['AU_AcountStatus'];
                                             if ($myStatus == 1) {
                                                  echo "<td class='text-center'>Active</td>";
                                             }else{
                                                  echo "<td class='text-center'>De-Active</td>";
                                             }
                                        }
                                        

                                        if ($row['AU_Role'] == 'Super Admin') {
                                        echo "<td class='text-center'>
                                        <Button class='btn btn-info' data-toggle='tooltip' data-placement='bottom' title='Promote To Admin'  onclick='makeAdmin({$row['AU_Id']})'>Admin</Button></td>";

                                        }else{
                                        echo "<td class='text-center'><Button class='btn btn-info' data-toggle='tooltip' data-placement='bottom' title='Promote To Super Admin'  onclick='makeSAdmin({$row['AU_Id']})'}>Super Admin</Button>
                                        </td>";}
                                        echo "<td class='text-center'>
                                        
                                        <Button class='btn btn-warning' data-toggle='tooltip' data-placement='bottom' title='De-Activate Admin' onclick='deActiveAdmin({$row['AU_Id']})'><i class='fa fa-close'></i> Disable Admin</Button>
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Admin' onclick='deleteAdmin({$row['AU_Id']})'><i class='fa fa-trash'></i></Button>

                                        </td>";
                                   echo "</tr>";

                              }


                              else{
                                      
                                        echo "<tr>";
                                        echo "<td class='text-center'>{$sno}</td>";
                                        echo "<td class='text-center'>{$row['AU_Name']}</td>";
                                        echo "<td class='text-center'>{$row['AU_Email']}</td>";
                                        echo "<td class='text-center'>{$row['AU_Phone']}</td>";
                                        echo "<td class='text-center'>{$row['AU_Role']}</td>";
                    $sql ="SELECT AU_AcountStatus FROM admin_user WHERE AU_Id = '".$row['AU_Id']."' ";
                                        $result= myQuery($sql);
                                        while ($statusRow = myFetchArray($result)) {
                                             $myStatus = $statusRow['AU_AcountStatus'];
                                             if ($myStatus == 1) {
                                                  echo "<td class='text-center'>Active</td>";
                                             }else{
                                                  echo "<td class='text-center'>De-Active</td>";
                                             }
                                        }
                                        
                                        if ($row['AU_Role'] == 'Super Admin') {
                                        echo "<td class='text-center'>
                                        <Button class='btn btn-info' data-toggle='tooltip' data-placement='bottom' title='Promote To Admin'  onclick='makeAdmin({$row['AU_Id']})'>Admin</Button></td>";

                                        }else{
                                        echo "<td class='text-center'><Button class='btn btn-info' data-toggle='tooltip' data-placement='bottom' title='Promote To Super Admin'  onclick='makeSAdmin({$row['AU_Id']})'}>Super Admin</Button>
                                        </td>";}                                        echo "<td class='text-center'>
                                        <Button class='btn btn-success' data-toggle='tooltip' data-placement='bottom' title='Activate Admin' onclick='activeAdmin({$row['AU_Id']})'><i class='fa fa-check'></i> Enable-Admin</Button>
                                        
                                        
                                        <Button class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Delete Admin' onclick='deleteAdmin({$row['AU_Id']})'><i class='fa fa-trash'></i></Button>

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



