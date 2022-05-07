<?php 
    ob_start();
    session_start();
    if(isset($_SESSION["username"])){        
        $pageTitle='لوحة التحكم';
        include 'connect.php';
        include 'includes/functions/functions.php'; 
        
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/dashboard.css">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title><?php echo getTitle()?></title> 
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

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">لوحة الإعدادات</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-users-alt"></i>
                        <span class="text">عدد الاعضاء</span>
                        <span class="number"><?php echo CountItems("id","users"); ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-dollar-sign-alt"></i>
                        <span class="text">إجمالي التبرع</span>
                        <span class="number"><?php echo SumItems("payment_amount","payments"); ?> euro</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-file-heart"></i>
                        <span class="text">إجمالي المقالات    </span>
                        <span class="number"><?php echo CountItems("id","articles"); ?></span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">النشاط الأخير</span>
                </div>
                
                <div class="activity-data">
                  <ul class="list-group" style="width:60%">
                    <li class="list-group-item active text-center" aria-current="true" style="font-size:18px" >اخر 5 متبرعين  </li>
                    <?php $thelatsetdonor=getLatest("*","payments","id");
                         foreach($thelatsetdonor as $donor){?>
                    <li class="list-group-item" style="background-color: var(--panel-color); color: var(--text-color);font-size:15px"><?php echo $donor["name"].' : '.$donor["payment_amount"] .' $';?></li>
                    <?php } ?>                    
                  </ul>
                </div>
            </div>
        </div>
    </section>
    
   <script src="js/script.js"></script>
</body>
</html>
  <?php      
    }   
    else{ echo 'You are not allowed to view this page';
        header('Location:index.php');
        exit();
    }
    ob_end_flush();
    ?>