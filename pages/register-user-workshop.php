<?php 
    session_start();
    $user_id = $_POST["ownerid"];
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
    $price=500;



    require("Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);


    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = "INSERT INTO workshop VALUES ( null,'$workshop_id','$workshop_name','$workshop_phone','$workshop_email','$workshop_address','$workshop_branch_id','$user_id', $price , 1 )" ;
    // echo $sql_statement;
    $data = $mysqli->query($sql_statement);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("header.php"); ?>
    <link rel="stylesheet" href="./CSS/rent-page.css"/>
    <title>WS: Rent your workshop</title>
</head>
<body>
    <?php require("navigation.php"); ?>
        <script type="text/javascript">
            var ele = document.getElementById('rent-link');
            ele.className +=' active';
        </script>


        <div class="container-fluid">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title">Your Workshop '<?php echo $workshop_name ?>' is successfully registered to your account <br>
                            Enjoy your earning with us.</h3>
                    <h4 class="card-text">We would recommend you to add details to your profile.</h4>
                    <a class="card-link btn btn-info" href="workshop-profile.php" >Update Details</a>
                    <a class="card-link btn btn-info" href="home.php?userid=<?php echo $user_id ?>" >Go To Home</a>
                </div>
            </div>
        </div>

<?php require ("footer.php"); ?>
<?php require("./Helpers/change-user.php"); ?>
</body>
</html> 