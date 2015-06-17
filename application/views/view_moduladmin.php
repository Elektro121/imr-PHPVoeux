<div class="col-sm-9 col-md-9">
    <h1>
        Administration des modules enseignés
        <?php echo anchor('/Modules/Creation', '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Ajouter un module', 'class="btn btn-default btn-droite"  role="button"')?>
    </h1>

    <div class="panel panel-info">
        <table class="table">
            <tr class="info2">
                <th>
                    Module
                </th>
                <th>
                    Nombre d'heures
                </th>
                <th>
                    Promo
                </th>
                <th>
                    Semestre
                </th>
                <th>
                    Actions
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
