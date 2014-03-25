<?php
/*
    Gestion des projets
    module de traitement de l'ajout d'un projet
 */

// définir les erreurs potentielles
if (empty($_POST["txtCodeProjet"])) {
    $tabErreurs["txtCodeProjet"] = "Le code du projet doit être renseigné !";
    $hasErrors = true;
}
if (empty($_POST["txtLibelleProjet"])) {
    $tabErreurs["txtLibelleProjet"] = "Le libellé du projet doit être renseigné !";
    $hasErrors = true;
}
if ($_POST["lstMOE"] == $_POST["lstMOA"]) {
    $tabErreurs["lstMOA"] = "Le maître d'oeuvre et le maître d'ouvrage doivent être différents !";
    $hasErrors = true;
}

if (!$hasErrors) {
    $strCodeProjet = mysql_real_escape_string($_POST["txtCodeProjet"]);
    $strLibelleProjet = mysql_real_escape_string($_POST["txtLibelleProjet"]);
    $strMatriculeMOE = mysql_real_escape_string($_POST["lstMOE"]);
    $strMatriculeMOA = mysql_real_escape_string($_POST["lstMOA"]);
    $strCodeTypeProjet = mysql_real_escape_string($_POST["lstTypeProjet"]);
    $strSQL = "INSERT INTO projet VALUES ('$strCodeProjet','$strLibelleProjet','$strMatriculeMOA','$strMatriculeMOE','$strCodeTypeProjet')";
    if (execSQL($strSQL))
        echo '<span class="info">Le projet ' . $strCodeProjet . ' - ' . $strLibelleProjet . ' a été ajouté</span><br /><br />';
    // affichage de la liste des projets avec les boutons 'Modifier' 'Supprimer' 'Ajouter'
    require 'include/_listeProjet.inc.php';    
}
else {
    foreach ($tabErreurs as $erreur)
        echo '<span class="erreur">' . $erreur . '</span>';
    // affichage de la liste des projets avec les boutons 'Modifier' 'Supprimer' 'Ajouter'
    require 'include/_listeProjet.inc.php';
    // ré-affichage du formulaire de saisie
    require_once 'include/_gestionProjet_addForm.inc.php';    
}
?>