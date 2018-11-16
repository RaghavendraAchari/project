<?php
session_start();

$workshop_id = $_SESSION['updating_workshop'];

    require("./Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }

    $workshop_name = $_POST["workshopname"];
    $workshop_branch = $_POST["workshopbranch"];
    $workshop_branch_id;
    switch ($workshop_branch) {
        case 'Cyber':
        $workshop_branch_id=1;
        break;
        case 'Electrical':
        $workshop_branch_id=2;
        break;
        case 'Mechanical':
        $workshop_branch_id=3;
        break;
        case 'Carpentry':
        $workshop_branch_id=4;
        break;
        
        default:
            # code...
            break;
    }
    $workshop_address = $_POST["address"];
    $workshop_email = $_POST["email"];
    $workshop_phone = $_POST["phone"];
    $workshop_description = $_POST["description"];
    $workshop_id = $_POST["workshopid"];
    $workshop_price = $_POST["price"];
    $sql_statement = "UPDATE workshop SET workshop_name='$workshop_name', workshop_phone='$workshop_phone' ,
     workshop_email= '$workshop_email', workshop_address='$workshop_address' ,price='$workshop_price' WHERE workshop_id='$workshop_id'";
$result = $mysqli->query($sql_statement);
echo $sql_statement;

if($result){
    $_SESSION['updated_workshop']=true;
    header("Location: update-workshop-timings.php");

}
?>