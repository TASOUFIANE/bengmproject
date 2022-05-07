<?php
require 'db_connection.php';
// POST DATA
$data = json_decode(file_get_contents("php://input"));
if(isset($data->email)
	&& isset($data->googleId) 
	&& isset($data->name) 
	&& !empty(trim($data->email)) 
	&& !empty(trim($data->googleId))
	&& !empty(trim($data->name))
	){

    $email = mysqli_real_escape_string($db_conn, trim($data->email));
    $familyName = mysqli_real_escape_string($db_conn, trim($data->familyName));
    $givenName = mysqli_real_escape_string($db_conn, trim($data->givenName));
    $googleId = mysqli_real_escape_string($db_conn, trim($data->googleId));
    $imageUrl = mysqli_real_escape_string($db_conn, trim($data->imageUrl));
    $name = mysqli_real_escape_string($db_conn, trim($data->name));
  
		$login = mysqli_query($db_conn,"SELECT * FROM users WHERE email='$email' AND password='$googleId' ");
		
		if(mysqli_num_rows($login) > 0){
			$row = mysqli_fetch_array($login);
			echo json_encode(["success"=>true,"usersid"=>$row['users_id']]);
			return;
		}
		else {
			$date = date('Y-m-d H:i:s');
			$insertUser = mysqli_query($db_conn,"INSERT INTO `users`(name,email,password,givenName,imageUrl,familyName,date) VALUES('$name','$email','$googleId','$givenName','$imageUrl','$familyName','$date')");
			if($insertUser){
				$last_id = mysqli_insert_id($db_conn);
				echo json_encode(["success"=>true,"usersid"=>$last_id]);
				return;
			}else{
				echo json_encode(["success"=>false,"msg"=>"User Not Inserted!"]);
				return;
			}
		}
	}
?>