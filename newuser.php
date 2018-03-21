<?php

// Code for processing new users

$db = mysqli_connect("localhost", "root", "Hitachi", "zoom");

$fn= "Jane4"; //= mysqli_real_escape_string($db,$_POST['FirstName']);
$ln = "Doe4";//= mysqli_real_escape_string($db,$_POST['LastName']);
$em = "janedoe4@mail.com";//= mysqli_real_escape_string($db,$_POST['inputEmail']);
$un = "Jdoe14";//= mysqli_real_escape_string($db,$_POST['inputUser']);
$pw = "asdasd";//= mysqli_real_escape_string($db,$_POST['inputPass']);
$ut ="U";//= mysqli_real_escape_string($db,$_POST['userType']);

$encpw = password_hash($pw,PASSWORD_DEFAULT);

$newUser = mysqli_query($db,"INSERT INTO user (userName,userPass,LastName,FirstName,emailAddress,type) VALUES ('{$un}','{$encpw}','{$ln}','{$fn}','{$em}','{$ut}')");
if(mysqli_affected_rows($db) != 1) {
    echo" Some Error Response";
}
else {
     echo"Success!";
}
?>