<div class="col-sm-9 col-md-9">
    <h1>
        Nombre d'heures restantantes par module
    </h1>

<div class="panel panel-info">
    <table class="table">
        <tr class="info2">
            <th>
                Module
            </th>
            <th>
                Heures totales du module
            </th>
            <th>
                Heures restantes à placer
            </th>
            <th>
                Semestre
            </th>
            <th>
                Action
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
                    <td>
                        <?php echo anchor("/View/Affmodules/".$lignes['ident'],"<button type='button' class='btn btn-default' title='Détail du module'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button>"); ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif;?>
    </table>
</div>

</div>

