<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Cosina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- menu de navigation -->
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href='?c=home'>Accueil</a></li>
            <li class="nav-item"></li>
                <a class="nav-link" href='?c=lister'>Recettes</a></li>
            <li class="nav-item">
                <a class="nav-link" href='?c=contact'>Contact</a></li>
            <li class="nav-item">
                <a class="nav-link" href='?c=ajout'>Ajouter une recette</a></li>
        </ul>
        <?php if (isset($_SESSION['id'])) { ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-outline-dark" href='?c=deconnexion'>Déconnexion</a>
                </li>
            </ul>
        <?php } else { ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-outline-dark" href='?c=inscription'>Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-dark" href='?c=connexion'>Connexion</a>
                </li>
            </ul>
        <?php } ?>
    </nav>
    <div class="container w-75 m-auto">
</body>
