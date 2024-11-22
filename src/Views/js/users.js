document.addEventListener('DOMContentLoaded', () =>{
    let profil_identifiant = document.getElementById('profil_identifiant');
    let profil_mail = document.getElementById('profil_mail');
    let modifier_profil = document.getElementById('bouton_modifier_profil');
    let divFavoris = document.getElementById('favoris');
    fetch("?c=getFavoris&x&id="+userId).then(response =>{
        JSON.stringify(response);
        divFavoris.innerHTML = "<ul>";
        divFavoris.innerHTML += response.map(favori => {
            return "<li><a href='?cdetail&id="+favori.id+"'>"+favori.titre+"</a></li>";
        }).join("")
        divFavoris.innerHTML += "</ul>";
    });

    profil_identifiant.addEventListener('input', (event) => {
        modifier_profil.classList.remove('d-none');
    });

    profil_mail.addEventListener('input', (event) => {
        modifier_profil.classList.remove('d-none');
    });
})