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
            <form  action="register.php" method="POST">
                <h2 class="pb-2">Registration : </h2>

                <div class="row m-0 form-group">
                    <div class="col-sm-12 heading"><h5 class="text-danger">Personal Info : </h5></div>
                    
                    <div class="col-sm-6 basic">
                        <label for="fname" class="mr-sm-2" >First name : </label>
                                <input type="text" class="form-control mb-2 mr-sm-4" id="fname" name="fName" placeholder="Enter first name"/>
                    </div>
                    <div class="col-sm-6 basic">
                        <label for="lname" class="mr-sm-2" >Last name : </label>
                                <input type="text" class="form-control mb-2 mr-sm-4" id="lname" name="lName" placeholder="Enter last name"/>
                    </div>

                    <div class="col-sm-12 basic">
                        <div class="form">
                            <label for="usrAddress">Address :  </label>
                            <input type="text" class="form-control" name="address" placeholder="Address" id="usrAddress"/>
                        </div>
                    </div>

                    

                    <div class="col-sm-12 heading"><h5 class="text-danger">Contact Info : </h5></div>
                    
                    <div class="col-sm-6 basic">
                        <label for="email"  class="mr-sm-2" >E-mail : </label>
                        <div class="input-group">
                            <div class="input-group-prepend mb-2" >
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="email" class="form-control mb-2 mr-sm-4" id="email" name="email" placeholder="Enter Email"/>
                        </div>
                    </div>
                    <div class="col-sm-6 basic">
                        <label for="phone" class="mr-sm-2" >Phone no : </label>
                        <div class="input-group">
                                <div class="input-group-prepend mb-2" >
                                    <span class="input-group-text">+91</span>
                                </div>
                                <input type="text" class="form-control mb-2 mr-sm-4" id="phone" name="phone" placeholder="Enter Phone number"/>
                        </div>
                    </div>
                    <div class="col-sm-12 heading"><h5 class="text-danger">Identification Info : </h5></div>
                     
                     <div class="col-sm-6 basic">
                        <label for="userid" class="mr-sm-2" >User Id : </label>
                        <input class="form-control mb-2 mr-sm-4" type="text" id="userid" placeholder="Enter user id" name="userid"/>
                    </div>
                    <div class="col-sm-12 btn-field">
                        <input class="btn btn-secondary mr-sm-4" type="submit" value="Submit" name="submit"/>
                        <input class="btn btn-secondary" type="reset" value="Clear fields"/>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
<?php require("footer.php"); ?>
</body>
</html>