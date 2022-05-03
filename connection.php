<?php

$db=mysqli_connect("localhost", "root", "", "lms"); /* servername, username, password, database name*/

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>