<div class="col-sm-9 col-md-9">
    <h1>
        Voici la liste des utilisateurs     <?php echo anchor('/Utilisateur/Creation', '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un utilisateur', 'class="btn btn-default btn-droite"  role="button"')?>

    </h1>
    <div class="panel panel-info">
        <table class="table">
            <tr class="info2">
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
                    <?php echo anchor("Utilisateur/Modification/".$lignes['login'],"<button type='button' class='btn btn-default' title='Modifier'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>"); ?>
                    <?php echo anchor("Utilisateur/Supprimer/".$lignes['login'],"<button type='button' class='btn btn-default' title='Supprimer'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span></button>"); ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    </div>
</div>