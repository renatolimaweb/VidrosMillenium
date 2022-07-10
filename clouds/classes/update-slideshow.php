<?php
session_start();
include '../../connections/connection.php';

//$image_original = $_slideshow['image_slideshow_original'];
//$image_slideshow = $_slideshow['image_slideshow'];

$arquivo = isset($_FILES["image_slideshow"]) ? $_FILES["image_slideshow"] : FALSE;
if ($arquivo["name"] != "") {

	$imagem = $_FILES['image_slideshow']['name']; // Nome originai da imagem
	$dir = "../../content/img"; // Diretório das imagens
	$salva = $dir."/".$imagem; // Caminho onde vai ficar a imagem no servidor
	move_uploaded_file($_FILES['image_slideshow']['tmp_name'],$salva ); // Este comando move o arquivo do diretório temporário para o caminho especificado acima
	$info_imagem = pathinfo($salva); // Resgatando extensão do arquivo recém-baixado
	$nova_imagem = time().rand(1000,5000).".".$info_imagem['extension']; // Nome da imagem redimensionada
	// *** Include the class
	// ESte arquivo está no arquivo ZIPADO do artigo
	require_once "resize-class.php";
	// *** 1) Initialise / load image
	$resizeObj = new resize($salva);
	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(1920, 1280, 'crop');
	/* Especificando que a nova imagem terá 200 px de largura e altura. E utilizando a opção CROP, que é considerada a melhor
	pois, recorta a imagem na medida sem distorção*/
	// *** 3) Save image
	$resizeObj -> saveImage($dir."/".$nova_imagem, 80);
	// O arquivo-base é removido
	unlink($salva);
	
} else {
	$nova_imagem = $_slideshow["image_slideshow_original"];
}

$id          = mysqli_real_escape_string($connectionSql, $_POST['id_slideshow']);
$title       = mysqli_real_escape_string($connectionSql, $_POST['title_slideshow']);
$url         = mysqli_real_escape_string($connectionSql, $_POST['url_slideshow']);
$desc        = mysqli_real_escape_string($connectionSql, $_POST['desc_slideshow']);
$status      = mysqli_real_escape_string($connectionSql, $_POST['status_slideshow']);

$updateContent = "UPDATE slideshow SET title_slideshow='$title', url_slideshow='$url', desc_slideshow='$desc', image_slideshow='$nova_imagem', status_slideshow='$status' WHERE id_slideshow='$id'";
$result_slideshow = mysqli_query($connectionSql, $updateContent);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../query_slideshow.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../query_slideshow.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>