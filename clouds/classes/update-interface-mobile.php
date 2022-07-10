<?php
session_start();
include '../../connections/connection.php';

//$image_original = $_page['image_page_original'];
//$image_page = $_page['image_page'];

  $arquivo = isset($_FILES["icon_16x16"]) ? $_FILES["icon_16x16"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_16x16 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_16x16;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_16x16"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_16x16 = $_POST["icon_16x16_original"];
  }
  
  $arquivo = isset($_FILES["icon_32x32"]) ? $_FILES["icon_32x32"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_32x32 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_32x32;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_32x32"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_32x32 = $_POST["icon_32x32_original"];
  }
  
  $arquivo = isset($_FILES["icon_36x36"]) ? $_FILES["icon_36x36"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_36x36 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_36x36;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_36x36"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_36x36 = $_POST["icon_36x36_original"];
  }
  
  $arquivo = isset($_FILES["icon_48x48"]) ? $_FILES["icon_48x48"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_48x48 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_48x48;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_48x48"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_48x48 = $_POST["icon_48x48_original"];
  }
  
  $arquivo = isset($_FILES["icon_57x57"]) ? $_FILES["icon_57x57"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_57x57 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_57x57;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_57x57"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_57x57 = $_POST["icon_57x57_original"];
  }
  
  $arquivo = isset($_FILES["icon_60x60"]) ? $_FILES["icon_60x60"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_60x60 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_60x60;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_60x60"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_60x60 = $_POST["icon_60x60_original"];
  }
  
  $arquivo = isset($_FILES["icon_70x70"]) ? $_FILES["icon_70x70"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_70x70 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_70x70;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_70x70"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_70x70 = $_POST["icon_70x70_original"];
  }
  
  $arquivo = isset($_FILES["icon_72x72"]) ? $_FILES["icon_72x72"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_72x72 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_72x72;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_72x72"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_72x72 = $_POST["icon_72x72_original"];
  }
  
  $arquivo = isset($_FILES["icon_76x76"]) ? $_FILES["icon_76x76"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_76x76 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_76x76;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_76x76"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_76x76 = $_POST["icon_76x76_original"];
  }
  
  $arquivo = isset($_FILES["icon_96x96"]) ? $_FILES["icon_96x96"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_96x96 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_96x96;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_96x96"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_96x96 = $_POST["icon_96x96_original"];
  }
 
  $arquivo = isset($_FILES["icon_120x120"]) ? $_FILES["icon_120x120"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_120x120 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_120x120;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_120x120"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_120x120 = $_POST["icon_120x120_original"];
  }
  
  $arquivo = isset($_FILES["icon_114x114"]) ? $_FILES["icon_114x114"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_114x114 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_114x114;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_114x114"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_114x114 = $_POST["icon_114x114_original"];
  }
  
  $arquivo = isset($_FILES["icon_144x144"]) ? $_FILES["icon_144x144"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_144x144 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_144x144;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_144x144"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_144x144 = $_POST["icon_144x144_original"];
  }
  
  $arquivo = isset($_FILES["icon_150x150"]) ? $_FILES["icon_150x150"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_150x150 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_150x150;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_150x150"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_150x150 = $_POST["icon_150x150_original"];
  }
  
  $arquivo = isset($_FILES["icon_152x152"]) ? $_FILES["icon_152x152"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_152x152 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_152x152;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_152x152"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_152x152 = $_POST["icon_152x152_original"];
  }
  
  $arquivo = isset($_FILES["icon_180x180"]) ? $_FILES["icon_180x180"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_180x180 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_180x180;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_180x180"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_180x180 = $_POST["icon_180x180_original"];
  }
  
  $arquivo = isset($_FILES["icon_192x192"]) ? $_FILES["icon_192x192"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_192x192 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_192x192;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_192x192"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_192x192 = $_POST["icon_192x192_original"];
  }
  
  $arquivo = isset($_FILES["icon_310x310"]) ? $_FILES["icon_310x310"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $icon_310x310 = $imagem;
  	 $imagem_dir = "../../content/img/".$icon_310x310;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["icon_310x310"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $icon_310x310 = $_POST["icon_310x310_original"];
  }

$id          = mysqli_real_escape_string($connectionSql, $_POST['id_interface_mobile']);
$title       = mysqli_real_escape_string($connectionSql, $_POST['title_interface_mobile']);

$updateContent = "UPDATE interface_mobile SET title_interface_mobile='$title', icon_16x16='$icon_16x16', icon_32x32='$icon_32x32', icon_36x36='$icon_36x36', icon_48x48='$icon_48x48', icon_57x57='$icon_57x57', icon_60x60='$icon_60x60', icon_70x70='$icon_70x70', icon_72x72='$icon_72x72', icon_76x76='$icon_76x76', icon_96x96='$icon_96x96', icon_114x114='$icon_114x114', icon_120x120='$icon_120x120', icon_144x144='$icon_144x144', icon_150x150='$icon_150x150', icon_152x152='$icon_152x152', icon_180x180='$icon_180x180', icon_192x192='$icon_192x192', icon_310x310='$icon_310x310' WHERE id_interface_mobile='$id'";
$result_page = mysqli_query($connectionSql, $updateContent);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../interface_mobile_control.php?cod=1";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../interface_mobile_control.php?cod=1";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>