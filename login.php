<?php
session_start();
require "includes/db.php";

if(isset($_SESSION["username"])){
	// вывод "Session is set"; // в целях проверки
	header("Location:book.php");
	}


if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($connection_to_server,$_POST['username']);
      $mypassword = md5(mysqli_real_escape_string($connection_to_server,$_POST['password'])); 
      
      $sql = "SELECT * FROM Users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($connection_to_server,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
       
         $_SESSION['username'] = $myusername;
         
         header("location: book.php");
      }else {
         echo  "Your Login Name or Password is invalid";
      }
   }
 
	
   

?>

<!DOCTYPE html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <title>Registration</title>
   <link rel="stylesheet" type="text/css" href="styles/style.css">
   <link rel="stylesheet" type="text/css" href="styles/header.css">
   <link rel="stylesheet" type="text/css" href="styles/logo.css">

   <link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

   <?php require "header.php"?>

   <div class="body-content">
      
         
      <form class="form" action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="module">
         <h1>Login</h1>
       <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
       <input type="text" placeholder="User Name" name="username" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required /><br>
      <input type="submit" value="Login" name="register" class="btn btn-block btn-primary" />
       <p><a href="register.php">Register</a> new user</p>
    </form>
  </div>
</div>
<script src="script.js"></script>
   </body>