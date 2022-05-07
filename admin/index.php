<?php 
session_start();
$Nonavbar='';
$pageTitle='تسجيل الدخول';
if(isset($_SESSION["username"])){header('Location:dashbord.php');
    //Redirect to dashbord;
}  
include 'ini.php';
//check if user coming from http request;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user=$_POST['user'];
    $pass=trim($_POST['pass']);
    //$hashedpass=sha1($pass);   
    //check if the user  coming from database
    $stmt=$con->prepare("SELECT id,password,username,groupid FROM users WHERE username=? LIMIT 1");
    $stmt->execute(array($user));
    $row=$stmt->fetch();
    $count=$stmt->rowCount();
    //if count >0 there is a user in database; 
    if( $count>0){
        if(password_verify($pass,$row['password'])){
        $_SESSION["username"]=$user;
        $_SESSION["groupid"]=$row["groupid"];
        $_SESSION["id"]=$row["id"];
      
        header('Location:dashbord.php');
        exit();}
        else{
            echo'<div class="alert alert-danger text-center" style="width:40%;">
                   <i class="fa fa-warning"></i> Username or password is incorrect           
              </div>'; 
              header('refresh:3;index.php');}
    }
    }
      
 ?>

            <div class="container" id="container">				
				<div class="form-container sign-in-container">
					<form action=<?php echo $_SERVER['PHP_SELF'];?> method="Post">
						<h1>تسجيل الدخول</h1><br>
						<input type="text" dir="rtl" placeholder="اسم المستعمل" name="user" required/><br>
						<input type="password" dir="rtl" placeholder="كلمة السر"  name="pass" required/>
						<a href="forgot-password.php">نسيت كلمة السر؟</a>
                        <input type="submit" class="btn btn-outline-warning" value="تسجيل الدخول">						
					</form>
				</div>
				<div class="overlay-container">
					<div class="overlay">
						<div class="overlay-panel overlay-right">
							<h1>مرحبًا بك مرة أخرى</h1>
							<p>للبقاء على اتصال معنا ، يرجى تسجيل الدخول باستخدام معلوماتك الشخصية</p>						
						</div>
					</div>
				</div>
			</div>

<?php include $tep.'footer.php';?>
