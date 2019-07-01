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
