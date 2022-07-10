<?php
session_start();
	// ** Logout the current user. **
	if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
	  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
	}
	if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
	  //to fully log out a visitor we need to clear the session varialbles
	  setcookie("email_user","",time()-86400);
	  setcookie("password_user","",time()-86400);
	  
	  session_destroy();

	  header("Location: index.php"); 
	}  
	
  if(!isset($_COOKIE["email_user"]) || !isset($_COOKIE["password_user"])) 
  { 
    // Usuário não logged! Redireciona para a página de login 
    header("Location: index.php"); 
    exit; 
  } else {
	  require_once('connection.php');
	  $loginUsername = $_COOKIE["email_user"];
	  $password		 = $_COOKIE["password_user"];
	  
	  
	  $MM_redirectLoginFailed = "index.php";
	  mysqli_select_db($connectionSql, $sql_database);

	  $LoginRS__query=sprintf("SELECT * FROM user WHERE email_user='%s' AND password_user='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
	  $LoginRS = mysqli_query($connectionSql, $LoginRS__query) or die(mysqli_error());
	  $loginFoundUser = mysqli_num_rows($LoginRS);
	  $loginUser = mysqli_fetch_assoc($LoginRS);
	  $name_user_valid        = $loginUser["name_user"];
	  $id_user_valid          = $loginUser["id_user"];
	  $category_user_valid   = $loginUser["id_category_user"];
	  $image_user_valid      = $loginUser["image_user"];
	  $email_user_valid       = $loginUser["email_user"];
	  if (!$loginFoundUser) {
		  setcookie("email_user","",time()-86400);
		  setcookie("password_user","",time()-86400);
	      header("Location: ". $MM_redirectLoginFailed );
	  }
  }
  
mysqli_select_db($connectionSql, $sql_database);
$query_search_user_logged = "SELECT user.name_user, user.id_category_user, user.status_user, user.email_user, category_user.id_category_user, category_user.title_category_user FROM user, category_user WHERE id_user = '$id_user_valid'";
$search_user_logged = mysqli_query($query_search_user_logged, $connectionSql) or die(mysqli_error());
$row_search_user_logged = mysqli_fetch_assoc($search_user_logged);
$totalRows_search_user_logged = mysqli_num_rows($search_user_logged);
$name_user_logged = $row_search_user_logged["name_user"];
$codigo_user_logged = $row_search_user_logged["id_user"];
$category_user_logged = $row_search_user_logged["title_category_user"];
?>

<?php
/*

session_start();
	// ** Logout the current user. **
	if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
	  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
	}
	if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
	  //to fully log out a visitor we need to clear the session varialbles
	  setcookie("email_user","",time()-86400);
	  setcookie("password_user","",time()-86400);
	  
	  session_destroy();

	  header("Location: index.php"); 
	}  
	
  if(!isset($_COOKIE["email_user"]) || !isset($_COOKIE["password_user"])) 
  { 
    // Usuário não logged! Redireciona para a página de login 
    header("Location: index.php"); 
    exit; 
  } else {
	  require_once('connection.php');
	  $loginUsername = $_COOKIE["email_user"];
	  $password		 = $_COOKIE["password_user"];
	  
	  
	  $MM_redirectLoginFailed = "index.php";
	  mysql_select_db($sql_database, $connectionSql);

	  $LoginRS__query=sprintf("SELECT * FROM user WHERE email_user='%s' AND password_user='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
	  $LoginRS = mysql_query($LoginRS__query, $connectionSql) or die(mysql_error());
	  $loginFoundUser = mysql_num_rows($LoginRS);
	  $loginUser = mysql_fetch_assoc($LoginRS);
	  $name_user_valid        = $loginUser["name_user"];
	  $id_user_valid          = $loginUser["id_user"];
	  $category_user_valid   = $loginUser["id_category_user"];
	  $image_user_valid      = $loginUser["image_user"];
	  $email_user_valid       = $loginUser["email_user"];
	  if (!$loginFoundUser) {
		  setcookie("email_user","",time()-86400);
		  setcookie("password_user","",time()-86400);
	      header("Location: ". $MM_redirectLoginFailed );
	  }
  }
  
 mysql_select_db($sql_database, $connectionSql);
$query_search_user_logged = "SELECT user.name_user, user.id_category_user, user.status_user, user.email_user, category_user.id_category_user, category_user.title_category_user FROM user, category_user WHERE id_user = '$id_user_valid'";
$search_user_logged = mysql_query($query_search_user_logged, $connectionSql) or die(mysql_error());
$row_search_user_logged = mysql_fetch_assoc($search_user_logged);
$totalRows_search_user_logged = mysql_num_rows($search_user_logged);
$name_user_logged = $row_search_user_logged["name_user"];
$codigo_user_logged = $row_search_user_logged["id_user"];
$category_user_logged = $row_search_user_logged["title_category_user"];
*/
?>