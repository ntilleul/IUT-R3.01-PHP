<?php
class RecetteController {
    
    function ajouter() {
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Recettes'.DIRECTORY_SEPARATOR.'ajout.php');
    }

    function enregistrer($pdo) {
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $auteur = $_POST['auteur'];

        $requete = $pdo->prepare('INSERT INTO recettes(titre, description, auteur, date_creation) VALUES (:titre, :description, :auteur, NOW())');
        $requete->bindParam(':titre', $titre);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':auteur', $auteur);

        $ok = $requete->execute();

        if($ok) {
            require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Recettes'.DIRECTORY_SEPARATOR.'enregistrer.php');
        } else {
            echo 'Erreur lors de l\'enregistrement de la recette.';
        }

    }

    function lister($pdo) {
        $requete = $pdo->prepare("SELECT * FROM recettes");

        $requete->execute();
        $recipes = $requete->fetchAll(PDO::FETCH_ASSOC);

        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Recettes'.DIRECTORY_SEPARATOR.'liste.php');
    }
}