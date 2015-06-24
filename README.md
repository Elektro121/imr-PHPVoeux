# imr-PHPVoeux
Ce logiciel à été conçu pour être utilisé sur la dernière version de PHP.

## Installation
Tout d'abord, importez le fichier install.sql directement dans votre client MySQL favori, puis ensuite créez un compte afin d'y permettre l'accès au système.
Modifiez les lignes 67 à 69 du fichier application/config/database.php pour modifier les valeurs par défaut de connexion à la base de données : 

    	'hostname' => 'localhost',  // Adresse du serveur
    	'username' => 'voeux',      // Nom d'utilisateur qui accède à la base
    	'password' => '1234',       // Mot de passe du compte
    	
Déposez les trois dossiers ainsi que l'index à la racine de votre serveur, puis modifiez la ligne 20 du fichier application/config/config.php pour en définir l'adresse par défaut.
        
        $config['base_url'] = '';   // Exemple : http://monsite.org/voeux/
        
Vous pouvez ensuite vous connecter à l'aide du compte utilisateur admin/admin pour vous créer votre propre compte.