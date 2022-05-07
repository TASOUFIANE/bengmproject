<?php 
    ob_start();
    session_start();
    if(isset($_SESSION["username"])){        
    $pageTitle='';
    include 'connect.php';
    include 'includes/functions/functions.php'; 
    $stmt=$con->prepare("SELECT * FROM users WHERE id = ?  LIMIT 1");
    $id=$_SESSION["id"];
    $stmt->execute(array($id));
    $user=$stmt->fetch();         
             
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title><?php echo getTitle()?></title> 
    <style>
        .form-control{
                    
                    color: var(--text-color);
                    border-left: 0.3rem solid red;                 
                    background-color: var(--panel-color);
                }
                
    </style>
</head>
<body>

      <?php include 'includes/templates/navbar.php';?>
      
      <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" name="search" placeholder="Search here...">
                   
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>
                   <?php
                   
                   if(isset($_POST['submit']))
                   {
                       $id=$_POST['id'];
                       $user=$_POST['user'];
                       $pass=empty($_POST['newpass']) ? $_POST['oldpass']:password_hash($_POST['newpass'] , PASSWORD_DEFAULT);
                       $email=$_POST['email'];
                       $full=$_POST['name'];
                       $group=$_POST['group'];
                       if(strlen($user)<4 || strlen($user)>16 ){
                           echo '<div style="margin-top:20px;" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                       <p class="font-bold">Username can not be less than 4 characters and the maximum is 16 characters </p>            
                                 </div>'; 
                                 header("refresh:3;settings.php");}

                       else{
                           $stmt=$con->prepare("UPDATE users SET username =? ,email=?,password=?,Fullname=?,groupid=?  WHERE id =?");
                           $stmt->execute(array($user,$email,$pass,$full,$group,$id));
                           $msg=   '<div style="margin-top:25px;background-color: var(--panel-color);"  class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                       <p class="font-bold">رسالة استعلامية</p>
                                       <p class="text-md">العملية تمت بنجاح      </p>
                                    </div>';
                                       
                           redirectHome($msg,'back'); 
                            
                           }
                           
                   }
                   ?> 
                   
                   
                   
                   ?>

                               <div class="dash-content">
                                    <div class="overview">
                                        <div class="title">
                                            <i class="uil uil-edit-alt"></i>
                                            <span class="text">تعديل المعلومات الشخصية </span>
                                        </div>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $id;?>" />
                                            <input class="form-control" dir="rtl" type="text" name="user" placeholder="اسم االمستخدم" value="<?php echo $user['username'];?>" required autocomplete="off"><br><br>
                                            <input type="hidden" name ="oldpass" value="<?php echo $user['password'];?>"/>
                                            <input class="form-control" dir="rtl"  type="password" name="newpass" placeholder=" تغيير كلمة السر"   autocomplete="off"><br><br>
                                            <input class="form-control" dir="rtl" type="email" name="email" placeholder="بريد الالكتروني" value="<?php echo $user['email'];?>" required autocomplete="off"><br><br>
                                            <input class="form-control" dir="rtl" type="text" name="name" placeholder="الاسم الكامل" value="<?php echo $user['Fullname'];?>" required autocomplete="off"><br><br> 
                                            <button type="submit" name="submit" class="bg-violet-500 hover:bg-violet-600">
                                                <i class="uil uil-save"></i> حفظ
                                            </button>
                                        </form>
                                       
                                </div>  

       


    </section>

        
   
   <script src="js/script.js"></script>
</body>
</html>
<?php  }   
    else{ 
        header('Location:index.php');
        exit();
    }
    ob_end_flush();