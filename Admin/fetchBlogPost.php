                    



<?php


require("functions/initi.php");






if (isset($_POST['viewId'])) {

          $viewId = $_POST['viewId'];
          seenMessage($viewId);
          $sql = "SELECT * FROM blog WHERE B_Id = '{$viewId}' ";
          $result = myQuery($sql);
          $row = myFetchArray($result);

            echo json_encode($row);
}


?>







