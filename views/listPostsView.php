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
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
// On récupère les 5 derniers billets
$req = $bdd->query('SELECT `id`, `title`, `content`, DATE_FORMAT(`date_creation`, "Publié le %d/%m/%Y") AS `date_creation_fr`, `picture_url` FROM `posts` ORDER BY `id` DESC ');


while ($donnees = $req->fetch())
{
?>

	 <!-- Portfolio Section -->
	<section class="page-section portfolio" id="chapter">
		<div class="container">

			<!-- Portfolio Grid Items -->
			<div class="row">
				<div class="row justify-content-center">
					<div class="col-lg-10 text-center">
						<h2 class="text-center mt-0"><?= htmlspecialchars($donnees['id']); ?>. <?= htmlspecialchars($donnees['title']); ?></h2>
						<hr class="divider my-4">		
						<a href="index.php?action=post&amp;id=<?= $donnees['id'] ?>">
						<img class="img-fluid img-responsive text-center imgchap" src="<?= $donnees['picture_url']; ?>" alt="">
						</a>
						<p class="text-black-50 mb-4"><?= substr(htmlspecialchars($donnees['content']), 0, 200).'...'; ?></p>
						<p class="text-black-50 mb-4"><?= $donnees['date_creation_fr']; ?></p>
						<a class="btn btn-light btn-xl js-scroll-trigger" href="">Lire la suite</a>
						<br>
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
$req->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>