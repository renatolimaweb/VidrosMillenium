<?
session_start();
include '../connections/connection.php';
include '../connections/login_verify.php';

$page = $_REQUEST['page'];
$pag_views = 16; //TOTAL DE REGISTROS POR PÁGINA//
if (!$page) {
   $page = 1;
} else {
   $page = $page;
}
$mat = $page - 1; 
$start = $mat * $pag_views;
?>
<!doctype html>
<html class="fixed dark">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<meta name="robots" content="noindex" />
		<title>Usuários - Sistema Gerenciador de Conteúdo</title>

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="vendor/animate/animate.css">

		<link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="vendor/morris/morris.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.js"></script>
		
		<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
		<link rel="manifest" href="img/favicon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<? include("includes/header.php"); ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<? include("includes/sidebar-nav.php"); ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Usuários</h2>
					</header>

					<!-- start: page -->
                    <div class="row">
                    <div class="col-md-12">

                    <section class="card">
						<div class="panel-body" style="padding-bottom:0;">
                        <form action="<?php echo $editFormAction; ?>" method="get" name="form1" class="search-line block" role="form">
							<div class="input-group mb-md">
						     <input name="search" value="<?PHP echo $descsearch;?>" type="text" placeholder="Pesquise por Título..." class="form-control">
                             <input name="tp" type="hidden" id="tp" value="<?=$type_content?>" />
                             <input type="hidden" name="Consulta" value="form1">
							 <span class="input-group-btn">
							  <button class="btn btn-primary" type="button">Pesquisar</button>
							 </span>
							</div>
                        </form>    
						</div>
					</section>

                    <section class="card">
						<div class="card-body">
							<div class="input-group mb-md">
                             <a href="user_control.php?tp=<?=$type_content;?>"><span class="btn btn-lg btn-success"><i class="fa fa-check"></i> Cadastrar</span></a>
							</div>
						</div>
					</section>

                    <?
				if ($_REQUEST["Consulta"] != "") {
					$descsearch = $_REQUEST['search'];
					    if ($category_user_valid == 1) {
						$sql = "SELECT * FROM user WHERE (name_user like '%$descsearch%') ORDER BY name_user DESC";
						}
						if ($category_user_valid <> 1) {
						$sql = "SELECT * FROM user WHERE (name_user like '%$descsearch%') ORDER BY name_user DESC";
						}
				} else { 
				    
					if ($_REQUEST['Del'] == "del") {
						$code = $_REQUEST['code'];
						$sql = "DELETE FROM user WHERE id_user = '$code'";
						$result = mysqli_query($connectionSql, $sql) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
					}
					    //if ($category_user_valid == 1) {
						//$sql = "SELECT * FROM post ORDER BY date_post DESC, id_post DESC";
						//}
						//if ($category_user_valid <> 1) {
						$sql = "SELECT * FROM user, category_user WHERE user.id_category_user = category_user.id_category_user ORDER BY date_user DESC, id_user DESC";
						//}
				}
		
				$result = mysqli_query($connectionSql, $sql) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
				$rows = mysqli_num_rows($result); //NUMERO DE rows DA CONSULTA.//
				$limit = "$sql LIMIT $start,$pag_views";
				$execute = mysqli_query($connectionSql, $limit);  //limitNDO//
				$pages = $rows / $pag_views; //CALCULANDO O TOTAL DE PÁGINAS.//
				$return = $page - 1; //VALORES DO BOTÃO returnR.//
				$next = $page + 1;  //VALORES DO BOTÃO PRÓXIMO.//
				while ($row=mysqli_fetch_array($execute)) {
				$code 			    = $row["id_user"];
				$title	        	= $row["name_user"];
				$category       	= $row["title_category_user"];
				$image	        	= $row["image_user"];
				$status             = $row["status_user"];
				
				?>
                             <section class="card">
									<div class="card-body">
                                    <div class="row">
                                    <div class="col-md-3">
                                    <img src="../content/img/<?=$image;?>" class="img-fluid" alt="<?=$title;?>">
                                    </div>
                                    <div class="col-md-9">
                                        <p class="pull-right">
                                         <a href="user_control.php?cod=<?=$code;?>" title="Editar"><span class="btn btn-warning"><i class="fas fa-edit"></i></span></a>
                                         <a href="query_user.php?Del=del&amp;code=<?=$code?>" onclick="return confirm('Deseja excluir ?')" title="Excluir"><span class="btn btn-danger"><i class="fas fa-trash-alt"></i></span></a>
                                        </p>
                                        <p><i class="fa fa-datebase"></i> #<?=$code;?></p>
										<h4><?=$title;?></h4>
                                        <p><i class="fa fa-tag"></i> <?=$category;?></p>
                                        <p>
                                        <? if($status == 1){ ?>
                                        <span class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> ATIVO</span>
                                        <? } ?>
                                        <? if($status == 2){ ?>
                                        <span class="btn btn-sm btn-default"><i class="fa fa-minus-circle"></i> INATIVO</span>
                                        <? } ?>
                                        </p>
									</div>
                                    </div>
                                   </div>
					         </section>
                             
                             <hr>
                             <? } ?>

                             <section class="card">
                                    <div class="card-body">
                                            <div class="input-group">
                                                    <div class="btn-group">
                                                    <?
                                                        //PÁGINAÇÃO//
                                                        For ($i = 0; $i <= $pages; $i++){
                                                        $pag =  $i +1;							
                                                        if ($pag <> $page) {
                                                        echo "<a href=$PHP_SELF?page=$pag><span class=\"btn btn-default\">$pag</span></a>";
                                                        } else {
                                                        echo "<a href=\"#\"><span class=\"btn btn-primary\">$pag</span></a>";
                                                        }
                                                        }
                                                        //FIM DA PÁGINAÇÃO.//
                                                        ?>
                                                    </div>
                                            </div>
                                    </div>
					         </section>
                    
                    </div>
                    </div>
					<!-- end: page -->
				</section>

			</div>

		</section>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.js"></script>
		<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/nanoscroller/nanoscroller.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="vendor/jquery-ui/jquery-ui.js"></script>
		<script src="vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="vendor/jquery-appear/jquery.appear.js"></script>
		<script src="vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.js"></script>
		<script src="vendor/flot/jquery.flot.js"></script>
		<script src="vendor/flot.tooltip/jquery.flot.tooltip.js"></script>
		<script src="vendor/flot/jquery.flot.pie.js"></script>
		<script src="vendor/flot/jquery.flot.categories.js"></script>
		<script src="vendor/flot/jquery.flot.resize.js"></script>
		<script src="vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="vendor/raphael/raphael.js"></script>
		<script src="vendor/morris/morris.js"></script>
		<script src="vendor/gauge/gauge.js"></script>
		<script src="vendor/snap.svg/snap.svg.js"></script>
		<script src="vendor/liquid-meter/liquid.meter.js"></script>
		<script src="vendor/jqvmap/jquery.vmap.js"></script>
		<script src="vendor/jqvmap/date/jquery.vmap.sampledate.js"></script>
		<script src="vendor/jqvmap/maps/jquery.vmap.world.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
		<script src="vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.dashboard.js"></script>

	</body>
</html>
<?php include '../Connections/endConnection.php'; ?>