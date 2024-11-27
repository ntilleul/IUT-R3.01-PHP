<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Cosina</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="src/Views/js/recipes"></script>
    <script src="src/Views/js/users"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href='?c=home'>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='?c=lister'>Recettes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='?c=contact'>Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <?php if (isset($_SESSION['identifiant'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Bienvenue <?php echo htmlspecialchars($_SESSION['identifiant']); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="?c=profil">Mon profil</a></li>
                            <li><a class="dropdown-item" href="?c=ajout">Ajouter une recette</a></li>
                            <li><a class="dropdown-item" href="?c=mesFavoris&x">Mes recettes favorites</a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href='?c=deconnexion'>Déconnexion</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark me-2" href='?c=inscription'>Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-dark" href='?c=connexion'>Connexion</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <div class="container w-75 m-auto">
    <?php if(isset($_SESSION['message'])) : ?>
    <?php foreach ($_SESSION["message"] as $type => $message) { ?>
        <div class="alert alert-<?php echo $type; ?>">
            <?php echo $message; ?>
        </div>
    <?php } endif; unset($_SESSION["message"]); ?>
</body>
</html>
