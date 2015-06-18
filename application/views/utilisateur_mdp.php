<div class="col-sm-9 col-md-9">
    <br/>
    <?php if(validation_errors() != null):?>
        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
    <?php endif;?>

    <div class="col-md-offset-3 col-md-6">
        <?php echo form_open("Utilisateur/ChangerMotDePasse") ?>
            <div class="form-group">
                <label for="pwd">
                    Mot de passe
                </label>
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Mot de passe">
                <input type="password" class="form-control" id="pwd" name="pwdconfirm" placeholder="Confirmez le mot de passe">
            </div>
            <button type="submit" value="ok" class="btn btn-primary btn-lg btn-block">
                Changer mon mot de passe
            </button>
        </form>
    </div>