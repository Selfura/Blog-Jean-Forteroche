<?php

require("models/commentManager.php");
require("models/postManager.php");

use Jeanforteroche\models\PostManager;
use Jeanforteroche\models\CommentManager;

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
    $signal = $commentManager->signalComment($post_id);

    require('views/chapitre.php');
}
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

// MAIL 

function addMail() {

	$commentManager = new commentManager();
	$mail = $commentManager->addMail();

	if($mail !== true) {
		$commentManager = new commentManager();
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
	$allCom = $commentManager->getAllComments();
	require('views/backend/adminComment.php');
}


function deleteComment($id) {

	$commentManager = new commentManager();
	$deleteComment = $commentManager->deleteComment($id);

	if($deleteComment === false) {
		throw new Exception('Impossible de supprimer le commentaire');
	}
	else {
		echo "Le commentaire a été supprimé.";
		header('Refresh: 2; url=../jeanforteroche/index.php?action=admin');
	}
}


// MAIL 

function admail()
{
	require("views/backend/mailAdmin.php");
}

function supprmail()
{	

	$commentManager = new CommentManager();

	$delete = $commentManager->delMail();
	if($delete === true){
		echo "Le mail a été supprimé";
		header('Refresh: 2; url=../jeanforteroche/index.php?action=admail');
	}
	else {
		echo "Echec de la suppression";
		throw new Exception("Impossible de supprimer !");
	}
}