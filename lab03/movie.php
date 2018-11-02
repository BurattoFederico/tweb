<!-- Buratto Federico
    tweb 2018/2019
    questa pagina e la continuazione del secondo esercizio,
    aggiunge codice php al precedente file .html in modo da
    riuscire a vedere diverse pagine che attingono a cartelle diverse
    (per il salvataggio di commenti e immagini) ma con la stessa
    struttura html e css-->
    

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Rancid Tomatoes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="movie.css" type="text/css" rel="stylesheet" />
		<link rel="shortcut icon" href="http://courses.cs.washington.edu/courses/cse190m/11sp/homework/2/rotten.gif">
	</head>

	<body>
	<?php
	$movie=$_GET["film"]; # leggo il nome del film
	$info_f = $movie . "/info.txt"; # leggo info.txt
	list($titolo,$anno,$percentuale) = file($info_f,FILE_IGNORE_NEW_LINES);
	?>
        
        <div id = "banner">
        <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes">
        </div>
        
		<h1><?= $titolo?> (<?= $anno ?>)</h1>
		<div class = "main">
			<div id= "right">
				<div>
					<img src="<?= $movie ?>/overview.png" alt="general overview" />
				</div>
				<dl>
				<?php 
					$overview_file = $movie . "/overview.txt"; # leggo il file inerente al film 
					$overview_array = file($overview_file, FILE_IGNORE_NEW_LINES);
            
                    # Scrivo la lista di definizioni
					foreach ($overview_array as $line) {					
						list($dt, $dd) = explode(":", $line);
				?>
					<dt>
						<?= $dt ?> 
					</dt>
					<dd>
						<?= $dd ?>	
					</dd>
				<?php 
					}
				?>
				</dl>
			</div>
			
			<div id = "critica">
				<div id="top_main">
					<?php 
                        #In base alla percentuale scelgo l immagine da mattere vicino a quest ultma 
						if($percentuale >= 60)
							$perc_img = "freshbig.png";
						else
							$perc_img = "rottenbig.png";
					?>
					<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?= $perc_img ?>" alt="Rotten">
					<span><?=$percentuale?>%</span>				
				</div>
				<?php
				$review_files = glob($movie . "/review*.txt"); #leggo le recensioni 
				$num_reviews = count($review_files);
				if($num_reviews > 10) #limito le recensioni a 10
					$num_reviews = 10; 
				$num_reviews_sx = ceil($num_reviews / 2); #le divido in due colonne 
				$num_reviews_dx = floor($num_reviews - $num_reviews_sx);
				?>
				<div class ="column">
					<?php
						for ($i = 0; $i < $num_reviews_sx; $i++) {
							list($review,$img_review,$writer_review,$pubbl_review) = file($review_files[$i],FILE_IGNORE_NEW_LINES);
					?>
					<p class="review">
						<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?=strtolower($img_review);?>.gif" alt="<?=$img_review?>"/>
						<q><?= $review ?></q>
					</p>
					<p class="recensore">
						<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
						<?= $writer_review ?><br />
                        <span class="pubblicazione"> <?= $pubbl_review ?> </span>
					</p>

					<?php						
						}
					?>
				</div>
                <div class="column">
                	<?php		
					for ($i = $num_reviews_sx; $i < $num_reviews; $i++) {
						list($review,$img_review,$writer_review,$pubbl_review) = file($review_files[$i],FILE_IGNORE_NEW_LINES);
					?>
					<p class="review">
						<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?=strtolower($img_review);?>.gif" alt="<?=$img_review?>"/>
						<q><?= $review ?></q>
					</p>
					<p class="info_recensore">
						<img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic" />
						<?= $writer_review ?><br />
                        <span class="pubblicazione"> <?= $pubbl_review ?> </span>
					</p>

					<?php						
						}
					?>
				</div>
			</div>
            <div id="num_reviews">
                <p>(1-<?= $num_reviews ?>) of <?= $num_reviews ?></p>
            </div>
		</div> <!--inserico i validatori-->
		<div id= validators >
			<a href="https://validator.w3.org/check/referer"><img src="http://webster.cs.washington.edu/w3c-html.png" alt="Validate HTML" /></a> <br />
			<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
		</div>
	</body>
</html>
