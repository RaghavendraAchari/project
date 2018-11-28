<?php session_start(); 
$workshop_id = $_GET['id'];
$_SESSION['booking_workshop']=$workshop_id;

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

                    <div class="col-sm-12">
                    <div class="p-2">
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
                                
                            </div></div>
                    </div>
                        
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="p-2" >
                        <h4 class="card-title heading pb-2 text-danger">Available Slots : </h4>
                        <div class="overflow">
                            <div class="card card-body m-1 p-2">
                        <?php   
                        
                        $sql_statement = "SELECT * FROM timing_details WHERE workshop_id='$workshop_id' ";
                            $timing_result = $mysqli->query($sql_statement);
                            ?>
                                <form  action="book-slots.php" method="GET">
                                    <div class="form-group input-group">
                                    <table class="table table-striped table-hover p-1 ">
                                        <thead>
                                            <tr>
                                                <th>...............    </th>
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
                                                <td><?php echo $timing_details['slot1']=='booked' || $timing_details['slot1']=='not-available' ? $timing_details['slot1'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="mon-sl1" id="mon-sl1" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot2']=='booked' || $timing_details['slot2']=='not-available' ? $timing_details['slot2'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="mon-sl2" id="mon-sl2" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot3']=='booked' || $timing_details['slot3']=='not-available' ? $timing_details['slot3'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="mon-sl3" id="mon-sl3" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot4']=='booked' || $timing_details['slot4']=='not-available' ? $timing_details['slot4'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="mon-sl4" id="mon-sl4" />Select This</label>' ; ?></td>
                                            </tr>
                                            <tr>
                                            <?php 
                                                    $timing_result->data_seek(1);
                                                    $timing_details = $timing_result->fetch_assoc();
                                                ?>
                                                <th>Tueday</th>
                                                <td><?php echo $timing_details['slot1']=='booked' || $timing_details['slot1']=='not-available' ? $timing_details['slot1'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="tue-sl1" id="tue-sl1" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot2']=='booked' || $timing_details['slot2']=='not-available' ? $timing_details['slot2'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="tue-sl2" id="tue-sl2" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot3']=='booked' || $timing_details['slot3']=='not-available' ? $timing_details['slot3'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="tue-sl3" id="tue-sl3" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot4']=='booked' || $timing_details['slot4']=='not-available' ? $timing_details['slot4'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="tue-sl4" id="tue-sl4" />Select This</label>' ; ?></td>
                                            
                                            </tr>
                                            <tr>
                                            <?php 
                                                    $timing_result->data_seek(2);
                                                    $timing_details = $timing_result->fetch_assoc();
                                                ?>
                                                <th>Wednesday</th>
                                                <td><?php echo $timing_details['slot1']=='booked' || $timing_details['slot1']=='not-available' ? $timing_details['slot1'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="wed-sl1" id="wed-sl1" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot2']=='booked' || $timing_details['slot2']=='not-available' ? $timing_details['slot2'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="wed-sl2" id="wed-sl2" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot3']=='booked' || $timing_details['slot3']=='not-available' ? $timing_details['slot3'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="wed-sl3" id="wed-sl3" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot4']=='booked' || $timing_details['slot4']=='not-available' ? $timing_details['slot4'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="wed-sl4" id="wed-sl4" />Select This</label>' ; ?></td>
                                            
                                            </tr>
                                            <tr>
                                            <?php 
                                                    $timing_result->data_seek(3);
                                                    $timing_details = $timing_result->fetch_assoc();
                                                ?>
                                                <th>Thursday</th>
                                                <td><?php echo $timing_details['slot1']=='booked' || $timing_details['slot1']=='not-available' ? $timing_details['slot1'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="thu-sl1" id="thu-sl1" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot2']=='booked' || $timing_details['slot2']=='not-available' ? $timing_details['slot2'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="thu-sl2" id="thu-sl2" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot3']=='booked' || $timing_details['slot3']=='not-available' ? $timing_details['slot3'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="thu-sl3" id="thu-sl3"/>Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot4']=='booked' || $timing_details['slot4']=='not-available' ? $timing_details['slot4'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="thu-sl4" id="thu-sl4" />Select This</label>' ; ?></td>
                                            
                                            </tr>
                                            <tr>
                                            <?php 
                                                    $timing_result->data_seek(4);
                                                    $timing_details = $timing_result->fetch_assoc();
                                                ?>
                                                <th>Friday</th>
                                                <td><?php echo $timing_details['slot1']=='booked' || $timing_details['slot1']=='not-available' ? $timing_details['slot1'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="fri-sl1" id="fri-sl1" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot2']=='booked' || $timing_details['slot2']=='not-available' ? $timing_details['slot2'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="fri-sl2" id="fri-sl2" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot3']=='booked' || $timing_details['slot3']=='not-available' ? $timing_details['slot3'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="fri-sl3" id="fri-sl3" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot4']=='booked' || $timing_details['slot4']=='not-available' ? $timing_details['slot4'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="fri-sl4" id="fri-sl4" />Select This</label>' ; ?></td>
                                            
                                            </tr>
                                            <tr>
                                            <?php 
                                                    $timing_result->data_seek(5);
                                                    $timing_details = $timing_result->fetch_assoc();
                                                ?>
                                                <th>Saturday</th>
                                                <td><?php echo $timing_details['slot1']=='booked' || $timing_details['slot1']=='not-available' ? $timing_details['slot1'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="sat-sl1" id="sat-sl1" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot2']=='booked' || $timing_details['slot2']=='not-available' ? $timing_details['slot2'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="sat-sl2" id="sat-sl2" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot3']=='booked' || $timing_details['slot3']=='not-available' ? $timing_details['slot3'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="sat-sl3" id="sat-sl3" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot4']=='booked' || $timing_details['slot4']=='not-available' ? $timing_details['slot4'] : '<label for="" class="form-check-label"><input class="form-check-input p-1" type="checkbox" name="sat-sl4" id="sat-sl4"/>Select This</label>' ; ?></td>
                                            
                                            </tr>
                                            <tr>
                                            <?php 
                                                    $timing_result->data_seek(6);
                                                    $timing_details = $timing_result->fetch_assoc();
                                                ?>
                                                <th>Sunday</th>
                                                <td><?php echo $timing_details['slot1']=='booked' || $timing_details['slot1']=='not-available' ? $timing_details['slot1'] : '<label for="" class="form-check-label"><input class="form-check-input" type="checkbox" name="sun-sl1" id="sun-sl1"/> Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot2']=='booked' || $timing_details['slot2']=='not-available' ? $timing_details['slot2'] : '<label for="" class="form-check-label"><input class="form-check-input" type="checkbox" name="sun-sl2" id="sun-sl2" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot3']=='booked' || $timing_details['slot3']=='not-available' ? $timing_details['slot3'] : '<label for="" class="form-check-label"><input class="form-check-input" type="checkbox" name="sun-sl3" id="sun-sl3" />Select This</label>' ; ?></td>
                                                <td><?php echo $timing_details['slot4']=='booked' || $timing_details['slot4']=='not-available' ? $timing_details['slot4'] : '<label for="" class="form-check-label"><input class="form-check-input" type="checkbox" name="sun-sl4" id="sun-sl4" />Select This</label>' ; ?></td>
                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="text" name="id" value="<?php echo $workshop_id; ?>" id="id" hidden/>
                                    <div class="input-group">
                                        <div class="accordion m-1 p-1 w-100 h-100"  id="accordionCollapse" >
                                            <div class="card">
                                                <div class="card-header">
                                                    <a class="card-link" data-toggle="collapse"  href="#collapseOne"><b>PayTM</b></a>
                                                </div>
                                            </div>
                                            <div class="collapse" id="collapseOne" data-parent="#accordionCollapse">
                                                <div class="card card-body">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="p-2">Mobile Number Linked To Paytm</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input class="form-control" name="paytm" id="paytm" type="text" />
                                                            
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="card" style="border-radius : 0rem;">
                                                <div class="card-header"><a class="card-link" href="#collapseTwo"  data-toggle="collapse" ><b>Debit Card</b></a></div>             
                                            </div>    
                                            <div id="collapseTwo" class="collapse" data-parent="#accordionCollapse">
                                                <div class="card card-body">
                                                    
                                                    <div class="row p-1 m-1">
                                                        <div class="col-sm-4">
                                                            <label>Card No </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input class="form-control"  name="debitCardNo" id="debitCar" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="row p-1 m-1">
                                                        <div class="col-sm-4">
                                                            <label>Name On The Card </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name="debitCar" id="debitCar" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="row p-1 m-1">
                                                        <div class="col-sm-4">
                                                            <label >Exp Date </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <input class="form-control" name="debitCarExpDate" id="debitCarExpDate" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="row p-1 m-1">
                                                        <div class="col-sm-4">
                                                        <label >CVV </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <input class="form-control" name="debitCarCVV" id="debitCarCVV" type="text"/>
                                                        </div>
                                                    </div>   
                                                </div>
                                            </div>
                                            <div class="card" style="border-radius : 0rem;">
                                                <div class="card-header"><a class="card-link" href="#collapseThree"  data-toggle="collapse" ><b>Credit Card</b></a></div>             
                                            </div>    
                                            <div id="collapseThree" class="collapse" data-parent="#accordionCollapse">
                                                <div class="card card-body" style=" border-bottom: 1px solid gainsboro ;">
                                                    
                                                   
                                                    <div class="row p-1 m-1">
                                                        <div class="col-sm-4">
                                                            <label>Card No </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input class="form-control"  name="creditCardNo" id="creditCar" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="row p-1 m-1">
                                                        <div class="col-sm-4">
                                                            <label>Name On The Card </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name="creditCardName" id="creditCar" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="row p-1 m-1">
                                                        <div class="col-sm-4">
                                                            <label >Exp Date </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <input class="form-control" name="creditCardExpDate" id="creditCarExpDate" type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="row p-1 m-1">
                                                        <div class="col-sm-4">
                                                        <label >CVV </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <input class="form-control" name="creditCardCVV" id="creditCarCVV" type="text"/>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input class="btn btn-secondary" type="submit" value="Book Slots" name="bookslots" />
                                    </div>
                                    </div>
                                    
                                </form>
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