<?php
// database connection
$dbHost = "localhost";
$dbUser = "root";
$dbName = "finding_hope";
$dbPass = "";


$myConnection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if ($myConnection) {
	return true;
}



function myQuery($query){
	global $myConnection;
	return mysqli_query($myConnection, $query);
}


function myRealEscape($input){
	global $myConnection;
	return mysqli_real_escape_String($myConnection, $input);
}

function myNumRowsCount($result){
	
	return mysqli_num_rows($result);
}


function myFetchArray($result){
	return mysqli_fetch_array($result);
}

function getCleanInput($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = myRealEscape($data);
	return $data;
}

?>