<?php $favoriController = new FavoriController(); ?> 
<body>
    <h1>Recettes</h1>

    <div class="row">
        <?php foreach ($recipes as $recipe) : ?> 
            <div class="col-4 p-2"> 
                <?php if(isset($_SESSION['id'])) {
                    $isFavori = $favoriController->existe($pdo, $recipe['id'], $_SESSION['id']);?>
                    <span class="recipefav">
                        <i class="bi <?= $isFavori ? 'bi-heart-fill' : 'bi-heart' ?>"></i>
                    </span>
                    <span class="edit-recipe">
                        <i class="bi bi-pencil-square"></i>
                    </span>
                <?php } ?>
                <div class="card recipe" data-id="<?php echo $recipe['id']?>">
                    <img src="upload/<?= $recipe['image'] ?? "no_image.png" ?>" alt="<?= $recipe['titre'] ?>" class="card-img-top">
                    <div class="card-body">
                        <h2><?php echo $recipe['titre']; ?></h2>
                        <p><?php echo $recipe['description']; ?></p>
                        <a href="mailto:<?php echo $recipe['auteur']; ?>"><?php echo $recipe['auteur'];?></a>
                    </div>    
                </div> 
            </div>
        <?php endforeach; ?>        
    </div>
    <a href="?c=home" class="btn btn-primary">Retour à l'accueil</a>
</body>

<script src="src/Views/js/recipes.js"></script>
