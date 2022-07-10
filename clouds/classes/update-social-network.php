<?php
session_start();
include '../../connections/connection.php';

$id          = mysqli_real_escape_string($connectionSql, $_POST['id_social_network']);
$title       = mysqli_real_escape_string($connectionSql, $_POST['title_social_network']);
$icon       = mysqli_real_escape_string($connectionSql, $_POST['icon_social_network']);
$url         = mysqli_real_escape_string($connectionSql, $_POST['url_social_network']);
$status      = mysqli_real_escape_string($connectionSql, $_POST['status_social_network']);

$updateContent = "UPDATE social_network SET title_social_network='$title', icon_social_network='$icon', url_social_network='$url', status_social_network='$status' WHERE id_social_network='$id'";
$result_page = mysqli_query($connectionSql, $updateContent);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../query_social_network.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../query_social_network.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>