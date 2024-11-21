<body>
    <div class="row">
        <div class="col-6">
            <img src="upload/<?= $recipe['image'] ?? "no_image.png" ?>" alt="<?= $recipe['titre'] ?>" class="img-fluid">
            <a href='?c=recette' class="btn btn-primary mt-4">Retour à la liste des recettes</a>
            <a href="?c=modif&id=<?= $recipe['id'] ?>" class="btn btn-primary mt-4">Modifier la recette</a>
        </div>
        <div class="col-6">
            <p><?= $recipe['description'] ?></p>
            <p>Auteur : <a href="mailto:<?= $recipe['auteur'] ?>"><?= $recipe['auteur'] ?></a></p>
        </div>
    </div>
</body>