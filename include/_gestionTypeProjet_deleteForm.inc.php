<?php
/*
  Gestion des types de projet
  Module de gestion du formulaire de suppression d'un type de projet
 */

// vérifier l'existence de projet de ce type et afficher un message d'erreur le cas échéant
$strSQL = "SELECT * FROM projet WHERE codeTypeProjet = '$strCodeTypeProjet'";
if (mysql_num_rows(execSQL($strSQL)) > 0)
    echo '<span class="erreur">Le type de projet ne peut être supprimé, il existe des projets de ce type !</span>';
else {
    $blSuppPossible = true;
}

if ($blSuppPossible) {
    $requete = "SELECT libelleTypeProjet FROM type_projet WHERE codeTypeProjet='$strCodeTypeProjet'";
    $resultat = execSQL($requete);
    if ($ligne = mysql_fetch_assoc($resultat))
        $strLibelleTypeProjet = $ligne["libelleTypeProjet"];
    ?>                        
    <!--  affichage du formulaire de suppression -->
    <fieldset>
        <legend>Supprimer un type de projet</legend>
        <p>
            <label class="form">Code :</label>  
            <span class="readOnly"><?php echo $strCodeTypeProjet ?></span>
        </p>
        <p>
            <label class="form">Libellé :</label>  
            <span class="readOnly"><?php echo $strLibelleTypeProjet ?></span>
        </p>
        <div id="okCancelButtons">
            <input type="submit" name="cmdFonction" value = "Suppression" />
            <input type="reset" name="cmdAnnuler" value="Annuler" />
        </div>
    </fieldset>
    <?php
}
?>