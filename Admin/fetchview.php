                    



<?php


require("functions/initi.php");



if (isset($_POST['viewId'])) {

          $viewId = $_POST['viewId'];

          $sql = "SELECT * FROM missing_cases WHERE MC_Id = '{$viewId}' ";
          $result = myQuery($sql);
          $row = myFetchArray($result);
       

       $output = "

       <div class='table-responsive'>
       <table class='table table-bordered'>";
          $output .=" <tr><td colspan=11 class='text-center'><img width='350px' src='../".$row['MC_ImageLoc']."'><td></tr>
                    <tr>
                         <td><strong>Name<strong><td>
                         <td>".$row['MC_Name']."<td>
                         <td><strong>Father Name<strong><td>
                         <td>".$row['MC_FName']."<td>
                         <td><strong>Age<strong><td>
                         <td>".$row['MC_Age']."<td>
                         
                    </tr>
                    <tr>
                    <td><strong>Gender<strong><td>
                         <td>".$row['MC_Gender']."<td>
                         <td><strong>Eye Color<strong><td>
                         <td>".$row['MC_EyeColor']."<td>
                          <td><strong>Hair Color<strong><td>
                         <td>".$row['MC_HairColor']."<td>
                        
                    </tr>
                     <tr>
                         <td><strong>Mental Status<strong><td>
                         <td>".$row['MC_MHealth']."<td>
                          <td><strong>Disability<strong><td>
                         <td>".$row['MC_Disability']."<td>
                          <td><strong>Mark<strong><td>
                         <td>".$row['MC_IdenMark']."<td>
                         
                </tr>
               <tr>
                         <td><strong>Province<strong><td>
                         <td>".$row['P_Name']."<td>
                          <td><strong>City<strong><td>
                         <td>".$row['C_Name']."<td>
                          <td><strong>District<strong><td>
                         <td>".$row['D_Name']."<td>
                         
                </tr>
               <tr>
                         <td><strong>Reporter Name<td>
                         <td>".$row['MC_ReporterName']."<td>
                          <td><strong>Relation<strong><td>
                         <td>".$row['MC_RRelation']."<td>
                          <td><strong>Phone<strong><td>
                         <td>".$row['MC_RPhone']."<td>
                         
                </tr>

               <tr>
                         <td><strong>Date<strong><td>
                         <td>".$row['MC_Date']."<td>
                          <td><strong>Current Status<strong><td>
                         <td>".$row['MC_CurrentStatus']."<td>
                          <td><strong>Case Status<strong><td>
                         <td>".$row['MC_CaseStatus']."<td>
                         
                </tr>


               <tr>
                         <td><strong>Address 1<strong><td>
                         <td colspan='9'>".$row['MC_RAddress1']."<td>
               
                         
                </tr>
               <tr>
 
                          <td><strong>Address 2<strong><td>
                         <td colspan='9'>".$row['MC_RAddress2']."<td>
                         
                </tr>
               <tr>
                          <td><strong>Info<strong><td>
                         <td colspan='9'>".$row['MC_RCInfo']."<td>
                         
                </tr>

          ";

     $sqlFinder = "SELECT * FROM finders WHERE MC_Id = '{$viewId}' ";
     $resultFinder = myQuery($sqlFinder);
     while ($rowFinder = myFetchArray($resultFinder)) {
         
     

     $output.="
                    <tr> <td colspan='11' class='text-center'><td></tr>
                    <tr>
                    <td colspan='11' class='text-center'><strong>Finder Info</strong><td>
                    </tr>

                <tr>
                        <td><strong>Finder Name<strong><td>
                         <td>".$rowFinder['F_Name']."<td>
                        <td><strong>Email<strong><td>
                         <td>".$rowFinder['F_Email']."<td> 
                         <td><strong>Phone<strong><td>
                         <td>".$rowFinder['F_Phone']."<td>
                </tr>
               <tr>
                          <td><strong>Province<strong><td>
                         <td>".$rowFinder['F_Province']."<td>
                          <td><strong>City<strong><td>
                         <td>".$rowFinder['F_City']."<td> 
                         <td><strong>District<strong><td>
                         <td>".$rowFinder['F_District']."<td>

                </tr>

               <tr>
                         <td><strong>Address 1<strong><td>
                         <td colspan='9'>".$rowFinder['F_Address1']."<td>
                </tr>
               <tr>
 
                          <td><strong>Address 2<strong><td>
                         <td colspan='9'>".$rowFinder['F_Address2']."<td>
                         
                </tr>
                <tr>
 
                          <td><strong>Status<strong><td>
                         <td>".$rowFinder['F_Status']."<td>
                         <td><strong>Verify<strong><td>
                         <td><Button class='btn btn-warning' data-toggle='tooltip' data-placement='bottom' title='Verify Finder' onclick='verifyFinder({$rowFinder['MC_Id']})'>Verify</Button><td> 
                         <td><strong>Un-verify<strong><td>
                         <td><Button class='btn btn-warning' data-toggle='tooltip' data-placement='bottom' title='Un-Verify Finder' onclick='unVerifyFinder({$rowFinder['MC_Id']})'>Un-Verify</Button><td>
                         
                </tr>
                ";}
     $output.='</table></div></div></div>';

     echo $output;
                             
}


?>







