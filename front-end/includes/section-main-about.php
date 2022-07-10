	<section class="ftco-section">
		<?php
				mysqli_select_db($connectionSql, $sql_database);
				$query_search_widget = "SELECT * FROM widget WHERE id_widget = 1";
				$search_widget = mysqli_query($connectionSql, $query_search_widget) or die(mysqli_error());
				$row_search_widget = mysqli_fetch_assoc($search_widget);
				$totalRows_search_widget = mysqli_num_rows($search_widget);
		?>
		<?=$row_search_widget["content_widget"];?>
    </section>