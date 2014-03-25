<?php

// ----------------------------------------------------------------------------------------
/* GSB DSI
 * PHP - Bibliothàques de fonctions
 * Fonctions génériques d'affichage
 * Nécessite la bibliothèque _data.lib.php
 */
// ----------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------
/**
 * Affiche une liste de choix à partir d'un jeu de résultat de la forme {identifiant, libellé}
 * @param string $SQL : la requête SQL (de la forme id + libellé)
 * @param string $classe : la classe CSS à appliquer à l'élément
 * @param string $id : l'id (et nom) de la liste de choix
 * @param int $size : l'attribut size de la liste de choix
 * @param string $idSelect : l'élément à présélectionner dans la liste
 * @param string $onchange : le nom de la fonction à appeler en cas d'événement onchange()
 */
function afficherListe($SQL, $classe, $id, $size, $idSelect, $onchange) {
    // exécution de la requete SQL
    $resultat = execSQL($SQL);

    // récupération du nom des champs
    $identifiant = mysql_field_name($resultat, 0);
    $libelle = mysql_field_name($resultat, 1);

    // affichage de la liste de choix
    echo '<select class="' . $classe . '" name="' . $id . '" id="' . $id . '" size="' . $size . '" onchange="' . $onchange . '">';
    if (($ligne = mysql_fetch_assoc($resultat)) && (empty($idSelect))) {
        $idSelect = $ligne["$identifiant"];
    }
    while ($ligne) {
        // l'élément en paramètre est présélectionné
        if ($ligne["$identifiant"] != $idSelect) {
            echo '<option value = "' . $ligne["$identifiant"] . '">' . $ligne["$libelle"] . '</option>';
        } else {
            echo '<option selected value = "' . $ligne["$identifiant"] . '">' . $ligne["$libelle"] . '</option>';
        }
        $ligne = mysql_fetch_assoc($resultat);
    }
    echo '</select>';
    return ($idSelect);
}

// ----------------------------------------------------------------------------------------
/**
 * Affiche un tableau à partir d'un jeu de résultat
 * @param string $SQL : la requete SQL
 * @param string $classe : le nom de la classe css à appliquer à l'élément
 */
function afficherTableau($SQL, $classe) {
    // exécution de la requete SQL
    $resultat = execSQL($SQL);

    // création du tableau
    echo '<table class="' . $classe . '">';

    // affichage de l'entete du tableau avec le nom des entetes
    echo '<tr>';
    // création entete tableau avec noms de colonnes  
    for ($i = 0; $i < mysql_num_fields($resultat); $i++) {
        echo '<th>' . mysql_field_name($resultat, $i) . '</th>';
    }
    echo '</tr>';

    // affichage des lignes du tableau  
    while ($ligne = mysql_fetch_row($resultat)) {
        echo '<tr>';
        for ($i = 0; $i < mysql_num_fields($resultat); $i++) {
            echo '<td>' . $ligne[$i] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

?>