<?php 
session_start();

    

    if(! $_POST['updatetimings']){
        header("Location: register-user-workshop.php");
    }
    $workshop_id = $_SESSION['registering_workshop'];
    $basic = $_POST['basic_tools'];
    $advanced = $_POST['advanced_tools'];
    $area = $_POST['area'];
    $tranport = $_POST['transport'];
    $trans = 0;
    if($tranport=='yes'){
        $trans = 1;
    }

    $mon_sl1 =  $_POST['mon-sl1'];
    $mon_sl2 =  $_POST['mon-sl2'];
    $mon_sl3 =  $_POST['mon-sl3'];
    $mon_sl4 =  $_POST['mon-sl4'];

    $tue_sl1 =  $_POST['tue-sl1'];
    $tue_sl2 =  $_POST['tue-sl2'];
    $tue_sl3 =  $_POST['tue-sl3'];
    $tue_sl4 =  $_POST['tue-sl4'];

    $wed_sl1 =  $_POST['wed-sl1'];
    $wed_sl2 =  $_POST['wed-sl2'];
    $wed_sl3 =  $_POST['wed-sl3'];
    $wed_sl4 =  $_POST['wed-sl4'];

    $thu_sl1 =  $_POST['thu-sl1'];
    $thu_sl2 =  $_POST['thu-sl2'];
    $thu_sl3 =  $_POST['thu-sl3'];
    $thu_sl4 =  $_POST['thu-sl4'];

    $fri_sl1 =  $_POST['fri-sl1'];
    $fri_sl2 =  $_POST['fri-sl2'];
    $fri_sl3 =  $_POST['fri-sl3'];
    $fri_sl4 =  $_POST['fri-sl4'];

    $sat_sl1 =  $_POST['sat-sl1'];
    $sat_sl2 =  $_POST['sat-sl2'];
    $sat_sl3 =  $_POST['sat-sl3'];
    $sat_sl4 =  $_POST['sat-sl4'];

    $sun_sl1 =  $_POST['sun-sl1'];
    $sun_sl2 =  $_POST['sun-sl2'];
    $sun_sl3 =  $_POST['sun-sl3'];
    $sun_sl4 =  $_POST['sun-sl4'];

    require("./Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    if(isset($_SESSION['updating_workshop'])){
        $workshop_id = $_SESSION['updating_workshop'];
        $sql_statement = "UPDATE workshop_details SET basic_tools= '$basic', advanced_tools= '$advanced', area_of_workshop= '$area' WHERE workshop_id ='$workshop_id' ";
        echo $sql_statement;
        $result = $mysqli->query($sql_statement);
        $sql_statement = "SELECT * FROM timing_details WHERE workshop_id='$workshop_id'";
        $days = array ("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
        $result = $mysqli->query($sql_statement);
        if($result->num_rows){
        $sql_statement = "UPDATE timing_details SET  slot1='$mon_sl1', slot2='$mon_sl2', slot3='$mon_sl3',slot4='$mon_sl4' WHERE day='$days[0]' AND workshop_id='$workshop_id' ";
        $result = $mysqli->query($sql_statement);
        echo $sql_statement;
        $sql_statement = "UPDATE timing_details SET  slot1='$tue_sl1', slot2='$tue_sl2', slot3='$tue_sl3',slot4='$tue_sl4' WHERE day='$days[1]' AND workshop_id='$workshop_id' ";
        $result = $mysqli->query($sql_statement);
        echo $sql_statement;
        $sql_statement = "UPDATE timing_details SET  slot1='$wed_sl1', slot2='$wed_sl2', slot3='$wed_sl3',slot4='$wed_sl4' WHERE day='$days[2]' AND workshop_id='$workshop_id'  ";
        $result = $mysqli->query($sql_statement);
        echo $sql_statement;
        $sql_statement = "UPDATE timing_details SET  slot1='$thu_sl1', slot2='$thu_sl2', slot3='$thu_sl3',slot4='$thu_sl4' WHERE day='$days[3]' AND workshop_id='$workshop_id'  ";
        $result = $mysqli->query($sql_statement);
        echo $sql_statement;
        $sql_statement = "UPDATE timing_details SET  slot1='$fri_sl1', slot2='$fri_sl2', slot3='$fri_sl3',slot4='$fri_sl4' WHERE day='$days[4]' AND workshop_id='$workshop_id'  ";
        $result = $mysqli->query($sql_statement);
        echo $sql_statement;
        $sql_statement = "UPDATE timing_details SET  slot1='$sat_sl1', slot2='$sat_sl2', slot3='$sat_sl3',slot4='$sat_sl4' WHERE day='$days[5]' AND workshop_id='$workshop_id'  ";
        $result = $mysqli->query($sql_statement);
        echo $sql_statement;
        $sql_statement = "UPDATE timing_details SET  slot1='$sun_sl1', slot2='$sun_sl2', slot3='$sun_sl3',slot4='$sun_sl4' WHERE day='$days[6]' AND workshop_id='$workshop_id'  ";
        $result = $mysqli->query($sql_statement);
        $_SESSION['w_id']= $workshop_id;
        echo $sql_statement;
        ?>
            <a href="workshop-details.php" class="btn btn-info">Go</a>
            <?php exit(0);
        }
        //header("Location: workshop-details.php");?>

    
    <?php
    
    }
    //prepare statement
    $sql_statement = "INSERT INTO workshop_details VALUES ('$workshop_id','$basic','$advanced','$area','$trans' )";
    //
    $result = $mysqli->query($sql_statement);
    echo $sql_statement;
    $days = array ("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
    
    $sql_statement = "INSERT INTO timing_details VALUES ('$workshop_id','$days[0]','$mon_sl1','$mon_sl2','$mon_sl3','$mon_sl4')  ";
    $result = $mysqli->query($sql_statement);
    echo $sql_statement;
    $sql_statement = "INSERT INTO timing_details VALUES ('$workshop_id','$days[1]','$tue_sl1','$tue_sl2','$tue_sl3','$tue_sl4')  ";
    $result = $mysqli->query($sql_statement);
    echo $sql_statement;
    $sql_statement = "INSERT INTO timing_details VALUES ('$workshop_id','$days[2]','$wed_sl1','$wed_sl2','$wed_sl3','$wed_sl4')  ";
    $result = $mysqli->query($sql_statement);
    echo $sql_statement;
    $sql_statement = "INSERT INTO timing_details VALUES ('$workshop_id','$days[3]','$thu_sl1','$thu_sl2','$thu_sl3','$thu_sl4')  ";
    $result = $mysqli->query($sql_statement);
    echo $sql_statement;
    $sql_statement = "INSERT INTO timing_details VALUES ('$workshop_id','$days[4]','$fri_sl1','$fri_sl2','$fri_sl3','$fri_sl4')  ";
    $result = $mysqli->query($sql_statement);
    echo $sql_statement;
    $sql_statement = "INSERT INTO timing_details VALUES ('$workshop_id','$days[5]','$sat_sl1','$sat_sl2','$sat_sl3','$sat_sl4')  ";
    $result = $mysqli->query($sql_statement);
    echo $sql_statement;
    $sql_statement = "INSERT INTO timing_details VALUES ('$workshop_id','$days[6]','$sun_sl1','$sun_sl2','$sun_sl3','$sun_sl4')  ";
    $result = $mysqli->query($sql_statement);
    echo $sql_statement;
    $_SESSION['w_id']= $workshop_id;
    //header("Location: workshop-details.php");?>

    <a href="workshop-details.php" class="btn btn-info">Go</a>
    <?php
?>