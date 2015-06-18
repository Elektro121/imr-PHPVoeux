<div class="col-sm-9 col-md-9">
    <?php if(validation_errors() != null):?>
        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
    <?php endif;?>
    <?php echo form_open("Modules/CreerCours/".$module, array('id' => 'creer'))?></form>
    <?php if(isset($modifier)): ?>
        <?php echo form_open("Modules/ModifierCours/".$module."/".$modifier, array('id' => 'modifier'))?></form>
    <?php endif; ?>
    <?php echo form_open("Modules/Modification/".$selected['ident'], array('id' => 'principal'))?>
    <div class="form-group">
        <label for="identifiant">
            Identifiant
        </label>
        <p class="form-control-static"><?=$selected['ident']?></p>
    </div>
    <div class="form-group">
        <label for="public">
            Public
        </label>
        <input type="text" id="public" name="public" class="form-control" placeholder="Public du Module" value="<?=$selected['public']?>" form="principal">
    </div>
    <div class="form-group">
        <label for="semestre">
            Semestre
        </label>
        <select id="semestre" name="semestre" class="selectpicker form-control" form="principal">
            <?php for($i=1; $i<7; $i++): ?>
                <option value="S<?=$i?>"
                    <?php if($selected['semestre'] == "S".$i): ?>
                        selected
                    <?php endif; ?>
                    >Semestre <?=$i?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="libelle">
            Libellé du cours
        </label>
        <input type="text" id="libelle" name="libelle" class="form-control" value="<?=$selected['libelle']?>" form="principal">
    </div>
    <div class="form-group">
        <input type="submit" value="ok" form="principal">
    </div>
    </form>
    <div class="panel panel-info">
        <table class="table">
            <tr class="info2">
                <th>
                    Partie
                </th>
                <th>
                    Type
                </th>
                <th>
                    HETD
                </th>
                <th>
                    Action
                </th>
            </tr>
            <?php foreach($contenu as $lignes):?>
                <?php if((!isset($modifier)) OR ($lignes['partie'] !== $modifier)): ?>
                    <tr>
                        <?php foreach($lignes as $key => $colonnes): ?>
                            <?php if($key != 'enseignant' AND $key != 'module'): ?>
                                <td>
                                    <?=$colonnes?>
                                </td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <td>
                            <?php echo anchor("Modules/ModifierCours/".$lignes['module']."/".$lignes['partie'], "Modifier"); ?>
                            <?php echo anchor("Modules/SupprimerCours/".$lignes['module']."/".$lignes['partie'], "Supprimer"); ?>
                        </td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td>
                            <p class="form-control-static"><?=$lignes['partie']?></p>
                        </td>
                        <td>
                            <select name="modif_type" form="modifier" >
                                <option value="CM"
                                    <?php if($lignes['type'] == "CM"): ?>
                                        selected
                                    <?php endif; ?>
                                    >CM</option>
                                <option value="TD"
                                    <?php if($lignes['type'] == "TD"): ?>
                                        selected
                                    <?php endif; ?>
                                    >TD</option>
                                <option value="TP"
                                    <?php if($lignes['type'] == "TP"): ?>
                                        selected
                                    <?php endif; ?>
                                    >TP</option>
                                <option value="Projet"
                                    <?php if($lignes['type'] == "Projet"): ?>
                                        selected
                                    <?php endif; ?>
                                    >Projet</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="modif_hed" value="<?=$lignes['hed']?>" placeholder="HED" form="modifier" >
                        </td>
                        <td>
                            <button type="submit" class="btn btn-default" value="ok" form="modifier">Envoyer</button>
                            <?php echo anchor("Modules/SupprimerCours/".$lignes['enseignant'], "Supprimer"); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            <tr>
                <td>
                    <input type="text" name="nouveau_ident" value="" placeholder="Identifiant de la partie" form="creer">
                </td>
                <td>
                    <select name="nouveau_type" form="creer" >
                        <option value="CM">CM</option>
                        <option value="TD">TD</option>
                        <option value="TP">TP</option>
                        <option value="Projet">Projet</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="nouveau_hed" value="" placeholder="HED" form="creer" >
                </td>
                <td>
                    <input type="submit" value="Envoyer" form="creer">
                </td>
            </tr>
        </table>
    </div>
    <br/>
</div>