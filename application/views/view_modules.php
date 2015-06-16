<div class="col-sm-9 col-md-9">

    <h1>
        Nombre d'heures restantantes par module
    </h1>

    <div class="panel panel-info">
        <table class="table">
            <tr class="info2">
                <th>Module</th>
                <th>Heures restantes à placer</th>
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

