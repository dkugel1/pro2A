<?php
/*
  Gestion des étapes
  Module de gestion du formulaire de suppression d'une étape
 */

$strSQL = "DELETE FROM etape WHERE idEtape = '$strIDEtape'";
if (execSQL($strSQL))
    echo '<span class="info">L\'étape '.$strIDEtape.' a été supprimée</span><br /><br />';
else
    echo '<span class="erreur">Une erreur est survenue</span>';

// affichage de la liste des étapes
require 'include/_listeEtape.inc.php';
?>