<div class="row">

								<div class="col-md-6">
                                                <?php
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_post = "SELECT * FROM post";
            $search_total_post = mysqli_query($connectionSql, $query_search_total_post) or die(mysqli_error());
            $row_search_total_poste = mysqli_fetch_assoc($search_total_post);
            $totalRows_search_total_post = mysqli_num_rows($search_total_post);
			
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_post_inactive = "SELECT * FROM post WHERE status_post <> 1";
            $search_total_post_inactive = mysqli_query($connectionSql, $query_search_total_post) or die(mysqli_error());
            $row_search_total_post_inactive = mysqli_fetch_assoc($search_total_post_inactive);
            $totalRows_search_total_post_inactive = mysqli_num_rows($search_total_post_inactive);
			
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_post_active = "SELECT * FROM post WHERE status_post = 1";
            $search_total_post_active = mysqli_query($connectionSql, $query_search_total_post) or die(mysqli_error());
            $row_search_total_post_active = mysqli_fetch_assoc($search_total_post_active);
            $totalRows_search_total_post_active = mysqli_num_rows($search_total_post_active);
            ?>
								

										<section class="card mb-4">
											<div class="card-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fas fa-file-alt"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Post's</h4>
                                                                <div class="info">
                                                                    <strong class="amount mr-2"><?=$totalRows_search_total_post;?></strong>
                                                                    <span class="text-default mr-2" title="active"><i class="fas fa-check-circle"></i> (<?=$totalRows_search_total_post_active;?>)</span>
                                                                    <span class="text-default" title="inactive"><i class="fas fa-ban"></i> (<?=$totalRows_search_total_post_inactive;?>)</span>
                                                                </div>
														</div>
														<div class="summary-footer" style="border-color:#185172; color:#FFF;">
															<a style="color:#FFF;" href="query_post.php"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-default btn-sm"><i class="fa fa-eye"></i> Todos os Post's</span></a>
															<a href="#"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-info btn-sm"><i class="fa fa-check"></i> Cadastrar</span></a>
														</div>
													</div>
												</div>
											</div>
										</section>
								</div>

								<div class="col-md-6">
                                                <?php
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_page = "SELECT * FROM page";
            $search_total_page = mysqli_query($connectionSql, $query_search_total_page) or die(mysqli_error());
            $row_search_total_page = mysqli_fetch_assoc($search_total_page);
            $totalRows_search_total_page = mysqli_num_rows($search_total_page);
			
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_page_inactive = "SELECT * FROM page WHERE status_page <> 1";
            $search_total_page_inactive = mysqli_query($connectionSql, $query_search_total_page_inactive) or die(mysqli_error());
            $row_search_total_page_inactive = mysqli_fetch_assoc($search_total_page_inactive);
            $totalRows_search_total_page_inactive = mysqli_num_rows($search_total_page_inactive);
			
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_page_active = "SELECT * FROM page WHERE status_page = 1";
            $search_total_page_active = mysqli_query($connectionSql, $query_search_total_page_active) or die(mysqli_error());
            $row_search_total_page_active = mysqli_fetch_assoc($search_total_page_active);
            $totalRows_search_total_page_active = mysqli_num_rows($search_total_page_active);
            ?>
												

												<section class="card mb-4">
													<div class="card-body bg-primary">
														<div class="widget-summary">
															<div class="widget-summary-col widget-summary-col-icon">
																<div class="summary-icon">
																	<i class="fas fa-copy"></i>
																</div>
															</div>
															<div class="widget-summary-col">
																<div class="summary">
																	<h4 class="title">Páginas</h4>
																	<div class="info">
                                                                    <strong class="amount mr-2"><?=$totalRows_search_total_page;?></strong>
																		<span class="text-default mr-2" title="active"><i class="fas fa-check-circle"></i> (<?=$totalRows_search_total_page_active;?>)</span>
																		<span class="text-default" title="inactive"><i class="fas fa-ban"></i> (<?=$totalRows_search_total_page_inactive;?>)</span>
																	</div>
																</div>
																<div class="summary-footer" style="border-color:#185172; color:#FFF;">
																	<a style="color:#FFF;" href="query_page.php"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-default btn-sm"><i class="fa fa-eye"></i> Consultar</span></a>
																	<a href="page_control.php"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-info btn-sm"><i class="fa fa-check"></i> Cadastrar</span></a>
																</div>
															</div>
														</div>
													</div>
												</section>
						</div>
	
						<div class="col-md-6">
                                                <?php
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_social_network = "SELECT * FROM social_network";
            $search_total_social_network = mysqli_query($connectionSql, $query_search_total_social_network) or die(mysqli_error());
            $row_search_total_social_network = mysqli_fetch_assoc($search_total_social_network);
            $totalRows_search_total_social_network = mysqli_num_rows($search_total_social_network);
			
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_social_network_inactive = "SELECT * FROM social_network  WHERE status_social_network <> 1";
            $search_total_social_network_inactive = mysqli_query($connectionSql, $query_search_total_social_network_inactive) or die(mysqli_error());
            $row_search_total_social_network_inactive = mysqli_fetch_assoc($search_total_social_network_inactive);
            $totalRows_search_total_social_network_inactive = mysqli_num_rows($search_total_social_network_inactive);
			
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_social_network_active = "SELECT * FROM social_network WHERE status_social_network = 1";
            $search_total_social_network_active = mysqli_query($connectionSql, $query_search_total_social_network_active) or die(mysqli_error());
            $row_search_total_social_network_active = mysqli_fetch_assoc($search_total_social_network_active);
            $totalRows_search_total_social_network_active = mysqli_num_rows($search_total_social_network_active);
            ?>
												

												<section class="card mb-4">
													<div class="card-body bg-primary">
														<div class="widget-summary">
															<div class="widget-summary-col widget-summary-col-icon">
																<div class="summary-icon">
																	<i class="far fa-thumbs-up"></i>
																</div>
															</div>
															<div class="widget-summary-col">
																<div class="summary">
																	<h4 class="title">Redes Sociais</h4>
																	<div class="info">
																		<strong class="amount mr-2"><?=$totalRows_search_total_social_network;?></strong>
																		<span class="text-default mr-2" title="active"><i class="fas fa-check-circle"></i> (<?=$totalRows_search_total_social_network_active;?>)</span>
																		<span class="text-default" title="inactive"><i class="fas fa-ban"></i> (<?=$totalRows_search_total_social_network_inactive;?>)</span>
																	</div>
																</div>
																<div class="summary-footer" style="border-color:#185172; color:#FFF;">
																	<a style="color:#FFF;" href="#"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-default btn-sm"><i class="fa fa-eye"></i> Consultar</span></a>
																	<a href="#"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-info btn-sm"><i class="fa fa-check"></i> Cadastrar</span></a>
																</div>
															</div>
														</div>
													</div>
												</section>
						</div>

						<div class="col-md-6">
                                                <?php
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_link = "SELECT * FROM link";
            $search_total_link = mysqli_query($connectionSql, $query_search_total_link) or die(mysqli_error());
            $row_search_total_link = mysqli_fetch_assoc($search_total_link);
            $totalRows_search_total_link = mysqli_num_rows($search_total_link);
			
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_link_inactive = "SELECT * FROM link  WHERE status_link <> 1";
            $search_total_link_inactive = mysqli_query($connectionSql, $query_search_total_link_inactive) or die(mysqli_error());
            $row_search_total_link_inactive = mysqli_fetch_assoc($search_total_link_inactive);
            $totalRows_search_total_link_inactive = mysqli_num_rows($search_total_link_inactive);
			
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_link_active = "SELECT * FROM link WHERE status_link = 1";
            $search_total_link_active = mysqli_query($connectionSql, $query_search_total_link_active) or die(mysqli_error());
            $row_search_total_link_active = mysqli_fetch_assoc($search_total_link_active);
            $totalRows_search_total_link_active = mysqli_num_rows($search_total_link_active);
            ?>
												

												<section class="card mb-4">
													<div class="card-body bg-primary">
														<div class="widget-summary">
															<div class="widget-summary-col widget-summary-col-icon">
																<div class="summary-icon">
																	<i class="fas fa-link"></i>
																</div>
															</div>
															<div class="widget-summary-col">
																<div class="summary">
																	<h4 class="title">Links Úteis</h4>
																	<div class="info">
																		<strong class="amount mr-2"><?=$totalRows_search_total_link;?></strong>
																		<span class="text-default mr-2" title="active"><i class="fas fa-check-circle"></i> (<?=$totalRows_search_total_link_active;?>)</span>
																		<span class="text-default" title="inactive"><i class="fas fa-ban"></i> (<?=$totalRows_search_total_link_inactive;?>)</span>
																	</div>
																</div>
																<div class="summary-footer" style="border-color:#185172; color:#FFF;">
																	<a style="color:#FFF;" href="#"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-default btn-sm"><i class="fa fa-eye"></i> Consultar</span></a>
																	<a href="#"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-info btn-sm"><i class="fa fa-check"></i> Cadastrar</span></a>
																</div>
															</div>
														</div>
													</div>
												</section>
						</div>

						<div class="col-md-6">
                                                <?php
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_user = "SELECT * FROM user";
            $search_total_user = mysqli_query($connectionSql, $query_search_total_user) or die(mysqli_error());
            $row_search_total_user = mysqli_fetch_assoc($search_total_user);
            $totalRows_search_total_user = mysqli_num_rows($search_total_user);
			
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_user_inactive = "SELECT * FROM user  WHERE status_user <> 1";
            $search_total_user_inactive = mysqli_query($connectionSql, $query_search_total_user_inactive) or die(mysqli_error());
            $row_search_total_user_inactive = mysqli_fetch_assoc($search_total_user_inactive);
            $totalRows_search_total_user_inactive = mysqli_num_rows($search_total_user_inactive);
			
			mysqli_select_db($connectionSql, $sql_database);
            $query_search_total_user_active = "SELECT * FROM user WHERE status_user = 1";
            $search_total_user_active = mysqli_query($connectionSql, $query_search_total_user_active) or die(mysqli_error());
            $row_search_total_user_active = mysqli_fetch_assoc($search_total_user_active);
            $totalRows_search_total_user_active = mysqli_num_rows($search_total_user_active);
            ?>
												

												<section class="card mb-4">
													<div class="card-body bg-primary">
														<div class="widget-summary">
															<div class="widget-summary-col widget-summary-col-icon">
																<div class="summary-icon">
																	<i class="fas fa-user-lock"></i>
																</div>
															</div>
															<div class="widget-summary-col">
																<div class="summary">
																	<h4 class="title">Usuários</h4>
																	<div class="info">
																		<strong class="amount mr-2"><?=$totalRows_search_total_user;?></strong>
																		<span class="text-default mr-2" title="active"><i class="fas fa-check-circle"></i> (<?=$totalRows_search_total_user_active;?>)</span>
																		<span class="text-default" title="inactive"><i class="fas fa-ban"></i> (<?=$totalRows_search_total_user_inactive;?>)</span>
																	</div>
																</div>
																<div class="summary-footer" style="border-color:#185172; color:#FFF;">
																	<a style="color:#FFF;" href="#"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-default btn-sm"><i class="fa fa-eye"></i> Consultar</span></a>
																	<a href="#"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-info btn-sm"><i class="fa fa-check"></i> Cadastrar</span></a>
																</div>
															</div>
														</div>
													</div>
												</section>
						</div>
	
						<div class="col-md-6">
												<section class="card mb-4">
													<div class="card-body bg-primary">
														<div class="widget-summary">
															<div class="widget-summary-col widget-summary-col-icon">
																<div class="summary-icon">
																	<i class="fas fa-desktop"></i>
																</div>
															</div>
															<div class="widget-summary-col">
																<div class="summary">
																	<h4 class="title">Interface Web</h4>
																</div>
																<div class="summary-footer" style="border-color:#185172; color:#FFF;">
																	<a style="color:#FFF;" href="interface_web_control.php?cod=1"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-default btn-sm"><i class="fa fa-eye"></i> Consultar</span></a>
																</div>
															</div>
														</div>
													</div>
												</section>
						</div>
	
						<div class="col-md-6">
												<section class="card mb-4">
													<div class="card-body bg-primary">
														<div class="widget-summary">
															<div class="widget-summary-col widget-summary-col-icon">
																<div class="summary-icon">
																	<i class="fas fa-mobile-alt"></i>
																</div>
															</div>
															<div class="widget-summary-col">
																<div class="summary">
																	<h4 class="title">Interface Mobile</h4>
																</div>
																<div class="summary-footer" style="border-color:#185172; color:#FFF;">
																	<a style="color:#FFF;" href="interface_mobile_control.php?cod=1"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-default btn-sm"><i class="fa fa-eye"></i> Consultar</span></a>
																</div>
															</div>
														</div>
													</div>
												</section>
						</div>
	
						<div class="col-md-6">
												<section class="card mb-4">
													<div class="card-body bg-primary">
														<div class="widget-summary">
															<div class="widget-summary-col widget-summary-col-icon">
																<div class="summary-icon">
																	<i class="fas fa-cogs"></i>
																</div>
															</div>
															<div class="widget-summary-col">
																<div class="summary">
																	<h4 class="title">Configurações</h4>
																</div>
																<div class="summary-footer" style="border-color:#185172; color:#FFF;">
																	<a style="color:#FFF;" href="config_control.php?cod=1"><span style="color:#FFF;" class="mb-xs mt-xs mr-xs btn btn-default btn-sm"><i class="fa fa-eye"></i> Consultar</span></a>
																</div>
															</div>
														</div>
													</div>
												</section>
						</div>

					</div>