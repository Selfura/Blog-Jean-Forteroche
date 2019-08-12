<?php $title = "Administration" ?>

<?php ob_start(); ?>

<?php require ("views/backend/navAdmin.php") ?>


<section class=" page-section admsection">
	<div class="container">
		<h3 class="text-center mt-0">Espace commentaires</h3>
		<hr class="divider my-4">
		<div class="row justify-content-center">
			<div class="col-lg-4 mr-auto text-center listCom">
				<h5 class="text-center mt-0">Commentaires en Attente</h5>
				<hr class="divider my-3">

<?php

while ($donnees = $allCom->fetch())
{
?>	

				<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
				<p><?= $donnees['date_comment']; ?> par <em><?= $donnees['author']; ?></em></p>
				<p><?= $donnees['comment']; ?></p>
				<a class="btn btn-xl js-scroll-trigger" href="">Supprimer</a>
				<hr class="divider my-2">


<?php
} // Fin de la boucle des billets
$allCom->closeCursor();
?>
			</div>

			<div class="col-lg-4 mr-auto text-center listCom">
				<h5 class="text-center mt-0">Commentaires Signalés</h5>
				<hr class="divider my-3">


				<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
				<p><?= $donnees['date_comment']; ?> par <em><?= $donnees['author']; ?></em></p>
				<p><?= $donnees['comment']; ?></p>
				<a class="btn btn-xl js-scroll-trigger" href=">">Supprimer</a>
				<hr class="divider my-2">
			</div>


			<div class="col-lg-4 mr-auto text-center listCom">
				<h5 class="text-center mt-0">Commentaires validés</h5>
				<hr class="divider my-3">


				<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
				<p><?= $donnees['date_comment']; ?> par <em><?= $donnees['author']; ?></em></p>
				<p><?= $donnees['comment']; ?></p>
				<a class="btn btn-xl js-scroll-trigger" href=">">Supprimer</a>
				<hr class="divider my-2">
			</div>



		</div>
	</div>
</section>





<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>