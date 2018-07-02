<?php
session_start();
require "includes/db.php";
require "includes/checklogin.php";
 


    $id = $connection_to_server->real_escape_string($_GET['id']);
    $current_user = $_SESSION["username"];

	  $sql = "INSERT INTO MyBooks (id, user_id, book_id) "
                        . " VALUES (NULL, '$current_user', '$id')" ;

		 if ($connection_to_server->query($sql) === true){

                    header("location: book.php");

                  
                }
                else {
                    echo "error";
                }


                $connection_to_server->close(); 

  	  
    
?>