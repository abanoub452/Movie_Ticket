<?php
 
 include('connection.php');
 session_start();
 if(!isset($_SESSION['role']))
{
  header('location:login.html');
}
 if(isset($_POST['res']))
 {
   $name =mysqli_real_escape_string ($con , $_POST['name']) ;
   $email = mysqli_real_escape_string ($con , $_POST['email']);
   $movie =mysqli_real_escape_string ($con ,$_POST['movie']);
   $date = mysqli_real_escape_string ($con , $_POST['date']);
   $pnum =mysqli_real_escape_string ($con ,$_POST['pnum']);
   $q = "INSERT INTO `reservation`( `name`, `email`, `date`, `movie`, `persons`) VALUES ('$name','$email','$date','$movie','$pnum')";
   mysqli_query($con,$q);
   $s="Done";
 }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Reservation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
<style>
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=number] ,input[type=date]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

.cc
{
    
    color: black;
}
.ss{
    text-decoration: none;
    color: #5f5fB0;

}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>
<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
      <a href="#home" class="w3-bar-item w3-button">Gourmet au Catering</a>
      <!-- Right-sided navbar links. Hide them on small screens -->
      <div class="w3-right w3-hide-small">
        <a href="reservation.php" target="_blank" class="w3-bar-item w3-button">Reservation</a>
        <a href="status.php" target="_blank" class="w3-bar-item w3-button">status</a>
        <a href="admin.php" target="_blank" class="w3-bar-item w3-button">Admin</a>
        <a href="#menu" class="w3-bar-item w3-button"><?php echo($_SESSION['name']); ?></a>
        <a href="login.php?logout=1" class="w3-bar-item w3-button">logout</a>
        <a href="home.php" class="w3-bar-item w3-button">Home</a>
      </div>
    </div>
  </div>



<form  style="border:1px solid #ccc" method="post">


  <div class="container">
    <h1>Reservation Form </h1>
    <p>Please fill in this form to create an account.</p>
    <?php
   if(isset($s))
   {
    echo($s);
   }

  ?>
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Your Name" name="name" required="required" readonly name="name" value=" <?php echo( $_SESSION['name']) ?>" >

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required="required" readonly name="email" value=" <?php echo( $_SESSION['email']) ?>">

    <label for="phone"><b>Date</b></label>
    <input type="date" placeholder="2/2/2002" name="date" required>

    <label for="psw"><b>Movie Name</b></label>
    <input type="text" name="movie" required>

    <label for="psw-repeat"><b>persons</b></label>
    <input type="number" name="pnum" required min=1>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button name="res" type="submit" class="signupbtn">Book Now</button>
      
    </div>
  </div>
</form>

</body>
</html> 