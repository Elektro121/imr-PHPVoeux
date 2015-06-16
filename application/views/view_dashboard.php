<div class="col-sm-9 col-md-9">
    <h1>
        Bienvenue sur votre dashboard
    </h1>
</div>

<div class="col-sm-9 col-md-9">
    <?php if($heuresaplacer > 0): ?>
    <div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-warning-sign"></span> <b>Attention !</b> Il vous reste <b><?=$heuresaplacer?> heures</b> à placer.</div>
    <?php endif;?>


<p>TODO les différentes alertes à venir plus tard par les devs</p>
</div>