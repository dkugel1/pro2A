<!-- affichage des projets existants -->
<fieldset>	
    <legend>Projets</legend>
    <div id="objectList">
        <?php
        $strSQL = "SELECT codeProjet, libelleProjet 
            FROM projet ORDER BY libelleProjet";
        afficherListe($strSQL, "", "lstProjet", 6, $strCodeProjet, "");
        ?>
    </div>
    <div id="crudButtons">
        <input type="submit" name="cmdFonction" value="Ajouter" /><br />
        <input type="submit" name="cmdFonction" value="Modifier" /><br />
        <input type="submit" name="cmdFonction" value="Supprimer" /><br />
        <input type="submit" name="cmdEtapes" value="Etapes" /><br />
    </div>
</fieldset>