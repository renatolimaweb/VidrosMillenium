<?php
session_start();
include '../../connections/connection.php';

$title        = mysqli_real_escape_string($connectionSql, $_POST['title_link']);
$url 		  = mysqli_real_escape_string($connectionSql, $_POST['url_link']);
$status       = mysqli_real_escape_string($connectionSql, $_POST['status_link']);

$insertContent = "INSERT INTO link (title_link, url_link, status_link) VALUES ( '$title', '$url', '$status')";
$result_content = mysqli_query($connectionSql, $insertContent);

if(mysqli_insert_id($connectionSql)){ ?>
	<SCRIPT language="JavaScript">
		alert("Cadastro realizado com sucesso!");
		location.href="../query_link.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao inserir!");
		location.href="../query_link.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>