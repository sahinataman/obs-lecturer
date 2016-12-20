<?php session_start();
    
	include "../includes/config.php";
    include "../includes/functions.php";

	$user_token = $_SESSION["key"];
	$userName = $_SESSION["userName"];
	$user_id = $_POST["user_id"]; 
	
	$user_url = "http://127.0.0.1:8000/users/".$user_id."/?format=json";
	
	$old_password=$_POST["$old_password"];
	$new_password=$_POST["$new_password1"];
	
	$jsonUser["id"] = $user_id;
	$jsonUser["username"] = $userName;
	$jsonUser["password"] = $new_password;
    $jsonUser["email"] = $email;  
	
	//$userResponse = requestApi($user_token,$user_url,$jsonUser,"put");
	
	//echo $old_password ." ". .$new_password
	print_r($userResponse);
	 
?>