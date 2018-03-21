<!DOCTYPE html>
<html>
<body>

<?php
session_start();
if($_SESSION['utype'] != 'U')
{
	session_destroy();
	header("location:/index.html"); 
}
else
{
	 
	$db = mysqli_connect("localhost", "root", "Hitachi", "zoom");

	 
	if(mysqli_connect_errno()) {
		printf("Unable to Connect.<br>Error: %s\n", mysqli_connect_error());
		exit();
	}
	
	$vin= mysqli_real_escape_string($_POST['vin']);		
	
	$sql="INSERT INTO appt (userName, vin) VALUES ('".$_SESSION['uname']."','".$vin."')";

	if($res = mysqli_query($db,$sql))
	{
		echo "Success!";
		header( "refresh:5;url=userindex.php" );
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
	
}
?>
</body>
</html>
