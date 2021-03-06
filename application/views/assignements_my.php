<div class="col-sm-9 col-md-9">
    <?php if($heuresaplacer > 0): ?>
        <div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-warning-sign"></span> <b>Attention !</b> Il vous reste <b><?=$heuresaplacer?> heures</b> à placer.</div>
    <?php endif;?>
    <h1>
        Modules auquels vous êtes inscrits :
    </h1>

    <div class="panel panel-info">
        <table class="table">
            <tr class="info2">
                <th>Module</th>
                <th>Partie</th>
                <th>Type</th>
                <th>HETD</th>
                <th>Actions</th>
            </tr>
            <?php if(!empty($contenu)): ?>
                <?php foreach($contenu as $lignes):?>
                    <tr>
                        <?php foreach($lignes as $key => $colonnes): ?>
                            <?php if($key !== 'enseignant'):?>
                                <td>
                                    <?=$colonnes?>
                                </td>
                            <?php endif;?>
                        <?php endforeach ?>
                        <td>
                            <?php echo anchor("Assignements/Desinscrire/".$lignes['module']."/".$lignes['partie'],"<button type='button' class='btn btn-default' title='Supprimer'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true' ></span></button>"); ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif;?>
        </table>
    </div>
</div>