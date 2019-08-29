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

    case 'reportComment':
        if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                reportComment($_GET['id']);
            } else {
                throw new Exception("L'identifiant du commentaire à signaler n'a pas ététrouvé.");
                
            }

        } else {
                throw new Exception("Aucun identifiant de chapitre.");
                
            }
        break;


    case 'login':
        login();
        break;


    case 'addMail':
        addMail();      
        break; 

        case 'logout':
        session_start();
        $_SESSION = array();
        session_destroy();
            logout();
        break;


        // ADMIN 

    case 'admin':
        if(isset($_POST['login'])) {
            session_start();
            admin($_POST['login']);
        }
        else {
            header('Location: ../jeanforteroche/index.php?action=accueil');
        }
        break;

    case 'admPosts':
        if(isset($_COOKIE['login'])) {
        session_start();
        $_SESSION['login'] = $_COOKIE['login'];
        admPosts();
            }
        else {
            header('Location: ../jeanforteroche/index.php?action=accueil');
        }
        break;


    case 'admcom':
        if(isset($_COOKIE['login'])) {
        session_start();
        $_SESSION['login'] = $_COOKIE['login'];
        admcom();
            }
        else {
            header('Location: ../jeanforteroche/index.php?action=accueil');
        }
        break;


    case 'admail':
        if(isset($_COOKIE['login'])) {
        session_start();
        $_SESSION['login'] = $_COOKIE['login'];
        admail();
            }
        else {
            header('Location: ../jeanforteroche/index.php?action=accueil');
        }
        break;


        // ADMIN POST


    case 'newChapter': // Page d'ajout de chapitre.
    if(isset($_COOKIE['login'])) {
        session_start();
        $_SESSION['login'] = $_COOKIE['login'];

        newChapter();
            }
        else {
            header('Location: ../jeanforteroche/index.php?action=accueil');
        }
        break;

    case 'addChapter': // Action ajoutant un chapitre.
        if ($_POST['title'] != NULL && $_POST['content'] != NULL /*&& $_POST['picture'] != NULL*/) {
        newPost($_POST['title'], $_POST['content']/*, $_POST['picture']*/);
        }
        else {
            throw new Exception("Les champs doivent tous être remplis.");
            
        }
        break; 


    case 'deletePost':
        if (isset($_GET['id']) && $_GET['id'] > 0){

            deletePost($_GET['id']);
        } 
        else {
                    throw new Exception('Aucun identifiant de commentaire envoyé !');
        }
        break;

    // Page EDIT
    case 'editPost':
    if(isset($_COOKIE['login'])) {
    session_start();
    $_SESSION['login'] = $_COOKIE['login'];
     if (isset($_GET['id']) && $_GET['id'] > 0) {
        editPost($_GET['id']);
        }
        else
                {
                    throw new Exception('Aucun Chapitre ne porte cet identifiant !');
                }

            }
        else {
            header('Location: ../jeanforteroche/index.php?action=accueil');
        }
        break;
    //fonction Edit
    case 'updatePost':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if ($_POST['title'] != NULL && $_POST['content'] != NULL) {
                updatePost($_GET['id']);
            } else {
                throw new Exception('Il faut remplir tous les champs.');
            }
        }
        else
                {
                    throw new Exception('Aucun Chapitre ne porte cet identifiant !');
                }
        break;




        // ADMIN COMMENTS
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

        // ADMIN MAILS


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
