<?php
include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/configuration.php';
include $_SERVER['DOCUMENT_ROOT'].'/automotive_dealership/admin/utility/functions.php';
$c = connect_to_database();

session_start();
setcookie("email", "", time()-3600*6, "/"); 
$email = $_SESSION['email'];
  
if(mysqli_query($c, "UPDATE `admins` SET session='none' WHERE email='$email'")){ 
    // success
}else{ 
    // failure
}
session_destroy();
?>
<html>
<head>
	<title>Wave Link, LLC - Logout Successful</title>
	<?php echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL=http://'.$_SERVER['SERVER_NAME'].'/automotive_dealership/admin/">'; ?>
</head>
<body align="center">
	Logout Successful <br/>
</body>
</html>