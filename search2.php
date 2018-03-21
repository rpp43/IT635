<!DOCTYPE html>
<html>
<head>
<style>
#carlist{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#carlist td, #carlist th {
    border: 1px solid #ddd;
    padding: 8px;
}

#carlist tr:nth-child(even){background-color: #f2f2f2;}

#carlist tr:hover {background-color: #ddd;}

#carlist th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #81847c;
    color: white;
}
</style>
</head>
<body>

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
	$make= mysqli_real_escape_string($db,$_POST['make']);
	$model= mysqli_real_escape_string($db,$_POST['model']);
	$year= mysqli_real_escape_string($db,$_POST['year']);
	$color= mysqli_real_escape_string($db,$_POST['color']);
	$vin= mysqli_real_escape_string($db,$_POST['vin']);
	$where="";
	$key=array();
	$value=array();
	
	
	
	
	if(!empty($make)) { array_push($key,"make"); array_push($value,$make); }
	if(!empty($model)) { array_push($key,"model"); array_push($value,$model); }
	if(!empty($year)) { array_push($key,"year"); array_push($value,$year); }
	if(!empty($color)) { array_push($key,"color"); array_push($value,$color); }
	if(!empty($vin)) { array_push($key,"vin"); array_push($value,$vin); }
	
	$num=count($key);
	if($num==0) $where="1";
	else{
		$where=$key[0]."='".$value[0]."' ";
		for($i=1;$i<$num;$i++)
		{
			$where.="AND ".$key[$i]."='".$value[$i]."' ";
		}
	}
	
	$sql="SELECT * FROM cars WHERE ".$where;
	$table="<table id='carlist'><tr><th>userName</th><th>make</th><th>model</th><th>year</th><th>color</th><th>vin</th></tr>";
	
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
