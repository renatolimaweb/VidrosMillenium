<?php
session_start();
include '../../connections/connection.php';

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
pois, recorta a imagem na medida sem distorção
*/
// *** 3) Save image
$resizeObj -> saveImage($dir."/".$nova_imagem, 80);
// O arquivo-base é removido
unlink($salva);



$id_category_post = mysqli_real_escape_string($connectionSql, $_POST['id_category_post']);
$data             = substr($_POST['date_post'],6,4).'-'.substr($_POST['date_post'],3,2).'-'.substr($_POST['date_post'],0,2);
$title_post       = mysqli_real_escape_string($connectionSql, $_POST['title_post']);
$desc_post 		  = mysqli_real_escape_string($connectionSql, $_POST['desc_post']);
$tags_post 		  = mysqli_real_escape_string($connectionSql, $_POST['tags_post']);
$text_post        = mysqli_real_escape_string($connectionSql, $_POST['text']);
$position_post    = mysqli_real_escape_string($connectionSql, $_POST['position_post']);
$status_post      = mysqli_real_escape_string($connectionSql, $_POST['status_post']);

$insertPost = "INSERT INTO post (id_category_post, date_post, title_post, desc_post, tags_post, text_post, image_post, position_post, status_post) VALUES ('$id_category_post', '$data', '$title_post', '$desc_post', '$tags_post', '$text_post', '$nova_imagem', '$position_post', '$status_post')";
$result_post = mysqli_query($connectionSql, $insertPost);

if(mysqli_insert_id($connectionSql)){ ?>
	<SCRIPT language="JavaScript">
		alert("Cadastro realizado com sucesso!");
		location.href="../query_post.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao inserir!");
		location.href="../query_post.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>