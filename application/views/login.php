<div class="container login">

    <?php if(!isset($user)):?>

        <?php echo form_open("Login") ?>
        <h2 class="form-signin-heading">Connectez vous</h2>
            <?php if(validation_errors() != null):?>
                <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
            <?php endif;?>
            <?php if(isset($login_error)):?>
                <div class="alert alert-danger" role="alert"><?=$login_error?></div>
            <?php endif;?>
            <label for="user" class="sr-only">Nom d'utilisateur</label>
            <input type="text" name="user" class="form-control" placeholder="Nom d'utilisateur" required autofocus>
            <label for="password" class="sr-only">Mot de passe</label>
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
        </form>
    <?php endif;?>

    <?php if(isset($user)):?>
        <h2>Bonjour <?=$user?> ! Vous êtes déjà connecté.<?php anchor("Login/Disconnect", "Se déconnecter.")?></h2>
    <?php endif;?>

</div>