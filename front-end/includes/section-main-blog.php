	<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Blog</h2>
            <p>Conheça e saiba mais sobre o vidro e outras características internas do funcionamento de uma vidraçaria.</p>
          </div>
        </div>
		<div class="row">
			<?
			$sql_post = "SELECT * FROM post, category_post WHERE post.id_category_post = category_post.id_category_post AND status_post = 1 ORDER BY date_post DESC LIMIT 0,3";
			$result_post = mysqli_query($connectionSql, $sql_post) or die ("N&atilde;o foi poss&iacute;vel realizar a consulta ao banco de dados");
			while($row_post=mysqli_fetch_array($result_post)) {
			$datetrans = explode ("-", $row_post["date_post"]); 
			$date = "$datetrans[2]/$datetrans[1]/$datetrans[0]";
			?>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
              <a href="post.php?post=<?=$row_post["id_post"];?>" class="block-20">
				  <img src="content/img/<?=$row_post["image_post"];?>" alt="<?=$row_post["title_post"];?>">
              </a>
              <div class="text pt-4">
                <h3 class="heading"><a href="post.php?post=<?=$row_post["id_post"];?>"><?=$row_post["title_post"];?></a></h3>
                <p><?=$row_post["desc_post"];?></p>
                <div class="d-flex align-items-center mt-4">
	                <p class="mb-0">
						<a href="post.php?post=<?=$row_post["id_post"];?>" class="btn btn-primary">Saiba mais <span class="ion-ios-arrow-round-forward"></span></a>
					</p>
	                <p class="ml-auto mb-0">
	                	<span class="icon-calendar"></span> <?=$date;?>
	                </p>
                </div>
              </div>
            </div>
          </div>
		  <? } ?>
        </div>
	  </div>
	</section>