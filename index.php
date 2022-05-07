
<?php 
$pageTitle='الرئيسية';
  include 'ini.php' ;
  $stmt=$con->prepare("SELECT * FROM articles where emplacement='blog' ORDER BY id DESC LIMIT 3 ");
  $stmt->execute();  
 $rows=$stmt->fetchAll();
?>
   

        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid" style="width:100%">
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="layout/img/carousel-1.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h1>Let's be kind for children</h1>
                            <p>
                                Lorem ipsum dolor sit amet elit. Phasellus ut mollis mauris. Vivamus egestas eleifend dui ac consequat at lectus in malesuada
                            </p>
                            <div class="carousel-btn">
                                <a class="btn btn-custom" href="">Donate Now</a>
                              
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="layout/img/carousel-2.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h1>Get Involved with helping hand</h1>
                            <p>
                                Morbi sagittis turpis id suscipit feugiat. Suspendisse eu augue urna. Morbi sagittis, orci sodales varius fermentum, tortor
                            </p>
                            <div class="carousel-btn">
                                <a class="btn btn-custom" href="">Donate Now</a>
                             
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="layout/img/carousel-3.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h1>Bringing smiles to millions</h1>
                            <p>
                                Sed ultrices, est eget feugiat accumsan, dui nibh egestas tortor, ut rhoncus nibh ligula euismod quam. Proin pellentesque odio
                            </p>
                            <div class="carousel-btn">
                                <a class="btn btn-custom" href="">Donate Now</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->


         <!-- Service Start -->
         <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>What We Do?</p>
                    <h2>We believe that we can save more lifes with you</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="flaticon-diet"></i>
                            </div>
                            <div class="service-text">
                                <h3>Healthy Food</h3>
                                <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="flaticon-water"></i>
                            </div>
                            <div class="service-text">
                                <h3>Pure Water</h3>
                                <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="flaticon-healthcare"></i>
                            </div>
                            <div class="service-text">
                                <h3>Health Care</h3>
                                <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="flaticon-education"></i>
                            </div>
                            <div class="service-text">
                                <h3>Primary Education</h3>
                                <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="flaticon-home"></i>
                            </div>
                            <div class="service-text">
                                <h3>Residence Facilities</h3>
                                <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <i class="flaticon-social-care"></i>
                            </div>
                            <div class="service-text">
                                <h3>Social Care</h3>
                                <p>Lorem ipsum dolor sit amet elit. Phase nec preti facils ornare velit non metus tortor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
        
        <!-- Donate Start -->
        <div class="donate" data-parallax="scroll" data-image-src="layout/img/donate.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="donate-content">
                            <div class="section-header">
                            
                                <h2 >ما نقصت صدقة من مال ، وما زاد الله عبدا بعفو إلا عزا</h2>
                            </div>
                            <div class="donate-text">
                                <p>
                                قال النبي ﷺ : صنائع المعروف تقي مصارع السوء وصدقة السر تطفىء غضب الرب وصلة الرحم تزيد في العمر. صحيح الترغيب889 قال ابن تيمية: و الصدقة لما كانت تطفيء الخطيئة كما يُطفئ الماء النار صار القلب يزكو بها
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="donate-form">
                            <form  action="request.php" method="post" id="paypal_form">
                                <div class="control-group">
                                    <input type="text"  name="name" class="form-control" placeholder="الإ سم" required="required" />
                                </div>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-custom active">
                                        <input type="radio" name="amount" value="1" checked> $1
                                    </label>
                                    <label class="btn btn-custom">
                                        <input type="radio" name="amount" value="5"> $5
                                    </label>
                                    <label class="btn btn-custom">
                                        <input type="radio" name="amount" value="10"> $10
                                    </label>
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit"><i class="fi fi-bs-hand-holding-heart"></i>تبرع الان</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Donate End -->
        
        
        <!-- Event Start -->
        <div class="event">
            <div class="container">
                <div class="section-header text-center">
                    <p>الأحداث القادمة</p>
                    <h2>كن مستعدًا لأحداثنا القادمة</h2>
                </div>
                <div class="row">
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
                                    <a class="btn btn-custom" href="">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="event-item">
                            <img src="layout/img/event-2.jpg" alt="Image">
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
                                    <a class="btn btn-custom" href="">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Event End -->


     
        
        
        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>ابقى على تواصل</p>
                    <h2>الاتصال لأي استفسار</h2>
                </div>
                <div class="contact-img">
                    <img src="layout/img/touch.jpg" alt="Image">
                </div>
                <div class="contact-form">
                        <div id="success"></div>
                        <form id="contactForm" novalidate="novalidate"  method="POST" action="mail/contact.php">
                            <div class="control-group">
                                <input type="text" class="form-control" dir="rtl" id="name" name="name" placeholder="الإ سم" required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" dir="rtl" id="email" name="email" placeholder="بريد الالكتروني" required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" dir="rtl" id="subject" name="subject" placeholder="موضوع" required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" dir="rtl" placeholder="الرسالة" name="message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-custom" type="submit" dir="rtl" id="sendMessageButton" name="submit">ارسال</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
        <!-- Contact End -->


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
            </div>
        </div>
        <!-- Blog End -->


      

 <?php require_once("includes/templates/footer.php") ?>       