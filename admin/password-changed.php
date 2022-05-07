<?php require_once "controllerUserData.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: login-user.php');  
}
?>


    
    <div class="container" id="container">				
				<div class="form-container sign-in-container">
                            <?php 
                        if(isset($_SESSION['info'])){
                            ?> <br>
                            <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                            </div>
                            <?php
                        }
                        ?>
					<form action="index.php" method="POST">	
                        <input type="submit" class="btn btn-outline-warning"  name="login-now"  value="تسجيل الدخول الآن">						
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