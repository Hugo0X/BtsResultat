<?php 
session_start();
require "../data/dataForm.php";
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Silmulateur BTS - Resultat</title>
  <link rel="stylesheet" href="../styles/resultat.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../images/favicon.png"/>
  <script type="text/javascript">
    
    var myWindow;
    function openWin() {
    myWindow = window.open("legend.html", "_blank", "width=500, height=400");
    }

    function closeWin() {
    myWindow.close();
    }

</script>
<style>
.bouton
{
    <?php echo StyleNote($moyenneBts); ?>
}

.bouton:hover, .bouton:active
{
    <?php echo StyleH2($moyenneBts); ?>
}

</style>
</head>
<body>
    
    <a href="idForm.php" title="cliquez pour retourner à la selection de l'option">
        <header>
            <img src="../images/bandeauHaut.png" alt="bandeau Haut Objectif BTS" >
            <h1 class="headerObjectifBTS">Objectif BTS</h1>
        </header>
    </a>

        <div class="box">
            
            <h2 onclick="openWin()" class="help" style="<?php echo StyleH2($moyenneBts); ?>">Resultat Moyenne Simple</h2>
                <p class="resultatsMatieres">
                <?php 
                echo "<span class='matiere'>Culture G:</span> <span class='note'>".round($moyenneCultureG,2)."</span><br>",
                "<span class='matiere'>EDM:</span> <span class='note'>".round($moyenneEdm,2)."</span><br>",
                "<span class='matiere'>Maths:</span> <span class='note'>".round($moyenneMaths,2)."</span><br>",
                "<span class='matiere'>Anglais:</span> <span class='note'>".round($moyenneAnglais,2)."</span><br>",
                "<span class='matiere'>Algorithmique:</span> <span class='note'>".round($matiereEpreuveAlgorithmique1,2)."</span><br>",                
                "<span class='matiere'>Matieres Infos:</span> <span class='note'>".round($moyenneInformatique,2)."</span></p><p class='resultatBts'>",
                "<span class='matiere'>Resultat BTS:</span> <span class='noteBts' style='".StyleNote($moyenneBts)."'>".round($moyenneBts,2)."</span>";
                ?>
                </p>
        </div>

        <div class="box">
            <h2 onclick="openWin()" class="help" style="<?php echo StyleH2($moyenneBtsCff); ?>">Resultat Moyenne + CCF</h2>
            <?php
            echo "<p class='resultatBts'> Resultat BTS: <span class='noteBts' style='".StyleNote($moyenneBtsCff)."'>".round($moyenneBtsCff,2)."</span> </p>";
            ?>
        </div>

        <div class="divBouton">
            <a  href="idForm.php"><button type="submit" class="bouton">Retour au menu</button></a>
        </div>

    <footer>
        <p>Tous droits réservés - 2020 - MARTIN Hugo</p>
    </footer>
</body>
</html>