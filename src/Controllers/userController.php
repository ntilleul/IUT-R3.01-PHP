<?php

class UserController {

    function inscription(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'inscription.php');
    }

    function enregistrer($pdo){
        $identifiant = $_POST['identifiant'];
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        $mail = $_POST['mail'];
        $isAdmin = 0;
        

        $requete = $pdo->prepare('INSERT INTO users(identifiant, password, mail, create_time, isAdmin ) VALUES (:identifiant, :password, :mail, NOW(), :isAdmin)');
        $requete->bindParam(':identifiant', $identifiant);
        $requete->bindParam(':password', $pwd);
        $requete->bindParam(':mail', $mail);
        $requete->bindParam(':isAdmin', $isAdmin);
        

        $ok = $requete->execute();

        if($ok) {
            require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'enregistrer.php');
        } else {
            echo 'Erreur lors de l\'enregistrement du User.';
        }
    }

    function connexion(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'connexion.php');
    }

    function verifieConnexion($pdo) {
        $identifiant = $_POST['identifiant'];
        $pwd = $_POST['pwd'];

        $requeteidentifiant = $pdo->prepare('SELECT * FROM users WHERE identifiant = :identifiant');
        $requeteidentifiant->bindParam(':identifiant', $identifiant);
        $requeteidentifiant->execute();
        $user = $requeteidentifiant->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'connexionEchec.php';
        } else {
            $pwdHash = $user['password'];

            if (password_verify($pwd, $pwdHash)) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['identifiant'] = $user['identifiant'];
                $_SESSION['mail'] = $user['mail'];
                echo "<script>window.location.href = '/lacosina/';</script>";
            } else {
                require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'connexionEchec.php';
            }
        }
    }

    function deconnexion() {
        session_destroy();
        echo "<script>window.location.href = '/lacosina/';</script>";
    }
}