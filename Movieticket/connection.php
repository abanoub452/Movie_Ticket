<?php
$server = "localhost";
$username = "root";
$password ="";
$dbname ="movie_ticket";
$con = mysqli_connect($server, $username,$password, $dbname );
if($con)
{
    echo("Connected");
}

?>