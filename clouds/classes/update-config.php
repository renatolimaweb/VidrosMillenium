<?php
session_start();
include '../../connections/connection.php';

$id        	  	 = mysqli_real_escape_string($connectionSql, $_POST['id_config']);
$title       	 = mysqli_real_escape_string($connectionSql, $_POST['title_config']);
$desc        	 = mysqli_real_escape_string($connectionSql, $_POST['desc_config']);
$tags        	 = mysqli_real_escape_string($connectionSql, $_POST['tags_config']);
$address         = mysqli_real_escape_string($connectionSql, $_POST['address_config']);
$zip_code        = mysqli_real_escape_string($connectionSql, $_POST['zip_code_config']);
$district        = mysqli_real_escape_string($connectionSql, $_POST['district_config']);
$phone           = mysqli_real_escape_string($connectionSql, $_POST['phone_config']);
$email           = mysqli_real_escape_string($connectionSql, $_POST['email_config']);
$city            = mysqli_real_escape_string($connectionSql, $_POST['city_config']);
$state      	 = mysqli_real_escape_string($connectionSql, $_POST['state_config']);

$updateContent = "UPDATE config SET title_config='$title', desc_config='$desc', tags_config='$tags', address_config='$address', zip_code_config='$zip_code', district_config='$district', phone_config='$phone', email_config='$email', city_config='$city', state_config='$state' WHERE id_config='$id'";
$result_config = mysqli_query($connectionSql, $updateContent);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../config_control.php?cod=1";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../config_control.php?cod=1";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>