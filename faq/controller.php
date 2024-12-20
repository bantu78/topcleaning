<?php    require_once ("../database_connection.php");

$action = (isset($_POST['action']) && $_POST['action'] != '') ? $_POST['action'] : '';

switch ($action) {
	case 'add' : 	doInsert(); break;
	case 'edit' : doEdit(); break;
	}
   
function doInsert(){
        global $connect ,$datetime ;  
	 
			$stmta=$connect->prepare("
		INSERT INTO `tbl_faq`(`ques`, `resp`, `createdAt`,`user_id`) 
						VALUES (?,?,?,? )
					   
					   ") ;
						 
						 $stmta->execute([
							$_POST['ques'],$_POST['resp'] ,$datetime,$_COOKIE['user_id']
						 ]);
				 

		         $msg=" ".strtoupper($_POST['ques']) ." a été ajoutée avec  succès!"; 
 				   $response = [
					   "data_error" => "no",
					   "data_text" => $msg
				   ];
				   echo json_encode($response); 
				   
	  }  
 

	function doEdit(){
		global $connect  ; 
 
header("Content-Type","application/json");

$id=$_POST['post_id']; 
$ques = $_POST['ques'];
$resp = $_POST['resp'];

	$update="UPDATE tbl_faq set   ques=? ,resp=? 
		 where  id=?  ";
		$stmt= $connect->prepare($update);
	 
		$stmt->execute([$ques,$resp,$id]);
		
		$response['msg_err'] = "no";
		echo json_encode($response);
 }
  
?>