<?php
session_start();
require "includes/db.php";

$_SESSION['message'] = '';


if(isset($_SESSION["username"])){
	// вывод "Session is set"; // в целях проверки
	header("Location: welcome.php");
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
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
       //  session_register("myusername");
         $_SESSION['username'] = $myusername;
         
         header("location: welcome.php");
      }else {
         echo  "Your Login Name or Password is invalid";
      }
   }
 
	
   

?>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Signup</h1>
    <form class="form" action="signup.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      
      <input type="submit" value="Log in" name="submit" class="btn btn-block btn-primary" />
       <p><a href="form.php">Register</a> new user</p>
    </form>
  </div>
</div>