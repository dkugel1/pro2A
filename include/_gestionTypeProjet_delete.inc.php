<?php

/*
  Gestion des types de projet
  module de traitement de la suppression d'un type de projet
 */

$strSQL = "DELETE FROM type_projet WHERE codeTypeProjet = '$strCodeTypeProjet'";
if (execSQL($strSQL))
    echo 'Le type de projet ' . $strCodeTypeProjet . ' a été supprimé <br /><br />';
else
    echo '<span class="erreur">Une erreur est survenue</span>';

// affichage des types de projet existants
require_once 'include/_listeTypeProjet.inc.php';

?>