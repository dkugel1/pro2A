<!-- Gestion des étapes -->
<h1>pro2A - Gestion des étapes</h1>
<form action="index.php?id_page=4" method="post">
    <!--  traitement du formulaire  -->
    <?php
    $cnx = connectDB();  // connexion à la base de données
    $strIDEtape = '';
    $strLibelleCourt = '';
    $strLibelleLong = ''; 
    $strCodeProjet = '';
    $blSuppPossible = false;  // indicateur permettant de contrôler la suppression

    // gestion des erreurs 
    $tabErreurs = array();      // déclaration d'un tableau d'erreurs
    $hasErrors = false;         // un flag

    // afficher la liste des projets
    require 'include/_listeProjetEtape.inc.php';

    if (isset($_POST["cmdFonction"])) 
    {
        $strCodeProjet = mysql_real_escape_string($_POST["lstProjet"]);
        if (isset($_POST["lstEtape"]))
        {
            $strIDEtape = mysql_real_escape_string($_POST["lstEtape"]);
        }
        // traitement du choix de l'utilisateur
        switch ($_POST["cmdFonction"]) {
            case "Ajouter" : {
                require 'include/_listeEtape.inc.php';                
                require_once 'include/_gestionEtape_addForm.inc.php';
                } break;
            case "Ajout" : {
                require_once 'include/_gestionEtape_add.inc.php';
                } break;
            case "Modifier" : {
                require 'include/_listeEtape.inc.php';
                require_once 'include/_gestionEtape_updateForm.inc.php';
                } break;
            case "Mise à jour" : {
                require_once 'include/_gestionEtape_update.inc.php';
                } break;
            case "Supprimer" : {
                require 'include/_listeEtape.inc.php';
                require_once 'include/_gestionEtape_deleteForm.inc.php';
                }
                break;
            case "Suppression" : {
                require_once 'include/_gestionEtape_delete.inc.php';
                } break;
        }
    }
    else 
    {
        // affichage des types de projet existants
        require_once 'include/_listeEtape.inc.php';  
    }            
    disconnectDB($cnx);
    ?>
</form>