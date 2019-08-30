<?php $title = "Création de Chapitre" ?>

<?php 
	ob_start();
 ?>

<?php require ("views/backend/navAdmin.php") ?>

<section class="admsection">
	<h1 class="text-center mt-0">Billet simple pour l'Alaska</h1>
	<h2 class="text-center mt-0">Création d'un nouveau chapitre</h2>
	<br>
		<div class="container">
			<form  method="post" action="index.php?action=addChapter" enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-12">
						<input class="form-control" type="text" placeholder="Titre du Chapitre" name="title">
					</div>
				</div>
				<br>
					<input type="hidden" name="MAX_FILE_SIZE" value="400000">
					Image : <input type="file" name="picture">

				<br>
				<div class="row">
					<div class="col-sm-12">
						<textarea placeholder="Contenu du Chapitre à entrer ici..." class="form-control" rows="20" name="content" id="newChapter"></textarea>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12 text-right">
						<input class="btn btn-primary" type="submit" value="Envoyer"  name="Envoyer">
					</div>
				</div>
			</form>
		</div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>