<?php  
    session_start();
    $a = session_destroy();
    if($a==true){
        echo "successfull";
    }
    header("Location: home.php");
?>