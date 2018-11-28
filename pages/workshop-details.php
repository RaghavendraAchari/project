<?php session_start(); 
$workshop_id = null;
if(isset($_GET['id'])){
    $workshop_id = $_GET['id'];
    
}else if(! isset($_GET['id']) && !isset($_SESSION['registering_workshop'])){
    if(isset($_SESSION['updating_workshop'])){
        $workshop_id = $_SESSION['updating_workshop'];

        }
}else if(isset($_SESSION['registering_workshop'])){
    $workshop_id = $_SESSION['registering_workshop'];
}


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

    $sql_statement = "SELECT * FROM timing_details WHERE workshop_id='$workshop_id'";
    $timing_result = $mysqli->query($sql_statement);

    $user = $_SESSION['user_id'];
    $sql_statement = "SELECT * FROM workshop WHERE workshop_user_id='$user' ";
    $more_branch_result = $mysqli->query($sql_statement);


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

                    <div class="col-sm-12 p-2">
                    <div class="p-0">
                        <div class="card card-body "> 
                            <h3 class="card-title text-center heading pb-2"><?php echo $data['workshop_name']; ?></h3>
                            <h5 class="card-title text-danger">Email : </h5><p class="card-text"><?php echo $data['workshop_email']; ?></p>
                            <h5 class="card-title text-danger">Phone : </h5><p class="card-text"><?php echo $data['workshop_phone']; ?></p>
                            <h5 class="card-title text-danger">Address : </h5><p class="card-text"><?php echo $data['workshop_address']; ?></p>
                            <h5 class="card-title text-danger">Branch : </h5><p class="card-text"><?php echo $branch_name ; ?></p>
                            
                            <?php  
                                $w_id = $data['workshop_id'];
                                $statement = "SELECT * FROM workshop_details WHERE workshop_id ='$w_id' ";
                                $w_details_result = $mysqli->query($statement);
                                $w_details_result->data_seek(0);
                                $w_details = $w_details_result->fetch_assoc();

                            ?>
                            <div class="row">
                                <div class="col-sm-6 pb-1">
                                <h5 class="card-title text-danger">Rating : </h5><p class="card-text"><?php echo empty($rating) ?"Not Rated Yet" : $rating ; ?></p>
                            
                                </div>
                                <div class="col-sm-6 pb-1">
                                <h5 class="card-title text-danger">Price : </h5><p class="card-text"><?php echo $data['price'] ; ?></p>
                                </div>
                                <div class="col-sm-6 pb-1">
                                    <h5 class="card-title text-danger">Basic Tools : </h5><p class="card-text"><?php echo $w_details['basic_tools'] ; ?></p>
                                </div>
                                <div class="col-sm-6 pb-1">
                                <h5 class="card-title text-danger">Advanced Tools : </h5><p class="card-text"><?php echo $w_details['advanced_tools'] ; ?></p>
                                </div>
                                <div class="col-sm-6 pb-1">
                                <h5 class="card-title text-danger">Area Of Workshop : </h5><p class="card-text"><?php echo $w_details['area_of_workshop'] ; ?></p>
                                </div>
                                <div class="col-sm-6 pb-1">
                                <h5 class="card-title text-danger">Transport Available : </h5><p class="card-text"><?php echo $w_details['transportation_available']=='0' ? "No" : "Yes" ; ?></p>
                                </div>
                                
                            </div>
                            
                            </div>
                    </div>
                </div>
                    
                </div>
                <div class="col-sm-8">

                <div class="col-sm-12" >
                    <div class="p-2" >
                            <h4 class="card-title heading pb-2 text-danger">Timing Slots : </h4>
                            <div >
                                    <?php 
                                        if(! $timing_result->num_rows){
                                            echo "<p>No Timimg Details Available</p>";
                                        }else{?>
                                            <table class="table table-striped table-hover p-1">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>9AM - 12PM</th>
                                                        <th>12PM - 3PM</th>
                                                        <th>3PM - 6PM</th>
                                                        <th>6PM - 9PM</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php 
                                                            $timing_result->data_seek(0);
                                                            $timing_details = $timing_result->fetch_assoc();
                                                            
                                                        ?>
                                                        <th>Monday</th>
                                                        <td><?php echo $timing_details['slot1'] ; ?></td>
                                                        <td><?php echo $timing_details['slot2'] ; ?></td>
                                                        <td><?php echo $timing_details['slot3'] ; ?></td>
                                                        <td><?php echo $timing_details['slot4'] ; ?></td>
                                                    </tr>
                                                    <tr>
                                                    <?php 
                                                            $timing_result->data_seek(1);
                                                            $timing_details = $timing_result->fetch_assoc();
                                                        ?>
                                                        <th>Tueday</th>
                                                        <td><?php echo $timing_details['slot1']; ?></td>
                                                        <td><?php echo $timing_details['slot2']; ?></td>
                                                        <td><?php echo $timing_details['slot3']; ?></td>
                                                        <td><?php echo $timing_details['slot4']; ?></td>
                                                    </tr>
                                                    <tr>
                                                    <?php 
                                                            $timing_result->data_seek(2);
                                                            $timing_details = $timing_result->fetch_assoc();
                                                        ?>
                                                        <th>Wednesday</th>
                                                        <td><?php echo $timing_details['slot1']; ?></td>
                                                        <td><?php echo $timing_details['slot2']; ?></td>
                                                        <td><?php echo $timing_details['slot3']; ?></td>
                                                        <td><?php echo $timing_details['slot4']; ?></td>
                                                    </tr>
                                                    <tr>
                                                    <?php 
                                                            $timing_result->data_seek(3);
                                                            $timing_details = $timing_result->fetch_assoc();
                                                        ?>
                                                        <th>Thursday</th>
                                                        <td><?php echo $timing_details['slot1']; ?></td>
                                                        <td><?php echo $timing_details['slot2']; ?></td>
                                                        <td><?php echo $timing_details['slot3']; ?></td>
                                                        <td><?php echo $timing_details['slot4']; ?></td>
                                                    </tr>
                                                    <tr>
                                                    <?php 
                                                            $timing_result->data_seek(4);
                                                            $timing_details = $timing_result->fetch_assoc();
                                                        ?>
                                                        <th>Friday</th>
                                                        <td><?php echo $timing_details['slot1']; ?></td>
                                                        <td><?php echo $timing_details['slot2']; ?></td>
                                                        <td><?php echo $timing_details['slot3']; ?></td>
                                                        <td><?php echo $timing_details['slot4']; ?></td>
                                                    </tr>
                                                    <tr>
                                                    <?php 
                                                            $timing_result->data_seek(5);
                                                            $timing_details = $timing_result->fetch_assoc();
                                                        ?>
                                                        <th>Saturday</th>
                                                        <td><?php echo $timing_details['slot1']; ?></td>
                                                        <td><?php echo $timing_details['slot2']; ?></td>
                                                        <td><?php echo $timing_details['slot3']; ?></td>
                                                        <td><?php echo $timing_details['slot4']; ?></td>
                                                    </tr>
                                                    <tr>
                                                    <?php 
                                                            $timing_result->data_seek(6);
                                                            $timing_details = $timing_result->fetch_assoc();
                                                        ?>
                                                        <th>Sunday</th>
                                                        <td><?php echo $timing_details['slot1']; ?></td>
                                                        <td><?php echo $timing_details['slot2']; ?></td>
                                                        <td><?php echo $timing_details['slot3']; ?></td>
                                                        <td><?php echo $timing_details['slot4']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                    <?php }
                                    ?>
                                
                            </div>
                        </div>
                        <div class="p-2" >
                            <h4 class="card-title heading  pb-2 text-danger">Other Workshops : </h4>
                            <div class="overflow"style=" height : 280px;" >
                                <?php 
                                  if(! $more_branch_result){
                                    echo "<p>No Other Branches</p>";
                                  }else{
                                      for ($row=0; $row < $more_branch_result->num_rows; $row++) { 
                                          $more_branch_result->data_seek($row);
                                          $other_branch = $more_branch_result->fetch_assoc();  
                                            $branch_id = $other_branch['Workshop_branch_id'];
                                            $sql_statement = "SELECT branch_name FROM branches WHERE branch_id='$branch_id'  ";
                                            $br = $mysqli->query($sql_statement);
                                            $br->data_seek(0);
                                            $br_details = $br->fetch_assoc();
                                            

                                            if($other_branch['workshop_id']!= $workshop_id){
                                            ?>
                                                <div class="card card-body m-1 p-2 workshop">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <h5 class="card-title m-2 text-secondary"><?php echo $other_branch['workshop_name']; ?></h5>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <h6 class="card-text m-2">Branch : <?php echo $br_details['branch_name'] ; ?></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 text-right">
                                                            <a class="btn btn-dark" href="workshop-details.php?id=<?php echo $other_branch['workshop_id']; ?>">Explore</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            

                                <?php      }
                                    }
                                }
                                ?>

                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-sm-4 details text-center">
                    <a href="rent-workshop.php?update=1&id=<?php echo $data["workshop_id"] ;?>" class="card btn btn-primary m-2">
                        <div class="card-body p-1" style="border-bottom : none; ">
                            <h5 class="card-title text-dark m-1">Edit Details</h5>
                        </div>
                    </a>
                </div>
                            

                
                    

            </div>
        </div>
    </div>


    <?php require("footer.php"); ?>
    <?php require("./Helpers/change-user.php"); ?>
    <?php
    if(isset($_SESSION['updating_workshop'])){
        session_unset( $_SESSION['updating_workshop']);
        session_unset( $_SESSION['workshop_updated']);
        }
    ?>
</body>
</html>