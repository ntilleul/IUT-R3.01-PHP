<?php
    require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'connectDB.php');
    require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Base'.DIRECTORY_SEPARATOR.'header.php');
    require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'recetteController.php');
    require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.'contactController.php');
    
    $recetteController = new RecetteController();
    $contactController = new ContactController();

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
        default:
            break;    
    }

    require_once(__DIR__.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Base'.DIRECTORY_SEPARATOR.'footer.php');

    