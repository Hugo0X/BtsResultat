<?php

require "function.php";


VerificationPost($_SESSION['idSemestre']+1, $_SESSION['option']); //verification des données précédemment saisi

RecuperationPost();
    
extract($_SESSION['post']);

$moyenneCultureG = Moyenne($matiereCultureG0, $matiereCultureG1, $matiereCultureG2, $matiereCultureG3);

$moyenneEdm = Moyenne($matiereEDM0, $matiereEDM1, $matiereEDM2, $matiereEDM3);

$moyenneMaths = Moyenne($matiereMaths0, $matiereMaths1, $matiereMaths2, $matiereMaths3);

$moyenneAnglais = Moyenne($matiereAnglais0, $matiereAnglais1, $matiereAnglais2, $matiereAnglais3);

if($_SESSION['option'] == "slam")
{
    $moyenneInformatique = Moyenne($matiereSI30, $matiereSI40, $matierePPE10, $matiereSI61, $matierePPE21, $matiereSLAM11, $matiereSLAM21, $matierePPE3452, $matiereSLAM32, $matiereSLAM42, $matiereSLAM52, $matierePPE3453, $matiereSLAM33, $matiereSLAM43, $matiereSLAM53, $matiereSI73);
}
elseif($_SESSION['option'] == "sisr")
{
    $moyenneInformatique = Moyenne($matiereSI10, $matiereSI20, $matiereSI51, $matiereSIPPE21, $matiereSISR11, $matiereSISR21, $matiereSISR42, $matiereSISR53, $matiereSI73);
}

$moyenneBts = ($matiereEpreuveAlgorithmique1 + $moyenneCultureG*2 + $moyenneAnglais*2 + $moyenneMaths*2 + $moyenneEdm*3 + $moyenneInformatique * 5) /15;

$moyenneBtsCff = ($matiereEpreuveAlgorithmique1 + $moyenneCultureG*2 + $moyenneAnglais*2 + $moyenneMaths*2 + $moyenneEdm*3 + 70 + $moyenneInformatique*5) /22; //70 corespond au CCF