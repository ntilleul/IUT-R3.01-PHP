<h1>Ajouter une recette</h1>
<form action="?c=enregistrerRecette" method="post">
    <div class="mb-3">
        <label for="titre" class="form-label">Titre de la recette</label>
        <input type="text" class="form-control" name="titre" id="titre" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description de la recette</label>
        <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label for="auteur" class="form-label">Mail de l'auteur</label>
        <input type="email" class="form-control" name="auteur" id="auteur" required>
    </div>
    <div class="mb-3">
        <label for="image">Image :</label>
        <input type="file" id="image" name="image" accept="image/*">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="enregistrer">Enregistrer</button>
    </div>
</form>