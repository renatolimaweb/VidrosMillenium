<?php
session_start();
include '../../connections/connection.php';

$icon        = mysqli_real_escape_string($connectionSql, $_POST['icon_category_post']);
$title       = mysqli_real_escape_string($connectionSql, $_POST['title_category_post']);
$position    = mysqli_real_escape_string($connectionSql, $_POST['position_category_post']);
$status      = mysqli_real_escape_string($connectionSql, $_POST['status_category_post']);

$insertCategory = "INSERT INTO category_post (icon_category_post, title_category_post, position_category_post, status_category_post) VALUES ('$icon', '$title', '$position', '$status')";
$result_category = mysqli_query($connectionSql, $insertCategory);

if(mysqli_insert_id($connectionSql)){ ?>
	<SCRIPT language="JavaScript">
		alert("Cadastro realizado com sucesso!");
		location.href="../query_category_post.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao inserir!");
		location.href="../query_category_post.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>