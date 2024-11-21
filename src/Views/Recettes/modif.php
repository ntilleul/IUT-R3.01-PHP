<h1>Modifier la recette : <?php echo $recipe['titre']; ?></h1>

<form action="?c=modifier&id=<?php echo $recipe['id']; ?>" method="post" enctype="multipart/form-data" >
    <div class="mb-3">
        <label for="titre" class="form-label">Titre de la recette</label>
        <input type="text" class="form-control" value="<?php echo $recipe['titre']; ?>"  name="titre" id="titre" required>

    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description de la recette</label>
        <textarea class="form-control" name="description" id="description" rows="3" required><?php echo $recipe['description']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">Mail de l'auteur</label>
        <input type="email" class="form-control" value="<?php echo $recipe['auteur']; ?>" name="auteur" id="auteur" required>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="modifier">Enregister</button>
    </div>
</form>