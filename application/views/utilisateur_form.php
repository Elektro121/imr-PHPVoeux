<div class="col-sm-9 col-md-9">
    <br/>
    <?php if(validation_errors() != null):?>
        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
    <?php endif;?>

    <div class="col-md-offset-3 col-md-6">
        <?php echo form_open("Utilisateur/Creation") ?>
            <div class="form-group">
                <label for="nom">
                    Nom et prénom
                </label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                <input type="text" class="form-control" id="prénom" name="prenom" placeholder="Prénom">
            </div>
            <div class="form-group">
                <label for="statutaire">
                    Heures statutaires
                </label>
                <input type="number" id="statuaire" name="statutaire" min="0" max="198">
            </div>
            <div class="form-group">
                <label for="pwd">
                    Mot de passe
                </label>
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Mot de passe">
                <input type="password" class="form-control" id="pwd" name="pwdconfirm" placeholder="Confirmez le mot de passe">
            </div>
            <div class="form-group">
                <label for="choixType">
                    Type d'utilisateur
                </label>
                <select class="selectpicker" id="choixType" name="choixtype">
                    <option value="permanent">
                        Permanent
                    </option>
                    <option value="vacataire">
                        Vacataire
                    </option>
                    <option value="titulaire">
                        Titulaire
                    </option>
                    <option value="contractuel">
                        Contractuel
                    </option>
                </select>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="administateur" value="1">Possède les pouvoirs d'administration
                </label>
            </div>
            <div class="checkbox">
                <label> 
                    <input type="checkbox" name="actif" value="1">Est actif ?
                </label>
            </div>
            <button type="submit" value="ok" class="btn btn-primary btn-lg btn-block">
                Ajouter cet utilisateur
            </button>
        </form>
    </div>

</div>