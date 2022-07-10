<?php
session_start();
include '../../connections/connection.php';

//$image_original = $_POST['image_post_original'];
//$image_post = $_POST['image_post'];

$arquivo = isset($_FILES["image_user"]) ? $_FILES["image_user"] : FALSE;
if ($arquivo["name"] != "") {

	$imagem = $_FILES['image_user']['name']; // Nome originai da imagem
	$dir = "../../content/img"; // Diretório das imagens
	$salva = $dir."/".$imagem; // Caminho onde vai ficar a imagem no servidor
	move_uploaded_file($_FILES['image_user']['tmp_name'],$salva ); // Este comando move o arquivo do diretório temporário para o caminho especificado acima
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
	$nova_imagem = $_POST["image_user_original"];
 }

$id_user           = mysqli_real_escape_string($connectionSql, $_POST['id_user']);
$id_category_user  = mysqli_real_escape_string($connectionSql, $_POST['id_category_user']);
$data              = substr($_POST['date_user'],6,4).'-'.substr($_POST['date_user'],3,2).'-'.substr($_POST['date_user'],0,2);
$name_user         = mysqli_real_escape_string($connectionSql, $_POST['name_user']);
$desc_user         = mysqli_real_escape_string($connectionSql, $_POST['desc_user']);
$tags_user         = mysqli_real_escape_string($connectionSql, $_POST['tags_user']);
$address_user      = mysqli_real_escape_string($connectionSql, $_POST['address_user']);
$district_user     = mysqli_real_escape_string($connectionSql, $_POST['district_user']);
$zipcode_user      = mysqli_real_escape_string($connectionSql, $_POST['zipcode_user']);
$city_user         = mysqli_real_escape_string($connectionSql, $_POST['city_user']);
$state_user        = mysqli_real_escape_string($connectionSql, $_POST['state_user']);
$country_user      = mysqli_real_escape_string($connectionSql, $_POST['country_user']);
$email_user        = mysqli_real_escape_string($connectionSql, $_POST['email_user']);
$phone_user        = mysqli_real_escape_string($connectionSql, $_POST['phone_user']);
$phone_mobile_user = mysqli_real_escape_string($connectionSql, $_POST['phone_mobile_user']);
$whatsapp_user     = mysqli_real_escape_string($connectionSql, $_POST['whatsapp_user']);
$facebook_user     = mysqli_real_escape_string($connectionSql, $_POST['facebook_user']);
$instagram_user    = mysqli_real_escape_string($connectionSql, $_POST['instagram_user']);
$password_user     = mysqli_real_escape_string($connectionSql, $_POST['password_user']);
$status_user       = mysqli_real_escape_string($connectionSql, $_POST['status_user']);

$updateUser = "UPDATE user SET id_category_user='$id_category_user', date_user='$data', name_user='$name_user', desc_user='$desc_user', tags_user='$tags_user', address_user='$address_user', district_user='$district_user', zipcode_user='$zipcode_user', city_user='$city_user', state_user='$state_user', country_user='$country_user', email_user='$email_user', phone_user='$phone_user', phone_mobile_user='$phone_mobile_user', whatsapp_user='$whatsapp_user', facebook_user='$facebook_user', instagram_user='$instagram_user', password_user='$password_user', image_user='$nova_imagem', status_user='$status_user' WHERE id_user='$id_user'";
$result_user = mysqli_query($connectionSql, $updateUser);

if(mysqli_affected_rows($connectionSql)){ ?>
    <SCRIPT language="JavaScript">
		alert("Cadastro atualizado com sucesso!");
		location.href="../query_user.php";
	</script>
<? }else{ ?>
	<SCRIPT language="JavaScript">
		alert("Ocorreu um erro ao cadastrar!");
		location.href="../query_user.php";
	</script>
<? } ?>
<?php include '../../Connections/endConnection.php'; ?>