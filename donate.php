<?php  
$pageTitle='تبرع الان';
 include 'ini.php' ;

?>
        
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2> تبرع الان</h2>
                    </div>
                    <div class="col-12">
                        <a href="inex.php">الرئيسية</a>
                        <a href="donate.php">/ تبرع الان    </a>  
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        
        <!-- Donate Start -->
        <div class="container">
            <div class="donate" data-parallax="scroll" data-image-src="layout/img/donate.jpg">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="donate-content">
                            <div class="section-header">
                                <p>تبرع الان</p>
                                <h2>تبرع الان لكي يزداد عطائنا</h2>
                            </div>
                            <div class="donate-text">
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non. Aliquam metus tortor, auctor id gravida, viverra quis sem. Curabitur non nisl nec nisi maximus. Aenean convallis porttitor. Aliquam interdum at lacus non blandit.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="donate-form">
                            <form class="paypal" action="request.php" method="post" id="paypal_form">
                                <div class="control-group">
                                    <input type="text" name="name" class="form-control" placeholder="الاسم الكامل" required="required" />
                                </div>
                               
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            
                                    
                                    <label class="btn btn-custom active">
                                        
                                        <input type="radio" name="amount" value="1" checked >$1
                                        
                                    </label>
                                    <label class="btn btn-custom active">
                                        
                                        <input type="radio" name="amount" value="5">$5
                                        
                                    </label>
                                    <label class="btn btn-custom active">
                                        
                                        <input type="radio" name="amount" value="10">$10
                                        
                                    </label>
                                    
                                </div>
                                <div>
                                    <button class="btn btn-custom" type="submit">Donate Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Donate End -->

        <?php require_once("includes/templates/footer.php") ?>     
