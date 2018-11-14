<?php
session_start();
$id = $_GET['id'];
require("./admin-details.php");
$mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = "CALL accept_workshop('$id')";
    
    //
    $result = $mysqli->query($sql_statement);

    if($result){
        echo "Accepted";
    }else{
        echo "Error";
    }
?>