<?php
// afficher la liste des projets (sans les boutons)
$strSQL = "SELECT codeProjet, libelleProjet FROM projet ORDER BY libelleProjet";
// on a changé la sélection dans la liste des projets			
if (isset($_GET["projet"]))	// on vient de la gestion des projets
{
    // récupérer le code du projet dans l'URL
    $strCodeProjet = mysql_real_escape_string($_GET["projet"]);
}
else
{    
    if (isset($_POST['lstProjet'])) 
    // on a changé la sélection dans la liste des projets
    {
        $strCodeProjet = mysql_real_escape_string($_POST['lstProjet']);
    } 
    else   
    // on vient du menu
    {
        // prendre le premier projet de la liste		
        $result = execSQL($strSQL);
        $ligne = mysql_fetch_assoc($result);
        if (mysql_num_rows($result) > 0) 
        {
            $strCodeProjet = $ligne["codeProjet"];
        }
    }
}
?>
<fieldset>
    <legend>Projets</legend>
    <div id="objectList">
        <?php
        afficherListe($strSQL, "", "lstProjet", 6, $strCodeProjet, "this.form.submit()");
        ?>
   </div>
</fieldset>
<br />
