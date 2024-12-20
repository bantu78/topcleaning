<?php  
$id = $_GET['id'];

$stmt = $connect->prepare("SELECT * FROM tbl_user WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$url = BASE_URL . "register/controller.php";
$gender= $row['gender']=="f" ? "Feminin":"Masulin";

$user_type= $row['user_type'];

if($user_type=="team"){
    $user_type="Personnel de l'entreprise";
}elseif($user_type=="client"){
 $user_type="Client";
}

	 
$fullname=strtoupper($row['lname']) ." ".ucwords($row['fname']) ;
				 
?>

<style>
 
    </style>
 
<div class="bantu_toast"></div>
 

            <!-- Contact Start -->
            <div class="contact wow fadeInUp">
                <div class="container">
                    <div class="section-header text-center">
                    <h4 style=" font-weight:bold">Veuillez utiliser le formulaire ci-dessous</h4>
                        <p> pour modifier les infos de <?= $fullname ?> </p>
                  
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <?php  require "../shared/left_part.php" ?>;
                        </div>
                        
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div id="success"></div>

                                <form class="user">
    <div class="user position-relative form-group text-center bg_img">
        <input id="avatar" name="fichier" type="file" class="d-none" onChange="updateAvatar('<?=$url ?>', this, 'yes')">
        <label for="avatar"><i class="bx bxs-camera bx-sm text-gray-800 icon_camera"></i></label>
        <div id="progress-div" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" aria-label="Upload Progress" style="width:100%;height:20px">
            <div id="avatarProgBar" style="width: 0%; height: 100%;" class="progress-bar progress-bar-striped progress-bar-animated bg-primary text-center text-white"></div>
        </div>
    </div> 
</form>
<div style="background-image: url('upload_file/<?=($row['avatar']) ?>');   margin: 0 auto;
    margin-bottom: 10px; background-size:contain;
    width:200px;height: 200px;">
  
</div>


<form id="edit_form" method="POST">   
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="lname" placeholder="Nom(s)" value="<?=$row['lname']?>"   />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                <div class="form-group">
                                        <input type="text" class="form-control" name="fname" placeholder="Prénom(s)" value="<?=$row['fname']?>"   />
                                        <p class="help-block text-danger"></p>
                                    </div>

                                    
                                    <div class="form-group">
                                        <select class="form-control"  name="gender">
                                            <option value="<?=$row['gender']?>"><?=$gender?></option>
                                            <option value="m" >Masculin</option>
                                            <option value="f">Feminin</option>
                                        </select>
                                         <p class="help-block text-danger"></p>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control"  name="user_type">
                                        <option value="<?=$row['user_type']?>"><?=$user_type?></option>
                                            <option value="team" >Personnel de l'entreprise</option>
                                            <!-- <option value="client">Client</option> -->
                                        </select>
                                         <p class="help-block text-danger"></p>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="profession" placeholder="Fonction" value="<?=$row['profession']?>"   />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                   
                                    <div>
                                        <button class="btn" type="submit" id="sendMessageButton" >Valider</button>
                                    </div>

                                    <input id="post_id" name="post_id" type="hidden" value="<?= htmlspecialchars($post_id, ENT_QUOTES, 'UTF-8') ?>">
                                    <input    name="action"   type="hidden"    value="edit" > 
    <input id="uplo_photo" name="uplo_photo" type="hidden" value="no">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->

 