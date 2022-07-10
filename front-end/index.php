<?php
// Include de Conexão ao Banco de Dados
include 'connections/connection.php';
// Include de Chamada de consultas de Interface Web, Interface Mobile e Paramêtros de Configurações do Website
include 'includes/consult.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- PARAMÊTROS SEO ESPECÍFICA START -->
	<title><?=$row_search_config["title_config"];?></title>
	<meta name="dc.title" content="<?=$row_search_config["title_config"];?>"/>
	<meta name="description" content="<?=$row_search_config["desc_config"];?>">
	<meta name="DC.description" content="<?=$row_search_config["desc_config"];?>" />
	<meta name="keywords" content="<?=$row_search_config["tags_config"];?>">
	<meta name="DC.subject" content="<?=$row_search_config["tags_config"];?>" />
	<link rel="image_src" type="image/jpeg" title="<?=$row_search_config["title_config"];?>" href="content/img/<?=$row_search_interfaceweb["open_graph"];?>"/>
	<meta content="content/img/<?=$row_search_interfaceweb["open_graph"];?>" property="twitter:image">
	<meta content="<?=$row_search_config["desc_config"];?>" property="twitter:description">
	<meta content="<?=$row_search_config["title_config"];?>" property="twitter:title">
	<meta property="og:title" content="<?=$row_search_config["title_config"];?>"/>
	<meta property="og:site_name" content="<?=$row_search_config["title_config"];?>"/>
	<meta property="og:description" content="<?=$row_search_config["desc_config"];?>"/>
	<meta property="og:image" content="content/img/<?=$row_search_interfaceweb["open_graph"];?>"/>
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
	// DESTAQUES
	include 'includes/main-slide.php';
	// RESUMO
	include 'includes/section-main-about.php';
	// RESUMO
	include 'includes/section-main-resume.php';
	// SERVIÇOS
	include 'includes/section-main-service.php';
	// BLOG
	include 'includes/section-main-blog.php';
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