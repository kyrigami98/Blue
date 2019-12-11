<?php
function jour_fr_v1($numj)
	{
		if ($numj==0)
		{
			$nomj='dimanche';
		}
		else
		{
			if ($numj==1)
			{
				$nomj='lundi';
			}
			else
			{
				if($numj==2)
				{
					$nomj='mardi';
				}
				else
				{
					if ($numj==3)
					{
						$nomj='mecredi';
					}
					else
					{
						if ($numj==4)
						{
							$nomj='jeudi';
						}
						else
						{
							if ($numj==5)
							{
								$nomj='vendredi';
							}
							else
							{
								if ($numj==6)
								{
									$nomj='samedi';
								}
							}				
						}
					}
				}
			}
		}
	return($nomj);
}
	
	
	function jour_fr_v2($numj)
{
	switch($numj)
	{
		case 0 :
			$nomj='gromanche';
			break;
		case 1 :
			$nomj='LUNDI';
			break;
		case 2 :
			$nomj='MARDI';
			break;
		case 3 :
			$nomj='MECREDI';
			break;
		case 4 :
			$nomj='JEUDI';
			break;
		case 5 :
			$nomj='VENDREDI';
			break;
		case 6 :
			$nomj='SAMEDI';
			break;
					
	}
					
return($nomj);
}											
function jour_fr_v3($numj)
{
	$t=array('dim','lun','mar','mer','jeu','ven','sam');
	$nomj=$t[$numj];
	return($nomj);
}
function jour_fr_v4($numm)
{
	$t=array(' ','jan','fer','mar','avr','mai','jun','jui','aou','sep','oct','nov','dec');
	$nomm=$t[$numm];
	return($nomm);
}
function zero_fr_v($mois)
 {
 if  ($mois<10)
 {
 	$nbmois='0'.$mois;
 }
 return($nbmois);
 }
 
 function zero_fr_v2($jour)
 {
 if  ($jour<10)
 {
 	$jour='0'.$jour;
 }
 return($jour);
 }
 
 function format_nb($n)
 {
 	if ($n<10)
	{
		$resultat='0'.$n;
	}	
	else
	{
		$resultat=$n;
	}	
	return($resultat);
	
 }
 
 function date_us2fr($dus)
 {
 	$t=explode('-',$dus);
 $dfr=$t[2].'/'.$t[1].'/'.$t[0];
 	
	
	return($dfr);
 }
 	
	
	
	

	
	
?>	