<?php 
session_start(); 
require "includes/db.php";

if($_SESSION["username"] == "admin"){
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   		$booktitle = $connection_to_server->real_escape_string($_POST['title']);
   		$bookimage = $connection_to_server->real_escape_string('images/'.$_FILES['image']['name']);
   		$bookgenre = $connection_to_server->real_escape_string($_POST['genre']);
   		$bookauthor = $connection_to_server->real_escape_string($_POST['author']);
   	    $bookprice =  $_POST['price'];
   		$bookdescription =$connection_to_server->real_escape_string($_POST['description']);
   		if(preg_match("!image!", $_FILES['image']['type'])){
   			if(copy($_FILES['image']['tmp_name'], $bookimage))
   			{

   				$sql = "INSERT INTO Books (title, image, genre, author, price, description)"
                        . "VALUES ('$booktitle','$bookimage','$bookgenre', '$bookauthor','$bookprice','$bookdescription')";

       			 if ($connection_to_server->query($sql) === true){
                    $_SESSION['message'] = " Added book: $booktitle to the database!";	

   			}
   		}

   		
                   
                }
                else {
                    $_SESSION['message'] = 'Book could not be added to the database!';
                }
                $connection_to_server->close();    


   }
   
    }
    else {
    	header("location:home.php");
    }

?>

<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Add Book</h1>
    <form class="form" action="addbook.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="title" name="title" required />
      <input type="text" placeholder="genre" name="genre" required />
      <input type="text" placeholder="author" name="author" required />
      <input type="text" placeholder="price" name="price" required />
      <input type="text" placeholder="description" name="description" required />
      <div><label>Select your avatar: </label><input type="file" name="image" accept="image/*" required /></div>
      
      <input type="submit" value="add book" name="addbook" class="btn btn-block btn-primary" />
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <p><a href="logout.php">Log out</a> from system</p>
    </form>
  </div>
</div>