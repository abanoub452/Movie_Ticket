<?php
 include('connection.php');
 session_start();
 if(!isset($_SESSION['role']))
{
  header('location:login.html');
}
  $q="SELECT * FROM `reservation`"; 
     $res=mysqli_query($con,$q);
  

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>status</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
}
<style>
  body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
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

<br><br><br>

<h2>Table Headers</h2>

<p>Use the TH element to define table headers.</p>

<table style="width:100%">
<thead>
  <tr>
    <th>
      Date
    </th>
    <th>
        Movie
    </th>
    <th>
        persons
    </th>
    <th>
       status
    </th>
</tr>
</thead>
<tbody>
    <?php
     
     while ($row=mysqli_fetch_array($res))
   
    {
        ?>
        <tr>
            <td><?php  echo ($row['date']); ?></td>
            <td> <?php  echo $row['movie'];  ?> </td>
            <td><?php echo($row['persons']); ?></td>
            <td><?php
            if($row['status']==1)
            {
                echo("pending");
       
            }
            else if($row['status']==2)
            {
                echo("Accepted");
       
            }
            else if($row['status']==0)
            {
                echo("Deny");
       
            }
            ?></td>  


        </tr> 


<?php } ?>


</tbody>

</table>

</body>
</html>

