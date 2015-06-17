<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header:before">
            <a>
                <img src="<?php echo base_url('application/assets/Images/Enssat_logo.png'); ?>" alt="Logo école" style="float:left" width="100" height="">
            </a>
            <div class="center">
                <?php if(isset($user)): ?>
                    <?php echo "Bonjour <b>".$user."</b> !";?>
                <?php endif; ?>
            </div>
            <a>
                <img src="<?php echo base_url('application/assets/Images/Universite_logo.png'); ?>" alt="Logo Université" style="float:right" width="100" height="40">
            </a>
        </div>
    </div>
</nav>
