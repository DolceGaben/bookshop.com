<?php 
session_start(); 
require "includes/db.php";
$_SESSION['message'] = '';

if(!isset($_SESSION["username"])){
   
     header("location:form.php");
    
    }
if($_SESSION["username"] == "admin"){

    header("location:addbook.php");

}

?>

<head>
    <link rel="stylesheet" href="form.css">
</head>
<body>


<div class="body content">
    <div class="welcome">
       
       <?php 
       echo "Hallo"; ?>

        </div>
        </div>
             <p><a href="logout.php">Log</a> out</p>
        </div>
    </div>
</div>
</body>