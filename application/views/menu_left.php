<div class="col-sm-3 col-md-3">

    <ul class="nav nav-sidebar">
        <li>
            <h4>
                <font color="#337ab7">
                    <span class='glyphicon glyphicon-cog' aria-hidden='true'></span>
                    <b>Gestions des heures et modules</b>
                </font>
            </h4>
        </li>
        <li>
            <?php echo anchor("Dashboard","<span class='glyphicon glyphicon-dashboard' aria-hidden='true'></span> En travaux / Accueil")?>
        </li>
        <li>
            <?php echo anchor("Assignements", "<span class='glyphicon glyphicon-time' aria-hidden='true'></span> Mes heures")?>
        </li>
        <li>
            <?php echo anchor("Assignements/Inscription", "<span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Réservation des Heures")?>
        </li>
        <li>
            <?php echo anchor("View/Heure_module", "<span class='glyphicon glyphicon-briefcase' aria-hidden='true'></span> Récapitulatif des Modules")?>
        </li>
        <li>
            <?php echo anchor("View/Prof", "<span class='glyphicon glyphicon-calendar' aria-hidden='true'></span> Heures par Enseignants")?>
        </li>
        <li>
            <?php echo anchor("View/Modules", "<span class='glyphicon glyphicon-th-list' aria-hidden='true'></span> Heures par Modules")?>
        </li>
        <li>
            <?php echo anchor("Login/Disconnect", "<span class='glyphicon glyphicon-off' aria-hidden='true'></span> Déconnexion")?>
        </li>

    <?php if($admin == TRUE):?>
        <ul class="nav nav-sidebar">
            <li>
                <h4>
                    <font color="#337ab7">
                        <span class='glyphicon glyphicon-cog' aria-hidden='true'></span>
                        <b>Panneau d'administration
                        </b>
                    </font>
                </h4>
            </li>
            <li>
                <?php echo anchor("Assignements/Admin", "<span class='glyphicon glyphicon-file' aria-hidden='true'></span> Gestion des inscription")?>
            </li>
            <li>
                <?php echo anchor("Utilisateur/Admin", "<span class='glyphicon glyphicon-user' aria-hidden='true'></span> Gestion des Utilisateurs")?>
            </li>
            <li>
                <?php echo anchor("Modules", "<span class='glyphicon glyphicon-education' aria-hidden='true'></span> En travaux / Gestion des modules")?>
            </li>
            <li>
                <?php echo anchor("Decharges/Admin", "<span class='glyphicon glyphicon-tags' aria-hidden='true'></span> Gestion des décharges")?>
            </li>
        </ul>
    <?php endif; ?>
    </ul>



</div>