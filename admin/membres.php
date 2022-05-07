<?php 
    ob_start();
    session_start();
    if(isset($_SESSION["username"])){
    $id=$_SESSION["id"];       
    $pageTitle='الاعضاء';
    include 'connect.php';
    include 'includes/functions/functions.php'; 
    $do= isset($_GET['do']) ? $_GET['do']: 'Manage';
             
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
                <input type="text" placeholder="Search here...">
            </div>
            
            <img src="images/profile.jpg" alt="">
        </div>
      <?php  if($do=='Manage'){
           
           $stmt=$con->prepare("SELECT * FROM users where groupid != 1 ");
           $stmt->execute();  
           $rows=$stmt->fetchAll();?>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-list-ul"></i>
                    <span class="text">قائمة الأعضاء</span>
                </div>
           
	
            </div>  
            <div class="bf-container bf-p-t-2 bf-p-b-2">
                <div class="bf-table-responsive ">
                            <table class="bf-table">
                            
                            <thead>
                                <tr class="first">
                                    
                                    <th>اسم المستخدم</th>
                                    <th>البريد الإلكتروني </th>
                                    <th>الاسم الكامل</th>
                                    <th>  الصنف</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                            <?php
                            foreach($rows as $row)
                                {?>
                                <tr>
                                    <td><?php echo $row["username"];?></td>
                                    <td><?php echo $row["email"];?></td>
                                    <td><?php echo$row["Fullname"];?></td>
                                    <td>عضو عادي</td>
                                    <td><?php echo $row["regdate"];?> </td> 
                                    
                                    <?php
                                     echo
                                     "<td>
                                             <a href='membres.php?do=Delete&id=".$row['id']."' style='text-decoration:none;color: var(--text-color);'><i class='uil uil-edit'></i> حذف</a>         
                                             <a href='membres.php?do=Edit&id=".$row['id']."' style='text-decoration:none;color: var(--text-color);'><i class='uil uil-trash-alt '></i> | تعديل </a>
                                      </td>";?>              
                                </tr>
                                <?php } ?>  
                                
                            </tbody>

                        
                        </table>
                        <br>
                        <button type="submit" class="bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 ">
                              <a href="membres.php?do=Add" style="text-decoration:none; color:black"> <i class="uil uil-plus-circle"></i> اضافة</a>
                        </button>
                </div>

            </div>         
        </div>
        <?php }elseif($do=='Add'){
            
            if(isset($_POST['submit']))
            {
                    
                    $user=$_POST['user'];
                    $pass=password_hash($_POST['pass'] , PASSWORD_DEFAULT);
                    $email=$_POST['email'];
                    $full=$_POST['name'];
                    
                    if(strlen($user)<4 || strlen($user)>16 )
                        echo '<div style="margin-top:20px;" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                    <p class="font-bold">Username can not be less than 4 characters and the maximum is 16 characters </p>            
                              </div>';
                    
                    else
                    $check=checkitem("username","users",$user);
                    if($check == 1){
                        
                        echo '<div style="margin-top:20px;" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                <p class="font-bold">Ce nom d utilisateur est déjà utilisé </p>            
                              </div>';
                             
                    }else{
                    $stmt=$con->prepare("INSERT into users (username,password,email,Fullname,regdate) VALUES (:zuser,:zpass,:zemail,:zfull,now())");
                    $stmt->execute(array(':zuser'=>$user,':zpass'=>$pass,':zemail'=>$email,':zfull'=>$full));
                    echo   
                            '<br><div style="margin-top:25px;background-color: var(--panel-color);"  class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                <p class="font-bold">رسالة استعلامية</p>
                                <p class="text-md">oالعملية تمت بنجاح</p>
                            </div>';
                    }
                    
                        header("refresh:3;url=membres.php?do=Add");
            } 
           ?>
            <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-plus-circle"></i>
                    <span class="text">  إضافة عضو</span>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                     <input class="form-control"  dir="rtl" type="text" name="user" placeholder="اسم المستخدم" required><br><br>
                     <input class="form-control"  dir="rtl" type="password" name="pass" placeholder="كلمه السر" required><br><br>
                     <input class="form-control"  dir="rtl"  type="email" name="email" placeholder="بريد الالكتروني" required><br><br>
                     <input class="form-control"  dir="rtl" type="text" name="name" placeholder="الاسم الكامل" required><br><br>
                   
                     <input  id="1" type="radio" name="group" value="1" checked>
                     <label for="1" style="color: var(--text-color);"> ادمين </label>  <br>
                     <input id="0" type="radio" name="group" value="0"  >
                     <label for="1" style="color: var(--text-color);">عضو عادي</label><br><br>
                     <button type="submit" name="submit" class="bg-violet-500 hover:bg-violet-600  ">
                              <i class="uil uil-plus-circle"></i> اضافة
                    </button>
                </form>
            </div>  
                 
         <?php }elseif($do=='Edit'){
                            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']):0;// check if user id is numeric
                            $stmt=$con->prepare("SELECT * FROM users WHERE id = ?  LIMIT 1");
                            $stmt->execute(array($id));
                            $user=$stmt->fetch();
                            $count=$stmt->rowCount(); 
                            if( $count>0){ 
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
                                              header("refresh:3;url=membres.php?do=Edit");}

                                    else{
                                        $stmt=$con->prepare("UPDATE users SET username =? ,email=?,password=?,Fullname=?,groupid=?  WHERE id =?");
                                        $stmt->execute(array($user,$email,$pass,$full,$group,$id));
                                        $msg=   '<div style="margin-top:25px;background-color: var(--panel-color);"  class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                                    <p class="font-bold">رسالة استعلامية</p>
                                                    <p class="text-md">oالعملية تمت بنجاح</p>
                                                 </div>';
                                                    
                                        redirectHome($msg,'back'); 
                                         
                                        }
                                        
                                }
                                ?> 
                                <div class="dash-content">
                                    <div class="overview">
                                        <div class="title">
                                            <i class="uil uil-plus-circle"></i>
                                            <span class="text">تعديل عضو</span>
                                        </div>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $id;?>" />
                                            <input class="form-control" dir="rtl" type="text" name="user" placeholder="اسم االمستخدم" value="<?php echo $user['username'];?>" required autocomplete="off"><br><br>
                                            <input type="hidden" name ="oldpass" value="<?php echo $user['password'];?>"/>
                                            <input class="form-control" dir="rtl"  type="password" name="newpass" placeholder="كلمه السر"   autocomplete="off"><br><br>
                                            <input class="form-control" dir="rtl" type="email" name="email" placeholder="بريد الالكتروني" value="<?php echo $user['email'];?>" required autocomplete="off"><br><br>
                                            <input class="form-control" dir="rtl" type="text" name="name" placeholder="الاسم الكامل" value="<?php echo $user['Fullname'];?>" required autocomplete="off"><br><br> 
                                            <input  id="1" type="radio"  name="group" value="1" <?php if($user['groupid']==1)  echo "checked"; ?> >
                                            <label for="1" style="color: var(--text-color);"> ادمين </label>  <br>
                                            <input id="0" type="radio" name="group" value="0"  <?php if($user['groupid']==0)  echo "checked"; ?>>
                                            <label for="1" style="color: var(--text-color);">عضو عادي</label><br><br>      
                                            <button type="submit" name="submit" class="bg-violet-500 hover:bg-violet-600">
                                                    <i class="uil uil-plus-circle"></i> حفظ
                                            </button>
                                        </form>
                                       
                                </div>  
                     

         <?php } 
                      }elseif($do=='Delete'){

                            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']):0;// check if user id is numeric      
                            $check=checkitem("id","users",$id);
                            if($check>0){
                                $stmt=$con->prepare("DELETE FROM users WHERE id=?");
                                $stmt->execute(array($id));
                                $msg= '<div style="margin-top:25px;background-color: var(--panel-color);"  class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">                                                                       
                                             <p class="font-bold">رسالة استعلامية</p>
                                              <p class="text-md">العملية تمت بنجاح</p>
                                        </div>';
                                redirectHome($msg,'back');
                            }else{
                        
                            $msg = '<div style="margin-top:20px;" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                        <p class="font-bold">Error </p>
                                        <p>Ce membre n existe pas</p>
                                    </div>';
                                redirectHome($msg);
                            }

                  
         }?>


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