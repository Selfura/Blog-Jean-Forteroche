<?php

require("models/modelIndex.php");

function home()
{
	require('views/accueilView.php');
}

function listPosts()
{	
    require('views/listPostsView.php');
}
function bio() {
	require("views/biographie.php");
}
function contact() {
	require("views/contact.php");
}
function post()
{	

    require('views/chapitre.php');
}
function addComment($post_id, $title, $author, $comment)
{	
	$commentManager = new CommentManager();

	$postComment = $commentManager->postComment($post_id, $title, $author, $comment);
    if($postComment === false)
    {
        throw new Exception('Impossible d\'ajouter le commentaire');
    }
    else{
        header('Location: index.php?action=post&id=' . $post_id);
    }
}

function login()
{
	require("views/backend/Adminlogin.php");
}

function admin()
{
	require('views/backend/AdminView.php');
}

function admcom()
{
	require('views/backend/adminComment.php');
}

function admail()
{
	require("views/backend/mailAdmin.php");
}

function newChapter()
{
	require('views/backend/newChapter.php');
}