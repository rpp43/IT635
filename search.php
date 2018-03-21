<?php
session_start();
if(empty($_SESSION['uname']) || empty($_SESSION['utype']))
{
	header("location:/index.html"); //redirect to "index.php" 
}
else
{
?><DOCTYPE html>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
 <form class="form-signin" action= "search2.php" method="post">
 <input type="text" id="make" name="make" class="form-control" placeholder="Make" autofocus><br>
 <input type="text" id="model" name="model" class="form-control" placeholder="Model" autofocus><br>
 <input type="text" id="year" name="year" class="form-control" placeholder="Year" autofocus><br>
 <input type="text" id="color" name="color" class="form-control" placeholder="color" autofocus><br>
 <input type="text" id="vin" name="vin" class="form-control" placeholder="Vin" autofocus><br>
 <button class="btn btn-lg btn-primary btn-block" type="submit">Search Vehicle</button>
</form>


<?php } ?>