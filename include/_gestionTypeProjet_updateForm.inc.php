<?php
/*
  Gestion des types de projet
  Module de gestion du formulaire de modification d'un type de projet
 */

// récupérer les informations du type de projet dans la base de données
$requete = "SELECT codeTypeProjet, libelleTypeProjet  
    FROM type_projet WHERE codeTypeProjet='$strCodeTypeProjet'";
$resultat = execSQL($requete);
if ($ligne = mysql_fetch_assoc($resultat)) {
    $strLibelleTypeProjet = $ligne["libelleTypeProjet"];
    ?>
    <!--  affichage du formulaire de modification -->
    <fieldset>
        <legend>Modifier le type de projet</legend>
        <p>
            <label class="form">Code :</label>  
            <span class="readOnly"><?php echo $strCodeTypeProjet ?></span>
        </p>
        <p>
            <?php
            if (empty($tabErreurs["txtLibelleTypeProjet"]))
                echo '<label class="form" for="txtLibelleTypeProjet">Libellé :</label>';
            else
                echo '<label class="formError" for="txtLibelleTypeProjet">Libellé :</label>';
            ?>
            <input type="text" id="txtLibelleTypeProjet" name="txtLibelleTypeProjet" size="50" maxlength="50"
                   value="<?php echo $strLibelleTypeProjet ?>"/>                                         
        </p>
        <div id="okCancelButtons">
            <input type="submit" name="cmdFonction" value="Mise à jour" />
            <input type="submit" name="cmdAnnuler" value="Annuler" />
        </div>
    </fieldset>
    <?php
}
?>
