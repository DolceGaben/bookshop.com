<?php

$connection_to_server = new mysqli("localhost", "root","","bookshop");
if(!$connection_to_server)
{
echo ("db connection failed!");
die ('Could not connect to the database server' . mysqli_connect_error());
}
?>