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
	<title>Fale Conosco - <?=$row_search_config["title_config"];?></title>
	<meta name="dc.title" content="Fale Conosco - <?=$row_search_config["title_config"];?>"/>
	<meta name="description" content="<?=$row_search_config["desc_config"];?>">
	<meta name="DC.description" content="<?=$row_search_config["desc_config"];?>" />
	<meta name="keywords" content="<?=$row_search_config["tags_config"];?>">
	<meta name="DC.subject" content="<?=$row_search_config["tags_config"];?>" />
	<link rel="image_src" type="image/jpeg" title="Fale Conosco - <?=$row_search_config["title_config"];?>" href="content/img/<?=$row_search_interfaceweb["open_graph"];?>"/>
	<meta content="content/img/<?=$row_search_interfaceweb["open_graph"];?>" property="twitter:image">
	<meta content="<?=$row_search_config["desc_config"];?>" property="twitter:description">
	<meta content="Fale Conosco - <?=$row_search_config["title_config"];?>" property="twitter:title">
	<meta property="og:title" content="Fale Conosco - <?=$row_search_config["title_config"];?>"/>
	<meta property="og:site_name" content="Fale Conosco - <?=$row_search_config["title_config"];?>"/>
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
	<section class="hero-wrap hero-wrap-2" style="background-image: url('img/1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Fale Conosco</h1>
          </div>
        </div>
      </div>
    </section>
	<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-12 p-4 p-md-5 order-md-last bg-light">
		    <form action="send.php" method="post">
              <div class="form-group">
                <input name="name" type="text" class="form-control" placeholder="Nome" required>
              </div>
              <div class="form-group">
                <input name="email" type="text" class="form-control" placeholder="E-mail" required>
              </div>
              <div class="form-group">
                <input name="subject" type="text" class="form-control" placeholder="Assunto" required>
              </div>
              <div class="form-group">
                <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Mensagem" required></textarea>
              </div>
			  <input name="email_destinatario" type="hidden" id="email_destinatario" value="<?=$row_search_config["email_config"];?>" />
              <div class="form-group">
                <input type="submit" value="Enviar Mensagem" class="btn btn-primary py-3 px-5">
              </div>
            </form>
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