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
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="email" placeholder="Email" name="email" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
       <p><a href="signup.php">Login</a> registred user</p>
    </form>
  </div>
</div>

