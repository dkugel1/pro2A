<?php
/*
  Gestion des types de projet
  Module de gestion du formulaire de modification d'un type de projet
 */
?>
<!--  affichage du formulaire d'ajout -->
<fieldset>
    <legend>Entrez les données puis validez la saisie</legend>
    <p>
        <?php
        if (empty($tabErreurs["txtCodeTypeProjet"]))
            echo '<label class="form" for="txtCodeTypeProjet">Code :</label>';
        else
            echo '<label class="formError" for="txtCodeTypeProjet">Code :</label>';
        ?> 
        <input type="text" id="txtCodeTypeProjet" name="txtCodeTypeProjet" size="10" maxlength="10" />
        <br />
    </p>
    <p>
        <?php
        if (empty($tabErreurs["txtLibelleTypeProjet"]))
            echo '<label class="form" for="txtLibelleTypeProjet">Libellé :</label>';
        else
            echo '<label class="formError" for="txtLibelleTypeProjet">Libellé :</label>';
        ?>
        <input type="text" id="txtLibelleTypeProjet" name="txtLibelleTypeProjet" size="50" maxlength="50" />
        <br />
    </p>
    <div id="okCancelButtons">
        <input type="submit" name="cmdFonction" value="Ajout" />
        <input type="reset" name="cmdAnnuler" value="Annuler" />
    </div>
</fieldset>
