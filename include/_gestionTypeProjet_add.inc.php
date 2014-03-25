<?php
/*
  Gestion des types de projet
  module de traitement de l'ajout d'un type de projet
 */

// définir les erreurs potentielles
if (empty($_POST["txtCodeTypeProjet"])) {
    $tabErreurs["txtCodeTypeProjet"] = "Le code du type de projet doit être renseigné !";
    $hasErrors = true;
}
if (empty($_POST["txtLibelleTypeProjet"])) {
    $tabErreurs["txtLibelleTypeProjet"] = "Le libellé du type de projet doit être renseigné !";
    $hasErrors = true;
}

if (!$hasErrors) {
    $strCodeTypeProjet = mysql_real_escape_string($_POST["txtCodeTypeProjet"]);
    $strLibelleTypeProjet = mysql_real_escape_string($_POST["txtLibelleTypeProjet"]);
    $strSQL = "INSERT INTO type_projet 
        VALUES ('$strCodeTypeProjet','$strLibelleTypeProjet')";
    if (execSQL($strSQL))
        echo 'Le type de projet ' . $strCodeTypeProjet . ' - ' . $strLibelleTypeProjet . ' a été ajouté <br /><br />';
    // affichage de la liste des types de projet
    require 'include/_listeTypeProjet.inc.php';    
}
else {
    foreach ($tabErreurs as $erreur)
        echo '<span class="erreur">' . $erreur . '</span>';
    // affichage de la liste des types de projet
    require 'include/_listeTypeProjet.inc.php';
    // ré-affichage du formulaire de saisie
    require_once 'include/_gestionTypeProjet_addForm.inc.php';
}
?>