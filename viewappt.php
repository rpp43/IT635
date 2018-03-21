<!DOCTYPE html>
<html>
<head>
<style>
#car-list {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#car-list td, #car-list th {
    border: 1px solid #ddd;
    padding: 8px;
}

#car-list tr:nth-child(even){background-color: #f2f2f2;}

#car-list tr:hover {background-color: #ddd;}

#car-list th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #c5ccc6;
    color: white;
}
</style>

<!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
   

   <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
	
</head>
<body class="bg-light">

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
		
	$sql="SELECT vin FROM cars WHERE userName = '".$_SESSION['uname']."'";
	$table="<table id='car-list'><tr><th>userName</th><th>vin</th></tr>";
	
	$res = mysqli_query($db,$sql);
	if(mysqli_num_rows($res) > 0 )
	{
		while($row = mysqli_fetch_assoc($res))
		{	
			$vindets=$row['vin'];
			$sql2=mysqli_query($db,"SELECT * from appt WHERE vin = '".$vindets."' ");
			while ($row2 = mysqli_fetch_assoc($sql2)){
			
			$table.="<tr><td>".$row2['userName']."</td><td>".$row2['vin']."</td></tr>";}
		}		
	}
	$table.="</table>";
	echo $table;
}
?>
</body>
</html>
