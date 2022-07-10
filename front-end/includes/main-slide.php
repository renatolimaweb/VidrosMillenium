	<section class="home-slider owl-carousel">
	  <?
		$sql_slideshow = "SELECT * FROM slideshow WHERE status_slideshow = 1 ORDER BY id_slideshow ASC LIMIT 0,5";
		$result_slideshow = mysqli_query($connectionSql, $sql_slideshow) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
		while($row_slideshow=mysqli_fetch_array($result_slideshow)) {
	  ?>
      <div class="slider-item" style="background-image:url(content/img/<?=$row_slideshow["image_slideshow"];?>);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-end">
          <div class="col-md-6 text ftco-animate pl-md-5">
            <h1 class="mb-4"><?=$row_slideshow["title_slideshow"];?><span> <?=$row_slideshow["desc_slideshow"];?></span></h1>
            <p><a href="<?=$row_slideshow["url_slideshow"];?>" class="btn btn-secondary px-4 py-3 mt-3">Solicite seu orçamento</a></p>
          </div>
        </div>
        </div>
      </div>
	  <? } ?>
    </section>