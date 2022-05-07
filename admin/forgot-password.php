<?php require_once "controllerUserData.php"; ?>

    <div class="container" id="container">				
				<div class="form-container sign-in-container">
					<form action=<?php echo $_SERVER['PHP_SELF'];?> method="Post">
						<h1 class="text-center"> نسيت كلمة السر</h1>
                        <p class="text-center">أدخل عنوان بريدك الالكتروني</p><br>
                        <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
						<input type="email" name="email" placeholder="أدخل عنوان البريد الالكتروني" required value="<?php echo $email ?>"><br>
					
                        <input type="submit" name="check-email" class="btn btn-outline-warning" value="تأكيد">						
					</form>
				</div>
                <div class="overlay-container">
					<div class="overlay">
						<div class="overlay-panel overlay-right">
							<h1>   ! لا تنسى كلمة المرور</h1>
							<p></p>						
						</div>
					</div>
				</div>
		
	</div>
    <?php include $tep.'footer.php';?>
