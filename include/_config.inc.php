<?php
// ----------------------------------------------------------------------------------------
/* GSB DSI
 * PHP - Templates
 * Modèle à utiliser pour le paramétrage des applications PHP
*/
// ----------------------------------------------------------------------------------------

/**
 * paramètres de configuration de l'appplication
 */

// gestion d'erreur 
ini_set('error_reporting', E_ALL);              // en phase de développement
//ini_set('error_reporting', 0);  		// en phase de production 

// constantes pour l'accès à la base de données
define('DB_SERVER', 'localhost');		// serveur MySql
define('DB_DATABASE', 'gsb_activite');		// nom de la base de données
define('DB_USER', 'root');			// nom d'utilisateur pour se connecter à la base de données
define('DB_PWD', '');                           // mot de passe pour se connecter à la base de données

// constante pour la gestin des sessions
define('APP_PLANIFICATEUR', 9999);              // définir le matricule du planificateur
?>