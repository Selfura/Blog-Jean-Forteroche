<?php $title = "Administration" ?>

<?php ob_start(); ?>

<?php require ("views/backend/navAdmin.php") ?>

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
$req = $bdd->query('SELECT `title`, `author`, DATE_FORMAT(`comment_date`, "Ajouté le %d/%m/%Y") AS `date_comment`, `comment`,`avert` FROM `comments` ORDER BY `comment_date` ');


while ($donnees = $req->fetch())
{
?>	
<section class="admsection">
	<div class="row justify-content-center">
		<div class="col-lg-8 text-center">
			<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
			<p><?= $donnees['date_comment']; ?> par <em><?= $donnees['author']; ?></em></p>
			<p><?= $donnees['comment']; ?></p>
			<hr class="divider my-1">
		</div>
	</div>
</section>


<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>


<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>