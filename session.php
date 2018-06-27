<?php
session_start();
require "includes/db.php";
$_SESSION['message'] = '';


if(!$connection_to_server)
{
echo ("db connection failed!");
die ('Could not connect to the database server' . mysqli_connect_error());
}

   $user_check = $_SESSION['username'];
   
   $ses_sql = mysqli_query($connection_to_server,"select username from Users where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['username'])){
      header("location:home.php");
   }