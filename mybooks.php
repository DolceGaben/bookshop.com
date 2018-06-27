<?php
session_start();
require "includes/db.php";

if(!isset($_SESSION["username"])){
   
     header("location:form.php");
    
    }
?>
<link rel="stylesheet" href="form.css">
<div class="body content">
    <div class="welcome">
       
        <h2>Добро пожаловать, <span> <?= $_SESSION['username'] ?></span></h2>!
        <?php
        //Select queries return a resultset
        $current_user = $_SESSION["username"];
        $sql = "SELECT book_id, title, image, genre, author, price, description FROM Books as bk INNER JOIN MyBooks as mb ON bk.id = mb.book_id WHERE user_id = '$current_user' ";
        $result = $connection_to_server->query($sql); //$result = mysqli_result object
        //var_dump($result);
        ?>
   
        <div>
            <span>All My Books:</span>
        <?php
        while($row = $result->fetch_assoc()){ //returns associative array of fetched row
          
            echo "<div class='userlist'><span>$row[book_id]</span><br />";
            echo "<img src='$row[image]'></div>";
        }
        ?>  

        </div>
        </div>
             <p><a href="logout.php">Log</a> out</p>
        </div>
    </div>
</div>