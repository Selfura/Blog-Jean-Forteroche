<?php $title = "Administration" ?>

<?php ob_start(); ?>

<?php require ("views/backend/navAdmin.php") ?>

<section class="admsection  text-center">
<a class="btn btn-light btn-xl js-scroll-trigger" href="index.php?action=newChapter">Ecrire un Nouveau Chapitre</a>
</section>
<br>
<br>

<section class=" text-center">
			<h1 class="text-center mt-0">Liste des Chapitres</h2>
			<br>

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
	<div class="row">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">
				<h2 class="text-center mt-0"><?= htmlspecialchars($donnees['id']); ?>. <?= htmlspecialchars($donnees['title']); ?></h2>
				<hr class="divider my-4">		
				<p class="text-black-50 mb-4"><?= substr(htmlspecialchars($donnees['content']), 0, 500).'...'; ?></p>
				<p class="text-black-50 mb-4"><?= $donnees['date_creation_fr']; ?></p>
				<a class="btn btn-light btn-xl js-scroll-trigger" href="index.php?action=post&amp;id=<?= $donnees['id'] ?>">Lire la suite</a>
				<a class="btn btn-light btn-xl js-scroll-trigger" href="index.php?action=post&amp;id=<?= $donnees['id'] ?>">Éditer</a>
				<a class="btn btn-light btn-xl js-scroll-trigger" href="index.php?action=post&amp;id=<?= $donnees['id'] ?>">Supprimer</a>
				<br>
				<br>
			</div>
		</div>
	</div>


</section>
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>


<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>