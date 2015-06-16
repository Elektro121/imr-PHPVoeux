<div class="col-sm-9 col-md-9">
    <h1>
        <?=$title?>
    </h1>
    <?php if(isset($resultat)): ?>
        <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-thumbs-up"></span>
            <?=$resultat?>
        </div>
    <?php endif; ?>
    <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-fire"></span>
            <?=$error?>
        </div>
    <?php endif; ?>
</div>