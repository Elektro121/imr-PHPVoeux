<div class="col-sm-3 col-md-3">

    <ul class="nav nav-sidebar">
        <li><h4><font color="#337ab7"><b>Panneau d'administration</b></font></h4></li>
        <li><?php echo anchor("Dashboard", "Accueil")?></li>
        <li><?php echo anchor("Heures", "Mes heures")?></li>
        <li><?php echo anchor("Reservation", "Réservation des Heures")?></li>
        <li><?php echo anchor("Heures_modules", "Heures par Modules")?></li>
        <li><?php echo anchor("Heures_enseignant", "Heures par Enseignants")?></li>
        <li><?php echo anchor("Login/Disconnect", "Déconnexion")?></li>

        <?php if($admin == TRUE):?>
            <ul class="nav nav-sidebar">
                <li><h4><font color="#337ab7"><b>Partie Administrateur</b></font></h4></li>
                <li><a href="">Gestion des utilisateurs</a></li>
                <li><a href="">Gestion des HETD</a></li>
                <li><a href="">Gestion des modules</a></li>
                <li><a href="">Gestion des décharges</a></li>
            </ul>
        <?php endif; ?>

    </ul>



</div>