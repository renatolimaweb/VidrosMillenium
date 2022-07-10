<header class="header">
				<div class="logo-container">
					<a href="home.php" class="logo">
						<img src="img/sistema/logo-login.png" height="35" alt="Sistema Gerenciador de Conteúdo" />
					</a>
					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
						<? if ($image_user_logged){ ?>
							<figure class="profile-picture">
								<img src="../content/img/<?=$image_user_logged;?>"  alt="<?=$name_user_logged;?>" class="rounded-circle" data-lock-picture="../content/img/<?=$image_user_logged;?>" />
							</figure>
						<? } else { ?>
							<figure class="profile-picture">
								<img src="img/sistema/user-default.png"  alt="<?=$name_user_logged;?>" class="rounded-circle" data-lock-picture="conteudo/img/<?=$image_user_valid;?>" />
							</figure>
						<? } ?>
							<div class="profile-info" data-lock-name="<?php echo $name_user_logged;?>" data-lock-email="<?php echo $email_user_valid;?>">
								<span class="name"><?php echo $name_user_logged;?></span>
								<span class="role"><?php echo $category_user_logged;?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="#"><i class="fas fa-user"></i> Meus Dados</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="classes/logout.php"><i class="fas fa-power-off"></i> Sair</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>