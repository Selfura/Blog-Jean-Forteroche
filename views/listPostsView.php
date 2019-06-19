<?php $title = "Billet simple pour l'Alaska, liste des chapitres"; ?>

<?php ob_start(); ?>

		<!-- Section 1 : Accueil -->
		<section class="top">
				<div class="container d-flex h-100 align-items-center">
					<div class="mx-auto text-center">
						<h1 class="mx-auto my-0 text-uppercase font-weight-bold">Les Chapitres <br> Billet Simple pour L'Alaska</h1>
					</div>
				</div>
		</section>
		<br>
	 <!-- Portfolio Section -->
	<section class="page-section portfolio" id="chapter">
		<div class="container">

			<!-- Portfolio Grid Items -->
			<div class="row">

				<!-- Portfolio Item 1 -->
				<div class="col-md-6 col-lg-4">
					<div class="portfolio-item mx-auto">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
							<div class="portfolio-item-caption-content text-center text-white">
								<p><span class="txtbold">Titre du Chapitre</span><br /> Extrait du chapitre</p>
							</div>
						</div>
						<a href="index.php?action=post">
						<img class="img-fluid" src="public/images/Alaska3.jpg" alt="">
						</a>
					</div>
				</div>

				<!-- Portfolio Item 2 -->
				<div class="col-md-6 col-lg-4">
					<div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
							<div class="portfolio-item-caption-content text-center text-white">
								<p><span class="txtbold">Titre du Chapitre</span><br /> Extrait du chapitre</p>
							</div>
						</div>
						<a href="index.php?action=post">
						<img class="img-fluid" src="public/images/Alaska4.jpg" alt="">
						</a>
					</div>
				</div>

				<!-- Portfolio Item 3 -->
				<div class="col-md-6 col-lg-4">
					<div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
							<div class="portfolio-item-caption-content text-center text-white">
								<p><span class="txtbold">Titre du Chapitre</span><br /> Extrait du chapitre</p>
							</div>
						</div>
						<a href="index.php?action=post">
						<img class="img-fluid" src="public/images/Alaska6.jpg" alt="">
						</a>
					</div>
				</div>

				<!-- Portfolio Item 4 -->
				<div class="col-md-6 col-lg-4">
					<a href="index.php?action=post"><div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal4">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
							<div class="portfolio-item-caption-content text-white">
								<h3 class="text-center">Titre du Chapitre</h3> <p>Cum haec taliaque sollicitas eius aures everberarent expositas semper eius modi rumoribus et patentes, varia animo tum miscente consilia, tandem id ut optimum factu elegit.</p>
							</div>
						</div>
						<a href="index.php?action=post">
						<img class="img-fluid" src="public/images/Alaska5.jpg" alt="">
					</div>
					</a>
				</div>

				<!-- Portfolio Item 5 -->
				<div class="col-md-6 col-lg-4">
					<div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal5">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
							<div class="portfolio-item-caption-content text-center text-white">
								<p><span class="txtbold">Titre du Chapitre</span><br /> Extrait du chapitre</p>
							</div>
						</div>
						<a href="index.php?action=post">
						<img class="img-fluid" src="public/images/Alaska7.jpg" alt="">
						</a>
					</div>
				</div>

				<!-- Portfolio Item 6 -->
				<div class="col-md-6 col-lg-4">
					<div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal6">
						<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
							<div class="portfolio-item-caption-content text-center text-white">
								<p><span class="txtbold">Titre du Chapitre</span><br /> Extrait du chapitre</p>
							</div>
						</div>
						<a href="index.php?action=post">
						<img class="img-fluid" src="public/images/Alaska2.jpg" alt="">
						</a>
					</div>
				</div>

			</div>
	      <!-- /.row -->

		</div>
	</section>
	<br>
	<br>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>