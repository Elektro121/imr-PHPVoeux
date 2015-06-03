<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url('application/assets/css/bootstrap.min.css'); ?>">
    <script type="text/javascript" src="<?php echo base_url('application/assets/js/bootstrap.min.js'); ?>">
    </script>
    <title>Projet PhP</title>
</head>

<body>

<header>
    <h1>Page de Log</h1>
</header>

<nav>
    <a href="PageAdmin.html"> 	Admin</a><br>
    <a href="PageUser.html"> 	User </a><br>
</nav>

<aside>
    <form method="post" action="PageAdmin.html">
        <p>
            <label for="pseudo">Votre pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="Ex : bvozel"  />

            <br/>
            <label for="pass">Votre mot de passe :</label>
            <input type="password" name="pass" id="pass" />

            <br/>
            <input type="submit" value="Envoyer" />

        </p>
    </form>
</aside>
</body>

</html>