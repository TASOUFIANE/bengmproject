<?php 
$pageTitle='مقالات';
include 'ini.php' ;

 
// (B) TOTAL NUMBER OF PAGES
define("PER_PAGE", "3"); // ENTRIES PER PAGE
$stmt = $con->prepare("SELECT CEILING(COUNT(*) / ".PER_PAGE.") FROM  articles");
$stmt->execute(); 
$pageTotal = $stmt->fetchColumn();
// (C) GET ENTRIES FOR CURRENT PAGE
// (C1) LIMIT (X, Y) FOR SQL QUERY
$pageNow = isset($_GET["page"]) && is_numeric($_GET["page"]) ? $_GET["page"] : 1 ;
$limX = ($pageNow - 1) * PER_PAGE;
$limY = PER_PAGE;

// (C2) SQL FETCH
$stmt=$con->prepare("SELECT * FROM articles where emplacement='blog' ORDER BY id LIMIT $limX, $limY ");
 $stmt->execute();  
$rows=$stmt->fetchAll();
?>
   

   
                
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>من المدونة</h2>
                    </div>
                    <div class="col-12">
                        <a href="home.php">الرئيسية</a>
                        <a href="event.php"> / المقالات </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Blog Start -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>مدونتنا</p>
                    <h2>آخر الأخبار والمقالات مباشرة من مدونتنا</h2>
                </div>
                <div class="row">
                    <?php foreach( $rows as $row){?>
                    <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="layout/img/<?php echo $row['image'];?>" alt="Image">
                            </div>
                            <div class="blog-text">
                                <h3><?php echo  $row['titre'] ;?></h3>
                                <p>
                                   <?php echo substr($row['contenu'],0,90) ;?> 
                                </p>
                            </div>
                            <div class="blog-meta">
                                <p><a  class="btn btn-outline-warning" href="plus.php?id=<?php echo $row['id'] ;?>">...المزيد</a></p>
                            </div>
                        </div>
                    </div> 
                     <?php } ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="pagination justify-content-center">
                            <?php if($pageNow > 1){?>
                            <li class="page-item "><a class="page-link" href="blog.php?page=<?php echo ($pageNow-1); ?>">السابق</a></li>
                            <?php } ?>
                            <?php for($i=1;$i<=$pageTotal;$i++){?>
                            <li class="page-item"><a class="page-link" href="blog.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>                           
                            <?php } ?>
                            <?php if($i>2 && $pageNow<$pageTotal){?>
                            <li class="page-item"><a class="page-link" href="blog.php?page=<?php echo ($pageNow+1);?>">التالي</a></li>
                            <?php } ?> 
                        </ul> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->

 <?php require_once("includes/templates/footer.php") ?>     