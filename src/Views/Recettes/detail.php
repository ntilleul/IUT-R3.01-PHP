<?php $favoriController = new FavoriController(); ?> 
<body>
    <div class="row">
        <div class="col-6">
            <img src="upload/<?= $recipe['image'] ?? "no_image.png" ?>" alt="<?= $recipe['titre'] ?>" class="img-fluid">
            <a href='?c=lister' class="btn btn-primary mt-4">Retour à la liste des recettes</a>
            <?php if(isset($_SESSION['identifiant'])) {?>
                <a href="?c=modif&id=<?php echo $recipe['id'];?>" class="btn btn-primary">Modifier la recette</a>
                <?php
                $isFavori = $favoriController->existe($pdo, $recipe['id'], $_SESSION['id']);
                ?>
                <a href="?c=favori&id=<?php echo $recipe['id'];?>" class="btn btn-primary">
                    <?php echo $isFavori ? 'Retirer des favoris' : 'Ajouter aux favoris'; ?>
                </a>
                <?php } ?>
        </div>
        <div class="col-6">
            <p><?= $recipe['description'] ?></p>
            <p>Auteur : <a href="mailto:<?= $recipe['auteur'] ?>"><?= $recipe['auteur'] ?></a></p>
        </div>
    </div>
</body>