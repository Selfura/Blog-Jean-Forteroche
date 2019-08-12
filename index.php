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
     if ($_GET['id'] > 0) {
    	post($_GET['id']);
        }
        else
                {
                    throw new Exception('Aucun Chapitre ne porte cet identifiant !');
                }
    	break;

    case 'addComment': // INDEX
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['title']) &&  !empty($_POST['comment'])) {
 
                    addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['title']), htmlspecialchars($_POST['comment']));

                
            }
            else {
                throw new Exception('Tous les champs doivent être remplis !');
            }
        }
        else {
            throw new Exception('Aucun identifiant de chapitre envoyé !');
        }
        break;


    case 'login':
        login();
        break;

    case 'admin':
        admin();
        break;

    case 'admcom':
        admcom();
        break;

    case 'admail':
        admail();
        break;

    case 'newChapter':
        newChapter();
        break;
        
    case 'supprmail':
        supprmail();
        break;

    case 'addChapter':
        addChapter();
        break; 


    case 'addMail':
        addMail();      
        break;  
}
}
else {
	require_once('views/accueilView.php');
}
