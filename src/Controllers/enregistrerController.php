<?php
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $auteur = $_POST['auteur'];

    /** @var PDO $pdo **/
    $requete = $pdo->prepare('INSERT INTO recettes(titre, description, auteur, date_creation) VALUES (:titre, :description, :auteur, NOW())');
    $requete->bindParam(':titre', $titre);
    $requete->bindParam(':description', $description);
    $requete->bindParam(':auteur', $auteur);

    $ok = $requete->execute();

    if($ok) {
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'enregistrer.php');
    } else {
        echo 'Erreur lors de l\'enregistrement de la recette.';
    }
