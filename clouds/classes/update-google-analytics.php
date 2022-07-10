<?php
session_start();
include '../../connections/connection.php';

$id        	  		  = mysqli_real_escape_string($connectionSql, $_POST['id_interface_web']);
$api_google_analytics = mysqli_real_escape_string($connectionSql, $_POST['api_google_analytics']);

$updateContent = "UPDATE interface_web SET api_google_analytics='$api_google_analytics' WHERE id_interface_web='$id'";
$result_config = mysqli_query($connectionSql, $updateContent);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../google_analytics_control.php?cod=1";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../google_analytics_control.php?cod=1";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>