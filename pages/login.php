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
                        
                        if(isset($_POST["username"]) && isset($_POST["password"])){
                            $user =$_POST["username"];
                            $password = $_POST["password"];
                            require("Helpers/admin-details.php");
                            $mysqli = new mysqli($server, $username, $password,$dbname);


                            //mysqli ob will have connect_errno != 0 if err occurs
                            if($mysqli->connect_errno){
                                die('Could not connect to '.$mysqli->connect_err());
                            }
                            //prepare statement
                            $sql_statement = "SELECT * FROM user WHERE user_id='$user' AND user_password='$password'" ;
                            
                            $data = $mysqli->query($sql_statement);
                            echo "next to sql ";
                            
                                $data->data_seek(0);
                                $row = $data->fetch_assoc();
                                $user_id = $row["user_id"];
                                echo "accepted ".$row["user_id"];
                        }else {
                            ?>
                            <form action="login.php" method="post">
                                <div class="heading">
                                    <h2>Log in</h2>
                                </div>
                                <div class="form-box">
                                    <div class="input-form">
                                        <p>Username</p>
                                        <input type="text" name="username" />
                                    </div>
                                <div class="input-form">
                                    <p>Password</p>
                                    <input type="password" name="password" />
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








