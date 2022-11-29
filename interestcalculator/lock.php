<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($con,"select username from user_master where username='$user_check' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session=$row['username'];
if(!isset($login_session))
{
header("Location: index.php");
}
?>