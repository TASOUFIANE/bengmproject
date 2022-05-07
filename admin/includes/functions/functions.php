<?php 
//titel of page
function getTitle(){
    global $pageTitle;
    if(isset($pageTitle)){
       echo $pageTitle;
    }else echo 'Default';
}
//redirect function
function redirectHome($Themsg,$url=NULL,$seconds=3){
     if($url==NULL){
     $url='index.php';
     $link='Home page';}
     else{
         if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
         $url=$_SERVER['HTTP_REFERER'];
         $link='الصفحة السابقة';}
      else{
          $link='الصفحة الرئيسية';
       $url='index.php';}
     } 
    echo "<br/>";
    echo "<br/>";
    echo "<div class='container'>";
    echo $Themsg;
   
    echo "<div style='margin-top:25px;background-color: var(--panel-color);'  class='bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3' role='alert'>                                        
                                        <p class='text-md'>    سيتم إعادة  توجيهك إلى  </p>
                                        <p class='text-md'>   $link </p>
                                        <p class='text-md'>  بعد $seconds  ثواني   </p>
                                        </div>";
    echo "</div>";
    header("refresh:$seconds;url=$url");
    exit();
}

function checkitem($select,$table,$valeur){
    global $con;
   $stmt=$con->prepare("SELECT $select FROM $table WHERE $select=?");
   $stmt->execute(array($valeur));
   $count=$stmt->rowCount();
  
     return  $count;
   
}
/*$item: numbers of members or items or comments*/
function CountItems($item,$table){
    global $con;
    $stmt=$con->prepare("SELECT COUNT($item) FROM $table");
    $stmt->execute();
    return $stmt->fetchColumn();
}
function getLatest($select,$table,$proprety){
    global $con;
    $stmt=$con->prepare("SELECT $select from $table ORDER BY $proprety DESC Limit 5 ");
    $stmt->execute();
    $rows=$stmt->fetchAll();
    return $rows;
}
function SumItems($item,$table){
    global $con;
    $stmt=$con->prepare("SELECT sum($item) FROM $table");
    $stmt->execute();
    return $stmt->fetchColumn();
}