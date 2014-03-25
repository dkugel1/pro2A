<!-- Gestion des projets -->
<h1>pro2A - Gestion des projets</h1>
<form action="index.php?id_page=3" method="post">
    <!--  traitement du formulaire  -->
    <?php
    $cnx = connectDB();  // connexion à la base de données
    $strCodeProjet = '';
    $strLibelleProjet = '';
    $strCodeTypeProjet = '';
    $intCodeMOE = 0;
    $intCodeMOA = 0;
    $blSuppPossible = false;  // indicateur permettant de contrôler la suppression

    // gestion des erreurs 
    $tabErreurs = array();      // déclaration d'un tableau d'erreurs
    $hasErrors = false;         // un flag

    // appeler la gestion des étapes depuis la gestion des projets
    if (isset($_POST["cmdEtapes"]))
    {
            $strCodeProjet = mysql_real_escape_string($_POST["lstProjet"]);	
            $location = "Location:index.php?id_page=4&projet=".$strCodeProjet;
            header($location);
    }
    
    if (isset($_POST["cmdFonction"])) 
    {
        $strCodeProjet = mysql_real_escape_string($_POST["lstProjet"]);
        // traitement du choix de l'utilisateur
        switch ($_POST["cmdFonction"]) {
            case "Ajouter" : {
                require 'include/_listeProjet.inc.php';                
                require_once 'include/_gestionProjet_addForm.inc.php';
                } break;
            case "Ajout" : {
                require_once 'include/_gestionProjet_add.inc.php';
                } break;
            case "Modifier" : {
                require 'include/_listeProjet.inc.php';
                require_once 'include/_gestionProjet_updateForm.inc.php';
                } break;
            case "Mise à jour" : {
                require_once 'include/_gestionProjet_update.inc.php';
                } break;
            case "Supprimer" : {
                require 'include/_listeProjet.inc.php';
                require_once 'include/_gestionProjet_deleteForm.inc.php';
                }
                break;
            case "Suppression" : {
                require_once 'include/_gestionProjet_delete.inc.php';
                } break;
            }
    }
    else 
    {
        // affichage des types de projet existants
        require_once 'include/_listeProjet.inc.php';  
    }            
    disconnectDB($cnx);
    ?>
</form>