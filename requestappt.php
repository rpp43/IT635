<?php
session_start();

if(empty($_SESSION['uname']) || empty($_SESSION['utype'])) {
	session_destroy();
	header("location:/index.html");
}
else {
?><DOCTYPE html>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
 <form class="form-signin" action= "requestappt2.php" method="GET">
 <input type="text" id="vin" name="vin" class="form-control" placeholder="Vin" required autofocus><br>
 <button class="btn btn-lg btn-primary btn-block" type="submit">Add Vehicle</button>
 
</form>
<?php } ?>
 