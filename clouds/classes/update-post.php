<?php
session_start();
include '../../connections/connection.php';

//$image_original = $_POST['image_post_original'];
//$image_post = $_POST['image_post'];

$arquivo = isset($_FILES["image_post"]) ? $_FILES["image_post"] : FALSE;
if ($arquivo["name"] != "") {

	$imagem = $_FILES['image_post']['name']; // Nome originai da imagem
	$dir = "../../content/img"; // Diretório das imagens
	$salva = $dir."/".$imagem; // Caminho onde vai ficar a imagem no servidor
	move_uploaded_file($_FILES['image_post']['tmp_name'],$salva ); // Este comando move o arquivo do diretório temporário para o caminho especificado acima
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
	$nova_imagem = $_POST["image_post_original"];
 }

$id_post          = mysqli_real_escape_string($connectionSql, $_POST['id_post']);
$id_category_post = mysqli_real_escape_string($connectionSql, $_POST['id_category_post']);
$data             = substr($_POST['date_post'],6,4).'-'.substr($_POST['date_post'],3,2).'-'.substr($_POST['date_post'],0,2);
$title_post       = mysqli_real_escape_string($connectionSql, $_POST['title_post']);
$desc_post        = mysqli_real_escape_string($connectionSql, $_POST['desc_post']);
$tags_post        = mysqli_real_escape_string($connectionSql, $_POST['tags_post']);
$text_post        = mysqli_real_escape_string($connectionSql, $_POST['text']);
$position_post    = mysqli_real_escape_string($connectionSql, $_POST['position_post']);
$status_post      = mysqli_real_escape_string($connectionSql, $_POST['status_post']);

$updatePost = "UPDATE post SET id_category_post='$id_category_post', date_post='$data', title_post='$title_post', desc_post='$desc_post', tags_post='$tags_post', text_post='$text_post', image_post='$nova_imagem', position_post='$position_post', status_post='$status_post' WHERE id_post='$id_post'";
$result_post = mysqli_query($connectionSql, $updatePost);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../query_post.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../query_post.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>