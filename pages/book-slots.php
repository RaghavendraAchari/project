<?php 
$workshop_id = $_GET['id'];
session_start(); 

    require("./Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    
    $sql_statement = "SELECT * FROM user WHERE user_id='$_SESSION[user_id]'";
    
    $user_result = $mysqli->query($sql_statement);
    $user_result->data_seek(0);

    $user_data=$user_result->fetch_assoc();

    


$selected = 0;
if(isset($_GET['mon-sl1'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot1='booked' WHERE workshop_id='$workshop_id' AND day='Monday' ";
    $user_result = $mysqli->query($sql_statement);
    
}
if(isset($_GET['mon-sl2'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot2='booked' WHERE workshop_id='$workshop_id' AND day='Monday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['mon-sl3'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot3='booked' WHERE workshop_id='$workshop_id' AND day='Monday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['mon-sl4'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot4='booked' WHERE workshop_id='$workshop_id' AND day='Monday' ";
    $user_result = $mysqli->query($sql_statement);
}




if(isset($_GET['tue-sl1'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot1='booked' WHERE workshop_id='$workshop_id' AND day='Tuesday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['tue-sl2'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot2='booked' WHERE workshop_id='$workshop_id' AND day='Tuesday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['tue-sl3'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot3='booked' WHERE workshop_id='$workshop_id' AND day='Tuesday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['tue-sl4'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot4='booked' WHERE workshop_id='$workshop_id' AND day='Tuesday' ";
    $user_result = $mysqli->query($sql_statement);
}



if(isset($_GET['wed-sl1'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot1='booked' WHERE workshop_id='$workshop_id' AND day='Wednesday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['wed-sl2'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot2='booked' WHERE workshop_id='$workshop_id' AND day='Wednesday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['wed-sl3'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot3='booked' WHERE workshop_id='$workshop_id' AND day='Wednesday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['wed-sl4'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot4='booked' WHERE workshop_id='$workshop_id' AND day='Wednesday' ";
    $user_result = $mysqli->query($sql_statement);
}

if(isset($_GET['thu-sl1'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot1='booked' WHERE workshop_id='$workshop_id' AND day='Thusday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['thu-sl2'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot2='booked' WHERE workshop_id='$workshop_id' AND day='Thusday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['thu-sl3'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot3='booked' WHERE workshop_id='$workshop_id' AND day='Thusday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['thu-sl4'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot4='booked' WHERE workshop_id='$workshop_id' AND day='Thusday' ";
    $user_result = $mysqli->query($sql_statement);
}


if(isset($_GET['fri-sl1'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot1='booked' WHERE workshop_id='$workshop_id' AND day='Friday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['fri-sl2'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot2='booked' WHERE workshop_id='$workshop_id' AND day='Friday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['fri-sl3'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot3='booked' WHERE workshop_id='$workshop_id' AND day='Friday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['fri-sl4'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot4='booked' WHERE workshop_id='$workshop_id' AND day='Friday' ";
    $user_result = $mysqli->query($sql_statement);
}


if(isset($_GET['sat-sl1'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot1='booked' WHERE workshop_id='$workshop_id' AND day='Saturday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['sat-sl2'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot2='booked' WHERE workshop_id='$workshop_id' AND day='Saturday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['sat-sl3'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot3='booked' WHERE workshop_id='$workshop_id' AND day='Saturday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['sat-sl4'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot4='booked' WHERE workshop_id='$workshop_id' AND day='Saturday' ";
    $user_result = $mysqli->query($sql_statement);
}


if(isset($_GET['sun-sl1'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot1='booked' WHERE workshop_id='$workshop_id' AND day='Sunday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['sun-sl2'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot2='booked' WHERE workshop_id='$workshop_id' AND day='Sunday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['sun-sl3'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot3='booked' WHERE workshop_id='$workshop_id' AND day='Sunday' ";
    $user_result = $mysqli->query($sql_statement);
}
if(isset($_GET['sun-sl4'])){
    $selected++;
    $sql_statement = "UPDATE timing_details SET slot4='booked' WHERE workshop_id='$workshop_id' AND day='Sunday' ";
    $user_result = $mysqli->query($sql_statement);
}
$user = $_SESSION['user_id'];


if($_GET['paytm']!=""){
    $pay='paytm';
    $sql_statement = "INSERT INTO user_history VALUES ('$user','$workshop_id',DEFAULT,'$pay','0')";
    $user_result = $mysqli->query($sql_statement);

}else if($_GET['debitCardNo']!=""){
    $pay='Debit';
    $sql_statement = "INSERT INTO user_history VALUES ('$user','$workshop_id',DEFAULT,'$pay','0')";
    $user_result = $mysqli->query($sql_statement);
}else if($_GET['creditCardNo']!=""){
    $pay='Credit';
    $sql_statement = "INSERT INTO user_history VALUES ('$user','$workshop_id',DEFAULT,'$pay','0')";
    $user_result = $mysqli->query($sql_statement);
}


$sql_statement = "SELECT * FROM user_history WHERE user_id='$_SESSION[user_id]' AND workshop_id='$workshop_id'";
    
    $history_result = $mysqli->query($sql_statement);
    $history_result->data_seek(0);
    $history_data = $history_result->fetch_assoc();

    $sql_statement = "SELECT * FROM workshop WHERE workshop_id='$workshop_id'";
    $workshop_result = $mysqli->query($sql_statement);
    $workshop_result->data_seek(0);
    $workshop_data = $workshop_result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("header.php"); ?>
    <title>Payment</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Payment Successfull..</h5>
            </div>
            <div class="card-body">
                <h6 class="card-title mb-2" style="border-bottom : 1px solid gray ;">Details</h6>
                <p class="card-title">Booked By : <span class="card-text"><?php echo $user_data['user_fname']." ".$user_data['user_lname'] ;  ?> </span></p>
                <p class="card-title">Date Of Booking : <span class="card-text"><?php echo $history_data['booked_date'];?></span></p>
                <p class="card-title">Booked Workshop : <span class="card-text"><?php echo $workshop_data['workshop_name']; ?> </span></p>
                <p class="card-title">Total Price : <span class="card-text"><?php echo $selected * intval($workshop_data['price']) ;  ?> </span></p>
                <div class="p-2 m-2">
                    <a href="profile-page.php" class="btn btn-info">Go To Profile Page</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php


?>