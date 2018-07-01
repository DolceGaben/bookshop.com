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
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
       //  session_register("myusername");
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
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" type="text/css" href="styles/header.css">
   <link rel="stylesheet" type="text/css" href="styles/logo.css">

   <link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
   <header>
      <!--<div class="store_logo" id="logo">&#9900 Book Mag!c Store &#9900</div> -->
      <div class="cssload-preloader">
      <span>M</span>
      <span>a</span>
      <span>g</span>
      <span>!</span>
      <span>c</span>
      <span> </span>
      <span>B</span>
      <span>o</span>
      <span>o</span>
      <span>k</span>
      <span> </span>
      <span>S</span>
      <span>h</span>
      <span>o</span>
      <span>p</span>

</div>
      <nav>
         <div class="navigationpanel" id="mynavigationpanel">
          <a href="home.php"><i class="fa fa-home"></i> Home</a>
          <a href="#book.php"><i class="fa fa-book"></i> Books</a>
           <a href="#"><i class="fa fa-bookmark"></i> My Books</a>
          <a href="home.php#about"><i class="fa fa-question-circle"></i> About</a>
          <a href="#" id = "menu" class="menu_icon"><i class="fa fa-navicon"></i></a>
         
         </div>
      </nav>
   </header>

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