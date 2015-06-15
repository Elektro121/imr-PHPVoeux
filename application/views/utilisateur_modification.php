<div class="col-sm-9 col-md-9">
    <br/>
    <?php if(validation_errors() != null):?>
        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
    <?php endif;?>
    <div class="col-md-offset-3 col-md-6">
        <?php echo form_open("Utilisateur/Modification/".$modify['login']) ?>
            <div class="form-group">
                <label for="login">Login de l'utilisateur</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Login" value="<?=$modify['login']?>">
            </div>
            <div class="form-group">
                <label for="nom">Nom et prénom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?=$modify['nom']?>">
                <input type="text" class="form-control" id="prénom" name="prenom" placeholder="Prénom" value="<?=$modify['prenom']?>">
            </div>
            <div class="form-group">
                <label for="statutaire">Heures statutaires</label>
                <input type="number" id="statuaire" name="statutaire" min="0" max="198" value="<?=$modify['statutaire']?>">
            </div>
            <div class="form-group">
                <label for="choixType">Type d'utilisateur</label>
                <select class="selectpicker" id="choixType" name="choixtype">
                    <option value="permanent"
                        <?php if ($modify['statut']=="permanent"):?>
                        selected
                        <?php endif;?>
                                >Permanent</option>
                    <option value="vacataire"
                        <?php if ($modify['statut']=="vacataire"):?>
                            selected
                        <?php endif;?>
                        >Vacataire</option>
                    <option value="titulaire"
                        <?php if ($modify['statut']=="titulaire"):?>
                            selected
                        <?php endif;?>
                        >Titulaire</option>
                    <option value="contractuel"
                        <?php if ($modify['statut']=="contractuel"):?>
                            selected
                        <?php endif;?>
                        >Contractuel</option>
                </select>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="administateur" value="1"
                        <?php if ($modify['administrateur']=="1"):?>
                        checked
                    <?php endif;?>> Possède les pouvoirs d'administration
                </label>
            </div>
            <div class="checkbox">
                <label> 
                    <input type="checkbox" name="actif" value="1"
                        <?php if ($modify['actif']=="1"):?>
                            checked
                        <?php endif;?>> Est actif ?
                </label>
            </div>
            <button type="submit" value="ok" class="btn btn-primary btn-lg btn-block">Changer cet utilisateur</button>
        </form>
    </div>
</div>