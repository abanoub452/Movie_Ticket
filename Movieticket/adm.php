<?php
 include('connection.php');
 session_start();
 if(!isset($_SESSION['role']))
{
  header('location:login.html');
}
if($_SESSION['role']!= "admin")
{
    header('location:login.html');
}
 $id = $_GET['id'];
 $stat = $_GET['st'];
 $q= "UPDATE `reservation` SET `status`='$stat' WHERE id =$id";
 mysqli_query($con,$q);
 header('location:admin.php');
 ?>