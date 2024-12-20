<?php  
$id = $_GET['id'];

$stmt = $connect->prepare("SELECT * FROM tbl_faq WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$url = BASE_URL . "faq/controller.php";
?>

<style>
 
    </style>
 
<div class="bantu_toast"></div>
 

            <!-- Contact Start -->
            <div class="contact wow fadeInUp">
                <div class="container">
                    <div class="section-header text-center">
                        <p> Entrer en contact</p>
                        <h2> Pour toute question </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info"  id="avatarBox">
                            <?php  require "../shared/left_part.php" ?>;
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div id="success"></div>
 

<form id="edit_form" method="POST">   
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ques" placeholder="Question" value="<?=$row['ques']?>"   />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="resp" placeholder="Réponse" ><?=$row['resp']?></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div>
                                        <button class="btn" type="submit" id="sendMessageButton" >Valider</button>
                                    </div>

                                    <input id="post_id" name="post_id" type="hidden" value="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>">

                                    <input    name="action"   type="hidden"    value="edit" > 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->

 