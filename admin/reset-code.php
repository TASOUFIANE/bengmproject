<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: index.php');
}
?>
  
    <div class="container" id="container">				
				<div class="form-container sign-in-container">
					<form action=<?php echo $_SERVER['PHP_SELF'];?> method="Post">
						<h1>رمز التحقق</h1>
                        <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
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
						<input class="form-control" type="number" name="otp" placeholder="Enter code" required>						
						<br>
                        <input type="submit" class="btn btn-outline-warning" name="check-reset-otp" value="تاكيد">						
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
