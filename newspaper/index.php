<?php   
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$title="Actualités"; 

switch ($view) {
 
	case 'africa' :
		$content    = 'africa.php';		
		break; 
	case 'alaune' :
		$content    = 'alaune.php';		
		break; 
        case 'lemonde' :
            $content    = 'lemonde.php';		
            break; 
			case 'france_24' : 	$content    = 'france_24.php';	 break; 
			case 'bznews' : 	$content    = 'bznews.php';	 break; 
			case 'equipe' : 	$content    = 'equipe.php';	 break; 
			case 'telecg' : 	$content    = 'tele_cg.php';	 break; 

	default :
		$content    = 'alaune.php';		
}

require "../wrapper_sub.php";


?>
 