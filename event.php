<?php   

$pageTitle='الأحداث';
include 'ini.php' ;
$stmt=$con->prepare("SELECT * FROM events ");
$stmt->execute();  
$rows=$stmt->fetchAll();?>

        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>الأحداث القادمة</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">الرئيسية</a>
                        <a href="event.php"> /  الأحداث</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Event Start -->
        <div class="event">
            <div class="container">
                <div class="section-header text-center">
                    <p>الأحداث القادمة</p>
                    <h2>كن مستعدًا لأحداثنا القادمة</h2>
                </div>
                <div class="row">
               <?php foreach($rows as $row){?>
                    <div class="col-lg-6">
                        <div class="event-item">
                            <img src="layout/img/event-1.jpg" alt="Image">
                            <div class="event-content">
                                <div class="event-meta">
                                    <p><i class="fa fa-calendar-alt"></i>01-Jan-45</p>
                                    <p><i class="far fa-clock"></i>8:00 - 10:00</p>
                                    <p><i class="fa fa-map-marker-alt"></i>New York</p>
                                </div>
                                <div class="event-text">
                                    <h3>Lorem ipsum dolor sit</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Neca pretim miura bitur facili ornare velit non vulpte liqum metus tortor
                                    </p>
                                    <a class="btn btn-custom" href="contact.php">تواصل معنا</a>
                                </div>
                            </div>
                        </div>
                    </div><?php }?>   
                </div>
            </div>
        </div>
        <!-- Event End -->


  <?php require_once("includes/templates/footer.php") ?>     
