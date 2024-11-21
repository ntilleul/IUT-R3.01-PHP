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

    function detail($pdo, $id) {
        $requete = $pdo->prepare("SELECT * FROM recettes WHERE id = :id");
        $requete->bindParam(':id', $id);

        $requete->execute();
        $recipe = $requete->fetch(PDO::FETCH_ASSOC);

        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Recettes'.DIRECTORY_SEPARATOR.'detail.php');
    }

    function modif($pdo, $id) {
        $requete = $pdo->prepare("SELECT * FROM recettes WHERE id = :id");
        $requete->bindParam(':id', $id);

        $requete->execute();
        $recipe = $requete->fetch(PDO::FETCH_ASSOC);

        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Recettes'.DIRECTORY_SEPARATOR.'modif.php');
    }

    function modifier($pdo, $id) {
        $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $auteur = isset($_POST['auteur']) ? $_POST['auteur'] : '';
        
        $image = $_FILES['image'] ?? null;

        $requete = $pdo->prepare('UPDATE recettes SET titre = :titre, description = :description, auteur = :auteur WHERE id = :id');
        $requete->bindParam(':id', $id);
        $requete->bindParam(':titre', $titre);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':auteur', $auteur);
        
        $modifOk = $requete->execute();

        if($modifOk){
            if ($image) {
                $id = $_GET['id'] ?? $pdo->lastInsertId();
                $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
                $filename = $id . '.' . $extension;
                move_uploaded_file($image['tmp_name'], 'upload/' . $filename);
        
                $query = $pdo->prepare('UPDATE recettes SET image = :image WHERE id = :id');
                $query->bindValue(':image', $filename, PDO::PARAM_STR);
                $query->bindValue(':id', $id, PDO::PARAM_INT);
                $query->execute();
              }
            require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Recettes'.DIRECTORY_SEPARATOR.'modifier.php');
        }else{
            echo "Erreur lors de l'enregistrement de la recette";
        }
    }
}