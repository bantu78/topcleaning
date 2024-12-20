<?php   
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$title="FAQ"; 

switch ($view) {
 
	case 'add' :
		$content    = 'add.php';		
		break; 
	case 'edit' :
		$content    = 'edit.php';		
		break; 
	default :
		$content    = 'add.php';		
}

require "../wrapper_sub.php";


?>
  <script src="../shared/form_sub.js"></script>
