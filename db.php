<?php
define("DB_SERVER", "localhost:3307");
define("DB_USER", "root");
define("DB_PASSWORD", "root");
define("DB_DATABASE", "quizdb");

$con = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE, "3307");
	if($con){
		//echo"connection";
	}
?>