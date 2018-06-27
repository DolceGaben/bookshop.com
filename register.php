<?php
session_start();

require "includes/db.php";
$_SESSION['message'] = '';


if(isset($_SESSION["username"])){
  // вывод "Session is set"; // в целях проверки
  header("Location: welcome.php");
  }
//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) {
        
        //set all the post variables
        $username = $connection_to_server->real_escape_string($_POST['username']);
        $email = $connection_to_server->real_escape_string($_POST['email']);
        $password = md5($_POST['password']); //md5 has password for security
        //  $password = $connection_to_server->real_escape_string($_POST['password']);

                
                //set session variables
                $_SESSION['username'] = $username;
              
                //insert user data into database
                $sql = "INSERT INTO Users (username, email, password) "
                        . "VALUES ('$username', '$email', '$password')";
                
                //if the query is successsful, redirect to welcome.php page, done!
                if ($connection_to_server->query($sql) === true){
                    $_SESSION['message'] = "Registration succesful! Added $username to the database!";
                    header("location: welcome.php");
                }
                else {
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                $mysqli->close();          
            }
            else {
        $_SESSION['message'] = 'Two passwords do not match!';
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
			 <a href="home_test.php"><i class="fa fa-home"></i> Home</a>
			 <a href="#"><i class="fa fa-book"></i> Books</a>
			  <a href="#"><i class="fa fa-bookmark"></i> My Books</a>
			 <a href="#"><i class="fa fa-question-circle"></i> About</a>
			 <a href="#" id = "menu" class="menu_icon"><i class="fa fa-navicon"></i></a>
			
			</div>
		</nav>
	</header>

	<div class="body-content">
  		
   	 	
    	<form class="form" action="register.php" method="post" enctype="multipart/form-data" autocomplete="off">
     	<div class="module">
     		<h1>Create an account</h1>
     	 <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
     	 <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required /><br>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
       <p><a href="login.php">Login</a> registred user</p>
    </form>
  </div>
</div>
<script src="script.js"></script>
	</body>