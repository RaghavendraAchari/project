<?php 
session_start();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$userid = $_POST['userid'];
$pswr = $_POST['password'];


    require("./Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = "SELECT * FROM user WHERE user_id='$userid' ";
    
    //
    $result = $mysqli->query($sql_statement);
    $result->data_seek(0);
    $data = $result->fetch_assoc();
    $user_id = $data['user_id'];
    if($data['user_fname']!=$fname || $data['user_fname']!=$fname || $data['user_lname']!=$lname 
        || $data['user_address']!=$address || $data['user_email']!=$email || $data['user_phone']!=$phone 
        || $data['user_password']!=$pswr ){
            $sql_statement = "UPDATE user SET user_fname='$fname' , user_lname='$lname' , user_email='$email' , 
            user_phone='$phone' , user_address='$address' , user_password='$pswr' WHERE user_id='$user_id' ";
            
            $updated = $mysqli->query($sql_statement);
            if($updated){
                echo "updated" ;
                header("Location: profile-page.php");
            }
        }else{
            header("Location: profile-page.php");
        }

?>