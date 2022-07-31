                    



<?php


require("functions/initi.php");






if (isset($_POST['viewId'])) {

          $viewId = $_POST['viewId'];
          seenMessage($viewId);
          $sql = "SELECT * FROM messages WHERE M_Id = '{$viewId}' ";
          $result = myQuery($sql);
          $row = myFetchArray($result);

            echo json_encode($row);
}


?>







