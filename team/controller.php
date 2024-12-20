<?php    require_once ("../database_connection.php");

$action = (isset($_POST['action']) && $_POST['action'] != '') ? $_POST['action'] : '';

switch ($action) {
	case 'add' : 	doInsert(); break;
	case 'edit' : doEdit(); break;
	}
   
function doInsert(){
        global $connect ,$datetime ; 
    

		if (isset($_FILES['fichier']['name']) && !empty($_FILES['fichier']['name'])) {
			
			$temp = $_FILES['fichier']['tmp_name'];
			
			
			$fileExtension = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
			$newFileName = round(microtime(true)) . '.' . $fileExtension;
		
			
			$targetDirectory = "upload_file/";
			$targetFile = $targetDirectory . $newFileName;
		
			
			$files = glob($targetDirectory . '*'); 
			foreach ($files as $file) {
				if (is_file($file)) : unlink($file); endif;
				 
			}
		
			
			if (move_uploaded_file($temp, $targetFile)) {
				$msg= "File uploaded successfully.";
			} else {
				$msg= "Failed to upload file.";
			}
		 

		}else{ $newFileName="";}   
	 
			$stmta=$connect->prepare("
						INSERT INTO `tbl_user`(`avatar`, `lname`,`fname`, `createdAt`,
						 `user_type`,profession,gender)

						VALUES (?,?,?,?,?,?,?)
					   
					   ") ;
						  
						 $stmta->execute([
							$newFileName,$_POST['lname'],$_POST['fname'],$datetime,
							$_POST['user_type'],$_POST['profession'],
							$_POST['gender']
							
						 ]);
				 
                 $fullname=strtoupper($_POST['lname']) ." ".ucwords($_POST['fname']) ;

		         $msg= $fullname." a été ajouté avec  succès!"; 
 				   $response = [
					   "data_error" => "no",
					   "data_text" => $msg
				   ];
				   echo json_encode($response); 
				   
	  }  
 

	function doEdit(){
		global $connect  ; 
 
header("Content-Type","application/json");

$id=$_POST['user_id'];
  
 if($_POST['uplo_photo']=='yes'){
 
    $tempFile = $_FILES['fichier']['tmp_name'];
    $originalFileName = $_FILES['fichier']['name'];
    
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $newFileName = round(microtime(true)) . '.' . $fileExtension;

    $folderPath = "upload_file/";
    $targetFilePath = $folderPath . $newFileName;

    
    if (!is_dir($folderPath)) {
        if (!mkdir($folderPath, 0777, true)) {
            die("Failed to create directory: $folderPath");
        }
    } else {
        
        $files = glob($folderPath . '*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }

 
	 if(move_uploaded_file($tempFile,$targetFilePath)){ 
		$update="UPDATE tbl_user set   avatar=:avatar  
		 where user_id=:id  ";
		$stmt= $connect->prepare($update);
 		$stmt->bindValue(":avatar",$newFileName);
		 
		$stmt->bindValue(":id",$id);
		$stmt->execute(); 
		
		echo  $targetFilePath;
	     
}else{echo'Failed to upload file';}

 }else{
 
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$profession = $_POST['profession'];

	$update="UPDATE tbl_user set   lname=? ,fname=? ,profession=?, gender=?,user_type=?
		 where  user_id=?  ";
		$stmt= $connect->prepare($update);
	 
		$stmt->execute([$lname,$fname,$profession,$_POST['gender'],$_POST['user_type'],$id ]);
		
		$response['msg_err'] = "no";
		echo json_encode($response);
 }
 
	}

	 
?>