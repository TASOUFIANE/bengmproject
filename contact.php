<?php    
 $pageTitle='Contact';
 include 'ini.php';
?>
    
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>اتصل بنا</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">الرئيسية</a>
                        <a href="contact.php">/ اتصل بنا</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center">
                    <p>ابقى على تواصل</p>
                    <h2>الاتصال لأي استفسار</h2>
                </div>
                <div class="contact-img">
                    <img src="layout/img/touch.jpg"  alt="Image">
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
                                <button class="btn btn-custom" type="submit" id="sendMessageButton" name="submit">ارسال</button>
                            </div>
                        </form>
                </div>
                    
            </div>
             <div class="section-header text-center">  
                 <h2 style="margin-top:20px;"><i class="uil uil-map-marker-alt"></i> موقعنا</h2>
             </div> 
            <iframe style="width:100% ;border-style:none;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27575.574779280003!2d-9.56413829261924!3d30.238592212440476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3bf4d3caab3b1%3A0x306f9661ad9668b2!2z2KjZhiDZg9mF2YjYrw!5e0!3m2!1sfr!2sma!4v1649673031371!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- Contact End -->


<?php require_once("includes/templates/footer.php") ?>     
