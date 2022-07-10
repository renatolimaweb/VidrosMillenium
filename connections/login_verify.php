<?php
session_start();
if(!$_SESSION['email_user']) {
	header('Location: index.php');
	exit();
}

//include('../connections/connection.php');
$email_user = $_SESSION['email_user'];

mysqli_select_db($connectionSql, $sql_database);
$query_search_user_logged = "SELECT * FROM user WHERE email_user = '$email_user'";
$search_user_logged = mysqli_query($connectionSql, $query_search_user_logged) or die(mysqli_error());
$row_search_user_logged = mysqli_fetch_assoc($search_user_logged);
$totalRows_search_user_logged = mysqli_num_rows($search_user_logged);
$name_user_logged = $row_search_user_logged["name_user"];
$codigo_user_logged = $row_search_user_logged["id_user"];
$category_user_logged = $row_search_user_logged["title_category_user"];
$image_user_logged = $row_search_user_logged["image_user"];
