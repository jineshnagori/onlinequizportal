<?php
require('db.php');
extract($_POST);
$sql = "INSERT into contactus (name,email,message,created_date) VALUES('" . $name . "','" . $email . "','" . $message . "','" . date('Y-m-d') . "')";
$success = $con->query($sql);
if (!$success) {
    die("Couldn't enter data: ".$con->error);
}
echo "Thank You For Contacting Us ";
?>