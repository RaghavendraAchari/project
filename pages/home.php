


<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("header.php"); ?>
    <link rel="stylesheet" href="./CSS/homepage.css"/>
    <title>WS: Working Solutions :Book and rent workshops</title>
</head>
<body>
    <?php require("navigation.php"); ?>
    <?php 
    $given_user_id =null;
    $user_name = null;
    if(isset($_GET["user"])){
        $given_user_id=$_GET["user"];
        require("Helpers/admin-details.php");
        $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
        //mysqli ob will have connect_errno != 0 if err occurs
        if($mysqli->connect_errno){
            die('Could not connect to '.$mysqli->connect_err());
        }
        //prepare statement
        $sql_statement = "SELECT * FROM user WHERE user_id='$given_user_id'";

        $result = $mysqli->query($sql_statement);
        $result->data_seek(0);
        $row = $result->fetch_assoc();
        $user_name = $row["user_fname"];
    }
    ?>
    <script type="text/javascript">
        var ele = document.getElementById('home-link');
        ele.className +=' active';
        <?php if($given_user_id != null && $user_name!= null){?>
            var user = document.getElementById('login-link');
            user.innerHTML = '<a id="login-text" class="nav-link" href="profile-page.php?user=<?php echo $given_user_id; ?>"><?php echo $user_name ;?></a>';
        <?php } ?>
    </script>

    <div class="container-fluid">
        <header class="jumbotron">
            <div class="header-content text-center">
                <h1 class="display-3" >Welcome to Working Solutions</h1>
                <h2 class="display-4 bg-light">Your work is our PRIORITY</h2>
                <h2 class="display-4"  style="padding:5px;">One platform to book or manage your WORKSHOPS</h2>
                <p class="bg-light">Get workshop on your desired time.This is the one place to book workshops to complete your works</p>
            </div>
        </header>

        <div class="row deck bg-light mt-3 mb-3">
            <div class="col-lg-3">
                <div class="card h-100  bg-light" >
                    <img class="card-img-top"  src="./Icons/search-icon4.png" alt="card-image"/>
                    <div class="card-body">
                        <h2 class="card-title">Search</h2>
                        <p class="card-text">Choose the most convenient workshop for you.</p>
                    </div>
                    <div class="card-footer"><a class="card-link btn btn-info text-white" href="search-workshop.php">Go To Search</a></div>
                </div> 
            </div>
            <div class="col-lg-3">
                <div class="card h-100 bg-light" >
                    <img class="card-img-top"  src="./Icons/book-icon2.png" alt="card-image"/>
                    <div class="card-body">
                        <h2 class="card-title">Book</h2>
                        <p class="card-text">book workshop from our tons of workshop</p>
                    </div>
                    <div class="card-footer"><a class="card-link btn btn-info" href="book-workshop.php">Book Now</a></div>  
                </div>     
            </div>
            <div class="col-lg-3">
                <div class="card h-100 bg-light" >
                    <img class="card-img-top"  src="./Icons/rent-icon2.png" alt="card-image"/>
        
                    
                    <div class="card-body">
                        <h2 class="card-title">Rent</h2>
                        <p class="card-text">Rent your workshop through our platform and enjoy earnings...</p>
                    </div>
                    <div class="card-footer"><a class="card-link btn btn-info" href="rent-workshop.php">Rent</a></div>
                </div>
            </div>
            <div class="col-lg-3" >
                <div class="card h-100 bg-light" >
                    <img class="card-img-top"  src="./Icons/user-login-icon2.png" alt="card-image"/>
                    <div class="card-body">
                        <h2 class="card-title">Log in</h2>
                        <p class="card-text">View your booking history and many more.</p>
                    </div>
                    <div class="card-footer"><a class="card-link btn btn-info" href="login.php">History</a></div>
                </div>
            </div>
        </div>
    </div>

    <?php require("footer.php"); ?>

</body>
</html>