<?php session_start(); 

    require("./Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = "SELECT * FROM `admin` WHERE admin_id='$_SESSION[admin_id]'";
    //
    $result = $mysqli->query($sql_statement);
    $result->data_seek(0);

    $data = $result->fetch_assoc();

    $sql_statement = "SELECT * FROM workshop  WHERE admin_accepted='0' ";
    $workshop_result = $mysqli->query($sql_statement);
    
    // $sql_statement = "SELECT * FROM user_history WHERE user_id='$_SESSION[user_id]'";
    // $history_result = $mysqli->query($sql_statement);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php"); ?>
    <link rel="stylesheet" href="./CSS/admin-page.css" /> 
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
                        <h4 class="card-title heading pb-2 text-danger">Actions : </h4>
                        <div class="overflow"style="height : 230px;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="rent-workshop.php" class="card btn btn-primary m-1">
                                        <div class="card-body p-1">
                                            <h5 class="card-title text-dark m-1">Add Workshop</h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-12">
                                    <a href="remove-page.php?remove=1" class="card btn btn-primary m-1">
                                        <div class="card-body p-1">
                                            <h5 class="card-title text-dark m-1">Remove Workshop</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                            </div>

                    </div>
                
                
                    <div class="col-sm-4 details">
                    <div class="p-2">
                        <div class="card card-body "> 
                            <h3 class="card-title text-center heading pb-2"><?php echo $data['admin_name']; ?></h3>
                            <h5 class="card-title text-danger">Phone : </h5><p class="card-text"><?php echo $data['admin_phone']; ?></p>
                            <h5 class="card-title text-danger">Address : </h5><p class="card-text"><?php echo $data['admin_address']; ?></p>
                            <h5 class="card-title text-danger">ID : </h5><p class="card-text"><?php echo $data['admin_id']; ?></p>
                        </div>
                    </div>
                        
                    </div>
                    <div class="col-sm-8" >
                        <div class="p-2" >
                            <h4 class="card-title heading  pb-2 text-danger">Workshop requests : </h4>
                            <div class="overflow"style=" height : 340px;" >
                                <?php 
                                    if(! $workshop_result->num_rows){
                                        echo '<p class="text-center">No pending workshops</p>';

                                    }else{ 
                                        for( $row = 0 ;  $row< $workshop_result->num_rows;  $row++){
                                            $workshop_result->data_seek( $row);
                                            $workshop_data = $workshop_result->fetch_assoc();
                                            
                                        ?>
                                            <div class="card card-body m-1 p-2 workshop">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h5 class="card-title m-2 text-secondary"><?php echo $workshop_data['workshop_name']; ?></h5>
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        
                                                        <button class="btn btn-dark" style="overflow-x : auto; overflow-y : auto;" id="accept-button-<?php echo $workshop_data['workshop_id'];?>" onclick="accept('<?php echo $workshop_data['workshop_id'];?>', 'accept-button-<?php echo $workshop_data['workshop_id'];?>' )" >Accept</button>
                                                        
                                                        <a class="btn btn-dark" href="">Details of workshop</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                        }
                                        
                                    }
                                ?> 
                            </div>
                            <script type="text/javascript">
                                    function accept(user, id) {
                                    
                                    var request = new XMLHttpRequest();
                                    var link = "./Helpers/accept-workshop.php?id=" + user.toString() ;
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
                        </div>
                    </div>
                <div class="col-sm-4 pl-3 pr-3 details">
                    <a href="#" class="card btn btn-primary m-2">
                        <div class="card-body p-1">
                            <h5 class="card-title text-dark m-1">Edit Details</h5>
                        </div>
                    </a>
                </div>
                <div class="col-sm-8 pl-3 pr-5">
                    <a href="logout.php" class="card btn btn-primary m-2">
                        <div class="card-body p-1">
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