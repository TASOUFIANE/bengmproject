<?php 
    session_start();
    if(isset($_SESSION["username"])){        
    $pageTitle='التبرعات';
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
           
           $stmt=$con->prepare("SELECT * FROM  payments ");
           $stmt->execute();  
           $rows=$stmt->fetchAll();?>
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-list-ul"></i>
                    <span class="text">قائمة التبرعات</span>
                </div>
           
	
            </div>  
            <div class="bf-container bf-p-t-2 bf-p-b-2">
                <div class="bf-table-responsive ">
                            <table class="bf-table">
                            
                            <thead>
                                <tr class="first">
                                    <th>الإ سم</th>                                   
                                    <th>قيمة التبرع</th>
                                    <th>تاريخ</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                                            <?php
                            foreach($rows as $row)
                                {?>
                                <tr>
                                    <td><?php echo $row["name"];?></td>
                                    <td><?php echo $row["payment_amount"];?> EURO</td>
                                    <td><?php echo $row["createdtime"];?></td>
                                    <?php
                                     echo
                                     "<td>                                                     
                                             <a href='donations.php?do=Delete&id=".$row['id']."' style='text-decoration:none;color: var(--text-color);'><i class='uil uil-trash-alt'></i>  حذف  </a>
                                      </td>";?>              
                                </tr>
                                <?php } ?>  
                                
                            </tbody>

                        
                        </table>
                        <br>
                </div>

            </div>         
        </div>             
                 
    <?php
                      }elseif($do=='Delete'){

                            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']):0;// check if user id is numeric      
                            $check=checkitem("id","payments",$id);
                            if($check>0){
                                $stmt=$con->prepare("DELETE FROM payments WHERE id=?");
                                $stmt->execute(array($id));
                                $msg= '<br><div style="margin-top:25px;background-color: var(--panel-color);"  class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                                        <p class="font-bold">Informational message</p>
                                        <p class="text-md">cette donation a été supprimé</p>
                                        </div>';
                                redirectHome($msg,'back');
                            }else{
                        
                            $msg = '<div style="margin-top:20px;" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                        <p class="font-bold">Error </p>
                                        <p>Ce donation n existe pas</p>
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