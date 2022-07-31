                    



<?php


require("functions/initi.php");

$sql = "SELECT * FROM news";

$result= myQuery($sql);


$count = myNumRowsCount($result);
	 if ($count>0) {
               echo $count;
          }else{
               echo 0;
          }	


		
	
?>


