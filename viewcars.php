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
	
	  <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
	  <div class="inner">
	  <nav class="nav nav-masthead justify-content-center">
	  <a class="nav-link" href="requestappt.php">Request Car Appointment</a>
	  </nav>
        </div>
      </header>
</head>
<body class="bg-light">

<?php
session_start();
if(empty($_SESSION['uname']) || empty($_SESSION['utype']))
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
		
	$sql="SELECT * FROM cars;";
	$table="<table id='car-list'><tr><th>userName</th><th>make</th><th>model</th><th>year</th><th>color</th><th>vin</th></tr>";
	
	$res = mysqli_query($db,$sql);
	if(mysqli_num_rows($res) > 0 )
	{
		while($row = mysqli_fetch_assoc($res))
		{
			$table.="<tr><td>".$row['userName']."</td><td>".$row['make']."</td><td>".$row['model']."</td><td>".$row['year']."</td><td>".$row['color']."</td><td>".$row['vin']."</td></tr>";
		}		
	}
	$table.="</table>";
	echo $table;
}
?>
</body>
</html>
