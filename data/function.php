<?php

if(strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') !== false || strpos($_SERVER["HTTP_USER_AGENT"], 'Trident/7') !== false )
{
    header('Location: https://www.microsoft.com/fr-fr/edge');
    exit();
}

function VerificationGet($GetIdSemestre, $GetOption, $SessionOption, $SessionIdSemestre)
{
	$GetIdSemestre = (int) $GetIdSemestre;

	if(isset($GetIdSemestre) && isset($GetOption))
	{
		if($GetIdSemestre == 0)
		{
			if ($GetOption == "slam" || $GetOption == "sisr")
			{	
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			if ($GetOption == $SessionOption && $GetIdSemestre == $SessionIdSemestre+1)
			{	
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	else
	{
		return false;
	}	
}

function VerificationPost($idSemestre, $option)
{
	$idSemestre_1 = $idSemestre-1;
	$tbNomMatieresInfo = MatiereInformatque($idSemestre_1, $option);

	$tbNomMatieresGeneral = array("CultureG", "EDM", "Maths", "Anglais");
	$tbNomMatieres = array_merge($tbNomMatieresGeneral, $tbNomMatieresInfo);

    foreach($tbNomMatieres as $matiere)
    {
		htmlspecialchars($matiere);
        $matiere = "matiere".str_replace(" ","",$matiere).$idSemestre_1;
        if(!isset($_POST[$matiere]) || !is_numeric($_POST[$matiere]))
        {
			RedirectionIdForm();
		}
		elseif($_POST[$matiere] < 0 || $_POST[$matiere] > 20)
		{
			RedirectionIdForm();
		}
	}
}

function MatiereInformatque($idSemestre, $option)
{
	if($option == "slam")
	{
		if($idSemestre == 0)
			{
				return $tbNomMatieres = array("SI3", "SI4", "PPE1");
			}
			elseif($idSemestre == 1)
			{
				return $tbNomMatieres = array("Epreuve Algorithmique","SI6","PPE2","SLAM1","SLAM2");
			}
			elseif($idSemestre == 2)
			{
				return $tbNomMatieres = array("PPE3 4 5","SLAM 3","SLAM 4","SLAM 5");
			}
			elseif($idSemestre == 3)
			{
				return $tbNomMatieres = array("PPE3 4 5","SLAM 3","SLAM 4","SLAM 5", "SI7");
			}
			return "";
	}
	else
	{
		if($idSemestre == 0)
			{
				return $tbNomMatieres = array("SI1", "SI2");
			}
			elseif($idSemestre == 1)
			{
				return $tbNomMatieres = array("Epreuve Algorithmique", "SI5","SI PPE2","SISR 1","SISR 2");
			}
			elseif($idSemestre == 2)
			{
				return $tbNomMatieres = array("SISR 4");
			}
			elseif($idSemestre == 3)
			{
				return $tbNomMatieres = array("SISR 5", "SI7");
			}
			return "";
	}
}

function BoucleMatieresInformatiques($idSemestre, $option)
{
	$tbNomMatieres = MatiereInformatque($idSemestre, $option);

	foreach($tbNomMatieres as $matiere)
	{
		echo'<fieldset class="question">
				<legend>'.$matiere.'</legend>
				<label title = "Veuillez saisir votre note entre 0 et 20 ">
				<input type="number" name="matiere'.str_replace(" ","",$matiere). $idSemestre.'" required="required" min="0" max="20" step="00.1" size="5">
				</label>
			</fieldset>';	
	}
}

function Action($idSemestre, $option)
{
	if($idSemestre == 3)
	{
		return "resultat.php";
	}
	else
	{
		$idSemestre++;
		return "form.php?idSemestre=".$idSemestre."&option=".$option;
	}
} 

function AfficheSemestre($idSemestre)
{
	if($idSemestre == 0)
	{
		return "Semestre 1 / Année 1";
	}
	elseif($idSemestre == 1)
	{
		return "Semestre 2 / Année 1";
	}
	elseif($idSemestre == 2)
	{
		return "Semestre 1 / Année 2";
	}
	elseif($idSemestre == 3)
	{
		return "Semestre 2 / Année 2";
	}
	return "Erreur";
}

function Moyenne()
{
	$arguments = func_get_args();
	return array_sum($arguments) / count($arguments);
}

function StyleH2($moyenneBts)
{
	if($moyenneBts < 10)
	{
		return "background-color:#ff7443;";
	}
	else
	{
		return "background-color:#3bff62;";
	}
}

function StyleNote($moyenneBts)
{
	if($moyenneBts < 10)
	{
		return "color:#ff0000;";
	}
	else
	{
		return "color:#30f600;";
	}
}

function RecuperationPost()
{
	foreach ($_POST as $key => $value) 
    {
        $_SESSION['post'][$key] = $value;    
    }
}

function RedirectionIdForm()
{
	header('Location: ../view/idForm.php');
    session_destroy();
	exit();
}

function InternetExplorer() // ne fonctionne pas
{
	if(strpos($_SERVER["HTTP_USER_AGENT"], 'MSIE') !== false || strpos($_SERVER["HTTP_USER_AGENT"], 'Trident/7') !== false )
	{
		// RedirectionIdForm();
	}
}