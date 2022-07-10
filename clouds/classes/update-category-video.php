<?php
session_start();
include '../../connections/connection.php';

$id          = mysqli_real_escape_string($connectionSql, $_POST['id_category_video']);
$icon        = mysqli_real_escape_string($connectionSql, $_POST['icon_category_video']);
$title       = mysqli_real_escape_string($connectionSql, $_POST['title_category_video']);
$position    = mysqli_real_escape_string($connectionSql, $_POST['position_category_video']);
$status      = mysqli_real_escape_string($connectionSql, $_POST['status_category_video']);

$updateCategory = "UPDATE category_video SET icon_category_video='$icon', title_category_video='$title', position_category_video='$position', status_category_video='$status' WHERE id_category_video='$id'";
$result_category = mysqli_query($connectionSql, $updateCategory);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../query_category_video.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../query_category_video.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>