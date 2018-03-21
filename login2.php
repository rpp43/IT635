<?php
 
$db = mysqli_connect("localhost", "root", "Hitachi", "zoom");

 
if(mysqli_connect_errno()) {
	printf("Unable to Connect.<br>Error: %s\n", mysqli_connect_error());
    exit();
}

 
if(isset($_POST['do_login'])){
	
	 
	$un = mysqli_real_escape_string($db,$_POST['inputUser']);
	$pw = mysqli_real_escape_string($db,$_POST['inputPassword']);
	
	 
	if(empty($un)) { header("Location: /login.php"); }
	elseif(empty($pw)) { header("Location: /login.php"); }
	else {		 
		$loginQuery = mysqli_query($db,"SELECT * FROM user WHERE userName = '{$un}'");
		if(mysqli_num_rows($loginQuery) == 1) {
			$loginRow = mysqli_fetch_assoc($loginQuery);
			if(password_verify($pw,$loginRow['userPass'])) {
				session_start();
					$_SESSION['uname'] = $loginRow['userName'];
					$_SESSION['utype'] = $loginRow['type'];
					if($loginRow['type'] == 'U') {
					header("Location: /userindex.php");
				}
				else {
					header("Location: /adminindex.php");
				}
			}
			else {
				header("Location: /login.php");
		    }
		}
		
		else {
			header("Location: /login.php");
		}
	}
}
else {
	header("Location: /login.php");
}


mysqli_close($db);

?>