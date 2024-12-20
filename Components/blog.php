
<?php

$blogsPerPage = 3;   $pa="blog";

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $blogsPerPage;

$totalBlogsQuery = $connect->query("SELECT COUNT(*) as total FROM tbl_samples_post");
$totalBlogs = $totalBlogsQuery->fetch(PDO::FETCH_ASSOC)['total'];

$blogsQuery = $connect->prepare("SELECT * FROM tbl_samples_post p JOIN tbl_user u ON u.user_id=p.user_id 
 ORDER BY post_datetime DESC LIMIT :limit OFFSET :offset");

$blogsQuery->bindValue(':limit', $blogsPerPage, PDO::PARAM_INT);
$blogsQuery->bindValue(':offset', $offset, PDO::PARAM_INT);
$blogsQuery->execute();
$blogsx = $blogsQuery->fetchAll(PDO::FETCH_ASSOC);

$totalPages = ceil($totalBlogs / $blogsPerPage);
?>

<div class="blog">
    <div class="container">
        <div class="section-header text-center">
            <p>Dernier blog</p>
            <h2>Dernières nouvelles de notre blog</h2>
        </div>
        <div class="row" id="data_cont_blog">

            <?php foreach ($blogsx as $blog): ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s" id="wrap">

                    <div class="blog-item" id="sub_wrap" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">

                        <div class="blog-img" style="    height:240px; background-size:contain !important;
                                background:url('<?= BASE_URL ?>blog/images/<?= substr($blog['post_content'], 17, -3) ?>');
                            
                                ">

                        </div>
                        <div class="blog-title">
                            <h3> <?= ucwords($blog['title']) ?></h3>
                            <div class="d-flex align-items-center   ">
                                <a class="btn " style="justify-content:normal" href="#"><span class="badge  badge-counter"
                                        style="font-size: 12px;background:#030f27;color:white"><?= count_total_post_like($connect, $blog["post_id"]) ?></span>

                                </a>
                                <i class="bx  bxs-like bx-sm  align-self-center px-2  " style="color:#fff"></i>
                            </div>
                        </div>
                        <div class="blog-meta ">
                            <p>Par <?= strtoupper($blog['lname']) . ' ' . ucwords($blog['fname']) ?></p>
                            <p>Le <?= (new DateTime($blog['post_datetime']))->format("d/m/y à H:i:s") ?></p>
                        </div>
                        <div class="blog-text">
                            <p>
                                <?= ucwords($blog['paragraph']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?> 
        </div>
        <?php require "pagi_blog.php";?>

    </div>
</div>

 

   <!-- pagination start   -->
   <script>
    document.addEventListener("DOMContentLoaded", function() {
        
        function handlePaginationClick(event) {
           
            event.preventDefault();

            var url = event.target.href;

            fetch(url)
                .then(response => response.text())
                .then(html => {
                     var parser = new DOMParser();
                    var doc = parser.parseFromString(html, 'text/html');

                     document.querySelector('#data_cont_blog').innerHTML = doc.querySelector('#data_cont_blog').innerHTML;

                    document.querySelector('#pagination_blog').innerHTML = doc.querySelector('#pagination_blog').innerHTML;

                     attachEventListeners();
                     attachEventListeners_servi();

                })
                .catch(error => console.error('Error:', error));
        }

         function attachEventListeners() {
            var links = document.querySelectorAll('.ajax_link_blog');
            console.log(links)
            links.forEach(link => {
                 link.addEventListener('click', handlePaginationClick);  
            });
        }
 

         attachEventListeners(); 
     });
</script>
<!-- pagination end -->