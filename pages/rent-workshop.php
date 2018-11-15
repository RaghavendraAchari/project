<?php session_start();
$update = false;
$workshop_id = null;
if(isset($_GET['update'])){
    $update = true;
    $workshop_id = $_GET['id'];
    $_SESSION['updating_workshop']= $workshop_id;
}

    require("./Helpers/admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $result =null;

    if($workshop_id!=null){
        $sql_statement = "SELECT * FROM workshop WHERE workshop_id='$workshop_id'";
    //
        $result = $mysqli->query($sql_statement);
        $workshop_data = $result->fetch_assoc();
        $branch = $workshop_data['Workshop_branch_id'];

        $sql_statement = "SELECT * FROM branches WHERE branch_id='$branch'";
        $branch_result = $mysqli->query($sql_statement);
        $branch_result->data_seek(0);
        $branch_details = $branch_result->fetch_assoc();
        $branch_name = $branch_details['branch_name'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require("header.php"); ?>
    <link rel="stylesheet" href="./CSS/rent-page.css"/>
    <title>WS: Rent your workshop</title>
    <script type="text/javascript">
            function checkForm(form) {
                if(form.ownerid.value == ""){
                    alert("Owner ID is required");
                    form.ownerid.focus();
                    return false;
                }
                if(form.workshopname.value == ""){
                    alert("Workshop name is required");
                    form.workshopname.focus();
                    return false;
                }
                if(form.workshopname.value == ""){
                    alert("Workshop name is required");
                    form.workshopname.focus();
                    return false;
                }
                if(form.workshopname.value == ""){
                    alert("Workshop name is required");
                    form.workshopname.focus();
                    return false;
                }
                if(form.workshopid.value == ""){
                    alert("Workshop ID is required");
                    form.workshopid.focus();
                    return false;
                }
                if(form.workshopbranch.value == "None"){
                    alert("Workshop branch is Not selected");
                    form.workshopbranch.focus();
                    return false;
                }
                if(form.address.value == ""){
                    alert("Workshop name is required");
                    form.address.focus();
                    return false;
                }
                if(form.email.value == ""){
                    alert("Workshop name is required");
                    form.email.focus();
                    return false;
                }
                if(form.phone.value == ""){
                    alert("Workshop name is required");
                    form.phone.focus();
                    return false;
                }else if(form.phone.value.length > 10){
                    alert("Phone number is more than 10 digit");
                    form.phone.focus();
                    return false;
                }
                
                return true;
            }
        </script>
</head>
<body>
    <?php require("navigation.php"); ?>
        <script type="text/javascript">
            var ele = document.getElementById('rent-link');
            ele.className +=' active';
        </script>
        <div class="container-fluid">

            <div class="card">
                <form  action="<?php echo $update ?"update-workshop.php" : "register-user-workshop.php"?>" method="POST" onsubmit="return checkForm(this);">
                    <h2 class="pb-2">Workshop <?php echo $update ? "Update" : "Registration" ;?> : </h2>

                    <div class="row m-0 form-group">
                        <div class="col-sm-12 heading"><h5 class="text-danger">Workshop Owner Info : </h5></div>
                        <div class="col-sm-6 basic">
                            <label for="ownerid" class="mr-sm-2" >Workshop owner id : <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-2 mr-sm-4" id="ownerid" name="ownerid" placeholder="Enter Workshop owner id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] :'' ; ?>"/>
                        </div>
                        <div class="col-sm-12 heading"><h5 class="text-danger">Workshop Info : </h5></div>
                        <div class="col-sm-6 basic">
                            <label for="workshopname" class="mr-sm-2" >Workshop name : <span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo $update ? $workshop_data['workshop_name'] : "";?>" class="form-control mb-2 mr-sm-4" id="workshopname" name="workshopname" placeholder="Enter Workshop name"/>
                        </div>
                        <div class="col-sm-6 basic">
                            <label for="workshopid" class="mr-sm-2" >Workshop id : <span class="text-danger">*</span></label>
                            <input type="text"  value="<?php echo $update ? $workshop_data['workshop_id'] : "";?>" <?php echo $update ? "hidden" : ""; ?> class="form-control mb-2 mr-sm-4" id="workshopid" name="workshopid" placeholder="Create Workshop id"/>
                        </div>
                        <div class="col-sm-6 basic">
                            <label for="workshopbranch" class="mr-sm-2" >Workshop branch : <span class="text-danger">*</span></label>
                            <select type="text"  selected="<?php echo $update ? $branch_name : "None";?>" class="form-control mb-2 mr-sm-4" id="workshopbranch" name="workshopbranch" placeholder="Select Workshop branch">
                                <option value="None">None</option>
                                <option value="Cyber">Cyber</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Carpentry">Carpentry</option>
                            </select>
                        </div>
                        <div class="col-sm-12 basic">
                            <div class="form">
                                <label for="usrAddress">Address of workshop :  <span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $update ? $workshop_data['workshop_address'] : "";?>" class="form-control" name="address" placeholder="Enter workshop address" id="workshopAddress"/>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 heading"><h5 class="text-danger">Workshop Contact Info : </h5></div>
                        <div class="col-sm-6 basic">
                        <label for="details"  class="mr-sm-2" >E-mail : <span class="text-danger">*</span></label>
                            <div class="input-group">
                                    <div class="input-group-prepend mb-2" >
                                        <span class="input-group-text">@</span>
                                    </div>
                                <input type="email" value="<?php echo $update ?$workshop_data['workshop_email'] : "";?>" class="form-control mb-2 mr-sm-4" id="details" name="email" placeholder="Enter details"/>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 basic">
                            <label for="Workshopphone" class="mr-sm-2" >Workshop Phone no : <span class="text-danger">*</span></label>
                            <div class="input-group">
                                    <div class="input-group-prepend mb-2" >
                                        <span class="input-group-text">+91</span>
                                    </div>
                                <input type="text" value="<?php echo $update ?$workshop_data['workshop_phone'] : "";?>" class="form-control mb-2 mr-sm-4" id="Workshopphone" name="phone" placeholder="Enter workshop Phone number"/>
                            </div>
                        </div>
                        <div class="col-sm-12 heading"><h5 class="text-danger">Workshop details : </h5></div>
                        <div class="col-sm-6 basic">
                            <div >
                                <label for="description" class="mr-sm-2" >Description of Workshop : </label>
                                <textarea type="text" value="<?php echo $update ? "": "";?>" cols="30" rows="10" class="form-control mb-2 mr-sm-4" id="description" name="description" placeholder="Describe your workshop..."></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 btn-field">
                            <input class="btn btn-secondary mr-sm-4" type="submit" value="Submit and Update Details" name="submit"/>
                            <input class="btn btn-secondary" type="reset" value="Clear fields"/>
                        </div>
                    </div>
                </form>
            </div>

            
        </div>
    <?php require("footer.php"); ?>
    <?php require("./Helpers/change-user.php"); ?>
</body>
</html>
