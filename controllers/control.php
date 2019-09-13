<?php

require("models/commentManager.php");
require("models/postManager.php");
require("models/mailManager.php");
require("models/adminManager.php");

use Jeanforteroche\models\PostManager;
use Jeanforteroche\models\CommentManager;
use Jeanforteroche\models\MailManager;
use Jeanforteroche\models\AdminManager;


// PAGES 
function home()
{	

	$postManager = new PostManager();
	$lastPost = $postManager->getLastPost();

	require('views/accueilView.php');
}

function listPosts()
{	
	$postManager = new PostManager();
	$posts = $postManager->getPosts();
    require('views/listPostsView.php');
}

function bio() {
	require("views/biographie.php");
}

function contact() {
	require("views/contact.php");
}

function post($post_id)
{	
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($post_id);
    $comments = $commentManager->getComments($post_id);
    $signal = $commentManager->reportComment($post_id);

    if($post) {
    	require('views/chapitre.php');
	} else {
		throw new Exception("Le chapitre demandé n'existe pas.");		
	}
}

/*
			COMMENTAIRES 
*/
// fonction d'envoie de commentaires
function addComment($post_id, $author, $title, $comment) {

	$commentManager = new CommentManager();

	$newComment = $commentManager->addComment($post_id, $author, $title, $comment);
	if($newComment === true){
		header('Location: ../jeanforteroche/index.php?action=post&id='.$_GET['id']);
	}
	else {
		throw new Exception("Impossible d'ajouter le commentaire !");
		header('Refresh:2; url= ../jeanforteroche/index.php?action=post&id='.$_GET['post_id']);
	}
}

function reportComment($id) {

	$commentManager = new CommentManager();

	$reportComment = $commentManager->reportComment($id);

	if($reportComment === true) {
		header('Location: ../jeanforteroche/index.php?action=post&id='.$_GET['post_id']);
	} else {
		throw new Exception("Impossible de signaler le commentaire.");
		header('Refresh:2; url= ../jeanforteroche/index.php?action=post&id='.$_GET['post_id']);
	}
}

// MAIL Fonction d'envoie.

function addMail() {

	$mailManager = new MailManager();
	$mail = $mailManager->addMail();

	if($mail !== true) {
		$mailManager = new MailManager();
		header('Location: ../jeanforteroche/index.php?action=accueil');
		}
		else {
		header('Location: ../jeanforteroche/index.php?action=accueil');
		}

}
/*  
	***********************************************************************

								ZONE ADMIN

	***********************************************************************
*/

function login()
{
	require("views/backend/Adminlogin.php");
}

function logout() {
	session_start();
	$_SESSION = array();
	session_destroy();

	setcookie('login','', time()-10);
	setcookie('pw', '', time()-10);

	header('Location: ../jeanforteroche/index.php?action=accueil');
}

function admin($login)
{	

	$adminManager = new AdminManager();
	$logAdmin = $adminManager->getLogin($login);

	if ($_POST['login'] == $logAdmin['login']) {

		$login = $logAdmin['login'];
		$pw = $logAdmin['pw'];

		if(password_verify($_POST['pw'], $logAdmin['pw'])) {

			$_SESSION['login'] = $logAdmin['login'];
			$_SESSION['pw'] = $logAdmin['pw'];

			setcookie('login', $login, time() + 1800, null, null, false, true);
			setcookie('pw', $pw, time() + 1800, null, null, false, true);

			$postManager = new PostManager();
			$posts = $postManager->getPosts();
			require('views/backend/AdminView.php');
		} else {
		echo "Mot de passe ou Identifiant erroné(s). 
			</br>
			<a href='../jeanforteroche/index.php?action=accueil'> Retour au site </a>";
	}
	} 
	else {
		echo "Mot de passe ou Identifiant erroné(s). 
			</br>
			<a href='../jeanforteroche/index.php?action=accueil'> Retour au site </a>";
	}
}

function admPosts() {

	$postManager = new PostManager();
	$posts = $postManager->getPosts();
	require('views/backend/AdminView.php');
}




// POSTS 

// Page Nouveau Chapitre
function newChapter()
{	
	require('views/backend/newChapter.php');
}
//Ajout de chapitre
function newPost($title, $content, $picture) {

	session_start();
	$postManager = new PostManager();

	$target = "public/images/";
	$file = basename($_FILES['picture']['name']);
	$sizemax = 4000000;
	$size = filesize($_FILES['picture']['tmp_name']);
	$extensions = array('.png', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['picture']['name'], '.');
	// Verif de sécurité
	if(!in_array($extension, $extensions)) 
	{
		$erreur = 'Vous devez utiliser des images de type .png, .jpeg, .jpg';
	}
	if($size>$sizemax)
	{
     $erreur = 'Le fichier est trop volumineux. Utilisez des fichiers de moins de 4mo.';
	}
	
    /*if(move_uploaded_file($_FILES['picture']['tmp_name'], $target . $file)) {
        	echo 'Upload effectué avec succès';
        } else {
        	echo "Echec de l'upload";
        }*/
    $createPost = $postManager->createPost($title, $content, $picture['name']);
	header('Location: ../jeanforteroche/index.php?action=admPosts');
}

// Edit chapitre

function updatePost($id, $picture) {

	$postManager = new PostManager();

	$target = "public/images/";
	$file = basename($_FILES['picture']['name']);
	$sizemax = 4000000;
	$size = filesize($_FILES['picture']['tmp_name']);
	$extensions = array('.png', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['picture']['name'], '.');
	// Verif de sécurité
	if(!in_array($extension, $extensions)) 
	{
		$erreur = 'Vous devez utiliser des images de type .png, .jpeg, .jpg';
	}
	if($size>$sizemax)
	{
     $erreur = 'Le fichier est trop volumineux. Utilisez des fichiers de moins de 4mo.';
	}
	
    /*if(move_uploaded_file($_FILES['picture']['tmp_name'], $target . $file)) {
        	echo 'Upload effectué avec succès';
        } else {
        	echo "Echec de l'upload";
        }*/
     
	$updatePost = $postManager->updatePost($id, $picture['name']);

	if($updatePost === false) {
		throw new Exception('Impossible de mettre à jour le chapitre');
	} else {

	header('Location: ../jeanforteroche/index.php?action=admPosts');
	}
}

function deletePost($id) {

	$postManager = new postManager();
	$deletePost = $postManager->deletePost($id);

	if($deletePost === false) {
		throw new Exception('Impossible de supprimer le chapitre');
	}
	else {
		header('Refresh: 0; url=../jeanforteroche/index.php?action=admPosts');
	}
}
function editPost($post_id) {

	$postManager = new postManager();
	$editPost = $postManager->getPost($post_id);

	$post = $postManager->getPost($post_id);

	require('views/backend/editView.php');
}

// COMMENTAIRES


function admcom()
{	

	$commentManager = new CommentManager();
	$comments = $commentManager->getAllComments();
	$reportComments = $commentManager->getReportComments();
	$approvedComments = $commentManager->getApproveComment();
	require('views/backend/adminComment.php');
}

function deleteComment($id) {

	$commentManager = new CommentManager();
	$deleteComment = $commentManager->deleteComment($id);

	if($deleteComment === false) {
		throw new Exception('Impossible de supprimer le commentaire');
	}
	else {
		header('Refresh: 0; url=../jeanforteroche/index.php?action=admcom');
	}
}

function approveComment($id) {
	$commentManager = new CommentManager();
	$approveComment = $commentManager->approveComment($id);

	if($approveComment === false) {
		throw new Exception('Impossible de supprimer le commentaire');
	}
	else {
		header('Refresh: 0; url=../jeanforteroche/index.php?action=admcom');
	}

}


// MAIL 

function admail() {

	$mailManager = new MailManager();
	$mails = $mailManager->getAllMails();
	$readMail = $mailManager->GetReadMail();
	require("views/backend/mailAdmin.php");
}

function deleteMail($id) {	

	$mailManager = new MailManager();

	$deleteMail = $mailManager->deleteMail($id);
	if($deleteMail === false){
		echo "Echec de la suppression";
		throw new Exception("Impossible de supprimer !");		
	}
	else {
		header('Refresh: 2; url=../jeanforteroche/index.php?action=admail');
	}
}

function readMail($id) {

	$mailManager = new MailManager();

	$readMail = $mailManager->readMail($id);
	header('Refresh:0, url=../jeanforteroche/index.php?action=admail');

}