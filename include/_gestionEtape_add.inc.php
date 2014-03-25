<?php
/*
    Gestion des étapes
    module de traitement de l'ajout d'une étape dans un projet
 */

// définir les erreurs potentielles
if (empty($_POST["txtIDEtape"])) {
    $tabErreurs["txtIDEtape"] = "Le code de l'étape doit être renseigné !";
    $hasErrors = true;
}
if (empty($_POST["txtLibelleCourt"])) {
    $tabErreurs["txtLibelleCourt"] = "Le libellé court de l'étape doit être renseigné !";
    $hasErrors = true;
}
if (empty($_POST["txtLibelleLong"])) {
    $tabErreurs["txtLibelleLong"] = "Le libellé long de l'étape doit être renseigné !";
    $hasErrors = true;
}

if (!$hasErrors) {
    $strIDEtape = mysql_real_escape_string($_POST["txtIDEtape"]);
    $strLibelleCourt = mysql_real_escape_string($_POST["txtLibelleCourt"]);
    $strLibelleLong = mysql_real_escape_string($_POST["txtLibelleLong"]);
    $strSQL = "INSERT INTO etape 
        VALUES ('$strIDEtape','$strLibelleCourt','$strLibelleLong','$strCodeProjet')";
    if (execSQL($strSQL))
        echo '<span class="info">L\'étape ' . $strIDEtape . ' - ' . $strLibelleCourt . ' a été ajoutée</span><br /><br />';
    // affichage de la liste des projets avec les boutons 'Modifier' 'Supprimer' 'Ajouter'
    require 'include/_listeEtape.inc.php';    
}
else {
    foreach ($tabErreurs as $erreur)
        echo '<span class="erreur">' . $erreur . '</span>';
    // affichage de la liste des étapes avec les boutons 'Modifier' 'Supprimer' 'Ajouter'
    require 'include/_listeEtape.inc.php';
    // ré-affichage du formulaire de saisie
    require_once 'include/_gestionEtape_addForm.inc.php';    
}
?>