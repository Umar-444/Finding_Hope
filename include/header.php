<head>



	<?php 

	 $sql = "SELECT * FROM themes WHERE T_Status = 'Selected' ";
    $result = myQuery($sql);
    $row = myFetchArray($result);
    $themeCss = $row['T_File'];
    ?>

	



	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<title>Finding Hope</title>


	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/<?php echo $themeCss; ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate/animate.css">
	<link rel="stylesheet" href="css/hover-master/css/hover.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Abel" />

	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Kalam" />
</head>