<div class="col-sm-9 col-md-9">
    <?php if($heuresaplacer > 0): ?>
        <div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-warning-sign"></span> <b>Attention !</b> Il vous reste <b><?=$heuresaplacer?> heures</b> à placer.</div>
    <?php endif;?>
    <p>
        Voici les modules auquels vous vous êtes inscrits :
    </p>
    <table class="table table-hover">
        <tr>
            <th>Module</th>
            <th>Partie</th>
            <th>Type</th>
            <th>HETD</th>
            <th>Enseignant</th>
            <th>Actions</th>
        </tr>
        <?php if(!empty($contenu)): ?>
            <?php foreach($contenu as $lignes):?>
                <tr>
                    <?php foreach($lignes as $key => $colonnes): ?>
                        <td>
                            <?=$colonnes?>
                        </td>
                    <?php endforeach ?>
                    <td>
                        <?php echo anchor("Assignements/Desinscrire/".$lignes['module']."/".$lignes['partie'],"<span class='glyphicon glyphicon-remove-sign'></span>"); ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif;?>
    </table>
</div>