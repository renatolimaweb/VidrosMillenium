<?php
session_start();
include '../../connections/connection.php';

//$image_original = $_page['image_page_original'];
//$image_page = $_page['image_page'];

$arquivo = isset($_FILES["image_page"]) ? $_FILES["image_page"] : FALSE;
if ($arquivo["name"] != "") {

	$imagem = $_FILES['image_page']['name']; // Nome originai da imagem
	$dir = "../../content/img"; // Diretório das imagens
	$salva = $dir."/".$imagem; // Caminho onde vai ficar a imagem no servidor
	move_uploaded_file($_FILES['image_page']['tmp_name'],$salva ); // Este comando move o arquivo do diretório temporário para o caminho especificado acima
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
	$nova_imagem = $_page["image_page_original"];
}

$id          = mysqli_real_escape_string($connectionSql, $_POST['id_page']);
$data        = substr($_POST['date_page'],6,4).'-'.substr($_POST['date_page'],3,2).'-'.substr($_POST['date_page'],0,2);
$title       = mysqli_real_escape_string($connectionSql, $_POST['title_page']);
$desc        = mysqli_real_escape_string($connectionSql, $_POST['desc_page']);
$tags        = mysqli_real_escape_string($connectionSql, $_POST['tags_page']);
$text        = mysqli_real_escape_string($connectionSql, $_POST['text']);
$status      = mysqli_real_escape_string($connectionSql, $_POST['status_page']);

$updateContent = "UPDATE page SET date_page='$data', title_page='$title', desc_page='$desc', tags_page='$tags', text_page='$text', image_page='$nova_imagem', status_page='$status' WHERE id_page='$id'";
$result_page = mysqli_query($connectionSql, $updateContent);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../query_page.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../query_page.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>