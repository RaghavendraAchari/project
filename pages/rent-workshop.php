
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("header.php"); ?>
    <link rel="stylesheet" href="./CSS/rent-page.css"/>
    <title>WS: Rent your workshop</title>
</head>
<body>
    <?php require("navigation.php"); ?>
        <script type="text/javascript">
            var ele = document.getElementById('rent-link');
            ele.className +=' active';
        </script>
        <div class="container-fluid">

            <div class="card">
                <form  action="register-user-workshop.php" method="POST">
                    <h2 class="pb-2">Workshop Registration : </h2>

                    <div class="row m-0 form-group">
                        <div class="col-sm-12 heading"><h5 class="text-danger">Workshop Owner Info : </h5></div>
                        <div class="col-sm-6 basic">
                            <label for="ownerid" class="mr-sm-2" >Workshop owner id : </label>
                            <input type="text" class="form-control mb-2 mr-sm-4" id="ownerid" name="ownerid" placeholder="Enter Workshop owner id"/>
                        </div>
                        <div class="col-sm-12 heading"><h5 class="text-danger">Workshop Info : </h5></div>
                        <div class="col-sm-6 basic">
                            <label for="workshopname" class="mr-sm-2" >Workshop name : </label>
                            <input type="text" class="form-control mb-2 mr-sm-4" id="workshopname" name="workshopname" placeholder="Enter Workshop name"/>
                        </div>
                        <div class="col-sm-6 basic">
                            <label for="workshopid" class="mr-sm-2" >Workshop id : </label>
                            <input type="text" class="form-control mb-2 mr-sm-4" id="workshopid" name="workshopid" placeholder="Create Workshop id"/>
                        </div>
                        <div class="col-sm-6 basic">
                            <label for="workshopbranch" class="mr-sm-2" >Workshop branch : </label>
                            <select type="text" class="form-control mb-2 mr-sm-4" id="workshopbranch" name="workshopbranch" placeholder="Select Workshop branch">
                                <option>Cyber</option>
                                <option>Electrical</option>
                                <option>Mechanical</option>
                                <option>Carpentry</option>
                            </select>
                        </div>
                        <div class="col-sm-12 basic">
                            <div class="form">
                                <label for="usrAddress">Address of workshop :  </label>
                                <input type="text" class="form-control" name="address" placeholder="Enter workshop address" id="workshopAddress"/>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 heading"><h5 class="text-danger">Workshop Contact Info : </h5></div>
                        <div class="col-sm-6 basic">
                        <label for="details"  class="mr-sm-2" >E-mail : </label>
                            <div class="input-group">
                                    <div class="input-group-prepend mb-2" >
                                        <span class="input-group-text">@</span>
                                    </div>
                                <input type="email" class="form-control mb-2 mr-sm-4" id="details" name="email" placeholder="Enter details"/>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 basic">
                            <label for="Workshopphone" class="mr-sm-2" >Workshop Phone no : </label>
                            <div class="input-group">
                                    <div class="input-group-prepend mb-2" >
                                        <span class="input-group-text">+91</span>
                                    </div>
                                <input type="text" class="form-control mb-2 mr-sm-4" id="Workshopphone" name="phone" placeholder="Enter workshop Phone number"/>
                            </div>
                        </div>
                        <div class="col-sm-12 heading"><h5 class="text-danger">Workshop details : </h5></div>
                        <div class="col-sm-6 basic">
                            <div >
                                <label for="description" class="mr-sm-2" >Description of Workshop : </label>
                                <textarea type="text" cols="30" rows="10" class="form-control mb-2 mr-sm-4" id="description" name="description" placeholder="Describe your workshop..."></textarea>
                            </div>
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
