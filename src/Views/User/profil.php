<h1>Profil de l'utilisateur : <span id="profil_identifiant_titre"><?php echo $user['identifiant']; ?></span></h1>
<div class="row">
    <div class="col">
        <img class="w-75 rounded mx-auto img-fluid" src="<?php echo 'upload' . DIRECTORY_SEPARATOR . 'profil.png'; ?>" alt="<?php echo $user['identifiant']; ?>" class="card-img-top">
    </div>
    <div class="col">
        <p><b>Identifiant : </b><span id="profil_identifiant" data-id="<?php echo $user['id']; ?>" contenteditable="true"><?php echo $user['identifiant']; ?></span></p>
        <p><b>Email : </b><span id="profil_mail" data-id="<?php echo $user['id']; ?>" contenteditable="true"><?php echo $user['mail']; ?></span></p>
    </div>
</div>
<hr>
<div id="boutons">
    <button id="bouton_modifier_profil" class="btn btn-primary d-none">Modifier le profil</button>
    <a href="?c=home" class="btn btn-primary">Retour à l'accueil</a>
</div>