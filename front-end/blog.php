<?php
// Include de Conexão ao Banco de Dados
include 'connections/connection.php';
// Include de Chamada de consultas de Interface Web, Interface Mobile e Paramêtros de Configurações do Website
include 'includes/consult.php';

$page = $_REQUEST['page'];
$pag_views = 6; //TOTAL DE REGISTROS POR PÁGINA//
if (!$page) {
   $page = 1;
} else {
   $page = $page;
}
$mat = $page - 1; 
$start = $mat * $pag_views;
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- PARAMÊTROS SEO ESPECÍFICA START -->
	<title>Blog - <?=$row_search_config["title_config"];?></title>
	<meta name="dc.title" content="Blog - <?=$row_search_config["title_config"];?>"/>
	<meta name="description" content="<?=$row_search_config["desc_config"];?>">
	<meta name="DC.description" content="<?=$row_search_config["desc_config"];?>" />
	<meta name="keywords" content="<?=$row_search_config["tags_config"];?>">
	<meta name="DC.subject" content="<?=$row_search_config["tags_config"];?>" />
	<link rel="image_src" type="image/jpeg" title="<?=$row_search_config["title_config"];?>" href="content/img/<?=$row_search_interfaceweb["open_graph"];?>"/>
	<meta content="content/img/<?=$row_search_interfaceweb["open_graph"];?>" property="twitter:image">
	<meta content="<?=$row_search_config["desc_config"];?>" property="twitter:description">
	<meta content="Blog - <?=$row_search_config["title_config"];?>" property="twitter:title">
	<meta property="og:title" content="Blog - <?=$row_search_config["title_config"];?>"/>
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
	?>
	<section class="ftco-section bg-light">
	  <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-section">
					<h2>Blog</h2>
				</div>
			</div>
		  <?
					$sql = "SELECT * FROM post ORDER BY id_post DESC";
                    $result = mysqli_query($connectionSql, $sql);
					$rows = mysqli_num_rows($result); //NUMERO DE rows DA CONSULTA.//
					$limit = "$sql LIMIT $start,$pag_views";
					$execute = mysqli_query($connectionSql, $limit);  //limitNDO//
					$pages = $rows / $pag_views; //CALCULANDO O TOTAL DE PÁGINAS.//
					$return = $page - 1; //VALORES DO BOTÃO returnR.//
					$next = $page + 1;  //VALORES DO BOTÃO PRÓXIMO.//
					while ($row = mysqli_fetch_array($execute)) {
					$code 			    = $row["id_post"];
					$title	        	= $row["title_post"];
					$desc	        	= $row["desc_post"];
					$tags	        	= $row["tags_post"];
					$image	        	= $row["image_post"];
					$status             = $row["status_post"];
          ?>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="post.php?post=<?=$code;?>" class="block-20" style="background-image: url('content/img/<?=$image;?>');">
              </a>
              <div class="text pt-4">
                <h3 class="heading"><a href="post.php?post=<?=$code;?>"><?=$linha["title_post"];?></a></h3>
                <p><? echo substr($desc,0,140); ?>...</p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0"><a href="post.php?post=<?=$code;?>" class="btn btn-primary">Saiba mais <span class="ion-ios-arrow-round-forward"></span></a></p>
                </div>
              </div>
            </div>
          </div>
		  <? } ?>
        </div>
        <div class="row no-gutters my-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
				<?
                  //PÁGINAÇÃO//
                  For ($i = 0; $i <= $pages; $i++){
                  $pag =  $i +1;							
                  if ($pag <> $page) {
					  echo "<li><a href=$PHP_SELF?page=$pag>$pag</a></li>";
					  } else {
					  echo "<li class=\"active\"><span>$pag</span></li>";
					  }
                  }
                  //FIM DA PÁGINAÇÃO.//
                ?>
              </ul>
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