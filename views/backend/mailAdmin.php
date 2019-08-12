<?php $title = "Administration" ?>

<?php ob_start(); ?>

<?php require ("views/backend/navAdmin.php") ?>

<section class=" page-section admsection">
	<div class="container">
		<h3 class="text-center mt-0">Mails reçus</h3>
		<hr class="divider my-4">
		<div class="row justify-content-center">
			<div class="col-lg-5 mr-auto text-center listCom">
				<h5 class="text-center mt-0">Nouveaux mails</h5>
				<hr class="divider my-3">



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
$req = $bdd->query('SELECT `id`, `title`, `author`, DATE_FORMAT(`date_mail`, "Envoyé le %d/%m/%Y") AS `mail_date`, `message`, `mail`, `lu` FROM `jfmail` WHERE `lu`= 0 ORDER BY `date_mail` DESC ');


while ($donnees = $req->fetch())
{
?>					
				<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
				<p><?= $donnees['mail_date']; ?> par <em><?= $donnees['author']; ?></em></p>
				<p><?= $donnees['mail']; ?></p>
				<p><?= $donnees['message']; ?></p>
				<a class="btn btn-light js-scroll-trigger">Lu</a>
				<a class="btn btn-light js-scroll-trigger" href="index.php?action=supprmail=<?= $donnees['id'] ?>">Supprimer</a>
				<hr class="divider my-1">
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>	

			</div>

			<div class="col-lg-5 mr-auto text-center listCom">
				<h5 class="text-center mt-0">Mails lus</h5>
				<hr class="divider my-3">

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
$req = $bdd->query('SELECT `id`, `title`, `author`, DATE_FORMAT(`date_mail`, "Envoyé le %d/%m/%Y") AS `mail_date`, `message`, `mail`, `lu` FROM `jfmail` WHERE `lu`= 1 ORDER BY `date_mail` DESC ');


while ($donnees = $req->fetch())
{
?>	

				<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
				<p><?= $donnees['mail_date']; ?> par <em><?= $donnees['author']; ?></em></p>
				<p><?= $donnees['mail']; ?></p>
				<p><?= $donnees['message']; ?></p>
				<a class="btn btn-light js-scroll-trigger" href="index.php?action=supprmail=<?= $donnees['id'] ?>">Supprimer</a>
				<hr class="divider my-1">

<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>				
			</div>

		</div>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>



