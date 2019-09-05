<?php $title = "Billet simple pour l'Alaska, liste des chapitres"; ?>

<?php ob_start(); ?>

		<!-- Section 1 : Accueil -->
		<section class="top">
				<div class="container d-flex h-100 align-items-center">
					<div class="mx-auto text-center">
						<h1 class="mx-auto my-0 text-uppercase font-weight-bold">Les Chapitres <br> Billet Simple pour L'Alaska</h1>
					</div>
				</div>
		</section>
		<br>
	 <!-- Portfolio Section -->
<?php


while ($donnees = $posts->fetch())
{
?>

	 <!-- Portfolio Section -->
	<section class="page-section portfolio">
		<div class="container">

			<!-- Portfolio Grid Items -->
			<div class="row">
				<div class="row justify-content-center">
					<div class="col-lg-10 text-center">
						<h2 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h2>
						<hr class="divider my-4">		
						<a href="index.php?action=post&amp;id=<?= $donnees['id'] ?>">
						<img class="img-fluid img-responsive text-center imgchap" src="public/images/<?= $donnees['picture']; ?>" alt="">
						</a>
						<div class="text-black-50 mb-4"><?= substr(($donnees['content']), 0, 200).'...'; ?></div>
						<p class="text-black-50 mb-4"><?= $donnees['date_creation_fr']; ?></p>
						<a class="btn btn-light btn-xl js-scroll-trigger" href="index.php?action=post&amp;id=<?= $donnees['id'] ?>">Lire la suite</a>
						<br>
					</div>
				</div>
			</div>
	      <!-- /.row -->

		</div>
	</section>
	<br>
	<br>

<?php
} // Fin de la boucle des billets
$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>