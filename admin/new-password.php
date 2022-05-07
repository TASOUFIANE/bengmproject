<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
    <!--<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>-->
    <div class="container" id="container">				
				<div class="form-container sign-in-container">
					<form action=<?php echo $_SERVER['PHP_SELF'];?> method="Post">
                        <h1 class="text-center">كلمة المرور الجديدة</h1>
                        <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                        <input class="form-control" dir="rtl" type="password" name="password" placeholder="إنشاء كلمة مرور جديدة" required><br>
                        <input class="form-control" dir="rtl" type="password" name="cpassword" placeholder="تأكيد كلمة السر" required><br>
			
                        <input type="submit" name="change-password"  class="btn btn-outline-warning" value="Change">						
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
