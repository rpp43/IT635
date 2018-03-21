<?php
session_start();

if($_SESSION['utype'] != 'A') {
	session_destroy();
	header("Location: login.php");
}
else {
?><DOCTYPE html>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
 <form class="form-signin" action= "addcar2.php" method="post"> 
 <input type="text" id="make" name="make" class="form-control" placeholder="Make" required autofocus><br>
 <input type="text" id="model" name="model" class="form-control" placeholder="Model" required autofocus><br>
 <input type="text" id="year" name="year" class="form-control" placeholder="Year" required autofocus><br>
 <input type="text" id="color" name="color" class="form-control" placeholder="color" required autofocus><br>
 <input type="text" id="vin" name="vin" class="form-control" placeholder="Vin" required autofocus><br>
 <button class="btn btn-lg btn-primary btn-block" type="submit">Add Vehicle</button>
 
</form>
<?php } ?>
