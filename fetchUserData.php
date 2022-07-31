                    



<?php


require("functions/initi.php");
	



if (isset($_POST['updateId'])) {
  $updateId = $_POST['updateId'];

                                  $sql = "SELECT * FROM users WHERE User_Id = '{$updateId}' ";
                              
                                  $result = myQuery($sql);
                                  $row = myFetchArray($result);
                                  echo json_encode($row);
                                 
  
}

?>