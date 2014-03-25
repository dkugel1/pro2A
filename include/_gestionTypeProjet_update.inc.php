<?php

/*
  Gestion des types de projet
  module de traitement de la mise à jour d'un type de projet
 */

// définir les erreurs potentielles					
if (empty($_POST["txtLibelleTypeProjet"])) {
    $tabErreurs["txtLibelleTypeProjet"] = "Le libellé du type de projet doit être renseigné !";
    $hasErrors = true;
}

if (!$hasErrors) {
    // modification du projet
    $strLibelleTypeProjet = mysql_real_escape_string($_POST["txtLibelleTypeProjet"]);
    $requete = "UPDATE type_projet SET libelleTypeProjet = '$strLibelleTypeProjet' 
            WHERE codeTypeProjet = '$strCodeTypeProjet' ";
    execSQL($requete);
    echo '<span class="info">Le type de projet a été mis à jour</span><br />';
    // affichage de la liste des types de projet avec les boutons 'Modifier' 'Supprimer' 'Ajouter'
    require 'include/_listeTypeProjet.inc.php';
} else {
    foreach ($tabErreurs as $erreur)
        echo '<span class="erreur">' . $erreur . '</span>';
    // affichage de la liste des types de projet avec les boutons 'Modifier' 'Supprimer' 'Ajouter'
    require 'include/_listeTypeProjet.inc.php';
    // affichage des informations détails en vue de les modifier
    require_once 'include/_gestionTypeProjet_updateForm.inc.php';
}

?>
