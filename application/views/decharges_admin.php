<div class="col-sm-9 col-md-9">
    <h1>
        Voici la liste des décharges
    </h1>

<div class="panel panel-info">
    <table class="table">
        <tr class="info2">
            <th>Enseignant</th>
            <th>Décharge</th>
            <th>Actions</th>
        </tr>
        <?php foreach($contenu as $lignes):?>
            <?php if($lignes['user'] = $modify): ?>
                <?php foreach($lignes as $key => $colonnes): ?>
                    <td>
                        <?=$colonnes?>x
                    </td>
                <?php endforeach ?>
                <td>

                </td>
            <?php else : ?>
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <?php echo anchor("Decharges/Modifier/".$lignes['login'],"<button type='button' class='btn btn-default' title='Modifier'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>"); ?>
                        <?php echo anchor("Decharges/Supprimer/".$lignes['login'],"<button type='button' class='btn btn-default' title='Supprimer'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span></button>"); ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach ?>
    </table>
</div>

</div>