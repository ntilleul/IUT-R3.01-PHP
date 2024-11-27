<?php
    session_start();
    require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'connectDB.php');

    if(!isset($_GET['x'])){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Base'.DIRECTORY_SEPARATOR.'header.php');
    }
    

    require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'recetteController.php');
    require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'contactController.php');
    require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'userController.php');
    require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'favoriController.php');
    
    $recetteController = new RecetteController();
    $contactController = new ContactController();
    $userController = new UserController();
    $favoriController = new FavoriController();

    $page = isset($_GET['c']) ? $_GET['c'] : 'home';
    
    switch($page) {
        case 'home':
            require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'homeController.php');
            break;
        case 'lister':
            $recetteController->lister($pdo);
            break; 
        case 'contact':
            $contactController->ajouter();
            break;
        case 'enregistrerContact':
            $contactController->enregistrer($pdo);
            break;
        case 'ajout':
            $recetteController->ajouter();
            break;
        case 'enregistrerRecette':
            $recetteController->enregistrer($pdo);
            break;
        case 'detail':
            $id = $_GET['id'];
            $recetteController->detail($pdo, $id);
            break;
        case 'modif':
            $id = $_GET['id'];
            $recetteController->modif($pdo, $id);
            break;
        case 'modifier':
            $id = $_GET['id'];
            $recetteController->modifier($pdo, $id);
            break;
        case 'inscription':
            $userController->inscription();
            break;
        case 'inscrire':
            $userController->enregistrer($pdo);
            break;  
        case 'connexion':
            $userController->connexion();
            break;
        case 'connecter':
            $userController->verifieConnexion($pdo);
            break;
        case 'deconnexion':
            $userController->deconnexion(); 
            break;
        case 'profil':
            $userController->profil($pdo); 
            break;
        case 'favori':
            $recipeId = $_GET['id'];
            $userId = $_SESSION['id'];
            $favoriController->modifier($pdo, $recipeId, $userId);
            break;
        case 'mesFavoris':
            $userId = $_SESSION['id'];
            $favoriController->getFavoris($pdo, $userId);
            break;
        default:
            break;    
    }

    if(!isset($_GET['x'])){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Base'.DIRECTORY_SEPARATOR.'footer.php');
    }
    