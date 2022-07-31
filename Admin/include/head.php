<?php
include("functions/initi.php");

if (loggedIn()){
} else{

  redirect("login.php");
}




$myAdmin ="";

if (isset($_SESSION['AU_Email'])) {
     $myAdmin = $_SESSION['AU_Email'];
       
}else {
   $myAdmin = $_COOKIE['AU_Email'];
}

$sqlAdmin = "SELECT * FROM admin_user WHERE AU_Email = '{$myAdmin}' ";
$adminResult = myQuery($sqlAdmin);
$adminRow = myFetchArray($adminResult); 

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Finding Hope | Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <?php    

     $sql = "SELECT * FROM themes WHERE T_Status = 'Selected' ";
    $result = myQuery($sql);
    $row = myFetchArray($result);
    $themeCss = $row['T_File'];
    ?>
    <!-- Custom CSS -->
    <link href="css/<?php echo $themeCss; ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>