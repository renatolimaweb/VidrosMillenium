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
	$query_search_data = sprintf("SELECT * FROM post WHERE id_post = '$colname_search_data'");
	$search_data = mysqli_query($connectionSql, $query_search_data) or die(mysqli_error());
	$row_search_data = mysqli_fetch_assoc($search_data);
	$totalRows_search_data = mysqli_num_rows($search_data);
	$operacao = "MM_update";
	$botao = "<button type=\"submit\" class=\"btn btn-primary btn-lg mr-md\" value=\"Cadastrar\"><i class=\"fa fa-check\"></i> Atualizar</button>";
}
//FIM DO COMANDO CONTROLE//
mysqli_select_db($connectionSql, $sql_database);
$query_search_category_post = "SELECT * FROM category_post ORDER BY title_category_post ASC";
$search_category_post = mysqli_query($connectionSql, $query_search_category_post) or die(mysqli_error());
$row_search_category_post = mysqli_fetch_assoc($search_category_post);
$totalRows_search_category_post = mysqli_num_rows($search_category_post);
?>
<!doctype html>
<html class="fixed dark">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">
		<meta name="robots" content="noindex" />
		<title>Post's - Sistema Gerenciador de Conteúdo</title>

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
						<h2>Post's</h2>
					</header>

					<!-- start: page -->
                    <div class="row">
                    <div class="col-md-12">

                    <div class="card-body">
					<form method="post" name="controle" class="form-horizontal form-bordered" role="form" <? if ($colname_search_data) { ?> action="classes/update-post.php" <? } else { ?> action="classes/insert-post.php" <? } ?> onSubmit="return checkForm(this)" ENCTYPE="multipart/form-data">
                                            
                                            <div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Categoria</label>
												<div class="col-md-6">
													<select id="id_category_post" name="id_category_post" data-plugin-selectTwo class="form-control populate placeholder" placeholder="Selecione a Categoria">
                                                    <option value="">Selecione a Categoria</option>
															<?php
															do {  
															?><option value="<?php echo $row_search_category_post['id_category_post']?>"<?php if (!(strcmp($row_search_category_post['id_category_post'], $row_search_data['id_category_post']))) {echo "selected=\"selected\"";} ?>><?php echo $row_search_category_post['title_category_post']?></option>
																				<?php
															} while ($row_search_category_post = mysqli_fetch_assoc($search_category_post));
															$rows = mysqli_num_rows($search_category_post);
															if($rows > 0) {
																mysqli_data_seek($search_category_post, 0);
																$row_search_category_post = mysqli_fetch_assoc($search_category_post);
															}
															?> 
													</select>
												</div>
											</div>
                    
                                           <div class="form-group row">
													<label class="col-md-3 control-label text-lg-right">Data</label>
													<div class="col-md-6">
														<div class="input-group">
															<span class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fa fa-calendar"></i>
																</span>
															</span>
															<input name="date_post" id="date" data-plugin-datepicker data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control" value="<? if ($row_search_data["date_post"]) {
																$datatrans = explode ("-", $row_search_data["date_post"]); 
																$date = "$datatrans[2]/$datatrans[1]/$datatrans[0]"; 
																echo $date;
															} else {
																echo date("d/m/Y");
															}?>">
														</div>
													</div>
											</div>
                                            
											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right" for="inputDefault">Título</label>
												<div class="col-md-6">
													<input name="title_post" type="text" class="form-control" id="inputDefault" data-plugin-maxlength maxlength="200" value="<?=$row_search_data["title_post"];?>" required>
												</div>
											</div>
                                            
                                            <div class="form-group row">
												<label class="col-md-3 control-label text-lg-right" for="textareaDefault">Descri&ccedil;&atilde;o</label>
												<div class="col-md-6">
													<textarea id="desc_post" name="desc_post" class="form-control" rows="3" data-plugin-maxlength maxlength="240"><?=$row_search_data["desc_post"];?></textarea>
												</div>
											</div>
						
											<div class="form-group row">
												<label for="tags-input" class="col-md-3 control-label text-lg-right">Tags</label>
												<div class="col-md-6">
													<input name="tags_post" id="tags_post" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="<?=$row_search_data["tags_post"];?>" />
												</div>
											</div>
                                            
                                            <div class="form-group row">
													<?php
													    /*
														include("FCKeditor/fckeditor.php");
														$oFCKeditor = new FCKeditor('texto_post');
														$oFCKeditor->BasePath = 'FCKeditor/';
														$oFCKeditor->Value = $row_search_data["texto_post"];
														$oFCKeditor->Width  = '100%';
														$oFCKeditor->Height = '300';
														$oFCKeditor->Create();
														*/
													?>
												<div class="col-md-12">
													<textarea name="text" id="text"><?=$row_search_data["text_post"];?></textarea>
												</div>
											</div>
                                            
                                            <div class="form-group row">
                                             <div class="col-sm-12 text-center">
                                             <? if ($row_search_data["image_post"]) { ?>
                                             	<p>Pré-Visualização:</p>
                                             	<img class="img-responsive" src="../content/img/<?=$row_search_data["image_post"];?>" />
											 <? } ?>
                                             </div>
                                            </div>

											<div class="form-group row">
												<label class="col-md-3 control-label text-lg-right">Imagem de Arquivo (Padrão)</label>
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
																<input name="image_post" id="image_post" type="file" />
															</span>
															<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remover</a>
														</div>
													</div>
												</div>
											</div>
                                            
                                            <div class="form-group row">
												<label class="col-md-3 control-label text-lg-right" for="inputSuccess">Posição</label>
												<div class="col-md-6">
													<select id="position_post" name="position_post" class="form-control mb-md">
														<option value="1" <?php if (!(strcmp(1, $row_search_data['position_post']))) {echo "selected=\"selected\"";} ?>>Página Inicial</option>
                                                        <option value="5" <?php if (!(strcmp(2, $row_search_data['position_post']))) {echo "selected=\"selected\"";} ?>>Internas</option>
													</select>
												</div>
											</div>
                                            
                                            <div class="form-group row">
                                             <label class="col-md-3 control-label text-lg-right">Status</label>
                                             <div class="col-md-9">
                                              <div class="switch switch-sm switch-success">
											  <input id="status_post" name="status_post" value="1" type="checkbox" name="switch" data-plugin-ios-switch <?php if (!(strcmp(1, $row_search_data['status_post']))) {echo "checked=\"checked\"";} else{ echo ""; } ?>/>
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
                                            <input name="image_post_original" type="hidden" id="image_post_original" value="<?=$row_search_data["image_post"];?>" />
											<? if ($row_search_data["id_post"]){ ?>
      										<input name="id_post" type="hidden" id="id_post" value="<?=$row_search_data["id_post"];?>" />
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