<!DOCTYPE html>
<html>
<!--HEADER:
		Autore: Fabio Balbiano
		Corso: Tecnologie Web
		Descrizione pagina: pagina php per generare dinamicamente recensioni di film;
-->
	<head>
		<title>TMNT - Rancid Tomatoes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="movie.css" type="text/css" rel="stylesheet" />
    <link rel="icon" href="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/rotten.gif" />
	</head>
	<body>

		<?php
			$movie = $_GET["film"];
			$url_filmInfo = $movie."/info.txt";
			$info = file($url_filmInfo);
		?>

		<div class="banner">
					<img id="banner__upperImg" src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes" />
		</div>
		<h1 id="header-title">TMNT (2007)</h1>
		<div class="main-container">
			<!--Colonna di destra-->
			<div class="main-container__rightside">
				<div>
					<?php
						$url_overview = $movie."/overview.png";
					?>
					<img src= <?=$url_overview?> alt="general overview" />
				</div>
				<div class="rightside__generalOverview">
					<dl>
					<?php
						$url_filmOverview = $movie."/overview.txt";
						foreach (file($url_filmOverview) as $item) {
							list($dt_item, $dd_item) = explode(":", $item);
					?>
							<dt><?=$dt_item?></dt>
							<dd><?=$dd_item?></dd>
					<?php
						}
					?>
					</dl>
				</div>
			</div>
			<!--Colonna sinistra-->
			<div class="main-container__leftside">
				<div class="leftside__leftbanner">

					<?php
						if($info[2] >= 60) {
					?>
							<img id="leftbanner__upperImg" src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/freshbig.png" alt="Rotten" />
							<p id="leftbanner__perc"><?= $info[2]?>%</p>
					<?php
						} else {
					?>
							<img id="leftbanner__upperImg" src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rottenbig.png" alt="Rotten" />
							<p id="leftbanner__perc"><?= $info[2]?>%</p>
					<?php
						}
					?>
				</div>


				<?php
					//carico in un array tutti i nomi dei file che iniziano con "review" di formato .txt
					$filmFile_review = glob($movie."/review*.txt");
					//conto nella cartella del film in questione quanti file review ci sono
					$num_fileReview = count($filmFile_review);
					//nel div sinistro ne metto count/2 (quindi scorrero l'array da 0 a count/2 incluso)
					//nel div destro metto la parte restante (quindi scorro l'array da (count/2)+1 fino a count)
				?>


				<div class="leftReviewContainer">

					<?php
						//adesso scorrendo l'array prendo i singoli dati delle review e vado a caricare i div con i dati

						#per assicurarsi una equa distribuzione delle review sulle due colonne
						if($num_fileReview%2==0) {
							$primo_indice = (int)(($num_fileReview/2)-1);
						} else {
							$primo_indice = (int)($num_fileReview/2);
						}
						for($i = 0; $i<=$primo_indice; $i++) {
							$singleLeftReview_name = $filmFile_review[$i];
							$contenuto_singleLeftReview = file($singleLeftReview_name);
					?>
					<p class="reviewContainer__review">
						<?php
							if(strcmp($contenuto_singleLeftReview[1],"FRESH ")==-1) {
						?>
								<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" />
						<?php
							} else if(strcmp($contenuto_singleLeftReview[1],"ROTTEN ")==-1){
						?>
								<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
						<?php
							}
						?>
						<q><?=$contenuto_singleLeftReview[0]?></q>
					</p>
					<p class="reviewContainer__user">
						<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
						<?=$contenuto_singleLeftReview[2]?><br />
						<span><?=$contenuto_singleLeftReview[3]?></span>
					</p>
					<?php
						}
					?>

				</div>



				<div class="rightReviewContainer">

					<?php
						$secondo_indice = $primo_indice+1;
						for($i = $secondo_indice; $i<$num_fileReview; $i++) {
							$singleRightReview_name = $filmFile_review[$i];
							$contenuto_singleRightReview = file($singleRightReview_name);
					?>
					<p class="reviewContainer__review">
						<?php
							if(strcmp($contenuto_singleRightReview[1],"FRESH ")==-1) {
						?>
								<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/fresh.gif" alt="Fresh" />
						<?php
					} else if(strcmp($contenuto_singleRightReview[1],"ROTTEN ")==-1){
						?>
								<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/rotten.gif" alt="Rotten" />
						<?php
							}
						?>
						<q><?=$contenuto_singleRightReview[0]?></q>
					</p>
					<p class="reviewContainer__user">
						<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
						<?=$contenuto_singleRightReview[2]?><br />
						<span><?=$contenuto_singleRightReview[3]?></span>
					</p>
					<?php
						}
					?>


				</div>

			</div>
			<p class="footer">(1-10) of 88</p>
	  </div>
		<div class="validator">
			<a href="ttp://validator.w3.org/check/referer"><img src="http://webster.cs.washington.edu/w3c-html.png" alt="Validate HTML" /></a> <br />
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
		</div>
	</body>
</html>
