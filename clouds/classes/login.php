<?php
session_start();
include '../../connections/connection.php';

if(empty($_POST['email_user']) || empty($_POST['password_user'])){
    header('Location: ../index.php');
    exit();
}

$email_user 	= mysqli_real_escape_string($connectionSql, $_POST['email_user']);
$password_user 	= mysqli_real_escape_string($connectionSql, $_POST['password_user']);

$query = "SELECT * FROM user where email_user = '{$email_user}' and password_user ='{$password_user}'";
$result = mysqli_query($connectionSql, $query);
$row = mysqli_num_rows($result);

 
if($row == 1) {
	$_SESSION['email_user'] = $email_user;
	header('Location: ../home.php');
	exit();
} else {
	$_SESSION['not_authorized'] = true;
	header('Location: ../index.php');
	exit();
}