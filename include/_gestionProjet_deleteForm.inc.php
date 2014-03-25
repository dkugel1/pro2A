<?php
/*
  Gestion des projets
  Module de gestion du formulaire de suppression d'un projet
 */

// vérifier l'existence d'étapes pour ce projet et afficher un message d'erreur le cas échéant
$strSQL = "SELECT * FROM etape WHERE codeProjetEtape = '$strCodeProjet'";
if (mysql_num_rows(execSQL($strSQL)) > 0)
    echo '<span class="erreur">Le projet ne peut être supprimé, il existe des étapes pour ce projet !</span>';
else {
    $blSuppPossible = true;
}

if ($blSuppPossible) {
    // récupérer les informations du projet dans la base de données
    $requete = "SELECT * ";
    $requete = $requete . "FROM v_projets WHERE codeProjet = '$strCodeProjet'";
    $resultat = execSQL($requete);
    if ($ligne = mysql_fetch_assoc($resultat)) {
        $strLibelleProjet = $ligne["libelleProjet"];
        $strCodeTypeProjet = $ligne["codeTypeProjet"];
        $strMatriculeMOA = $ligne["matriculeMoaProjet"];
        $strNomMOA = $ligne["prenomMoa"] . ' ' . $ligne["nomMoa"];
        $strMatriculeMOE = $ligne["matriculeMoeProjet"];
        $strNomMOE = $ligne["prenomMoe"] . ' ' . $ligne["nomMoe"];
    }
    ?>                        
    <!--  affichage du formulaire de suppression -->
    <fieldset>
        <legend>Supprimer un projet</legend>
        <p>
            <label class="form">Code :</label>  
            <span class="readOnly"><?php echo $strCodeProjet ?></span>
        </p>
        <p>
            <label class="form">Libellé :</label>  
            <span class="readOnly"><?php echo $strLibelleProjet ?></span>
        </p>
        <p>
            <label class="form">MOA :</label>  
            <span class="readOnly"><?php echo $strMatriculeMOA . ' (' . $strNomMOA . ')' ?></span>
        </p>
        <p>
            <label class="form">MOE :</label>  
            <span class="readOnly"><?php echo $strMatriculeMOE . ' (' . $strNomMOE . ')' ?></span>
        </p>
        <div id="okCancelButtons">
            <input type="submit" name="cmdFonction" value = "Suppression" />
            <input type="reset" name="cmdAnnuler" value="Annuler" />
        </div>
    </fieldset>
    <?php
}
?>