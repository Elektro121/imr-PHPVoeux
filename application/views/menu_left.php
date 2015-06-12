<div class="col-sm-3 col-md-3">

    <ul class="nav nav-sidebar">
        <li><h4><font color="#337ab7"><b>Panneau d'administration</b></font></h4></li>
        <li><?php echo anchor("Dashboard", "Accueil")?></li>
        <li><a href="">Mes heures</a></li>
        <li><a href="">Heures des Modules</a></li>
        <li><a href="">Réservation d'heures</a></li>
        <li><a href="">Heures des enseignants</a></li>
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