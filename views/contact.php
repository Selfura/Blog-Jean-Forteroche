<?php $title = "Contact"; ?>

<?php ob_start(); ?>
		<section class="top">
				<div class="container d-flex h-100 align-items-center">
					<div class="mx-auto text-center">
						<h1 class="mx-auto my-0 text-uppercase font-weight-bold">Contact <br> Jean Forteroche</h1>
					</div>
				</div>
		</section>
		<br>

		<section class="page-section bg-primary">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-10 text-center">
						
				<p>	Vous avez un avis à donner, ou simplement un désir de me contacter afin de me proposer une collaboration ? C'est par ici. Soyez patient, je ne répond pas instantanément, alors ne vous inquiétez pas si vous ne recevez rien les premiers jours.
				</p>
				<br>

					<form method="post" action="index.php?action=addMail">
						<div class="row">
							<div class="col-sm-6">
								<input class="form-control" type="text" placeholder="Nom" name="name">
							</div>
							<div id="email"  class="col-sm-6">
								<input class="form-control" type="email" placeholder="Email" name="mail">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<input class="form-control" type="text" placeholder="Titre" name="title">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Entrez votre message ici..." class="form-control" rows="9" name="message"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12 text-right">
								<p>En cliquant sur Envoyer, vous acceptez que les données saisies nous permettent de vous contacter.<p>
								<input class="btn btn-action" type="submit" value="Envoyer">
							</div>
						</div>
					</form>

				</div>
			</div>
		</section>
<?php $content = ob_get_clean(); ?>

<?php require('views/template.php'); ?>
