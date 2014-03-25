<!-- 
        page d'accueil de l'application PRO2A : Projet Activité et Avancement
-->
<?php
session_start(); // début de session
// on simule un utilisateur connecté (en phase de test)
$_SESSION['matricule'] = 9999;
$_SESSION['nom'] = 'Dupont';
$_SESSION['prenom'] = 'Jean';

// inclure les bibliothèques de fonctions
require_once 'include/_config.inc.php';
require_once 'include/_forms.lib.php';
require_once 'include/_data.lib.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PRO2A - Gestion des activités et avancement</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta lang="fr">
        <link rel="stylesheet" type="text/css" href="styles/screen.css" />
    </head>

    <body>
        <?php
        require 'include/_header.inc.php';
        echo '<div id="Menu">';
        require 'include/_menu.inc.php';
        echo '</div>';
        echo '<div id="Content">';
        /*
          Récupère l'identifiant de la page passée par l'URL.
          Si non défini, on considère que la page demandée est la page d'accueil
         */
        if (isset($_GET['id_page'])) {
            /*
              intval pour s'assurer que la valeur récupérée est bien un nombre
              (évite de détourner la requete de son but initial)
             */
            $id_page = intval($_GET['id_page']);
            // charger la page selon son identifiant
            switch ($id_page) {
                case 1 : require 'pages/releveActivite.php';
                    break;
                case 2 : require 'pages/gestionTypeProjet.php';
                    break;
                case 3 : require 'pages/gestionProjet.php';
                    break;
                case 4 : require 'pages/gestionEtape.php';
                    break;
                case 5 : require 'pages/statistiques.php';
                    break;
                default : require 'pages/releveActivite.php';
                    break;
            }
        } else {
            // require 'pages/releveActivite.php';	
        }
        echo '</div>';
        require 'include/_footer.inc.php';
        ?>
    </body>
</html>