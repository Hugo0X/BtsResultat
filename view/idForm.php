<?php
if(strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') !== false || strpos($_SERVER["HTTP_USER_AGENT"], 'Trident/7') !== false )
{
    header('Location: https://www.microsoft.com/fr-fr/edge');
    exit();
}
session_start();
session_destroy();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Simulateur BTS</title>
  <link rel="stylesheet" href="../styles/idForm.css">
  <link rel="icon" type="image/png" href="../images/favicon.png"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img class="delete bandeauHaut" src="../images/bandeauHaut.png" alt="bandeau Haut Objectif BTS" >
        <h1 class="headerObjectifBTS">Objectif BTS</h1>
    </header>

    <div>
        <a class="hoverBackButton" href="http://yoanmeyer.fr"><img class="backButton" src="../images/backbutton.png" alt="Boutton de retour"></a>
    </div>

        <div class="choixOption">

            <div><h1>Veuillez choisir votre option</h1></div>
            <a href="form.php?idSemestre=0&option=slam"><div class="box box1"><h2>SLAM</h2></div></a>
            <a href="form.php?idSemestre=0&option=sisr"><div class="box box2"><h2>SISR</h2></div></a>
     
        </div>

    <footer>
        <p>Tous droits réservés - 2020 - MARTIN Hugo</p>
    </footer>
</body>
</html>