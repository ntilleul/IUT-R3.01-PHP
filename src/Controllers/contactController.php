<?php
    
class ContactController {
    
    function ajouter() {
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Contact'.DIRECTORY_SEPARATOR.'contact.php');
    }

    function enregistrer($pdo){
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $description = $_POST['description'];

        $requete = $pdo->prepare('INSERT INTO contact(nom, mail, description) VALUES (:nom, :mail, :description)');
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':mail', $mail);
        $requete->bindParam(':description', $description);

        $ok = $requete->execute();

        if($ok) {
            require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Contact'.DIRECTORY_SEPARATOR.'enregistrer.php');
        } else {
            echo 'Erreur lors de l\'enregistrement du Contact.';
        }
    }
}