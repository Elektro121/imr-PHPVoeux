<div class="col-sm-9 col-md-9">

    <h1>
        Modules où vous pouvez vous inscrire :
    </h1>

        <div class="panel panel-info">
            <table class="table">
                <tr class="info2">
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
                                <?php if($key !== "enseignant"):?>
                                    <td>
                                        <?=$colonnes?>
                                    </td>
                                <?php endif;?>
                            <?php endforeach ?>
                            <td>
                                <?php echo anchor("Assignements/Inscrire/".$lignes['module']."/".$lignes['partie'],"<button type='button' class='btn btn-default' title='Inscription'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true' ></span></button>"); ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif;?>
            </table>
            </div>

        </div>
</div>