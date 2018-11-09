<!DOCTYPE html>
<html lang="en">
    <head>
        <title>log in</title>
        <link href="./CSS/login-style.css" type="text/css" rel="stylesheet"/>
    </head>

    <body>
        <div class="outer-box">
            <div class="middle">
                <div class="inner-box">
                                <?php 
                        
                        if(isset($_POST["username"]) && isset($_POST["pswd"])){
                            $user =$_POST["username"];
                            $pass =$_POST["pswd"];
                            
                            require("Helpers/admin-details.php");
                            $mysqli = new mysqli($server, $username, $password,$dbname);


                            //mysqli ob will have connect_errno != 0 if err occurs
                            if($mysqli->connect_errno){
                                die('Could not connect to '.$mysqli->connect_err());
                            }
                            //prepare statement
                            $sql_statement = "SELECT * FROM user WHERE user_id='$user' AND user_password='$pass' " ;
                            $data = $mysqli->query($sql_statement);
                            
                                if($data->num_rows==1){
                                    $data->data_seek(0);
                                    $row = $data->fetch_assoc();
                                    $user_name = $row["user_fname"];
                                    $user_id=$row["user_id"];
                                    ?><div><h4>Log in success full..</h4>
                                            <p>welcome : <?php echo $user_name; ?></p>
                                            <a href="./home.php?user=<?php echo $user_id; ?>" >Continue..</a>
                                        </div><?php
                                }
                        }else {
                            ?>
                            <form action="login.php" method="POST">
                                <div class="heading">
                                    <h2>Log in</h2>
                                </div>
                                <div class="form-box">
                                    <div class="input-form">
                                        <p>Username</p>
                                        <input type="text" name="username" placeholder="Username" />
                                    </div>
                                <div class="input-form">
                                    <p>Password</p>
                                    <input type="password" name="pswd" placeholder="Password" />
                                </div>
        
                                <div class="submit-btn">
                                    <input class="submit" type="submit" name="submit" value="login"/>
                                </div>
                            </form>
                            <footer class="footer">
                                <p class=""><a href="home.php">Skip</a></p>
                            </footer>
                            <div>
                                <p style="font-size :18px ; margin-left:0px ;opacity :.85 ;">Not a member? <a href="register-user.php?user=new" style="color : green;">Register Now</a></p>
                            </div>
                        <?php
                    }
                    
                    ?>
                </div>
            </div>
        </div>
        
        
    </body>
</html>








