<?php
/*
  Gestion des étapes
  Module de gestion du formulaire de suppression d'une étape
 */

// vérifier l'existence de tâches pour cette étape et afficher un message d'erreur le cas échéant
$strSQL = "SELECT * FROM tache WHERE idEtapeTache = '$strIDEtape'";
if (mysql_num_rows(execSQL($strSQL)) > 0)
    echo '<span class="erreur">L\'étape ne peut être supprimée, il existe des tâches pour cette étape !</span>';
else {
    $blSuppPossible = true;
}

if ($blSuppPossible) 
{
    // récupérer les informations du projet dans la base de données
    $requete =  "SELECT * ";  
    $requete = $requete . "FROM v_etapes WHERE idEtape = '$strIDEtape'";
    $resultat = execSQL($requete);                  // exécution de la requête SQL
    if ($ligne = mysql_fetch_assoc($resultat))      // récupération 1 ligne du jeu de résultat
    {
        $strLibelleCourt = $ligne["libelleCourtEtape"];
        $strLibelleLong = $ligne["libelleLongEtape"];
        $strCodeProjet = $ligne["codeProjetEtape"];
        $strLibelleProjet = $ligne["libelleProjet"];
    }

    ?>                        
    <!--  affichage du formulaire de suppression -->
    <fieldset>
	<legend>Supprimer une étape</legend>
	<p>
            <label class="form">Code :</label>  
            <span class="readOnly"><?php echo $strIDEtape ?></span>
	</p>
	<p>
            <label class="form">Libellé court :</label>  
            <span class="readOnly"><?php echo $strLibelleCourt ?></span>
	</p>
	<p>
            <label class="form">Libellé long :</label>  
            <span class="readOnly"><?php echo $strLibelleLong ?></span>
	</p>
	<p>
            <label class="form">Projet :</label>  
            <span class="readOnly"><?php echo $strCodeProjet . ' - ' . $strLibelleProjet ?></span>
	</p>
	<div id="okCancelButtons">
	   <input type="submit" name="cmdFonction" value = "Suppression" />
	   <input type="reset" name="cmdAnnuler" value="Annuler" />
	</div>
    </fieldset>
    <?php
}
?>