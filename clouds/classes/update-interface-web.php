<?php
session_start();
include '../../connections/connection.php';

$arquivo = isset($_FILES["logo"]) ? $_FILES["logo"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $logo = $imagem;
  	 $imagem_dir = "../../content/img/".$logo;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["logo"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $logo = $_POST["logo_original"];
  }
  
  $arquivo = isset($_FILES["logo_footer"]) ? $_FILES["logo_footer"] : FALSE;
  if ($arquivo["name"] != "") {
	 $imagem = $arquivo["name"];
	 $extensao = substr($arquivo["name"], $imagem);
     $logo_footer = $imagem;
  	 $imagem_dir = "../../content/img/".$logo_footer;
	 move_uploaded_file($arquivo["tmp_name"], $imagem_dir); 
	 
	 $apagar = "../../content/img/".$_POST["logo_footer"];
	 if (is_file($apagar)) {
	 	unlink($apagar);
	 }	 
	 
  } else {
	 $logo_footer = $_POST["logo_footer_original"];
  }

$arquivo = isset($_FILES["open_graph"]) ? $_FILES["open_graph"] : FALSE;
if ($arquivo["name"] != "") {

	$imagem = $_FILES['open_graph']['name']; // Nome originai da imagem
	$dir = "../../content/img"; // Diretório das imagens
	$salva = $dir."/".$imagem; // Caminho onde vai ficar a imagem no servidor
	move_uploaded_file($_FILES['open_graph']['tmp_name'],$salva ); // Este comando move o arquivo do diretório temporário para o caminho especificado acima
	$info_imagem = pathinfo($salva); // Resgatando extensão do arquivo recém-baixado
	$open_graph = time().rand(1000,5000).".".$info_imagem['extension']; // Nome da imagem redimensionada
	// *** Include the class
	// ESte arquivo está no arquivo ZIPADO do artigo
	require_once "resize-class.php";
	// *** 1) Initialise / load image
	$resizeObj = new resize($salva);
	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(600, 315, 'crop');
	/* Especificando que a nova imagem terá 200 px de largura e altura. E utilizando a opção CROP, que é considerada a melhor
	pois, recorta a imagem na medida sem distorção*/
	// *** 3) Save image
	$resizeObj -> saveImage($dir."/".$open_graph, 80);
	// O arquivo-base é removido
	unlink($salva);
	
} else {
	$open_graph = $_POST["open_graph_original"];
 }

$id = mysqli_real_escape_string($connectionSql, $_POST['id_interface_web']);

$updateContent = "UPDATE interface_web SET logo='$logo', logo_footer='$logo_footer', open_graph='$open_graph' WHERE id_interface_web='$id'";
$result_config = mysqli_query($connectionSql, $updateContent);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../interface_web_control.php?cod=1";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../interface_web_control.php?cod=1";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>