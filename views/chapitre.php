<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>




<!-- deuxième Section : ? -->
		<section class="page-section bg-primary chapitre">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12 text-center">
						<h2 class="text-center mt-0"><?= htmlspecialchars($post['title']); ?></h2>
						<hr class="divider my-4">
						<img class="img-fluid img-responsive text-center imgpost" src="public/images/<?= $post['picture']; ?>" alt="">
						<div class="text-black-50 mb-6 text-justify">
						<?= ($post['content']); ?>
						</div>
						<p class="text-black-50 mb-4"><?= $post['date_creation_fr']; ?></p>
						<br>
					</div>
				</div>
			</div>
		</section>



<!-- Liste des Commentaires -->

			<section class="page-section bg-primary">
				<div class="container">
					<h3 class="text-center mt-0">Espace commentaires</h3>
						<hr class="divider my-4">
						<p class="text-center">	Vous souhaitez donner votre avis sur ce Chapitre ? L'espace Commentaire est fait pour vous. Le tout en respectant les règles de courtoisie.
						</p>
						<br>
							<br>
							<br>
						<div class="row">
				        <div class="col-lg-5 ml-auto">
				          <h5 class="text-center mt-0">Ajouter Votre Commentaire</h5>
						<hr class="divider my-3">
						<br>

					<form  method="post" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>"> <!-- VIEW -->
						<div class="row">
							<div class="col-sm-12">
								<input class="form-control" type="text" placeholder="Nom ou Pseudo" id="author" name="author" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<input class="form-control" type="text" placeholder="Titre" name="title" id="title" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Entrez votre message ici..." class="form-control" rows="9" name="comment" id="comment" required></textarea>
							</div>
						</div>
						<br>
							<div class="text-right">
								<p>En cliquant sur Envoyer, vous acceptez le traitement de vos données pour garantir une bonne expérience sur notre site. Conformément aux lois relative à la protection des données personnelles.<p>
								<input class="btn btn-action" type="submit" value="Envoyer" onclick="return(confirm('En cliquant sur Ok, votre commentaire sera posté ?'));">
						</div>
					</form>
				        </div>

			        <div class="col-lg-5 mr-auto text-center listCom">
				        	<h5 class="text-center mt-0">Liste des Commentaires</h5>
							<hr class="divider my-3">
<?php

while ($comment = $comments->fetch())
{
?>

							<h5 class="text-center mt-0"><?= htmlspecialchars($comment['title']); ?></h5>
							<p class="comdate"><?= $comment['date_comment']; ?> par <em><?= $comment['author']; ?></em></p>
							<p><?= $comment['comment']; ?></p>
							<a onclick="return(confirm('En cliquant sur OK, le commentaire sera signalé à l\'administrateur.'));" href="index.php?action=reportComment&amp;post_id=<?= $post['id'] ?>&amp;id=<?= $comment['id'] ?>"  name="avert">
								<p class="signal">Signaler le commentaire</p>
							</a>
							<hr class="divider my-1">
<?php
} // Fin de la boucle des billets
$comments->closeCursor();
?>
						</div>
					 </div>
					</div>
		</section>
		<br>
		<br>



<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>