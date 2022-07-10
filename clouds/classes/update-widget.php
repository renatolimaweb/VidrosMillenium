<?php
session_start();
include '../../connections/connection.php';

$id          = mysqli_real_escape_string($connectionSql, $_POST['id_widget']);
$title       = mysqli_real_escape_string($connectionSql, $_POST['title_widget']);
$text        = mysqli_real_escape_string($connectionSql, $_POST['text']);
$status      = mysqli_real_escape_string($connectionSql, $_POST['status_widget']);

$updateContent = "UPDATE widget SET title_widget='$title', content_widget='$text', status_widget='$status' WHERE id_widget='$id'";
$result_page = mysqli_query($connectionSql, $updateContent);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../query_widget.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../query_widget.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>