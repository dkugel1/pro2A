<?php
/*
  Gestion des projets
  module de traitement de la mise à jour d'un projet
 */

// définir les erreurs potentielles
if (empty($_POST["txtLibelleProjet"])) {
    $tabErreurs["txtLibelleProjet"] = "Le libellé du projet doit être renseigné !";
    $hasErrors = true;
}
if ($_POST["lstMOE"] == $_POST["lstMOA"]) {
    $tabErreurs["lstMOA"] = "Le maître d'oeuvre et le maître d'ouvrage doivent être différents !";
    $hasErrors = true;
}

if (!$hasErrors) {
    // modification du projet
    $strLibelleProjet = mysql_real_escape_string($_POST["txtLibelleProjet"]);
    $strMatriculeMOE = mysql_real_escape_string($_POST["lstMOE"]);
    $strMatriculeMOA = mysql_real_escape_string($_POST["lstMOA"]);
    $strCodeTypeProjet = mysql_real_escape_string($_POST["lstTypeProjet"]);
    $requete = "UPDATE projet SET libelleProjet = '$strLibelleProjet', 
        matriculeMoeProjet = '$strMatriculeMOE', 
        matriculeMoaProjet = '$strMatriculeMOA', 
        codeTypeProjet = '$strCodeTypeProjet'	
        WHERE codeProjet = '$strCodeProjet' ";
    execSQL($requete);
    echo '<span class="info">Le projet a été mis à jour</span>';
    // affichage de la liste des projets avec les boutons 'Modifier' 'Supprimer' 'Ajouter'
    require 'include/_listeProjet.inc.php';    
} else {
    foreach ($tabErreurs as $erreur)
        echo '<span class="erreur">' . $erreur . '</span>';
    // affichage de la liste des projets avec les boutons 'Modifier' 'Supprimer' 'Ajouter'
    require 'include/_listeProjet.inc.php';
    // affichage des informations détails en vue de les modifier
    require_once 'include/_gestionProjet_updateForm.inc.php';    
}
?>
