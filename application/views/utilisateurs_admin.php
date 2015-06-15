<div class="col-sm-9 col-md-9">
    <p>
        Voici la liste des utilisateurs :
    </p>
    <table class="table table-hover">
        <tr>
            <th>Login</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Statut</th>
            <th>Statuaire</th>
            <th>Actions</th>
        </tr>
        <?php foreach($contenu as $lignes):?>
            <tr>
                <?php foreach($lignes as $key => $colonnes): ?>
                    <?php if(!($key === "actif" OR $key === "administrateur" OR $key === "pwd")): ?>
                        <td>
                            <?php if($key == "login"): ?>
                                <?=$colonnes?>
                                <?php if($lignes['actif'] == '0'): ?>
                                    <span class="label label-default">Inactif</span>
                                <?php endif; ?>
                                <?php if($lignes['administrateur'] == '1'): ?>
                                    <span class="label label-primary">Administrateur</span>
                                <?php endif; ?>
                            <?php else : ?>
                                <?=$colonnes?>
                            <?php endif; ?>
                        </td>
                    <?php endif;?>
                <?php endforeach ?>
                <td>
                    <?php echo anchor("Utilisateur/Modifier/".$lignes['login'],"<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>"); ?>
                    <?php echo anchor("Utilisateur/Supprimer/".$lignes['login'],"<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span></button>"); ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>