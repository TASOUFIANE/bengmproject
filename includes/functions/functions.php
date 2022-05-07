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
         $link='previous page';}
      else{
          $link='Home page';
       $url='index.php';}
     } 
    echo "<br/>";
    echo "<br/>";
    echo "<div class='container'>";
    echo $Themsg;
    echo "<div class='alert alert-info'>You will be Redirected to $link after $seconds seconds</div>";
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
