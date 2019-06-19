<?php $title = "Biographie de Jean Forteroche"; ?>

<?php ob_start(); ?>

		<section class="top">
				<div class="container d-flex h-100 align-items-center">
					<div class="mx-auto text-center">
						<h1 class="mx-auto my-0 text-uppercase font-weight-bold">Biographie <br> Jean Forteroche</h1>
					</div>
				</div>
		</section>
		<br>

		<section class="page-section bg-primary">
			<div class="container">
						<div class="text-center">
						<img id="jean" class="img-fluid img-responsive" src="public/images/jeanForteroche.jpg" alt="">
						</div>
						<div class="row">
				        <div class="col-lg-5 ml-auto txtbio">
				          <p class="lead">Jean Forteroche est un écrivain né le 6 Juin 1944, jour du débarquement. Ici maintenant on va raconter son enfance avec un texte tiré de je ne sais pas où, en racontant sa passion pour l'écriture, pourquoi il a voulu devenir écrivain, son parcours à la fac, puis la galère pour trouver un premier job en temps que journaliste, pour ensuite enchaîner en écrivan son premier livre, une petite fiction bien sympa.</p>
				        </div>
				        <div class="col-lg-5 mr-auto txtbio">
				          <p class="lead">Et là on va parler des différentes étapes de sa vie d'écrivain, ses succès, ses flops, les fois où il a faillit abandonner puis qu'il a finalement continuer. Puis on va parler de ses nouveaux projets grâce aux nouvelles technologie en parlant de ce site et de Billet simple pour l'Alaska en disant qu'il a lui même voyagé là bas afin de mieux transmettre le ressenti des décors et des émotions dans ses écrits etc etc</p>
						</div>
					 </div>
				</div>
			</div>
		</section>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>
