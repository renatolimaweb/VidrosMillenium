	<div class="bg-top navbar-light">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-3 d-flex align-items-center py-4">
					<?php
					$number = $row_search_config["phone_config"];
					function telephone($number){
						$number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);
						// primeiro substr pega apenas o DDD e coloca dentro do (), segundo subtr pega os números do 3º até faltar 4, insere o hifem, e o ultimo pega apenas o 4 ultimos digitos
						return $number;
					}
					?>
    				<a class="navbar-brand" href="index.php"><img src="content/img/<?=$row_search_interfaceweb["logo"];?>" alt="<?=$row_search_config["title_config"];?>"></a>
    			</div>
	    		<div class="col-lg-9 d-block">
		    		<div class="row d-flex">
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
					    	<div class="text d-flex align-items-center">
						    	<span><?=$row_search_config["email_config"];?></span>
						    </div>
					    </div>
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <div class="text d-flex align-items-center">
						    	<span><?=$number;?></span>
						    </div>
					    </div>
					    <div class="col-md topper d-flex align-items-center align-items-stretch">
					    	<p class="mb-0 d-flex d-block">
					    		<a target="_blank" href="https://api.whatsapp.com/send?phone=55<?=$row_search_config["phone_config"];?>" class="btn btn-primary d-flex align-items-center justify-content-center">
					    			<span>Solicite um orçamento</span>
					    		</a>
					    	</p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>