<?php
 include('connection.php');
 session_start();
 if(isset($_GET['logout']))
 {
    session_destroy();
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['role']);
    header('location:login.html');
 }
 if(isset($_POST['log']))
 {
    $email = mysqli_real_escape_string ($con , $_POST['email']);
    $pass =mysqli_real_escape_string ($con ,$_POST['pass']);
    $q = "SELECT * FROM `users` WHERE email = '$email' and password ='$pass'";
    $res= mysqli_query($con, $q);
    $row = mysqli_fetch_array($res);
    if(mysqli_num_rows($res)>0)
    {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        $_SESSION['role'] = $row['role'];
        header('location:home.php');
    }
    else
    {
        header('location:login.html');
    }
 }
?>