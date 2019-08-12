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
						<img id="jean" class="img-fluid img-responsive" src="public/images/JeanForteroche.jpg" alt="">
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

		<section class="page-section" id="biblio">
		<div class="container">
			<h2 class="text-center mt-0">Bibliographie</h2>
			<hr class="divider my-4">
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="mt-5">
						<img class="img-fluid img-responsive text-center" src="public/images/laflute.jpg" alt="La FLute Enragée">
						<h3 class="h4 mb-2">La flute Enragée</h3>
						<p class="text-muted mb-0">Si vous voulez en savoir un peu plus sur l'auteur de ce livre, Jean Forteroche, c'est par ici.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="mt-5">
						<img class="img-fluid img-responsive text-center" src="public/images/lejardin.jpg" alt="Le Jardin Céleste">
						<h3 class="h4 mb-2">Le Jardin Céleste</h3>
						<p class="text-muted mb-0">Billet Simple pour l'Alaska n'est pas mon premier livre ! Venez découvrir le reste de mes oeuvres.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="mt-5">
						<img class="img-fluid img-responsive text-center" src="public/images/naufrage.jpg" alt="Survivants du Naufrage">
						<h3 class="h4 mb-2">Survivants du Naufrage</h3>
						<p class="text-muted mb-0">Tout a un commencement, et c'est le cas pour ce livre. Si vous arrivez ici pour la première fois, voici le premier chapitre.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="mt-5">
						<img class="img-fluid img-responsive text-center" src="public/images/roi.jpg" alt="Le Roi des Pirates">
						<h3 class="h4 mb-2">Le Roi des Pirates</h3>
						<p class="text-muted mb-0">Tout a un commencement, et c'est le cas pour ce livre. Si vous arrivez ici pour la première fois, voici le premier chapitre.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="mt-5">
						<img class="img-fluid img-responsive text-center" src="public/images/antarctique.jpg" alt="Pique Nique en Antarctique">
						<h3 class="h4 mb-2">Pique Nique en Antarctique</h3>
						<p class="text-muted mb-0">Tout a un commencement, et c'est le cas pour ce livre. Si vous arrivez ici pour la première fois, voici le premier chapitre.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="mt-5">
						<img class="img-fluid img-responsive text-center" src="public/images/jais.jpg" alt="La bête couleur jais">
						<h3 class="h4 mb-2">La bête couleur jais</h3>
						<p class="text-muted mb-0">Tout a un commencement, et c'est le cas pour ce livre. Si vous arrivez ici pour la première fois, voici le premier chapitre.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>
