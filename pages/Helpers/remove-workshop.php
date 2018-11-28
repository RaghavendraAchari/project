<?php
    $id=null;
    $select = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(isset($_GET['selection'])){
        $select = $_GET['selection'];
        }

    require("admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = "CALL delete_workshop('$id') ";
    //
    $data = $mysqli->query($sql_statement);
        if($data){
            if(isset($_GET['selection'])){
            header("Location: ../remove-page.php?selection=$select"."&remove=1");
            }else{
                echo "Removed" ;
            }
        }
    }

?>