<?php
session_start();
include '../../connections/connection.php';

$title        = mysqli_real_escape_string($connectionSql, $_POST['title_social_network']);
$icon         = mysqli_real_escape_string($connectionSql, $_POST['icon_social_network']);
$url 		  = mysqli_real_escape_string($connectionSql, $_POST['url_social_network']);
$status       = mysqli_real_escape_string($connectionSql, $_POST['status_social_network']);

$insertContent = "INSERT INTO social_network (title_social_network, icon_social_network, url_social_network, status_social_network) VALUES ('$title', '$icon', '$url', '$status')";
$result_content = mysqli_query($connectionSql, $insertContent);

if(mysqli_insert_id($connectionSql)){ ?>
	<SCRIPT language="JavaScript">
		alert("Cadastro realizado com sucesso!");
		location.href="../query_social_network.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao inserir!");
		location.href="../query_social_network.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>