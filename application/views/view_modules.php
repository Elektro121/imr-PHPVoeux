<div class="col-sm-9 col-md-9">

    <h1>
        Vue des heures par module
    </h1>

    <div class="panel panel-info">
        <table class="table">
            <tr class="info2">
                <th>Todo</th>
                <th>Todo</th>
                <th>Todo</th>
            </tr>

            <?php if(!empty($contenu)): ?>
                <?php foreach($contenu as $lignes):?>
                    <tr>
                        <?php foreach($lignes as $key => $colonnes): ?>
                            <?php if($key !== 'login'):?>
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

