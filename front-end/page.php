<?php
// Include de Conexão ao Banco de Dados
include 'connections/connection.php';
// Include de Chamada de consultas de Interface Web, Interface Mobile e Paramêtros de Configurações do Website
include 'includes/consult.php';

$page = mysqli_real_escape_string($connectionSql, $_GET['page']);

mysqli_select_db($connectionSql, $sql_database);
$query_search_page = "SELECT * FROM page WHERE id_page = '$page'";
$search_page = mysqli_query($connectionSql, $query_search_page) or die(mysqli_error());
$row_search_page = mysqli_fetch_assoc($search_page);
$totalRows_search_page = mysqli_num_rows($search_page);
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- PARAMÊTROS SEO ESPECÍFICA START -->
	<title><?=$row_search_page["title_page"];?> - <?=$row_search_config["title_config"];?></title>
	<meta name="dc.title" content="<?=$row_search_page["title_page"];?> - <?=$row_search_config["title_config"];?>"/>
	<meta name="description" content="<?=$row_search_page["desc_page"];?>">
	<meta name="DC.description" content="<?=$row_search_page["desc_page"];?>" />
	<meta name="keywords" content="<?=$row_search_page["tags_page"];?>">
	<meta name="DC.subject" content="<?=$row_search_page["tags_page"];?>" />
	<link rel="image_src" type="image/jpeg" title="<?=$row_search_page["title_page"];?> - <?=$row_search_config["title_config"];?>" href="content/img/<?=$row_search_page["image_page"];?>"/>
	<meta content="content/img/<?=$row_search_page["image_page"];?>" property="twitter:image">
	<meta content="<?=$row_search_page["desc_page"];?>" property="twitter:description">
	<meta content="<?=$row_search_page["title_page"];?> - <?=$row_search_config["title_config"];?>" property="twitter:title">
	<meta property="og:title" content="<?=$row_search_page["title_page"];?> - <?=$row_search_config["title_config"];?>"/>
	<meta property="og:site_name" content="<?=$row_search_config["title_config"];?>"/>
	<meta property="og:description" content="<?=$row_search_page["desc_page"];?>"/>
	<meta property="og:image" content="content/img/<?=$row_search_page["image_page"];?>"/>
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
						<h2><?=$row_search_page["title_page"];?></h2>
					</div>
					<div>
						<?=$row_search_page["text_page"];?>
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