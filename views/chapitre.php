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
					<h3 class="text-center mt-0">Espace commentaires</h3>
						<hr class="divider my-4">
						<p>	Vous souhaitez donner votre avis sur ce Chapitre ? L'espace Commentaire est fait pour vous. Le tout en respectant les règles de courtoisie.
						</p>
						<br>
							<br>
							<br>
						<div class="row">
				        <div class="col-lg-5 ml-auto">
				          <h5 class="text-center mt-0">Ajouter Votre Commentaire</h5>
						<hr class="divider my-4">
						<br>
<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e) {
	die('Erreur :' .$e->getMessage());
}

	$bdd->prepare('INSERT INTO `comments`(`post_id`, `title`, `author`, `comment`, `comment_date`) VALUES( ?, ?, ?, NOW()) ');



?>
					<form action="index.php?action=addComment&amp;post_id=<?= $donnees['post_id'] ?>" method="post">
						<div class="row">
							<div class="col-sm-12">
								<input class="form-control" type="text" placeholder="Nom ou Pseudo" id="author" name="author">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<input class="form-control" type="text" placeholder="Titre" name="title" id="title">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Entrez votre message ici..." class="form-control" rows="9" name="comment" id="comment"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6 text-right">
								<input class="btn btn-action" type="submit" value="Envoyer">
							</div>
						</div>
					</form>
				        </div>


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
				        <div class="col-lg-5 mr-auto text-center">
							<h5 class="text-center mt-0"><?= htmlspecialchars($donnees['title']); ?></h5>
							<p><?= $donnees['date_comment']; ?> par <em><?= $donnees['author']; ?></em></p>
						<p><?= $donnees['comment']; ?></p>
						<p>Signaler le commentaire</p>
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

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>
