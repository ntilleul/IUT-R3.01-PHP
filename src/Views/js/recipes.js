document.addEventListener("DOMContentLoaded", () => {
    let recipes = document.querySelectorAll('.recipe');
    let recipefav = document.querySelectorAll('.recipefav');
    let editIcons = document.querySelectorAll('.edit-recipe');

    // Gérer les cartes de recettes
    recipes.forEach(recipe => {
        recipe.style.cursor = "pointer";

        recipe.addEventListener("mouseover", () => {
            recipe.style.backgroundColor = 'lightgray';
        });

        recipe.addEventListener("mouseout", () => {
            recipe.style.backgroundColor = '';
        });

        recipe.addEventListener("click", (event) => {
            event.preventDefault();
            let recipeId = recipe.dataset.id;
            window.open(`?c=detail&id=${recipeId}`, '_self');
        });
    });

   
    recipefav.forEach(icon => {
        icon.style.cursor = "pointer";

        icon.addEventListener("click", (event) => {
            event.stopPropagation(); 
            let recipeId = icon.closest('.recipe').dataset.id;
            fetch(`?c=favori&id=${recipeId}`)
                .then(() => location.reload()); 
        });
    });

    editIcons.forEach(icon => {
        icon.style.cursor = "pointer";

        icon.addEventListener("click", (event) => {
            event.stopPropagation(); 
            let recipeId = icon.closest('.recipe').dataset.id;

            window.open(`?c=modif&id=${recipeId}`, '_self');
        });
    });
});
