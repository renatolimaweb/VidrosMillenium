<?
session_start();
include '../connections/connection.php';
include '../connections/login_verify.php';

$operacao = "MM_insert";
$botao = "<button type=\"submit\" class=\"btn btn-success btn-lg mr-md\" value=\"Cadastrar\"><i class=\"fa fa-check\"></i> Cadastrar</button>";

if (isset($_GET['cod'])) {
  $colname_search_data = $_GET['cod'];
}
mysqli_select_db($connectionSql, $sql_database);
if ($colname_search_data) {
	$query_search_data = sprintf("SELECT * FROM interface_mobile WHERE id_interface_mobile = '$colname_search_data'");
	$search_data = mysqli_query($connectionSql, $query_search_data) or die(mysqli_error());
	$row_search_data = mysqli_fetch_assoc($search_data);
	$totalRows_search_data = mysqli_num_rows($search_data);
	$operacao = "MM_update";
	$botao = "<button type=\"submit\" class=\"btn btn-primary btn-lg mr-md\" value=\"Cadastrar\"><i class=\"fa fa-check\"></i> Atualizar</button>";
}
//FIM DO COMANDO CONTROLE//
?>
<!doctype html>
<html class="fixed dark">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<meta name="robots" content="noindex" />
		<title>Interface Mobile - Sistema Gerenciador de Conteúdo</title>

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
		<link rel="stylesheet" href="vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />
		<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />
		<link rel="stylesheet" href="vendor/bootstrap-multiselect/css/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="vendor/morris/morris.css" />
		<link rel="stylesheet" href="vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
		<link rel="stylesheet" href="vendor/bootstrap-timepicker/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="vendor/dropzone/basic.css" />
		<link rel="stylesheet" href="vendor/dropzone/dropzone.css" />
		<link rel="stylesheet" href="vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="vendor/summernote/summernote-bs4.css" />
		<link rel="stylesheet" href="vendor/codemirror/lib/codemirror.css" />
		<link rel="stylesheet" href="vendor/codemirror/theme/monokai.css" />


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
						<h2>Interface Mobile</h2>
					</header>

					<!-- start: page -->
                    <div class="row">
                    <div class="col-md-12">

                    <div class="card-body">
					<form method="post" name="controle" class="form-horizontal form-bordered" role="form" <? if ($colname_search_data) { ?> action="classes/update-interface-mobile.php" <? } else { ?> action="classes/insert-page.php" <? } ?> onSubmit="return checkForm(this)" ENCTYPE="multipart/form-data">
                                            
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right" for="inputDefault">Título</label>
												<div class="col-md-6">
													<input name="title_interface_mobile" type="text" class="form-control" id="inputDefault" data-plugin-maxlength maxlength="200" value="<?=$row_search_data["title_interface_mobile"];?>" required>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_16x16"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_16x16"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 16x16 Android | Navegadores:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_16x16" id="icon_16x16" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_32x32"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_32x32"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 32x32:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_32x32" id="icon_32x32" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_36x36"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_36x36"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 36x36:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_36x36" id="icon_36x36" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_48x48"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_48x48"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 48x48:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_48x48" id="icon_48x48" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_57x57"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_57x57"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 57x57:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_57x57" id="icon_57x57" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_60x60"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_60x60"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 60x60:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_60x60" id="icon_60x60" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_70x70"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_70x70"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 70x70:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_70x70" id="icon_70x70" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_72x72"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_72x72"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 72x72:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_72x72" id="icon_72x72" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_76x76"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_76x76"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 76x76:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_76x76" id="icon_76x76" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_96x96"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_96x96"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 96x96:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_96x96" id="icon_96x96" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_114x114"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_114x114"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 114x114:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_114x114" id="icon_114x114" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_120x120"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_120x120"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 120x120:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_120x120" id="icon_120x120" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_144x144"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_144x144"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 144x144:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_144x144" id="icon_144x144" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_150x150"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_150x150"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 150x150:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_150x150" id="icon_150x150" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_152x152"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_152x152"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 152x152:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_152x152" id="icon_152x152" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_180x180"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_180x180"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 180x180:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_180x180" id="icon_180x180" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_192x192"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_192x192"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 192x192:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_192x192" id="icon_192x192" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
						
											<div class="form-group row">
											  <div class="col-sm-12 text-center">
											  <? if ($row_search_data["icon_310x310"]) { ?>
											   <div style="font-size:11px; color:#666; font-family:Arial, Helvetica, sans-serif;">Pré-Visualização:</div>
									<div><img style="padding:5px; border:1px solid #CCC;" src="../content/img/<?=$row_search_data["icon_310x310"];?>" border="0" /></div>
									<? } ?>
											  </div>
											</div>
						
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Ícone 310x310:</label>
												<div class="col-md-6">
													<div class="fileupload fileupload-new" data-provides="fileupload">
														<div class="input-append">
															<div class="uneditable-input">
																<i class="fas fa-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Trocar</span>
																<span class="fileupload-new">Selecionar Arquivo</span>
																<input name="icon_310x310" id="icon_310x310" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
                                            
                                            <div class="form-group row">
												<label class="col-md-3 control-label text-lg-right" for="inputSuccess"></label>
												<div class="col-md-6"> 
												<? if ($colname_search_data) { ?>	
													<button type="submit" class="btn btn-primary btn-lg mr-md" value="Cadastrar"><i class="fa fa-check"></i> Atualizar</button>
												<? } else { ?>
													<button type="submit" class="btn btn-success btn-lg mr-md" value="Cadastrar"><i class="fa fa-check"></i> Cadastrar</button>
											    <? } ?>
											    </div>
                                            </div>
                                            <input type="hidden" name="<?=$operacao;?>" value="controle" />
                                            <input name="icon_16x16_original" type="hidden" id="icon_16x16_original" value="<?=$row_search_data["icon_16x16"];?>" />
											<input name="icon_32x32_original" type="hidden" id="icon_32x32_original" value="<?=$row_search_data["icon_32x32"];?>" />
											<input name="icon_36x36_original" type="hidden" id="icon_36x36_original" value="<?=$row_search_data["icon_36x36"];?>" />
											<input name="icon_48x48_original" type="hidden" id="icon_48x48_original" value="<?=$row_search_data["icon_48x48"];?>" />
											<input name="icon_57x57_original" type="hidden" id="icon_57x57_original" value="<?=$row_search_data["icon_57x57"];?>" />
											<input name="icon_60x60_original" type="hidden" id="icon_60x60_original" value="<?=$row_search_data["icon_60x60"];?>" />
											<input name="icon_70x70_original" type="hidden" id="icon_70x70_original" value="<?=$row_search_data["icon_70x70"];?>" />
											<input name="icon_72x72_original" type="hidden" id="icon_72x72_original" value="<?=$row_search_data["icon_72x72"];?>" />
											<input name="icon_76x76_original" type="hidden" id="icon_76x76_original" value="<?=$row_search_data["icon_76x76"];?>" />
											<input name="icon_96x96_original" type="hidden" id="icon_96x96_original" value="<?=$row_search_data["icon_96x96"];?>" />
											<input name="icon_114x114_original" type="hidden" id="icon_114x114_original" value="<?=$row_search_data["icon_114x114"];?>" />
											<input name="icon_120x120_original" type="hidden" id="icon_120x120_original" value="<?=$row_search_data["icon_120x120"];?>" />
											<input name="icon_144x144_original" type="hidden" id="icon_144x144_original" value="<?=$row_search_data["icon_144x144"];?>" />
											<input name="icon_150x150_original" type="hidden" id="icon_150x150_original" value="<?=$row_search_data["icon_150x150"];?>" />
											<input name="icon_152x152_original" type="hidden" id="icon_152x152_original" value="<?=$row_search_data["icon_152x152"];?>" />
											<input name="icon_180x180_original" type="hidden" id="icon_180x180_original" value="<?=$row_search_data["icon_180x180"];?>" />
											<input name="icon_192x192_original" type="hidden" id="icon_192x192_original" value="<?=$row_search_data["icon_192x192"];?>" />
											<input name="icon_310x310_original" type="hidden" id="icon_310x310_original" value="<?=$row_search_data["icon_310x310"];?>" />
											<? if ($row_search_data["id_interface_mobile"]){ ?>
      										<input name="id_interface_mobile" type="hidden" id="id_interface_mobile" value="<?=$row_search_data["id_interface_mobile"];?>" />
											<? } ?>
										</form>
									</div>
                    
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
		<script src="vendor/select2/js/select2.js"></script>
		<script src="vendor/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
		<script src="vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<script src="vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="vendor/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<script src="vendor/fuelux/js/spinner.js"></script>
		<script src="vendor/dropzone/dropzone.js"></script>
		<script src="vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
		<script src="vendor/codemirror/lib/codemirror.js"></script>
		<script src="vendor/codemirror/addon/selection/active-line.js"></script>
		<script src="vendor/codemirror/addon/edit/matchbrackets.js"></script>
		<script src="vendor/codemirror/mode/javascript/javascript.js"></script>
		<script src="vendor/codemirror/mode/xml/xml.js"></script>
		<script src="vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
		<script src="vendor/codemirror/mode/css/css.js"></script>
		<script src="vendor/summernote/summernote-bs4.js"></script>
		<script src="vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="vendor/ios7-switch/ios7-switch.js"></script>

		<script src="vendor/autosize/autosize.js"></script>
		<script src="vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

		<script src="vendor/bootstrap-datepicker/locales/bootstrap-datepicker.pt-BR.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<script src="js/examples/examples.advanced.form.js"></script>


		<script src="js/ckeditor/ckeditor.js"></script>
		<script src="js/ckfinder/ckfinder.js"></script>
		<script src="js/ckconfig.js"></script>

	</body>
</html>
<?php include '../Connections/endConnection.php'; ?>