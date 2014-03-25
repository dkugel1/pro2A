<!-- affichage des étapes existantes -->
<fieldset>	
    <legend>Etapes</legend>
    <div id="objectList">
    <?php
        $strSQL =  "SELECT idEtape, libelleLongEtape FROM etape 
            WHERE codeProjetEtape = '$strCodeProjet'";
        $result = execSQL($strSQL);
        $ligne = mysql_fetch_assoc($result);
        if (mysql_num_rows($result) == 0)
        {
            ?>
            <span class="erreur">Il n'y a pas d'étape pour ce projet actuellement !</span>
            <!-- on laisse un bouton pour ajouter -->
            <div id="crudButtons">
                <input type="submit" name="cmdFonction" value="Ajouter" /><br />
            </div>
            <?php
        }
        else
        {
            afficherListe($strSQL, "", "lstEtape", 6, $strIDEtape, "");
            ?>
            </div>
            <div id="crudButtons">
                <input type="submit" name="cmdFonction" value="Ajouter" /><br />
                <input type="submit" name="cmdFonction" value="Modifier" /><br />
                <input type="submit" name="cmdFonction" value="Supprimer" /><br />
            </div>
            <?php
        }
    ?>
    </div>
</fieldset>