<!DOCTYPE html>
<html>
<body>

<?php
session_start();
if(empty($_SESSION['uname']) || empty($_SESSION['utype']))
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
	
	$vin=$_GET['vin'];		
	
	//$sql="INSERT INTO appt (userName, vin) VALUES ('".$_SESSION['uname']."','".$vin."')";
	$sql = "CALL requestapp('".$_SESSION['uname']."','".$vin."')";
	if($res = mysqli_query($db,$sql))
	{
		echo "Success!";
		if($_SESSION['utype'] == 'U') {
		header( "refresh:5;url=userindex.php" );
		}
		if($_SESSION['utype'] == 'A') {
		header( "refresh:5;url=adminindex.php" );
		}
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
	
}
?>
</body>
</html>
