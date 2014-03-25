<!-- affichage des types de projet existants -->
<fieldset>	
    <legend>Types de projet</legend>
    <div id="objectList">
        <?php
        $strSQL = "SELECT codeTypeProjet, libelleTypeProjet 
                FROM type_projet ORDER BY libelleTypeProjet";
        afficherListe($strSQL, "", "lstTypeProjet", 6, $strCodeTypeProjet, "");
        ?>
    </div>
    <div id="crudButtons">
        <input type="submit" name="cmdFonction" value="Ajouter" /><br />
        <input type="submit" name="cmdFonction" value="Modifier" /><br />
        <input type="submit" name="cmdFonction" value="Supprimer" /><br />
    </div>
</fieldset>
