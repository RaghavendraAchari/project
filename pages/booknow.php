<?php session_start(); 
$workshop_id = $_GET['id'];

require("./Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = "SELECT * FROM workshop WHERE workshop_id='$workshop_id'";
    //
    $result = $mysqli->query($sql_statement);
    $result->data_seek(0);
    

    $data = $result->fetch_assoc();
    $branch = $data['Workshop_branch_id'];

    $sql_statement = "SELECT * FROM branches WHERE branch_id='$branch'";
    $branch_result = $mysqli->query($sql_statement);
    $branch_result->data_seek(0);
    $branch_details = $branch_result->fetch_assoc();
    $branch_name = $branch_details['branch_name'];

    $sql_statement = "SELECT * FROM rating WHERE workshop_id='$workshop_id'";
    $rating_result = $mysqli->query($sql_statement);
    $rating_result->data_seek(0);
    $rating_details = $rating_result->fetch_assoc();
    $rating = $rating_details['workshop_rating'];

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php require("header.php"); ?>
    <link rel="stylesheet" href="./CSS/profile-page.css" /> 
    <title>WS: Book workshop now</title>
</head>
<body>
    <?php require("navigation.php"); ?>

    
    <div class="container-fluid mt-3 mb-3">
        <div class="container">
            <h4 class="heading-4 text-center">
                Details
            </h4>
        </div>
        <div class="card" >
            <div class="row">
                <div class="col-sm-4 details">
                    <img class="p-2" src="./Icons/rent-icon2.png" alt="user icon" style="width : 100%;" />
                </div>
                <div class="col-sm-8">
                    <div class="p-2" >
                        <h4 class="card-title heading pb-2 text-danger">Available Slots : </h4>
                        <div class="overflow"style="height : 230px;">
                            <div class="card card-body m-1 p-2">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="card-title m-2  text-secondary"> slots</h5>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="m-2"> <span class="badge badge-dark">Timings</span></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="m-2">Rated : <span class="badge badge-dark"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 details">
                    <div class="p-2">
                        <div class="card card-body "> 
                            <h3 class="card-title text-center heading pb-2"><?php echo $data['workshop_name']; ?></h3>
                            <h5 class="card-title text-danger">Email : </h5><p class="card-text"><?php echo $data['workshop_email']; ?></p>
                            <h5 class="card-title text-danger">Phone : </h5><p class="card-text"><?php echo $data['workshop_phone']; ?></p>
                            <h5 class="card-title text-danger">Address : </h5><p class="card-text"><?php echo $data['workshop_address']; ?></p>
                            <h5 class="card-title text-danger">Branch : </h5><p class="card-text"><?php echo $branch_name ; ?></p>
                            <h5 class="card-title text-danger">Rating : </h5><p class="card-text"><?php echo $rating ; ?></p>
                        </div>
                    </div>
                        
                    </div>
                    <div class="col-sm-8" >
                        <div class="p-2" >
                            <h4 class="card-title heading  pb-2 text-danger">Other Branches : </h4>
                            <div class="overflow"style=" height : 340px;" >
                                <div class="card card-body m-1 p-2 workshop">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h5 class="card-title m-2 text-secondary"></h5>
                                        </div>
                                        <div class="col-sm-4 text-right">
                                            <a class="btn btn-dark" href="#">Explore</a>
                                        </div>
                                    </div>
                                            
                                </div>
                            </div>
                            
                        </div>
                    </div>

            </div>
        </div>
    </div>


    <?php require("footer.php"); ?>
    <?php require("./Helpers/change-user.php"); ?>
</body>
</html>