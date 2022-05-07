<?php 
    ob_start();
    session_start();
    if(isset($_SESSION["username"])){        
    $pageTitle='المحتوى';
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
                .file-input__input {
                            width: 0.1px;
                            height: 0.1px;
                            opacity: 0;
                            overflow: hidden;
                            position: absolute;
                            z-index: -1;
                        
                        }
                        
                        .file-input__label {
                            cursor: pointer;
                            display: inline-flex;
                            align-items: center;
                            border-radius: 4px;
                            font-size: 14px;
                            font-weight: 600;
                            color: #fff;
                            font-size: 14px;
                            padding: 10px 12px;
                            background-color: #242526;
                            box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
                            
                        }
                        
                        .file-input__label svg {
                            height: 16px;
                            margin-right: 4px;
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
      <?php  if($do=='Manage'){
           
           $stmt=$con->prepare("SELECT * FROM articles ");
           $stmt->execute();  
           $rows=$stmt->fetchAll();?>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-list-ul"></i>
                    <span class="text">قائمة المقالات</span>
                </div>
            </div>  
            <div class="bf-container bf-p-t-1 bf-p-b-2">
                <div class="bf-table-responsive ">
                            <table class="bf-table">
                            <thead>
                                <tr class="first">
                                    
                                    <th>العنوان</th>
                                    <th>المحتوى</th>
                                    <th> الموضع</th>                                   
                                    <th>تاريخ النشر</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                            <?php
                            foreach($rows as $row)
                                {?>
                                <tr>
                                
                                    <td><?php echo $row["titre"];?></td>
                                    <td><?php echo substr($row["contenu"],1,20);?></td>
                                    <td><?php echo$row["emplacement"];?></td>
                                    <td><?php echo $row["date_article"];?></td>
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
                        <button class="bg-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 ">
                           <a href="articles.php?do=Add" style="text-decoration:none;color:black"><i class="uil uil-plus-circle"></i> اضافة</a>
                        </button>
                </div>

            </div>         
        </div>
        <?php }elseif($do=='Add'){
            
            if(isset($_POST['submit']))
            {
                    extract($_POST);
                    $titre=$_POST['titre'];
                    $contenu=$_POST['contenu'];
                    $emplacement=$_POST['emp'];
                    $content_dir='images/';
                    $content_dir='../layout/img/';
                    $tmp_file=$_FILES['img']['tmp_name'];
                    if(!is_uploaded_file($tmp_file)){ exit('le fichier est introuvable');}
                    $type_file=$_FILES['img']['type'];
                    if(!strstr($type_file,'jpeg') && !strstr($type_file,'png')){exit('ce fichier n est pas une image');}
                    $name_file=time().'.jpg';
                    if(!move_uploaded_file($tmp_file,$content_dir.$name_file)){ exit('impossible de copier le fichier');}
                    if((strcmp($emplacement,"slide")==0)|| (strcmp($emplacement,"blog")==0)){
                    
                    $stmt=$con->prepare("INSERT into articles (titre,contenu,emplacement,image,date_article) VALUES (:ztitre,:zcontenu,:zemplacement,:zimage,now())");
                    $stmt->execute(array(':ztitre'=>$titre,':zcontenu'=>$contenu,':zemplacement'=>$emplacement,':zimage'=>$name_file));
                    echo   
                            '<br><div style="margin-top:25px;background-color: var(--panel-color);"  class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                    <p class="font-bold">رسالة استعلامية</p>
                                    <p class="text-md">العملية تمت بنجاح</p>
                           </div>';}
                    else 
                         echo     '<div style="margin-top:20px;" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                        <p class="font-bold">lemplacement est inccorect </p>
                                        <p>Emplacement incorrect</p>
                                    </div>';
                    header("refresh:3;url=articles.php?do=Add");}
           ?>
            <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-plus-circle"></i>
                    <span class="text">إضافة مقال</span>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                     <input class="form-control"  dir="rtl" type="text" name="titre" placeholder="العنوان" required><br><br>
                     <input class="form-control"  dir="rtl" type="text" name="emp" placeholder=" سلايد | مدونة" required><br><br>
                     <textarea class="form-control" dir="rtl"name="contenu" placeholder="محتوى المقال"></textarea><br><br>
                     <input  id="1" type="radio" name="group" value="1" checked>
                     <label for="1" style="color: var(--text-color);"> حجب المقال </label>  <br>
                     <input id="0" type="radio" name="group" value="0">
                     <label for="1" style="color: var(--text-color);"> عرض المقال</label><br><br>
                   
                     <div class="file-input">
                        <input  type="file" name="img" id="file-input" class="file-input__input" required/>
                        <label class="file-input__label" for="file-input">
                            <svg
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fas"
                            data-icon="upload"
                            class="svg-inline--fa fa-upload fa-w-16"
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                            >
                            <path
                                fill="currentColor"
                                d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                            ></path>
                            </svg>
                            <span>رفع صورة</span>
                        </label>
                    </div> <br>
                     <button style="background-color:#B3B3B3;" type="submit" name="submit"  ><i class="uil uil-plus-circle"></i> اضافة</button>
                </form>
            </div>  
                 
         <?php }elseif($do=='Edit'){
                            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']):0;// check if user id is numeric
                            $stmt=$con->prepare("SELECT * FROM articles WHERE id = ?  LIMIT 1");
                            $stmt->execute(array($id));
                            $article=$stmt->fetch();
                            $count=$stmt->rowCount(); 
                            if( $count>0){ 
                                if(isset($_POST['submit']))
                                {
                                        extract($_POST);
                                        $titre=$_POST['titre'];
                                        $contenu=$_POST['contenu'];
                                        $emplacement=$_POST['emp'];
                                        $content_dir='images/';
                                        $content_dir='../layout/img/';
                                        $tmp_file=$_FILES['img']['tmp_name'];
                                        if(!is_uploaded_file($tmp_file)){ exit('le fichier est introuvable');}
                                        $type_file=$_FILES['img']['type'];
                                        if(!strstr($type_file,'jpeg') && !strstr($type_file,'png')){exit('ce fichier n est pas une image');}
                                        $name_file=time().'.jpg';
                                        if(!move_uploaded_file($tmp_file,$content_dir.$name_file)){ exit('impossible de copier le fichier');}
                                        if((strcmp($emplacement,"slide")==0)|| (strcmp($emplacement,"blog")==0)) { 
                                        $stmt=$con->prepare("UPDATE articles SET titre=?,contenu=?,emplacement=?,image=? where id=?");
                                        $stmt->execute(array($titre,$contenu,$emplacement,$name_file,$id));
                                        $msg=  '<div style="margin-top:25px;background-color: var(--panel-color);"  class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                                        <p class="font-bold">رسالة استعلامية</p>
                                                        <p class="text-md">العملية تمت بنجاح</p>
                                                </div>'; 
                                               
                                             redirectHome($msg,'back'); 
                                             }
                                        else 
                                             echo     '<div style="margin-top:20px;" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                                            <p class="font-bold">lemplacement est inccorect </p>
                                                            <p>Emplacement incorrect</p>
                                                        </div>';
                                                 header("refresh:2;url=articles.php?do=Edit"); }
                                ?> 
                                <div class="dash-content">
                                    <div class="overview">
                                        <div class="title">
                                            <i class="uil uil-plus-circle"></i>
                                            <span class="text">تعديل مقال</span>
                                        </div>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $id;?>"/>
                                            <input class="form-control" type="text" name="titre" placeholder="العنوان" value="<?php echo $article['titre'];?>" required><br><br>
                                            <input class="form-control" type="text" name="emp" placeholder="سلايد | المدونة " value="<?php echo $article['emplacement'];?>" required><br><br>
                                            <textarea class="form-control" name="contenu"  placeholder="محتوى المقال"><?php echo $article['contenu'];?></textarea><br><br>
                                            <input  id="1" type="radio" name="group" value="0" <?php if($article['visibility']==0)  echo "checked"; ?>>
                                            <label for="1" style="color: var(--text-color);" > حجب المقال </label>  <br>
                                            <input id="0" type="radio" name="group" value="1"<?php if($article['visibility']==1)  echo "checked"; ?>>
                                            <label for="1" style="color: var(--text-color);"> عرض المقال</label><br><br>
                                        
                                            <div class="file-input">
                                                <input  type="file" name="img" id="file-input" class="file-input__input" required/>
                                                <label class="file-input__label" for="file-input">
                                                    <svg
                                                    aria-hidden="true"
                                                    focusable="false"
                                                    data-prefix="fas"
                                                    data-icon="upload"
                                                    class="svg-inline--fa fa-upload fa-w-16"
                                                    role="img"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512"
                                                    >
                                                    <path
                                                        fill="currentColor"
                                                        d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
                                                    ></path>
                                                    </svg>
                                                    <span>رفع صورة</span>
                                                </label>
                                            </div> <br>
                                            <button style="background-color:#B3B3B3;" type="submit" name="submit"  ><i class="uil uil-save"></i>  حفظ </button>
                                        </form>
                                </div>  
                     

         <?php } 
                      }elseif($do=='Delete'){

                            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']):0;// check if user id is numeric      
                            $check=checkitem("id","articles",$id);
                            if($check>0){
                                $stmt=$con->prepare("DELETE FROM articles WHERE id=?");
                                $stmt->execute(array($id));
                                $msg= '<div style="margin-top:25px;background-color: var(--panel-color);"  class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                        <p class="font-bold">رسالة استعلامية</p>
                                        <p class="text-md">العملية تمت بنجاح</p>
                                        </div>';
                                redirectHome($msg,'back');
                            }else{
                        
                            $msg = '<div style="margin-top:20px;" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                        <p class="font-bold">Error </p>
                                        <p>There Category ID is not exist</p>
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