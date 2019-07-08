<?php $title = "Administration" ?>

<?php ob_start(); ?>

<?php require ("views/backend/navAdmin.php") ?>

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
// On récupère les 5 derniers billets
$req = $bdd->query('SELECT `id`, `title`, `author`, DATE_FORMAT(`date_mail`, "Envoyé le %d/%m/%Y") AS `mail_date`, `message`, `mail` FROM `jfmail` ORDER BY `date_mail` ');


while ($donnees = $req->fetch())
{
?>	

<section class="admsection">
	<div class="row justify-content-center">
		<div class="col-lg-8 text-center">
			<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
			<p><?= $donnees['mail_date']; ?> par <em><?= $donnees['author']; ?></em></p>
			<p><?= $donnees['mail']; ?></p>
			<p><?= $donnees['message']; ?></p>
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