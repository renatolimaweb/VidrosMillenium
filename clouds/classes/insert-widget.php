<?php
session_start();
include '../../connections/connection.php';

$title        = mysqli_real_escape_string($connectionSql, $_POST['title_widget']);
$text         = mysqli_real_escape_string($connectionSql, $_POST['text']);
$status       = mysqli_real_escape_string($connectionSql, $_POST['status_widget']);

$insertContent = "INSERT INTO widget (title_widget, content_widget, status_widget) VALUES ('$title', '$text', '$status')";
$result_content = mysqli_query($connectionSql, $insertContent);

if(mysqli_insert_id($connectionSql)){ ?>
	<SCRIPT language="JavaScript">
		alert("Cadastro realizado com sucesso!");
		location.href="../query_widget.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao inserir!");
		location.href="../query_widget.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>