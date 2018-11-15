<?php session_start(); 
    if(! isset($_SESSION["user_id"])){
        $_SESSION["user_id"]=null;
        $_SESSION["user_fname"]=null;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>log in</title>
        <link href="./CSS/login-style.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript">
            function checkForm(form) {
                if(form.username.value == ""){
                    form.username.focus();
                    form.username.setAttribute("placeholder","Enter a valid user name");
                    return false;
                }
                if(form.pswd.value == ""){
                    form.pswd.focus();
                    form.username.setAttribute("placeholder","Enter password");
                    return false;
                }
                return true;
            }
        </script>
    </head>

    <body>
        <div class="outer-box">
            <div class="middle">
                <div class="inner-box">
                                <?php 
                        
                        if(isset($_POST["submit"])){
                            $user =$_POST["username"];
                            $pass =$_POST["pswd"];
                             
                             
                            
                            require("Helpers/admin-details.php");
                            $mysqli = new mysqli($server, $username, $password,$dbname);


                            //mysqli ob will have connect_errno != 0 if err occurs
                            if($mysqli->connect_errno){
                                die('Could not connect to '.$mysqli->connect_err());
                            }

                            $sql_statement = "SELECT * FROM admin WHERE admin_id='$user' AND admin_password='$pass' " ;
                            $data = $mysqli->query($sql_statement);
                            
                            if($data->num_rows==1){
                                $data->data_seek(0);
                                $row = $data->fetch_assoc();

                                $_SESSION["admin_id"]=$row["admin_id"];
                                $_SESSION["user_fname"]=$row["admin_name"];
                                header("Location: admin-page.php");
                            }


                            //prepare statement
                            $sql_statement = "SELECT * FROM user WHERE user_id='$user' AND user_password='$pass' " ;
                            $data = $mysqli->query($sql_statement);
                            
                            if($data->num_rows==1){
                                $data->data_seek(0);
                                $row = $data->fetch_assoc();

                                $_SESSION["user_fname"]=$row["user_fname"];
                                $_SESSION["user_id"]=$row["user_id"];
                                $user_name = $row["user_fname"];
                                $user_id=$row["user_id"];
                                header("Location: home.php");
                            }

                            

                        }
                        if(true) {
                            ?>
                            <form action="login.php" method="POST" onsubmit="return checkForm(this);">
                                <div class="heading">
                                    <h2>Log in</h2>
                                </div>
                                <div class="form-box">
                                    <div style="padding : 1px ; border : 1px solid rgba(0,0,0,0.2); color : red ;" <?php echo isset($_POST['submit']) ? "" : "hidden" ; ?> ><span>UserID / Password Incorrect</span></div>
                                    <div class="input-form">
                                        <p>User ID</p>
                                        <input type="text" name="username" placeholder="" />
                                    </div>
                                    <div class="input-form">
                                        <p>Password</p>
                                        <input type="password" name="pswd"  placeholder=""/>
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








