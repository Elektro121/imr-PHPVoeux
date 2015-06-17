<div class="col-sm-9 col-md-9">
    <h1>
        <?=$title?>
    </h1>
    <?php if(isset($resultat)): ?>
        <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-thumbs-up"></span> <?=$resultat?></div>
    <?php endif; ?>
    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-fire"></span> <?=$error?></div>
    <?php endif; ?>
    <?php if(validation_errors() != null):?>
        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
    <?php endif;?>
    <?php echo form_open("Decharges/Creer", array('id' => 'creer'))?></form>
    <?php if(isset($modify)): ?>
        <?php echo form_open("Decharges/Modifier/".$modify,array('id' => 'modifier')); ?></form>
        <?php endif; ?>
    <div class="panel panel-info">
        <table class="table">
            <tr class="info2">
                <th>Enseignant</th>
                <th>Décharge</th>
                <th>Actions</th>
            </tr>
            <?php foreach($contenu as $lignes):?>
                <?php if((!isset($modify)) OR ($lignes['enseignant'] !== $modify)): ?>
                    <tr>
                        <?php foreach($lignes as $key => $colonnes): ?>
                            <td>
                                <?=$colonnes?>
                            </td>
                        <?php endforeach ?>
                        <td>
                            <?php echo anchor("Decharges/Modifier/".$lignes['enseignant'], "Modifier"); ?>
                            <?php echo anchor("Decharges/Supprimer/".$lignes['enseignant'], "Supprimer"); ?>
                        </td>
                    </tr>
                <?php else : ?>
                    <tr>
                            <td>
                                <b><?=$lignes['enseignant']?></b>
                            </td>
                            <td>
                                <input type="number" name="decharge" value="<?=$lignes['decharge']?>" form="modifier"/>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-default" value="ok" form="modifier">Envoyer</button>
                                <?php echo anchor("Decharges/Supprimer/".$lignes['enseignant'], "Supprimer"); ?>
                            </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach ?>
            <tr>
                <td>
                    <input type="text" name="enseignant" placeholder="Nom d'utilisateur" form="creer"/>
                </td>
                <td>
                    <input type="number" name="decharge" form="creer"/>
                </td>
                <td>
                    <button type="submit" class="btn btn-default" value="ok" form="creer">Envoyer</button>
                </td>
            </tr>
        </table>
    </div>
</div>