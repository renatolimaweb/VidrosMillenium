<?php
session_start();
include '../../connections/connection.php';

$id          = mysqli_real_escape_string($connectionSql, $_POST['id_link']);
$title       = mysqli_real_escape_string($connectionSql, $_POST['title_link']);
$url         = mysqli_real_escape_string($connectionSql, $_POST['url_link']);
$status      = mysqli_real_escape_string($connectionSql, $_POST['status_link']);

$updateContent = "UPDATE link SET title_link='$title', url_link='$url', status_link='$status' WHERE id_link='$id'";
$result_page = mysqli_query($connectionSql, $updateContent);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../query_link.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../query_link.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>