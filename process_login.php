<?php
session_start();
$con = mysqli_connect("localhost", "taylorho", "wildbean44", "taylorho_weapon");
include 'connection.php';

$user = trim($_POST['username']);
$pass = trim($_POST['password']);

$login_query = "SELECT password FROM customers WHERE Username ='".   $user."'";
$login_result = mysqli_query($con, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['password'];
$verify = password_verify($pass, $hash);
if($verify) {
    $_SESSION['logged_in'] = 1;
    header("Location: index.php");
}
else{
    header("Location: login.php");
}
?>


