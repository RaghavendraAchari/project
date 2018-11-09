<?php

session_start();

$_SESSION["user_id"]=$_POST["userid"];
$_SESSION["user_fname"]=$_POST["fname"];
$_SESSION["user_lname"]=$_POST["lname"];
$_SESSION["user_address"]=$_POST["address"];
$_SESSION["user_phone"]=$_POST["phone"];
$_SESSION["user_email"]=$_POST["email"];
$_SESSION["user_password"]=$_POST["password"];

echo $_SESSION["user_id"];
$user_id = $_POST["userid"];
$user_fname = $_POST["fname"];
$user_lname = $_POST["lname"];
$user_address = $_POST["address"];
$user_phone = $_POST["phone"];
$user_email = $_POST["email"];
$user_password = $_POST["password"];

require ("./Helpers/admin-details.php");

$my_sqli = new mysqli($server, $username, $password,$dbname);
 //mysqli ob will have connect_errno != 0 if err occurs
    if($my_sqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = "INSERT INTO user values ('$user_id','$user_fname','$user_lname','$user_phone','$user_email','$user_address','$user_password') ";
    //
    $data = $my_sqli->query($sql_statement);
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <?php  include("header.php"); ?>
   	<title>WS : Register Yourself</title>
   <link rel="stylesheet" href="./CSS/user-register.css" />
</head>
<body>
  <?php include("navigation.php"); ?>
  	<script type="text/javascript">
        var ele = document.getElementById('register-link');
        ele.className +=' active';
        function changeClass(e){
                            var ele = document.getElementById(e);
                                ele.className +=' active';
                        }
    </script>
  <div class="container-fluid">
  	<div class="card">
  	    <div class="card-body text-center">
  	        <h3 class="card-title">Hi..<?php echo $user_fname ?> <br>
  	                  Welcome To Working Solutions..</h3>
             <h4 class="card-text">As a new user, we would recommend you to add details to your profile.</h4>
             <a class="card-link btn btn-info" href="profile.php?userid=<?php echo $user_id ?>" >Update My Profile</a>
             <a class="card-link btn btn-info" href="rent-page.php?userid=<?php echo $user_id ?>" >Rent My Own Workshop</a>
             <a class="card-link btn btn-info" href="book-workshop.php?userid=<?php echo $user_id ?>" >Book A Workshop</a>
             <a class="card-link btn btn-info" href="home.php?userid=<?php echo $user_id ?>" >Go To Home</a>
  	    </div>
    </div>
  </div>
  
  <?php include("footer.php"); ?>
</body>

</html>
