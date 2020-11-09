<?php
if(strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') !== false || strpos($_SERVER["HTTP_USER_AGENT"], 'Trident/7') !== false )
{
    header('Location: https://www.microsoft.com/fr-fr/edge');
    exit();
}
require "../data/function.php";
session_start();

if(verificationGet($_GET['idSemestre'], $_GET['option'], $_SESSION['option'], $_SESSION['idSemestre'])) //verification des données URL
{
    $idSemestre = $_GET['idSemestre'];
	$option = $_GET['option'];
}
else
{
    RedirectionIdForm();
}


if($idSemestre == 0)
{
    $_SESSION['option'] = $option; //Option Unique
}
else 
{
    VerificationPost($idSemestre, $option); //verification des données précédemment saisi
    RecuperationPost();// Recupération donnée précédemment saisi
}

//Maj idSemestre
$_SESSION['idSemestre'] = $idSemestre;
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Silmulateur BTS</title>
  <link rel="stylesheet" href="../styles/form.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="../images/favicon.png"/>
</head>
<body>
    
    <a href="idForm.php" title="cliquez pour retourner à la selection de l'option">
        <header>
            <img src="../images/bandeauHaut.png" alt="bandeau Haut Objectif BTS" >
            <h1 class="headerObjectifBTS">Objectif BTS</h1>
        </header>
    </a>

    <div class="form">
        <h1>Saisie des résultats</h1>
        <h2 class="h2Center"><?php echo AfficheSemestre($idSemestre); ?></h2>

        <form action="<?php echo Action($idSemestre, $option); ?>" method="post">

            <h2>Matieres génerales</h2>
             
            <fieldset class="question">
                <legend>Culture G</legend>
                <label title = "Veuillez saisir votre note entre 0 et 20 ">
                <input type="number" name="matiereCultureG<?php echo $idSemestre ?>" required="required" min="0" max="20" size="5" step="00.1" autofocus>
                </label>
            </fieldset>

            <fieldset class="question">
                <legend>EDM</legend>
                <label title = "Veuillez saisir votre note entre 0 et 20 ">
                <input type="number" name="matiereEDM<?php echo $idSemestre ?>" required="required" min="0" max="20" size="5" step="00.1">
                </label>
            </fieldset>

            <fieldset class="question">
                <legend>Maths</legend>
                <label title = "Veuillez saisir votre note entre 0 et 20 ">
                <input type="number" name="matiereMaths<?php echo $idSemestre ?>" required="required" min="0" max="20" size="5" step="00.1">
                </label>
            </fieldset>  

            <fieldset class="question">
                <legend>Anglais</legend>
                <label title = "Veuillez saisir votre note entre 0 et 20 ">
                <input type="number" name="matiereAnglais<?php echo $idSemestre ?>" required="required" min="0" max="20" size="5" step="00.1">
                </label>
            </fieldset>

            <h3>Matières informatiques</h3>
            
             <?php BoucleMatieresInformatiques($idSemestre, $option); ?>

             <div class="divBouton">
                <button type="submit" class="bouton">Valider</button>
            </div>
        </form>     
   </div>

   <footer>
        <p>Tous droits réservés - 2020 - MARTIN Hugo</p>
    </footer>
</body>
</html>