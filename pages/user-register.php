<?php session_start(); 
    $result = null ; 
    $data = null;
    $updating = null ;
    if(isset($_GET['update'])){
        $updating = true;
        $user = $_SESSION['user_id'];
        require("./Helpers/admin-details.php");
        $mysqli = new mysqli($server, $username, $password,$dbname);
        
        
        //mysqli ob will have connect_errno != 0 if err occurs
        if($mysqli->connect_errno){
            die('Could not connect to '.$mysqli->connect_err());
        }
        $sql_statement = "SELECT * FROM user WHERE user_id='$_SESSION[user_id]'";

        //
        $result = $mysqli->query($sql_statement);
        $result->data_seek(0);
        $data = $result->fetch_assoc();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("header.php");?>
    <link rel="stylesheet" href="./CSS/user-register.css"/>
    <title>Register Yourself</title>
</head>
<body>
<?php require("navigation.php"); ?>
        <script type="text/javascript">
            var ele = document.getElementById('register-link');
            ele.className +=' active';
        </script>
    <div class="container-fluid">
        <div class="card">
            <form  action="<?php echo $updating==true ? "update.php" : "register.php" ;?>" method="POST">
                <h2 class="pb-2"><?php echo $updating==true ? "Update : " : "Registration : "; ?></h2>

                <div class="row m-0 form-group">
                    <div class="col-sm-12 heading"><h5 class="text-danger">Personal Info : </h5></div>
                    
                    <div class="col-sm-6 basic">
                        <label for="fname" class="mr-sm-2" >First name : </label>
                        <input type="text" class="form-control mb-2 mr-sm-4" value="<?php echo $updating==true ? $data['user_fname'] : "" ;?>" id="fname" name="fname" placeholder="Enter first name"/>
                    </div>
                    <div class="col-sm-6 basic">
                        <label for="lname" class="mr-sm-2" >Last name : </label>
                        <input type="text" class="form-control mb-2 mr-sm-4" value="<?php echo $updating==true ? $data['user_lname'] : "" ;?>" id="lname" name="lname" placeholder="Enter last name"/>
                    </div>

                    <div class="col-sm-12 basic">
                        <div class="form">
                            <label for="usrAddress">Address :  </label>
                            <input type="text" class="form-control" value="<?php echo $updating==true ? $data['user_address'] : "" ;?>" name="address" placeholder="Address" id="usrAddress"/>
                        </div>
                    </div>

                    

                    <div class="col-sm-12 heading"><h5 class="text-danger">Contact Info : </h5></div>
                    
                    <div class="col-sm-6 basic">
                        <label for="email"  class="mr-sm-2" >E-mail : </label>
                        <div class="input-group">
                            <div class="input-group-prepend mb-2" >
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="email" class="form-control mb-2 mr-sm-4" value="<?php echo $updating==true ? $data['user_email'] : "" ;?>" id="email" name="email" placeholder="Enter Email"/>
                        </div>
                    </div>
                    <div class="col-sm-6 basic">
                        <label for="phone" class="mr-sm-2" >Phone no : </label>
                        <div class="input-group">
                                <div class="input-group-prepend mb-2" >
                                    <span class="input-group-text">+91</span>
                                </div>
                                <input type="text" class="form-control mb-2 mr-sm-4" value="<?php echo $updating==true ? $data['user_phone'] : "" ;?>" id="phone" name="phone" placeholder="Enter Phone number"/>
                        </div>
                    </div>
                    <div class="col-sm-12 heading"><h5 class="text-danger">Identification Info : </h5></div>
                     
                     <div class="col-sm-6 basic">
                        <label for="userid" class="mr-sm-2" >User Id : </label>
                        <input class="form-control mb-2 mr-sm-4 " <?php echo $updating==true? 'hidden' : ""; ?> type="text" value="<?php echo $updating==true? $data['user_id'] : "" ;?>"  id="userid" placeholder="<?php echo $updating==true ? "Cannot alter user id":"Create a user id" ?>" name="userid"/>
                    </div>
                    <div class="col-sm-6 basic">
                        <label for="password" class="mr-sm-2" >User Password : </label>
                        <input class="form-control mb-2 mr-sm-4" value="<?php echo $updating==true ? $data['user_password'] : "" ;?>" type="password" id="password" placeholder="Create a password" name="password"/>
                    </div>
                    <div class="col-sm-12 btn-field">
                        <input class="btn btn-secondary mr-sm-4" type="submit" value="Submit" name="submit"/>
                        <?php echo $updating==true? "" : '<input class="btn btn-secondary" type="reset" value="Clear fields"/>' ;?>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
<?php require("footer.php"); ?>
<?php require("./Helpers/change-user.php"); ?>
</body>
</html>
