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

while ($donnees = $comments->fetch())
{
?>	

				<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
				<p><?= $donnees['date_comment']; ?> par <em><?= $donnees['author']; ?></em></p>
				<p><?= $donnees['comment']; ?></p>
				<a class="btn btn-xl js-scroll-trigger" href="index.php?action=approveComment&amp;id=<?= $donnees['id'] ?>">Valider</a>
				<a class="btn btn-xl js-scroll-trigger" href="index.php?action=deleteComment&amp;id=<?= $donnees['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?'));">Supprimer</a>
				<hr class="divider my-2">


<?php
} // Fin de la boucle des billets
$comments->closeCursor();
?>
			</div>

			<div class="col-lg-4 mr-auto text-center listCom">
				<h5 class="text-center mt-0">Commentaires Signalés</h5>
				<hr class="divider my-3">

<?php

while ($donnees = $reportComments->fetch())
{
?>
				<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
				<p><?= $donnees['date_comment']; ?> par <em><?= $donnees['author']; ?></em></p>
				<p><?= $donnees['comment']; ?></p>
				<a class="btn btn-xl js-scroll-trigger" href="index.php?action=approveComment&amp;id=<?= $donnees['id'] ?>">Valider</a>
				<a class="btn btn-xl js-scroll-trigger" href="index.php?action=deleteComment&amp;id=<?= $donnees['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?'));">Supprimer</a>
				<hr class="divider my-2">
<?php
} // Fin de la boucle des billets
$reportComments->closeCursor();
?>
			</div>


			<div class="col-lg-4 mr-auto text-center listCom">
				<h5 class="text-center mt-0">Commentaires validés</h5>
				<hr class="divider my-3">

<?php

while ($donnees = $approvedComments->fetch())
{
?>
				<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
				<p><?= $donnees['date_comment']; ?> par <em><?= $donnees['author']; ?></em></p>
				<p><?= $donnees['comment']; ?></p>
				<a class="btn btn-xl js-scroll-trigger" href="index.php?action=deleteComment&amp;id=<?= $donnees['id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?'));">Supprimer</a>
				<hr class="divider my-2">
<?php
} // Fin de la boucle des billets
$approvedComments->closeCursor();
?>
			</div>



		</div>
	</div>
</section>





<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>