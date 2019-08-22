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

while ($donnees = $posts->fetch())
{
?>			
	<div class="row">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">
				<h2 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h2>
				<hr class="divider my-4">		
				<p class="text-black-50 mb-4"><?= substr(($donnees['content']), 0, 500).'...'; ?></p>
				<p class="text-black-50 mb-4"><?= $donnees['date_creation_fr']; ?></p>
				<a class="btn btn-light btn-xl js-scroll-trigger" href="index.php?action=post&amp;id=<?= $donnees['id'] ?>">Lire la suite</a>
				<a class="btn btn-light btn-xl js-scroll-trigger" href="index.php?action=editPost&amp;id=<?= $donnees['id'] ?>">Éditer</a>
				<a class="btn btn-light btn-xl js-scroll-trigger" href="index.php?action=deletePost&amp;id=<?= $donnees['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir signaler ce chapitre ?'));">Supprimer</a>
				<br>
				<br>
			</div>
		</div>
	</div>

<?php
} // Fin de la boucle des billets
$posts->closeCursor();
?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>