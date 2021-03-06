<?php session_start(); 

    require("./Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = null ;
    if(! empty($_SESSION['admin_id'])){
        header("Location: admin-page.php");
        exit(0);
    }else{
        $sql_statement = "SELECT * FROM user WHERE user_id='$_SESSION[user_id]'";
    }

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
                                                    <p class="m-2">Rated : <span class="badge badge-dark"><?php echo $history_data['given_rating']== '0' ? " - " :$history_data['given_rating'] ; ?> </span></p>
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
                                <h5 class="card-title text-danger">Your ID : </h5><p class="card-text"><?php echo $data['user_id']; ?></p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-8" >
                        <div class="p-2" >
                            <h4 class="card-title heading  pb-2 text-danger">Your Workshops : </h4>
                            <div class="overflow" style=" height : 340px;" >
                                <?php 
                                    if(! $workshop_result->num_rows){
                                        echo '<p class="text-center">No workshops are registered</p>';
                                    }else{ 
                                        for( $row = 0 ;  $row< $workshop_result->num_rows;  $row++){
                                            $workshop_result->data_seek( $row);
                                            $workshop_data = $workshop_result->fetch_assoc();
                                            $workshop_branch = $workshop_data["Workshop_branch_id"];

                                            $sql_statement = "SELECT * FROM branches WHERE branch_id='$workshop_branch'";
                                            $branch_result = $mysqli->query($sql_statement);
                                            $branch_result->data_seek(0);
                                            $branch_details = $branch_result->fetch_assoc();
                                            $branch_name = $branch_details['branch_name'];
                                        ?>
                                        <div class="card card-body m-1 p-2 workshop">
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h5 class="card-title m-2 text-secondary"><?php echo $workshop_data['workshop_name']; ?></h5>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <h6 class="card-text m-2">Branch : <?php echo $branch_name ; ?></h6>
                                                        </div> 
                                                    </div>     
                                                </div>
                                                <div class="col-sm-4 text-right">
                                                    <a class="btn btn-dark" href="workshop-details.php?id=<?php  echo $workshop_data['workshop_id']; ?>">Details</a>
                                                    <button class="btn btn-dark" id="delete-button-<?php echo $workshop_data['workshop_id'];?>" onclick="remove('<?php echo $workshop_data['workshop_id'];?>', 'delete-button-<?php echo $workshop_data['workshop_id'];?>' )">Delete</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    <?php }
                                    }
                                ?> 
                                <script type="text/javascript">
                                    function remove(workshop, id) {
                                    
                                    var request = new XMLHttpRequest();
                                    var link = "./Helpers/remove-workshop.php?id=" + workshop.toString() ;
                                    request.open("GET",link);
                                    request.send();

                                    request.onreadystatechange = function(){
                                        if(request.readyState == 4){
                                            var ele = document.getElementById(id);
                                            ele.innerText = request.responseText;
                                        }
                                    }
                                }
                                
                            </script>
                                    <a href="rent-workshop.php" class="card btn btn-primary m-1">
                                        <div class="card-body p-2" style="border-bottom : none; ">
                                            <h5 class="card-title text-dark m-0">Rent A New Workshop</h5>
                                        </div>
                                    </a>     
                               
                            </div>
                            
                        </div>
                    </div>
                <div class="col-sm-4 details text-center">
                    <a href="user-register.php?update=1" class="card btn btn-primary m-2">
                        <div class="card-body p-1" style="border-bottom : none; ">
                            <h5 class="card-title text-dark m-1">Edit Details</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-8 text-center">
                    <a href="logout.php" class="card btn btn-primary m-2">
                        <div class="card-body p-1"  style="border-bottom : none; ">
                            <h5 class="card-title text-dark m-1">Log Out</h5>
                        </div>
                    </a>
                </div>
                    
                
                
                
            </div>
        </div>
    </div>


    <?php include("footer.php"); ?>
    <?php require("./Helpers/change-user.php"); ?>
</body>
</html>