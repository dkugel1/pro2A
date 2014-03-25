<?php

// ----------------------------------------------------------------------------------------
/* GSB DSI
 * PHP - Bibliothèques de fonctions
 * Fonctions pour la gestion des données
 */
// ----------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------
/**
 * connection à la base 
 */
function connectDB() {
    // Connexion au serveur et à la base
    // les constantes DB_SERVER, DB_USER et DB_PWD doivent être déclarées dans le programme appelant
    $connexion = mysql_connect(DB_SERVER, DB_USER, DB_PWD) or die('<p class="erreur">Erreur de connexion au serveur !</p>');
    mysql_select_db(DB_DATABASE) or die('<p class = "erreur">Erreur de connexion à la base de données !</p>');
    return $connexion;
}

// ----------------------------------------------------------------------------------------
/**
 * déconnexion de la base de données
 * @param  string $cnx == la connexion à fermer
 */
function disconnectDB($connexion) {
    // Déconnexion de la base de données
    mysql_close($connexion);
    return $connexion;
}

// ----------------------------------------------------------------------------------------
/**
 * Exécute une requete SQL. Si la requete ne passe pas, renvoie le message d'erreur MySQL
 * @param string $chaineSQL == la requete SQL à exéuter
 * $resultat == le jeu de résultat
 */
function execSQL($chaineSQL) {
    // exécution de la requete
    $resultat = mysql_query($chaineSQL);
    // en cas d'erreur, formatage et affichage du message
    if (!$resultat) {
        if (defined('DEBUG')) {
            $message = '<p class="erreur">Erreur SQL : ' . mysql_errno() . '   ' . mysql_error() . '<br />';
            $message .= 'requete SQL : ' . $chaineSQL . '<br /></p>';
        } else {
            $message = '<p class="erreur">Erreur d\'exécution de requete !</p>';
        }
        die($message);
    }
    // retourne le jeu de résultat
    return $resultat;
}

?>
