<?php   include 'ini.php' ;
$pageTitle='Blog';
$id=isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']):0;
// (C2) SQL FETCH
 $stmt=$con->prepare("SELECT * FROM articles where id=?");
 $stmt->execute(array($id));  
 $row=$stmt->fetch();
 $count=$stmt->rowCount(); 
?>
           <!-- Page Header Start -->
           <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>من المدونة</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">الرئيسية</a>
                        <a href="blog.php">/ مقالات</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        <?php 
          if($count>0){?>
            <h1 class="text-center"> تفاصيل المقال</h1><br>
           
                <div class="all_articles" style="display:flex; justify-content:center; align-items:center;">
                    <div class="card mb-3 " style="width: 80%;">
                        <div class="row g-0">
                            <div class=" col-md-4">
                            <img src="layout/img/<?php echo $row['image']; ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['titre']; ?></h5>
                                    <p class="card-text"><?php echo $row['contenu']; ?></p>
                                    <p class="card-text"><small class="text-muted">Publier le <?php echo $row['date_article']; ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>  
     <?php } else{
       echo "cet article n existe pas";}

        require_once("includes/templates/footer.php") ;
         
        