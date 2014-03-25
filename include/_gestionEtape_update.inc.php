<?php
/*
  Gestion des étapes
  module de traitement de la mise à jour d'une étape d'un projet
 */

// définir les erreurs potentielles
if (empty($_POST["txtLibelleCourt"])) {
    $tabErreurs["txtLibelleCourt"] = "Le libellé court de l'étape doit être renseigné !";
    $hasErrors = true;
}
if (empty($_POST["txtLibelleLong"])) {
    $tabErreurs["txtLibelleLong"] = "Le libellé long de l'étape doit être renseigné !";
    $hasErrors = true;
}

if (!$hasErrors) 
{
    // modification de l'étape
    $strLibelleCourt = mysql_real_escape_string($_POST["txtLibelleCourt"]);
    $strLibelleLong = mysql_real_escape_string($_POST["txtLibelleLong"]);
    $requete = "UPDATE etape 
        SET libelleCourtEtape = '$strLibelleCourt', 
        libelleLongEtape = '$strLibelleLong' 
        WHERE idEtape = '$strIDEtape' ";
    execSQL($requete);
    echo '<span class="info">L\'étape a été mise à jour</span>';
    // affichage de la liste des étapes avec les boutons 'Modifier' 'Supprimer' 'Ajouter'
    require 'include/_listeEtape.inc.php';    
} 
else 
{
    foreach ($tabErreurs as $erreur)
        echo '<span class="erreur">' . $erreur . '</span>';
    // affichage de la liste des projets avec les boutons 'Modifier' 'Supprimer' 'Ajouter'
    require 'include/_listeProjet.inc.php';
    // affichage des informations détails en vue de les modifier
    require_once 'include/_gestionProjet_updateForm.inc.php';    
}
?>
