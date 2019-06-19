<?php

require('controllers/frontend.php');

if(isset($_GET['action'])) {

switch ($_GET['action']) {

    case 'accueil' :
		home();
		break;
  
     case 'listechapitres':
		listPosts();
		break;
  

    case 'biographie':
		bio();
		break;

    case 'contact':
    	contact();
    	break;

    case 'post':
    	post();
    	break;

}
}
else {
	require_once('views/accueilView.php');
}
