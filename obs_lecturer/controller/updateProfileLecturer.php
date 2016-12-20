<?php session_start();
    
	include "../includes/config.php";
    include "../includes/functions.php";

	$user_token = $_SESSION["key"];
	$userName = $_SESSION["userName"];
	
	$lecturer_id = $_POST["lecturer_id"]; 
    $user_id = $_POST["user_id"]; 
	
	$user_url = "http://127.0.0.1:8000/users/".$user_id."/?format=json";
	$lecturer_url = "http://127.0.0.1:8000/lecturers/".$lecturer_id."/?format=json";
	
    $email = $_POST["email"];
    $phone = $_POST["phone"]; 
	
    $jsonUser["email"]= $email; 
    $jsonUser["username"]= $userName; 
    $jsonUser["id"]= $user_id; 
	
    $jsonLecturer["phone"]= $phone ; 
    $jsonLecturer["id"]= $lecturer_id ;  
    $jsonLecturer["user"]= $user_id ;   
	 	
	$userResponse = requestApi($user_token,$user_url,$jsonUser,"put");
	$lecturerResponse = requestApi($user_token,$lecturer_url,$jsonLecturer,"put");
		
?>