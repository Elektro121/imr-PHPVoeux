<div class="col-sm-9 col-md-9">

    <p>
        Voici la liste des différents modules :
    </p>
    <table class="table table-hover">
        <tr>
            <th>Module</th>
            <th>Partie</th>
            <th>Type</th>
            <th>HETD</th>
            <th>Actions</th>
        </tr>
        <?php if(!empty($contenu)): ?>
            <?php foreach($contenu as $lignes):?>
                <tr>
                    <?php foreach($lignes as $key => $colonnes): ?>
                        <?php if($key !== 'enseignant'):?>
                            <td>
                                <?=$colonnes?>
                            </td>
                        <?php endif;?>
                    <?php endforeach ?>
                    <td>
                        <?php echo anchor("Assignements/Desinscrire/".$lignes['module']."/".$lignes['partie'],"<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true' ></span></button>"); ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif;?>
    </table>
</div>

