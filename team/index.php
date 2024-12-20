<?php   
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$title="Équipe"; 

switch ($view) {
 
	case 'list' :
		$content    = 'list.php';		
		break; 
	case 'edit' :
		$content    = 'edit.php';		
		break; 
	default :
		$content    = 'list.php';		
}

require "../wrapper_sub.php";
 

?>


 