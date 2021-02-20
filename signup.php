<?php
session_start();
include "db.php";
	$name = $_POST['name']; 
	$username = $_POST['user'];
	$password = $_POST['pass'];
	

	// echo $username;
	// echo $password;

	$check = "select * from quizregistration where user='$username' && pass='$password' ";
	$resultcheck = mysqli_query($con,$check);	

	 $row = mysqli_num_rows($resultcheck);
			if($row == 1){
				echo "Username already registered";			
				
			}	else{

				$q = "insert into quizregistration(name, user, pass) VALUES('$name','$username','$password')"  ;
				$result = mysqli_query($con,$q);
if(!$result){
	die('Error: ' . mysqli_error($con));
			echo "  database is not connected";
				}
	else {	
		header('location: login.html');
		exit();
		echo "query inserted into database";
		}  
			}

?>
