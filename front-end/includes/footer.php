	<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-12">
          <div class="col-md">
            <div class="ftco-footer-widget mb-12 text-center">
              <h2 class="ftco-heading-2 logo"><img class="img-fluid" src="content/img/<?=$row_search_interfaceweb["logo"];?>" alt="<?=$row_search_config["title_config"];?>"></h2>
              <p><?=$row_search_config["desc_config"];?></p>
              <ul class="ftco-footer-social list-unstyled mt-3 text-center">
				<?
				$sql_social_network = "SELECT * FROM social_network WHERE status_social_network = 1 ORDER BY id_social_network DESC LIMIT 0,5";
				$result_social_network = mysqli_query($connectionSql, $sql_social_network) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
				while($row_social_network=mysqli_fetch_array($result_social_network)) {
				?>
                <li class="ftco-animate"><a href="<?=$row_social_network["url_social_network"];?>"><span class="<?=$row_social_network["icon_social_network"];?>"></span></a></li>
				<? } ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados <i class="icon-laptop" aria-hidden="true"></i> Desenvolvido por <a href="#" target="_blank">Renato Lima</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>