<?php
session_start();
require "includes/db.php";
require "includes/checklogin.php";
  	

    
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>BookMag!c</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/header.css">
	<link rel="stylesheet" type="text/css" href="styles/logo.css">

	<link href="https://fonts.googleapis.com/css?family=IM+Fell+English+SC" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
		<?php require "header.php"?>
		
	<main>

		<?php
        $sql = "SELECT * FROM Books";
        $result = $connection_to_server->query($sql); 
        ?>


        <?php

        	while ($book = mysqli_fetch_assoc($result) )
        	 {

        	?>

        	<div class="main-books">
            		<div class="block-book">
                		<div class="book-image">
                			<img src=<?php echo $book['image']; ?> alt="book_ab">
                		</div>
                		<div class="book-content">
                			<div><p>Title: <?php echo $book['title']; ?></p></div><br>
                			<div><p>Genre: <?php echo $book['genre'];?></p></div><br>
                			<div><p>Author: <?php echo $book['author'];?></p></div><br>
                			<div><p>Price: <?php echo $book['price'];?></p></div><br>
                			 <a href="buybook.php?id=<?php echo $book['id']; ?>">add</a><br>
                			 <a href="aboutbook.php?id=<?php echo $book['id']; ?>">more..</a>

                			

                		
                		</div>
            		</div>

        	</div>
        	<?php
        	}
        	?>
		

        	
	</main>
	</body>
