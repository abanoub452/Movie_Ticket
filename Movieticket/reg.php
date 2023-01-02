<?php
 
 include('connection.php');

 if(isset($_POST['reg']))
 {
   $name =mysqli_real_escape_string ($con , $_POST['name']) ;
   $email = mysqli_real_escape_string ($con , $_POST['email']);
   $phone = mysqli_real_escape_string ($con , $_POST['phone']);
   $pass =mysqli_real_escape_string ($con ,$_POST['psw']);
   $conpass =mysqli_real_escape_string ($con ,$_POST['psw-repeat']);
   $q = "INSERT INTO `users`(`name`, `email`, `phone`, `password`) VALUES ('$name','$email','$phone','$pass')";
   
   if($pass==$conpass)
   {
      $q2 ="SELECT * FROM `users` WHERE `email`= '$email'";
      $res= mysqli_query($con, $q2);
      if(mysqli_num_rows($res)>0)
      {
        $error ="this email is alredy exsists";
      
      }
      else
      {
        mysqli_query($con,$q);
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        header('location:home.php');
      }
   }
   else
   {
    $error ="password is not matching";
   }
 }

?>

<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text],input[type=number], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
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



<form  style="border:1px solid #ccc" method="post">


  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <?php
   if(isset($error))
   {
    echo($error);
   }

  ?>
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Your Name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="phone"><b>phone</b></label>
    <input type="number" placeholder="Enter Phone Number" name="phone" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    <p class="cc"> Do you have already an account? <a class="ss" href="login.html">Sign in</a></p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button name="reg" type="submit" class="signupbtn">Sign Up</button>
      
    </div>
  </div>
</form>

</body>
</html> 