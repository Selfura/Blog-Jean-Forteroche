<?php $title = "Jean Forteroche, Billet simple pour l'Alaska."; ?>

<?php ob_start(); ?>


				<!-- Section 1 : Accueil -->
		<section class="top">
				<div class="container d-flex h-100 align-items-center">
					<div class="mx-auto text-center">
						<h1 class="mx-auto my-0 text-uppercase font-weight-bold">Billet simple pour l'Alaska <br> Un Livre de Jean Forteroche</h1>
					</div>
				</div>
		</section>
		<br>

		<!-- deuxième Section : ? -->
		<section class="page-section bg-primary">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10 text-center">
						<h2 class="text-center mt-0">Dernier Chapitre Paru</h2>
						<hr class="divider my-4">
						<p class="text-black-50 mb-4">Je n'en croyais pas mes yeux ! A une trentaine de mètres de moi se tenait un animal massif, dont la vue
						pouvait amener de l'effroi dans la plupart des personnes. Je n'étais pas de ces personnes...</p>
						<a class="btn btn-light btn-xl js-scroll-trigger" href="">Lire la suite</a>
					</div>
				</div>
			</div>
		</section>
		<!-- Troisème Section : ? -->
	<section class="page-section" id="services">
		<div class="container">
			<h2 class="text-center mt-0">Informations Complémentaires</h2>
			<hr class="divider my-4">
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="mt-5">
						<a class="nav-link" href="index.php?action=biographie">
							<i class="fas fa-4x fa-portrait mb-4" ></i>
							<h3 class="h4 mb-2">Biographie</h3>
							<p class="text-muted mb-0">Si vous voulez en savoir un peu plus sur l'auteur de ce livre, Jean Forteroche, c'est par ici.</p>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="mt-5">
						<a class="nav-link" href="">
							<i class="fas fa-4x fa-book mb-4"></i>
							<h3 class="h4 mb-2">Bibliographie</h3>
							<p class="text-muted mb-0">Billet Simple pour l'Alaska n'est pas mon premier livre ! Venez découvrir le reste de mes oeuvres.</p>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="mt-5">
						<a class="nav-link" href="">
							<i class="fas fa-4x fa-journal-whills mb-4"></i>
							<h3 class="h4 mb-2">Premier Chapitre</h3>
							<p class="text-muted mb-0">Tout a un commencement, et c'est le cas pour ce livre. Si vous arrivez ici pour la première fois, voici le premier chapitre.</p>
						</a>
 					</div>
				</div>
			</div>
		</div>
	</section>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>
