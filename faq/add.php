 

            <!-- Contact Start -->
            <div class="contact wow fadeInUp">
                <div class="container">
                    <div class="section-header text-center">
                        <p> Entrer en contact</p>
                        <h2> Pour toute question </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6"  id="filePreview">
                        <?php  require "../shared/left_part.php" ?>;
                        </div>
                        
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div id="success"></div>
                                
                                <form  method="POST"   id="edit_form">
                                <div name="sentMessage" id="contactForm" novalidate="novalidate">
                                    <div class="form-group">
                                        <input type="text" class="form-control"     name="ques" placeholder="Question" required="required" data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" rows="20" class="form-control" name="resp" placeholder="Réponse" required="required" data-validation-required-message="Please enter your email" />
                                        </textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                  
                                     
                                    <div>
                                        <button class="btn" type="submit" id="valider" >Valider </button>
                                    </div>

                                    <input    name="action"   type="hidden"    value="add" > 
  
                                </div>
                                </form>

                                
                                <div id="progress-div" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" aria-label="Upload Progress" style="width:100%;height:20px">
          <div id="progb" style="width: 0%; height: 100%; " class="progress-bar progress-bar-striped progress-bar-animated  bg-primary text-center text-white"></div>
        </div>
    <div id="filePreview"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->


            <style>
       
        #filePreview img, #filePreview video {
            max-width: 100%;
            height: 350px;
        }
        #prog_sub {
            width: 0;
            height: 5px;
            background: green;
            text-align: center;
            color: white;
            margin-top: 10px;
        }
    </style>
 