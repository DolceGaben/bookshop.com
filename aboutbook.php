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
             <a href="book.php"><i class="fa fa-book"></i> Books</a>
              <a href="mybooks.php"><i class="fa fa-bookmark"></i> My Books</a>
             <a href="home.php#about"><i class="fa fa-question-circle"></i> About</a>
             <a href="#" id = "menu" class="menu_icon"><i class="fa fa-navicon"></i></a>
            
            </div>
        </nav>
    </header>
    <main>

        <?php
        $id = $connection_to_server->real_escape_string($_GET['id']);
        $sql = "SELECT * FROM Books WHERE id ='$id'";
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
                            <div><p>Description: <?php echo $book['description'];?></p></div>


                            

                        
                        </div>
                    </div>

            </div>
            <?php
            }
            ?>
        

            
    </main>
    </body>
