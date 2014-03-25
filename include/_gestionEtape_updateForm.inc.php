<?php
/*
  Gestion des étapes
  Module de gestion du formulaire de modification d'une étape d'un projet
 */

// récupérer les informations de l'étape dans la base de données
$requete =  "SELECT libelleCourtEtape, libelleLongEtape, codeProjetEtape FROM etape WHERE idEtape = '$strIDEtape'";
$resultat = execSQL($requete);                  // exécution de la requête SQL
if ($ligne = mysql_fetch_assoc($resultat))      // récupération 1 ligne du jeu de résultat
{
    $strLibelleCourt = $ligne["libelleCourtEtape"]; 
    $strLibelleLong = $ligne["libelleLongEtape"]; 
    $strCodeProjet = $ligne["codeProjetEtape"];
?>
    <!--  affichage du formulaire de modification -->
    <fieldset>
        <legend>Modifier l'étape</legend>
        <p>
            <label class="form">ID :</label>  
            <span class="readOnly"><?php echo $strIDEtape ?></span>
        </p>           
        <p>
            <?php
            if (empty($tabErreurs["txtLibelleCourt"]))
            {
                echo '<label class="form" for="txtLibelleCourt">Libellé court :</label>';
            }
            else
            {
                echo '<label class="formError" for="txtLibelleCourt">Libellé court :</label>';
            }
            ?>       		    
            <input type="text" id="txtLibelleCourt" name="txtLibelleCourt" size="75" maxlength="75"
                   value="<?php echo $strLibelleCourt ?>"/>                                         
        </p>			
        <p>
            <?php
            if (empty($tabErreurs["txtLibelleLong"]))
            {
                echo '<label class="form" for="txtLibelleLong">Libellé long :</label>';
            }
            else
            {
                echo '<label class="formError" for="txtLibelleLong">Libellé long :</label>';
            }
            ?>       		    
            <input type="text" id="txtLibelleLong" name="txtLibelleLong" size="75" maxlength="75"
                   value="<?php echo $strLibelleLong ?>"/>
        </p>
        <p>
            <label class="form" for="lstProjet">Projet :</label>
            <?php
            $strSQL = "SELECT codeProjet, libelleProjet FROM projet WHERE codeProjet = '$strCodeProjet'";
            $result = execSQL($strSQL);
            if (mysql_num_rows($result) > 0) 
            {
                $ligne = mysql_fetch_assoc($result);
                $strLibelleProjet = $ligne["libelleProjet"];
            }
            ?>
            <span class="readOnly"><?php echo $strCodeProjet . ' ' . $strLibelleProjet ?></span>
        </p>      
        <div id="okCancelButtons">
            <input type="submit" name="cmdFonction" value="Mise à jour" />
            <input type="submit" name="cmdAnnuler" value="Annuler" />
        </div>
    </fieldset>
    <?php
}
?>
