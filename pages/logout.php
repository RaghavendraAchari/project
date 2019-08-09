<?php  
    session_start();
    $a = session_destroy();
    if($a==true){
        header("Location: home.php");
    }else{
        echo "successfull";
    }
?>