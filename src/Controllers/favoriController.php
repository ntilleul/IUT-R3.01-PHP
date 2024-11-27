<?php

class FavoriController {

    function modifier($pdo, $recipeId, $userId){
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
                $_SESSION['message'] = ['success' => 'Recette ajoutée aux favoris'];
            } else {
                echo 'Erreur lors de l\'ajout dans les favoris.';
            }
        } else {
            $requeteSuppr = $pdo->prepare('DELETE FROM favoris WHERE recette_id = :recipeId AND user_id = :userId');
            $requeteSuppr->bindParam(':recipeId', $recipeId);
            $requeteSuppr->bindParam(':userId', $userId);
            $ok = $requeteSuppr->execute();

            if($ok){
                $_SESSION['message'] = ['success' => 'Recette supprimée des favoris'];
            } else {
                echo 'Erreur lors de la suppression dans les favoris.';
            }
        }
        header("Location: ?c=detail&id=".$recipeId);
    }

    function getFavoris($pdo, $userId) {
        $requete = $pdo->prepare('SELECT r.* FROM favoris f JOIN recettes r ON f.recette_id = r.id WHERE f.user_id = :userId');
        $requete->bindParam(':userId', $userId);
        $requete->execute();
        header('Content-Type: application/json');
        echo json_encode($requete->fetchAll(PDO::FETCH_ASSOC));
    }

    function existe($pdo, $recetteId, $userId) {
        $requete = $pdo->prepare('SELECT COUNT(id) AS existe FROM favoris WHERE user_id = :userId AND recette_id = :recetteId');
        $requete->bindParam(':userId', $userId);
        $requete->bindParam(':recetteId', $recetteId);
        $requete->execute();
        $resultat = $requete->fetch(PDO::FETCH_ASSOC);
        if ($resultat['existe'] == 0) {
            return "Ajouter aux favoris";
        } else {
            return "Retirer des favoris";
        }
    }
}
