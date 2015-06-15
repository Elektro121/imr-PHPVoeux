<div class="col-sm-9 col-md-9">

    <p>
        Voici la liste des différents modules :
    </p>
    <table class="table table-hover">
        <tr>
            <th>Promo</th>
            <th>Semestre</th>
            <th>Module</th>
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

