<div class="col-sm-9 col-md-9">
    <h1>
        Vue des heures par enseignant
    </h1>

<div class="panel panel-info">
    <table class="table">
        <tr class="info2">
            <th>
                Nom
            </th>
            <th>
                Heures Effectuées
            </th>
            <th>
                Heures restantes
            </th>
            <th>
                Action
            </th>
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
                    <td>
                        <?php echo anchor("/View/Affenseignant/".$lignes['login'],"<button type='button' class='btn btn-default' title='Détail du module'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button>"); ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif;?>
    </table>
</div>

</div>

