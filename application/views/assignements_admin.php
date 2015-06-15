<div class="col-sm-9 col-md-9">
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
        </tr>
        <?php if(!empty($contenu)): ?>
            <?php foreach($contenu as $lignes):?>
                    <tr>
                        <?php echo form_open("Assignements/Inscrire") ?>
                            <?php foreach($lignes as $key => $colonnes): ?>
                                <td>
                                    <?php if($key === "enseignant"): ?>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <?php if(empty($colonnes)): ?>
                                                <span class="label label-warning">personne</span>
                                                <?php else : ?>
                                                    <span class="label label-success"><?=$colonnes?></span>
                                                <?php endif;?>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li role="presentation" class="dropdown-header">Utilisateurs</li>
                                                    <?php foreach($users as $liste): ?>
                                                        <li><?php echo anchor("Assignements/Inscrire/".$lignes['module']."/".$lignes['partie']."/".$liste['login'], $liste['login']); ?></li>
                                                    <?php endforeach ?>
                                                <li role="presentation" class="dropdown-header">Autre</li>
                                                    <li><?php echo anchor("Assignements/Inscrire/".$lignes['module']."/".$lignes['partie'], "Personne"); ?></li>
                                            </ul>
                                        </div>
                                    <?php else : ?>
                                        <?=$colonnes?>
                                    <?php endif; ?>
                                </td>
                            <?php endforeach; ?>
                    </tr>
            <?php endforeach ?>
        <?php endif;?>
    </table>
</div>