<?php $title = "Titre Chapitre" ?>

<?php ob_start(); ?>


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
$req = $bdd->prepare('SELECT `id`, `title`, `content`, DATE_FORMAT(`date_creation`, "Publié le %d/%m/%Y") AS `date_creation_fr`, `picture_url` FROM `posts` WHERE `id`= ? ');
$req->execute(array($_GET['id']));


while ($donnees = $req->fetch())
{
?>



<!-- deuxième Section : ? -->
		<section class="page-section bg-primary chapitre">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12 text-center">
						<h2 class="text-center mt-0"><?= htmlspecialchars($donnees['id']); ?>. <?= htmlspecialchars($donnees['title']); ?></h2>
						<hr class="divider my-4">
						<img class="img-fluid img-responsive text-center imgpost" src="<?= $donnees['picture_url']; ?>" alt="">
						<p class="text-black-50 mb-6 text-justify">
						<?= $donnees['content']?>
						</p>
						<p class="text-black-50 mb-4"><?= $donnees['date_creation_fr']; ?></p>
						<br>
					</div>
				</div>
			</div>
		</section>

<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>


<!-- Liste des Commentaires -->

			<section class="page-section bg-primary">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10 text-center">
						<h3 class="text-center mt-0">Espace commentaires</h3>
						<hr class="divider my-4">
						<p>	Vous souhaitez donner votre avis sur ce Chapitre ? L'espace Commentaire et fait pour vous. Le tout en respectant les règles de courtoisie.
						</p>
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
$req = $bdd->prepare('SELECT `title`, `author`, DATE_FORMAT(`comment_date`, "Ajouté le %d/%m/%Y") AS `date_comment`, `comment`,`avert` FROM `comments` WHERE `post_id` = ? ORDER BY `comment_date` ');
$req->execute(array($_GET['id']));


while ($donnees = $req->fetch())
{
?>
						<div class="commentitle">
							<h5><?= htmlspecialchars($donnees['title']); ?></h5>
							<p><?= $donnees['date_comment']; ?> par <em><?= $donnees['author']; ?></em></p>
						</div>
						<p><?= $donnees['comment']; ?></p>
						<hr class="divider my-1">

					</div>
				</div>
			</div>
		</section>
		<br>
		<br>
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>


 <!-- Ajouter commentaire -->
			<section class="page-section bg-primary">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10 text-center">
						<h5 class="text-center mt-0">Ajouter Votre Commentaire</h5>
						<hr class="divider my-4">
						<br>
					<form>
						<div class="row">
							<div class="col-sm-6">
								<input class="form-control" type="text" placeholder="Nom ou Pseudo">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<input class="form-control" type="text" placeholder="Titre">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Entrez votre message ici..." class="form-control" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12 text-right">
								<input class="btn btn-action" type="submit" value="Envoyer">
							</div>
						</div>
					</form>


				</div>
			</div>
		</section>




<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>
