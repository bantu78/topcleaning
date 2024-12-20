 

<?php  require "header.php" ;?>

<style>
    .page-header {
        background-blend-mode: overlay;
        background-size: cover;
        background: 
            url('<?= BASE_URL?>img/carousel-1.jpg') no-repeat center center,
            linear-gradient(rgba(3, 15, 39, 0.7), rgba(0, 0, 0, 0.3));
    }
</style>
         
            <!-- Page Header Start -->
            <div class="page-header" >
                <div class="container"  >
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-white"><?=$title?></h2>
                        </div>
                        <div class="col-12" >
                            <a href="#"   style="font-size:0.95rem; font-weight: 400" >Accueil</a>
                            <a href="#"  style="font-size:0.95rem;"  class="text-white"><?=$title?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Header End -->


            <?php  require  $content ;?>

<?php  require "footer.php"; ?>
  
 