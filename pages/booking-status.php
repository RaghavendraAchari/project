<?php 
session_start(); 

require("./Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = "SELECT * FROM workshop";
    //
    $result = $mysqli->query($sql_statement);
    
    
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
                <?php   
                for ($row=0; $row < $result->num_rows; $row++) { 
                    $result->data_seek($row);
                    $workshop_details= $result->fetch_assoc();
                    $workshop_id = $workshop_details['workshop_id'];
                
            
                    $sql_statement = "SELECT * FROM timing_details WHERE workshop_id='$workshop_id' ";
                    $timing_result = $mysqli->query($sql_statement);
                ?>
                    <div class="col-sm-6 pr-4 pl-4 pt-2 pb-2">
                        <h4 class="card-title heading pb-2 text-danger text-center"><?php echo $workshop_details['workshop_name'] ; ?></h4>
                        <div class="card card-body input-group m-1 p-2">
                            <table class="table table-striped table-hover p-1 ">
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
                                        <td><?php echo $timing_details['slot1'] ; ?> </td>
                                        <td><?php echo $timing_details['slot2']; ?></td>
                                        <td><?php echo $timing_details['slot3']; ?></td>
                                        <td><?php echo $timing_details['slot4']; ?></td>
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
                                        <td><?php echo $timing_details['slot4'] ; ?></td>
                                    
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
                        </div>
                    </div>

                <?php } ?>  
            </div>
        </div>
    </div>


    <?php require("footer.php"); ?>
    <?php require("./Helpers/change-user.php"); ?>
</body>
</html>