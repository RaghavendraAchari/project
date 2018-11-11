<?php session_start(); 

    require("./Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = "SELECT * FROM user WHERE user_id='$_SESSION[user_id]'";
    //
    $result = $mysqli->query($sql_statement);
    $result->data_seek(0);

    $data = $result->fetch_assoc();

    $sql_statement = "SELECT * FROM workshop WHERE workshop_user_id='$_SESSION[user_id]'";
    $workshop_result = $mysqli->query($sql_statement);
    
    $sql_statement = "SELECT * FROM user_history WHERE user_id='$_SESSION[user_id]'";
    $history_result = $mysqli->query($sql_statement);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php"); ?>
    <link rel="stylesheet" href="./CSS/profile-page.css" /> 
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
            <div class="row">
                
                    <div class="col-sm-4 details">
                        <img class="p-2" src="./Icons/user-login-icon2.png" alt="user icon" style="width : 100%;" />
                    </div>
                    <div class="col-sm-8 mb-2"  >
                        <div class="p-2" >
                        <h4 class="card-title heading pb-2 text-danger">History : </h4>
                        <div class="overflow"style="height : 230px;">
                            <?php 
                                    if(! $history_result->num_rows){
                                        echo '<p class="text-center">No History</p>';
                                    }else{ 
                                        for( $row = 0 ;  $row< $history_result->num_rows;  $row++){
                                            $history_result->data_seek( $row);
                                            $history_data = $history_result->fetch_assoc();
                                        ?>
                                        <div class="card card-body m-1 p-2">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h5 class="card-title m-2  text-secondary"><?php echo $history_data['workshop_id']; ?></h5>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-2"> <span class="badge badge-dark"><?php echo $history_data['booked_date']; ?></span></p>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-2">Rated : <span class="badge badge-dark"><?php echo $history_data['given_rating']; ?> </span></p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    <?php }
                                    }
                                ?>
                        </div>
                        
                            </div>

                    </div>
                
                
                    <div class="col-sm-4 details">
                    <div class="p-2">
                        <div class="card card-body "> 
                            <h3 class="card-title text-center heading pb-2"><?php echo $data['user_fname']." ".$data["user_lname"]; ?></h3>
                            <h5 class="card-title text-danger">Email : </h5><p class="card-text"><?php echo $data['user_email']; ?></p>
                            <h5 class="card-title text-danger">Phone : </h5><p class="card-text"><?php echo $data['user_phone']; ?></p>
                            <h5 class="card-title text-danger">Address : </h5><p class="card-text"><?php echo $data['user_address']; ?></p>
                            <h5 class="card-title text-danger">Others : </h5><p class="card-text"><?php echo $data['user_email']; ?></p>
                        </div>
                    </div>
                        
                    </div>
                    <div class="col-sm-8" >
                        <div class="p-2" >
                            <h4 class="card-title heading  pb-2 text-danger">Your Workshops : </h4>
                            <div class="overflow"style=" height : 340px;" >
                                <?php 
                                    if(! $workshop_result->num_rows){
                                        echo '<p class="text-center">No workshops are registered</p>';
                                    }else{ 
                                        for( $row = 0 ;  $row< $workshop_result->num_rows;  $row++){
                                            $workshop_result->data_seek( $row);
                                            $workshop_data = $workshop_result->fetch_assoc();
                                        ?>
                                        <div class="card card-body m-1 p-2 workshop">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <h5 class="card-title m-2 text-secondary"><?php echo $workshop_data['workshop_name']; ?></h5>
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <a class="btn btn-dark" href="#">Details</a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    <?php }
                                    }
                                ?> 
                            </div>
                            
                        </div>
                    </div>
                <div class="col-sm-4 p-2 details text-center">
                    <a class="btn btn-info" href="logout.php">Edit Details</a>
                </div>
                <div class="col-sm-8 p-2 text-center"><a class="btn btn-info" href="logout.php">Logout</a></div>
                    
                
                
                
            </div>
        </div>
    </div>


    <?php include("footer.php"); ?>
    <?php require("./Helpers/change-user.php"); ?>
</body>
</html>