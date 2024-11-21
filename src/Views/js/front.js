document.addEventListener("DOMContentLoaded", () => {

    let recipes = document.querySelectorAll('.recipe');

    recipes.forEach(recipe => {
        recipe.style.cursor = "pointer";

        recipe.addEventListener("mouseover", (event) => {
            recipe.style.backgroundColor = 'lightgray';
        });

        recipe.addEventListener("mouseout", (event) => {
            recipe.style.backgroundColor = '';
        });

        recipe.addEventListener("click", (event) => {
            event.preventDefault();
            let recipeId = recipe.dataset.id;
            window.open(`?c=detail&id=${recipeId}`, '_self');
        });
    });
});