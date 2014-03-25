<!-- Gestion des types de projets -->
<h1>pro2A - Gestion des types de projets</h1>
<form action="index.php?id_page=2" method="post">
    <!--  traitement du formulaire  -->
    <?php
    $cnx = connectDB();
    $strCodeTypeProjet = '';
    $strLibelleTypeProjet = '';
    $blSuppPossible = false;  // indicateur permettant de contrôler la suppression

    // gestion des erreurs 
    $tabErreurs = array();      // déclaration d'un tableau d'erreurs
    $hasErrors = false;         // un flag
       
    if (isset($_POST["cmdFonction"])) {
        $strCodeTypeProjet = mysql_real_escape_string($_POST["lstTypeProjet"]);
        // traitement du choix de l'utilisateur
        switch ($_POST["cmdFonction"]) {
            case "Ajouter" : {
                    require 'include/_listeTypeProjet.inc.php';                
                    require_once 'include/_gestionTypeProjet_addForm.inc.php';
                } break;
            case "Ajout" : {
                    require_once 'include/_gestionTypeProjet_add.inc.php';
                } break;
            case "Modifier" : {
                    require 'include/_listeTypeProjet.inc.php';
                    require_once 'include/_gestionTypeProjet_updateForm.inc.php';
                } break;
            case "Mise à jour" : {
                    require_once 'include/_gestionTypeProjet_update.inc.php';
                } break;
            case "Supprimer" : {
                    require 'include/_listeTypeProjet.inc.php';
                    require_once 'include/_gestionTypeProjet_deleteForm.inc.php';
                }
                break;
            case "Suppression" : {
                    require_once 'include/_gestionTypeProjet_delete.inc.php';
                } break;
        }
    }
    else {        
        // affichage des types de projet existants
        require_once 'include/_listeTypeProjet.inc.php';  
    }
    disconnectDB($cnx);
    ?>
</form>
