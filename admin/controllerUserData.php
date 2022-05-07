<?php 
session_start();
include 'ini.php';
$email = "";
$name = "";
$errors = array();

  
    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){

        $email =  $_POST['email'];
        $stmt=$con->prepare("SELECT * FROM users WHERE email= ? LIMIT 1");
        $stmt->execute(array($email));
        $count=$stmt->rowCount();
        if($count > 0){
            $code = rand(999999, 111111);
            $stmt=$con->prepare("UPDATE users SET code = ? WHERE email = ?");          
            if($stmt->execute(array($code,$email))){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender="taatallaest@gmail.com";
                if(mail($email, $subject, $message,$sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        
        $otp_code =  $_POST['otp'];
        $stmt=$con->prepare("SELECT * FROM users WHERE code= ? LIMIT 1");
        $stmt->execute(array($otp_code));  
        $row=$stmt->fetch();     
        $count=$stmt->rowCount();
        if($count > 0){
            $email = $row['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = $con->quote($_POST['password']);
        $cpassword = $con->quote($_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $stmt=$con->prepare("UPDATE users SET code = ?, password = ?  WHERE email = ?");                                      
            if($stmt->execute(array($code,$encpass,$email)) ){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: index.php');
    }
?>