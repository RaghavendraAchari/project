<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php"); ?>
    <link rel="stylesheet" href="./CSS/book-now.css" /> 
    <title>WS: User Profile</title>
</head>
<body>
    <?php include("navigation.php"); ?>
    <div class="container-fluid mt-3 mb-3">
        <div class="container">
            <h4 class="heading-4 text-center">
                Details
            </h4>
        </div>
        <div class="card" >
            <div class="row details">
                <div class="col-sm-4 details">
                    <div class="card mb-2 info-card">
                    </div>
                </div>
                <div class="col-sm-8">
                    
                </div>
                
                
                
            </div>
        </div>
    </div>


    <?php include("footer.php"); ?>
    <?php require("./Helpers/change-user.php"); ?>
</body>
</html>