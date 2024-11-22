<?php

class FavoriController {

    function ajouter($pdo, $recipeId, $userId){
        $requete = $pdo->prepare('SELECT * FROM favoris WHERE user_id = :userId AND recette_id = :recipeId');
        $requete->bindParam(':userId', $userId);
        $requete->bindParam(':recipeId', $recipeId);
        $requete->execute();

        if (!$requete->fetch()) {
            $requeteAjout = $pdo->prepare('INSERT INTO favoris (recette_id, user_id, create_time) VALUES (:recipeId, :userId, NOW())');
            $requeteAjout->bindParam(':userId', $userId);
            $requeteAjout->bindParam(':recipeId', $recipeId);
            $ok = $requeteAjout->execute();

            if($ok){
                require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Recettes'.DIRECTORY_SEPARATOR.'ajoutFavoris.php');
            } else {
                echo 'Erreur lors de l\'ajout dans les favoris.';
            }
        }
    }

    function getFavoris($pdo, $userId) {
        $requete = $pdo->prepare('SELECT r.* FROM favoris f JOIN recettes r ON f.recette_id = r.id WHERE f.user_id = :userId');
        $requete->bindParam(':userId', $userId);
        $requete->execute();
        echo json_encode($requete->fetchAll(PDO::FETCH_ASSOC));
    }
}