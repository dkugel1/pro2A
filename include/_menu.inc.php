<p><a href="index.php?id_page=1">Relevé d'activité</a></p>
<?php
// menu du planificateur
if ($_SESSION['matricule'] == APP_PLANIFICATEUR) {
    ?>
    <p><a href="index.php?id_page=2">Types de projets</a></p>
    <p><a href="index.php?id_page=3">Projets</a></p>
    <?php
}
/*
  voir si le matricule est un MOE pour au moins l'un des projets,
  alors son menu correspond au menu d'un MOE avec
  <p><a href="index.php?id_page=4">Projets</a></p>
 */
?>
<p><a href="index.php?id_page=4">Etapes</a></p>	
<p><a href="index.php?id_page=5">Statistiques</a></p>
