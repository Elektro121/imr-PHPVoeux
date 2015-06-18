<div class="col-sm-9 col-md-9">
    <h1>
        Liste des modules de l'enseignant
    </h1>

    <div class="panel panel-info">
        <table class="table">
            <tr class="info2">
                <th>
                    Module
                </th>
                <th>
                    Cours
                </th>
                <th>
                    Type
                </th>
                <th>
                    Nombre d'heure
                </th>
                <th>
                    Enseignant
                </th>
            </tr>

            <?php if(!empty($contenu)): ?>
                <?php foreach($contenu as $lignes):?>
                    <tr>
                        <?php foreach($lignes as $key => $colonnes): ?>
                            <?php if($key !== 'ident'):?>
                                <td>
                                    <?=$colonnes?>
                                </td>
                            <?php endif;?>
                        <?php endforeach ?>
                    </tr>
                <?php endforeach ?>
            <?php endif;?>
        </table>
    </div>

</div>