	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item"><a href="index.php" class="nav-link pl-0">Home</a></li>
				<?
				$sql_menu_page = "SELECT * FROM page WHERE status_page = 1 ORDER BY id_page ASC LIMIT 0,5";
				$result_menu_page = mysqli_query($connectionSql, $sql_menu_page) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
				while($row_menu_page=mysqli_fetch_array($result_menu_page)) {
				?>
	        	<li class="nav-item"><a href="page.php?page=<?=$row_menu_page["id_page"];?>" class="nav-link"><?=$row_menu_page["title_page"];?></a></li>
				<? } ?>
	        	<li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Fale Conosco</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>