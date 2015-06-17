<html>

    <head lang="fr">
        <meta charset="UTF-8">
        <?php if(isset($retour)): ?>
            <meta http-equiv='Refresh' content='3; url=<?php echo base_url($retour)?>' />
        <?php endif; ?>
        <link rel="stylesheet" href="<?php echo base_url('application/assets/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('application/assets/css/bootstrap-select.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('application/assets/css/main.css'); ?>" />
        <script type="text/javascript" src="<?php echo base_url('application/assets/js/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('application/assets/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('application/assets/js/bootstrap-select.min.js'); ?>"></script>
        <title>
            <?="$title"?> - Gestionnaire d'heure de cours
        </title>
    </head>

    <body>
