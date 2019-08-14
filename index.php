<?php

require('controllers/control.php');

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


    case 'deleteComment':
        if (isset($_GET['id']) && $_GET['id'] > 0){

            deleteComment($_GET['id']);
        } 
        else {
                    throw new Exception('Aucun identifiant de commentaire envoyé !');
        }
        break;

    case 'approveComment':
        if (isset($_GET['id']) && $_GET['id'] > 0){

            approveComment($_GET['id']);
        } 
        else {
                    throw new Exception('Aucun identifiant de commentaire envoyé !');
        }
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

    case 'deleteMail':
        if (isset($_GET['id']) && $_GET['id'] > 0){

            deleteMail($_GET['id']);
        } 
        else {
                    throw new Exception('Aucun identifiant de mail envoyé !');
        }
        break;

    case 'readMail':
        if (isset($_GET['id']) && $_GET['id'] > 0){

            readMail($_GET['id']);
        } 
        else {
                    throw new Exception('Aucun identifiant de mail envoyé !');
        }
        break;
}
}
else {
    home();
}
