<div class="col-sm-9 col-md-9">
    <h1>
        Bienvenue sur votre dashboard
    </h1>
</div>

<div class="col-sm-9 col-md-9">
    <?php if($heuresaplacer > 0): ?>
        <div class="alert alert-warning" role="alert">
            <span class="glyphicon glyphicon-warning-sign"></span>
            <b>Attention !</b> Il vous reste <b><?=$heuresaplacer?> heures</b> à placer.
        </div>
    <?php endif;?>
    <?php if($mdp): ?>
    <div class="alert alert-warning" role="alert">
        <span class="glyphicon glyphicon-warning-sign"></span>
        <b>Attention !</b> Votre mot de passe est à changer !
    </div>
    <?php endif;?>
    <p>
        <?php echo anchor("/Utilisateur/ChangerMotDePasse","<button type='button' class='btn btn-default' title='Changer le mdp'><span class='glyphicon glyphicon-hand-right' aria-hidden='true'></span> <b> Changement de mdp</b></button>"); ?>
    </p>
    <p>
        <?php echo anchor("/Decharges","<button type='button' class='btn btn-default' title='Modifier les décharges'><span class='glyphicon glyphicon-folder-open' aria-hidden='true'></span> <b> Modifier mes décharges</b></button>"); ?>
    </p>

</div>