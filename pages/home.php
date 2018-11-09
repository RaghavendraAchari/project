<?php 
session_start();
    $user_id=null;
    $user_fname=null;
    if(isset($_SESSION["user_id"])){
        $user_id=$_SESSION["user_id"];
        $user_fname=$_SESSION["user_fname"];
    }

?>


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
    
    ?>
    <script type="text/javascript">
        var ele = document.getElementById('home-link');
        ele.className +=' active';
        <?php if($user_id != null && $user_fname!= null){?>
            var user = document.getElementById('login-link');
            user.innerHTML = '<a id="login-text" class="nav-link" href="profile-page.php"><?php echo $user_fname ;?></a>';
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
                        <h2 class="card-title"><?php echo $user_fname!=null ? $user_fname : "Log In" ; ?></h2>
                        <p class="card-text">View your booking history and many more.</p>
                    </div>
                    <div class="card-footer"><a class="card-link btn btn-info" href="<?php echo $user_id!=null ?'user-history.php':'login.php'; ?>">History</a></div>
                </div>
            </div>
        </div>
    </div>

    <?php require("footer.php"); ?>
    	<?php if($user_id != null){ ?>
    	
    	<script type="text/javascript">
    		var user = document.getElementById('footer-login-link');
            user.innerHTML = '<a class="nav-link footer-link p-1 m-0" href="<?php echo $user_id!=null ? 'profile.php' : 'login.php' ?>"><?php echo $user_fname!=null ? $user_fname : 'Login' ?></a>';
    	</script>
    		
    		
    <?php	}
    ?>
	
</body>
</html>
