<div class="col-sm-3 col-md-3">

    <ul class="nav nav-sidebar">
        <li><h4><font color="#337ab7"><b>Panneau d'administration</b></font></h4></li>
        <li><?php echo anchor("Dashboard", "Accueil")?></li>
        <li><?php echo anchor("Assignements", "Mes heures")?></li>
        <li><?php echo anchor("Assignements/Inscription", "Réservation des Heures")?></li>
        <li><?php echo anchor("View/Heure_module", "Récapitulatif des Modules")?></li>
        <li><?php echo anchor("", "Non actif / Heures par Modules")?></li>
        <li><?php echo anchor("", " Non actif / Heures par Enseignants")?></li>
        <li><?php echo anchor("Login/Disconnect", "Déconnexion")?></li>

        <?php if($admin == TRUE):?>
            <ul class="nav nav-sidebar">
                <li><h4><font color="#337ab7"><b>Partie Administrateur</b></font></h4></li>
                <li><?php echo anchor("Assignements/Admin", "Gestion des inscription")?></li>
                <li><?php echo anchor("Utilisateur/Admin", " En travaux / Gestion des Utilisateurs")?></li>
                <li><?php echo anchor("", " Non actif / Gestion des HETD")?></li>
                <li><?php echo anchor("", " Non actif / Gestion des modules")?></li>
                <li><?php echo anchor("", " Non actif / Gestion des décharges")?></li>
            </ul>
        <?php endif; ?>

    </ul>



</div>