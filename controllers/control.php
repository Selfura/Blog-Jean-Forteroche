<?php

require("models/commentManager.php");
require("models/postManager.php");
require("models/mailManager.php");

use Jeanforteroche\models\PostManager;
use Jeanforteroche\models\CommentManager;
use Jeanforteroche\models\MailManager;


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

    require('views/chapitre.php');
}
/*
			COMMENTAIRES 
*/
// fonction d'envoie de commentaires
function addComment($post_id, $author, $title, $comment) {

	$commentManager = new CommentManager();

	$newComment = $commentManager->addComment($post_id, $author, $title, $comment);
	if($newComment === true){
		echo "Le commentaire a été posté.";
	}
	else {
		echo "Echec de l'envoi";
		throw new Exception("Impossible d'ajouter le commentaire !");
	}
}

function reportComment($id) {

	$commentManager = new CommentManager();

	$reportComment = $commentManager->reportComment($id);
	header('Refresh:0, url=../jeanforteroche/index.php?action=post&amp;id=<?= $donnees["id"] ?>');
}

// MAIL Fonction d'envoie.

function addMail() {

	$mailManager = new MailManager();
	$mail = $mailManager->addMail();

	if($mail !== true) {
		$mailManager = new MailManager();
		echo "Mail Envoyé";
		header('Refresh: 2; url=../jeanforteroche/index.php?action=accueil');
		}
		else {
		echo "Echec de l'envoi";
		header('Refresh: 2; url=../jeanforteroche/index.php?action=accueil');
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

function admin()
{
	require('views/backend/AdminView.php');
}
// POSTS 

function newChapter()
{
	require('views/backend/newChapter.php');
}

function addChapter()
{
	require('views/backend/addChapter.php');
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