<?php
/*
  Gestion des projets
  Module de gestion du formulaire d'ajout d'un projet
 */
?>
<!--  affichage du formulaire d'ajout -->
<fieldset>
    <legend>Entrez les données puis validez la saisie</legend>
    <p>
        <?php
        if (empty($tabErreurs["txtCodeProjet"]))
            echo '<label class="form" for="txtCodeProjet">Code :</label>';
        else
            echo '<label class="formError" for="txtCodeProjet">Code :</label>';
        ?> 
        <input type="text" id="txtCodeProjet" name="txtCodeProjet" size="10" maxlength="10" />
        <br />
    </p>
    <p>
        <?php
        if (empty($tabErreurs["txtLibelleProjet"]))
            echo '<label class="form" for="txtLibelleProjet">Libellé :</label>';
        else
            echo '<label class="formError" for="txtLibelleProjet">Libellé :</label>';
        ?>
        <input type="text" id="txtLibelleProjet" name="txtLibelleProjet" size="50" maxlength="50" />
        <br />
    </p>
    <p>
        <label class="form" for="lstTypeProjet">Type :</label>
        <?php
        $strSQL = "SELECT codeTypeProjet, libelleTypeProjet 
                            FROM type_projet ORDER BY libelleTypeProjet";
        afficherListe($strSQL, "", "lstTypeProjet", 1, "", "");
        ?>
    </p>
    <p>
        <label class="form" for="lstMOE">Maître d'oeuvre :</label>
        <?php
        $strSQL = "SELECT idUser, nom FROM gsb_grh.user ORDER BY nom";
        afficherListe($strSQL, "", "lstMOE", 1, "", "");
        ?>            
    </p>
    <p>
        <?php
        if (empty($tabErreurs["lstMOA"]))
            echo '<label class="form" for="lstMOA">Maître d\'ouvrage :</label>';
        else
            echo '<label class="formError" for="lstMOA">Maître d\'ouvrage :</label>';
        $strSQL = "SELECT idUser, nom FROM gsb_grh.user ORDER BY nom";
        afficherListe($strSQL, "", "lstMOA", 1, "", "");
        ?>            
    </p>
    <div id="okCancelButtons">
        <input type="submit" name="cmdFonction" value="Ajout" />
        <input type="reset" name="cmdAnnuler" value="Annuler" />
    </div>
</fieldset>
