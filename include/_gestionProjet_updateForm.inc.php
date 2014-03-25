<?php
/*
  Gestion des projets
  Module de gestion du formulaire de modification d'un projet
 */

// récupérer les informations du projet dans la base de données
$requete = "SELECT libelleProjet, matriculeMoaProjet, matriculeMoeProjet, codeTypeProjet 
    FROM projet WHERE codeProjet = '$strCodeProjet'";
$resultat = execSQL($requete);
if ($ligne = mysql_fetch_assoc($resultat)) {
    $strLibelleProjet = $ligne["libelleProjet"];
    $strMatriculeMOE = $ligne["matriculeMoeProjet"];
    $strMatriculeMOA = $ligne["matriculeMoaProjet"];
    $strCodeTypeProjet = $ligne["codeTypeProjet"];
    ?>
    <!--  affichage du formulaire de modification -->
    <fieldset>
        <legend>Modifier le type de projet</legend>
        <p>
            <label class="form">Code :</label>  
            <span class="readOnly"><?php echo $strCodeProjet ?></span>
        </p>           
        <p>
            <?php
            if (empty($tabErreurs["txtLibelleProjet"]))
                echo '<label class="form" for="txtLibelleProjet">Libellé :</label>';
            else
                echo '<label class="formError" for="txtLibelleProjet">Libellé :</label>';
            ?>
            <input type="text" id="txtLibelleProjet" name="txtLibelleProjet" size="75" maxlength="75"
                   value="<?php echo $strLibelleProjet ?>"/>                                         
        </p>
        <p>
            <label class="form" for="lstTypeProjet">Type :</label>
            <?php
            $strSQL = "SELECT codeTypeProjet, libelleTypeProjet 
                                 FROM type_projet ORDER BY libelleTypeProjet";
            afficherListe($strSQL, "", "lstTypeProjet", 1, "$strCodeTypeProjet", "");
            ?>
        </p>
        <p>
            <label class="form" for="lstMOE">Maître d'oeuvre :</label>
            <?php
            $strSQL = "SELECT idUser, nom FROM gsb_grh.user ORDER BY nom";
            afficherListe($strSQL, "", "lstMOE", 1, "$strMatriculeMOE", "");
            ?>            
        </p>
        <p>
            <?php
            if (empty($tabErreurs["lstMOA"]))
                echo '<label class="form" for="lstMOA">Maître d\'ouvrage :</label>';
            else
                echo '<label class="formError" for="lstMOA">Maître d\'ouvrage :</label>';
            $strSQL = "SELECT idUser, nom FROM gsb_grh.user ORDER BY nom";
            afficherListe($strSQL, "", "lstMOA", 1, "$strMatriculeMOA", "");
            ?>            
        </p>
        <div id="okCancelButtons">
            <input type="submit" name="cmdFonction" value="Mise à jour" />
            <input type="submit" name="cmdAnnuler" value="Annuler" />
        </div>
    </fieldset>
    <?php
}
?>
