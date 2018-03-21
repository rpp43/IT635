<!DOCTYPE html>
<html>
<body>

<?php
session_start();
if($_SESSION['utype'] != 'A')
{
	header("location:/index.html");  
}
else
{
	
	$db = mysqli_connect("localhost", "root", "Hitachi", "zoom");

	
	if(mysqli_connect_errno()) {
		printf("Unable to Connect.<br>Error: %s\n", mysqli_connect_error());
		exit();
	}
	$make=$_POST['make'];
	$model=$_POST['model'];
	$year=$_POST['year'];
	$color=$_POST['color'];
	$vin=$_POST['vin'];		
	
	$sql="INSERT INTO cars (userName, make, model, year, color, vin) VALUES ('".$_SESSION['uname']."', '".$make."', '".$model."', '".$year."', '".$color."', '".$vin."')";

	if($res = mysqli_query($db,$sql))
	{
		echo "Success!";
		header( "refresh:5;url=adminindex.php" );
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
	
}
?>
</body>
</html>
