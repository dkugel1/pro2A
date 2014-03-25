<?php
/*
  Gestion des étapes
  Module de gestion du formulaire d'ajout d'une étape
 */
?>
<!--  affichage du formulaire d'ajout -->
<fieldset>
    <legend>Entrez les données puis validez la saisie</legend>
    <p>
        <?php
        if (empty($tabErreurs["txtIDEtape"]))
            echo '<label class="form" for="txtIDEtape">Code :</label>';
        else
            echo '<label class="formError" for="txtIDEtape">Code :</label>';
        ?>  	
        <input type="text" id="txtIDEtape" name="txtIDEtape" size="10" maxlength="10" />
        <br />
    </p>
    <p>
        <?php
        if (empty($tabErreurs["txtLibelleCourt"]))
            echo '<label class="form" for="txtLibelleCourt">Libellé court :</label>';
        else
            echo '<label class="formError" for="txtLibelleCourt">Libellé court :</label>';
        ?>  	
        <input type="text" id="txtLibelleCourt" name="txtLibelleCourt" size="50" maxlength="50" />
        <br />
    </p>
    <p>
        <?php
        if (empty($tabErreurs["txtLibelleLong"]))
            echo '<label class="form" for="txtLibelleLong">Libellé long :</label>';
        else
            echo '<label class="formError" for="txtLibelleLong">Libellé long :</label>';
        ?>  	
        <input type="text" id="txtLibelleLong" name="txtLibelleLong" size="50" maxlength="50" />
        <br />
    </p>
    <p>
        <label class="form">Projet :</label>
        <?php
        $strSQL = "SELECT codeProjet, libelleProjet FROM projet WHERE codeProjet = '$strCodeProjet'";
        $result = execSQL($strSQL);
        if (mysql_num_rows($result) > 0) {
            $ligne = mysql_fetch_assoc($result);
            $strLibelleProjet = $ligne["libelleProjet"];
        }
        ?>
        <span class="readOnly"><?php echo $strCodeProjet . ' : ' . $strLibelleProjet ?></span>
    </p>
    <div id="okCancelButtons">
        <input type="submit" name="cmdFonction" value="Ajout" />
        <input type="reset" name="cmdAnnuler" value="Annuler" />
    </div>
</fieldset>
