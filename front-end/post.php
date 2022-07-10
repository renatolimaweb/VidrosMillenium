<?php
// Include de Conexão ao Banco de Dados
include 'connections/connection.php';
// Include de Chamada de consultas de Interface Web, Interface Mobile e Paramêtros de Configurações do Website
include 'includes/consult.php';

$post = mysqli_real_escape_string($connectionSql, $_GET['post']);

mysqli_select_db($connectionSql, $sql_database);
$query_search_post = "SELECT * FROM post WHERE id_post = '$post'";
$search_post = mysqli_query($connectionSql, $query_search_post) or die(mysqli_error());
$row_search_post = mysqli_fetch_assoc($search_post);
$totalRows_search_post = mysqli_num_rows($search_post);
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- PARAMÊTROS SEO ESPECÍFICA START -->
	<title><?=$row_search_post["title_post"];?> - <?=$row_search_config["title_config"];?></title>
	<meta name="dc.title" content="<?=$row_search_post["title_post"];?> - <?=$row_search_config["title_config"];?>"/>
	<meta name="description" content="<?=$row_search_post["desc_post"];?>">
	<meta name="DC.description" content="<?=$row_search_post["desc_post"];?>" />
	<meta name="keywords" content="<?=$row_search_post["tags_post"];?>">
	<meta name="DC.subject" content="<?=$row_search_post["tags_post"];?>" />
	<link rel="image_src" type="image/jpeg" title="<?=$row_search_post["title_post"];?> - <?=$row_search_config["title_config"];?>" href="content/img/<?=$row_search_post["image_post"];?>"/>
	<meta content="content/img/<?=$row_search_post["image_post"];?>" property="twitter:image">
	<meta content="<?=$row_search_post["desc_post"];?>" property="twitter:description">
	<meta content="<?=$row_search_post["title_post"];?> - <?=$row_search_config["title_config"];?>" property="twitter:title">
	<meta property="og:title" content="<?=$row_search_post["title_post"];?> - <?=$row_search_config["title_config"];?>"/>
	<meta property="og:site_name" content="<?=$row_search_config["title_config"];?>"/>
	<meta property="og:description" content="<?=$row_search_post["desc_post"];?>"/>
	<meta property="og:image" content="content/img/<?=$row_search_post["image_post"];?>"/>
	<meta property="og:locale" content="pt_br"/>
	<meta property="og:type" content="article" />
	<!-- PARAMÊTROS SEO ESPECÍFICA END -->
    
	<?php
	// PARAMÊTROS SEO GLOBAL
	include 'includes/seo.php';
	// PARAMETROS CSS
	include 'includes/css.php';
	// PARAMETROS MOBILE
	include 'includes/mobile.php';
	?>
  </head>
  <body>
	<?php
	// TOPO
	include 'includes/header.php';
	// MENU
	include 'includes/nav.php';
	?>
	<section class="ftco-section">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-12 wrap-about">
					<div class="heading-section">
						<h2><?=$row_search_post["title_post"];?></h2>
					</div>
					<div>
						<?=$row_search_post["text_post"];?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	// RODAPÉ
	include 'includes/footer.php';
	// PRELOADER
	include 'includes/preloader.php';
	// SCRIPTS
	include 'includes/scripts.php';
	?>
  </body>
</html>
<?php
// Include de Encerramento da Conexão ao Banco de Dados
include 'connections/endConnection.php';
?>