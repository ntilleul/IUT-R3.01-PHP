document.addEventListener('DOMContentLoaded', () =>{
    let profil_identifiant = document.getElementById('profil_identifiant');
    let profil_mail = document.getElementById('profil_mail');
    let modifier_profil = document.getElementById('bouton_modifier_profil');

    profil_identifiant.addEventListener('input', (event) => {
        modifier_profil.classList.remove('d-none');
    });

    profil_mail.addEventListener('input', (event) => {
        modifier_profil.classList.remove('d-none');
    });
})