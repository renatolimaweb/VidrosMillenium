<?php
session_start();
include '../../connections/connection.php';

$icon        = mysqli_real_escape_string($connectionSql, $_POST['icon_category_video']);
$title       = mysqli_real_escape_string($connectionSql, $_POST['title_category_video']);
$position    = mysqli_real_escape_string($connectionSql, $_POST['position_category_video']);
$status      = mysqli_real_escape_string($connectionSql, $_POST['status_category_video']);

$insertCategory = "INSERT INTO category_video (icon_category_video, title_category_video, position_category_video, status_category_video) VALUES ('$icon', '$title', '$position', '$status')";
$result_category = mysqli_query($connectionSql, $insertCategory);

if(mysqli_insert_id($connectionSql)){ ?>
	<SCRIPT language="JavaScript">
		alert("Cadastro realizado com sucesso!");
		location.href="../query_category_video.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao inserir!");
		location.href="../query_category_video.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>