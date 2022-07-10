<?php
session_start();
include '../../connections/connection.php';

//$image_original = $_video['image_video_original'];
//$image_video = $_video['image_video'];

$arquivo = isset($_FILES["image_video"]) ? $_FILES["image_video"] : FALSE;
if ($arquivo["name"] != "") {

	$imagem = $_FILES['image_video']['name']; // Nome originai da imagem
	$dir = "../../content/img"; // Diretório das imagens
	$salva = $dir."/".$imagem; // Caminho onde vai ficar a imagem no servidor
	move_uploaded_file($_FILES['image_video']['tmp_name'],$salva ); // Este comando move o arquivo do diretório temporário para o caminho especificado acima
	$info_imagem = pathinfo($salva); // Resgatando extensão do arquivo recém-baixado
	$nova_imagem = time().rand(1000,5000).".".$info_imagem['extension']; // Nome da imagem redimensionada
	// *** Include the class
	// ESte arquivo está no arquivo ZIPADO do artigo
	require_once "resize-class.php";
	// *** 1) Initialise / load image
	$resizeObj = new resize($salva);
	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	$resizeObj -> resizeImage(800, 600, 'crop');
	/* Especificando que a nova imagem terá 200 px de largura e altura. E utilizando a opção CROP, que é considerada a melhor
	pois, recorta a imagem na medida sem distorção*/
	// *** 3) Save image
	$resizeObj -> saveImage($dir."/".$nova_imagem, 80);
	// O arquivo-base é removido
	unlink($salva);
	
} else {
	$nova_imagem = $_video["image_video_original"];
}

$id          = mysqli_real_escape_string($connectionSql, $_POST['id_video']);
$id_category = mysqli_real_escape_string($connectionSql, $_POST['id_category_video']);
$data        = substr($_POST['date_video'],6,4).'-'.substr($_POST['date_video'],3,2).'-'.substr($_POST['date_video'],0,2);
$title       = mysqli_real_escape_string($connectionSql, $_POST['title_video']);
$desc        = mysqli_real_escape_string($connectionSql, $_POST['desc_video']);
$tags        = mysqli_real_escape_string($connectionSql, $_POST['tags_video']);
$text        = mysqli_real_escape_string($connectionSql, $_POST['text']);
$status      = mysqli_real_escape_string($connectionSql, $_POST['status_video']);

$updateContent = "UPDATE video SET id_category_video='$id_category', date_video='$data', title_video='$title', desc_video='$desc', tags_video='$tags', text_video='$text', image_video='$nova_imagem', status_video='$status' WHERE id_video='$id'";
$result_video = mysqli_query($connectionSql, $updateContent);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../query_video.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../query_video.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>