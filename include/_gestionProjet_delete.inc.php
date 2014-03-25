<?php

/*
  Gestion des projets
  module de traitement de la suppression d'un projet
 */

$strSQL = "DELETE FROM projet WHERE codeProjet = '$strCodeProjet'";
if (execSQL($strSQL))
    echo '<span class="info">Le projet ' . $strCodeProjet . ' a été supprimé</span><br /><br />';
else
    echo '<span class="erreur">Une erreur est survenue</span>';

// affichage des types de projet existants
require_once 'include/_listeProjet.inc.php';

?>