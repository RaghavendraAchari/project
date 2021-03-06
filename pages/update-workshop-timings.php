<?php
session_start();

?>
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
                <div class="card-body text-center">
                    <h3 class="card-title">Your Workshop is successfully Updated. <br>
                            </h3>
                    <a href="workshop-details.php?id=<?php echo isset($_SESSION['updating_workshop'])? $_SESSION['updating_workshop'] : ""; ?>" class="btn btn-secondary">Don't update other details and timings</a>

                </div>
                <div class="card-body">
                    <form action="update-timing.php" method="post" id="form">
                        <div class="form form-group">
                            <div class="">
                                <div class="row m-2 p-2">
                                    <div class="col-sm-3 input-group">
                                        <div>
                                            <label for="">No Of Basic tools : </label>
                                            <input  class="form-control " type="text" id="basic_tools" name="basic_tools" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 input-group">
                                        <div>
                                            <label for="">No Of Advanced tools : </label>
                                            <input class="form-control " type="text" id="advanced_tools" name="advanced_tools" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 input-group">
                                        <div>
                                            <label for="">Area Of Your Workshop : </label>
                                            <input class="form-control " type="text" id="area" name="area" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3 input-group">
                                        <div>
                                            <label for="">Trasport Available : </label>
                                            <select class="form-control " name="transport" id="transport"><option value="yes">Yes</option><option value="no">No</option></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="input-group">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>9AM - 12PM</th>
                                            <th>12PM - 3PM</th>
                                            <th>3PM - 6PM</th>
                                            <th>6PM - 9PM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Monday</th>
                                            <td><select class="form-control"  name="mon-sl1" id="mon-sl1"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="mon-sl2" id="mon-sl2"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="mon-sl3" id="mon-sl3"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="mon-sl4" id="mon-sl4"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                        </tr>
                                        <tr>
                                            <th>Tuesday</th>
                                            <td><select class="form-control"  name="tue-sl1" id="tue-sl1"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="tue-sl2" id="tue-sl2"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="tue-sl3" id="tue-sl3"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="tue-sl4" id="tue-sl4"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                        </tr>
                                        <tr>
                                            <th>Wednesday</th>
                                            <td><select class="form-control"  name="wed-sl1" id="wed-sl1"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="wed-sl2" id="wed-sl2"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="wed-sl3" id="wed-sl3"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="wed-sl4" id="wed-sl4"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                        </tr>
                                        <tr>
                                        <th>Thursday</th>
                                            <td><select class="form-control"  name="thu-sl1" id="thu-sl1"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="thu-sl2" id="thu-sl2"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="thu-sl3" id="thu-sl3"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="thu-sl4" id="thu-sl4"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                        </tr>
                                        <tr>
                                        <th>Friday</th>
                                            <td><select class="form-control"  name="fri-sl1" id="fri-sl1"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="fri-sl2" id="fri-sl2"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="fri-sl3" id="fri-sl3"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="fri-sl4" id="fri-sl4"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                        </tr>
                                        <tr>
                                        <th>Saturday</th>
                                            <td><select class="form-control"  name="sat-sl1" id="sat-sl1"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="sat-sl2" id="sat-sl2"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="sat-sl3" id="sat-sl3"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="sat-sl4" id="sat-sl4"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                        </tr>
                                        <tr>
                                            <th>Sunday</th>
                                            <td><select class="form-control"  name="sun-sl1" id="sun-sl1"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="sun-sl2" id="sun-sl2"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="sun-sl3" id="sun-sl3"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                            <td><select class="form-control"  name="sun-sl4" id="sun-sl4"><option value="available">Available</option><option value="not-available">Not Available</option></select></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="input-group">
                                <input class="btn btn-secondary" type="submit" value="Update Timings" name="updatetimings"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php require ("footer.php"); ?>
<?php require("./Helpers/change-user.php"); ?>
</body>
</html> 
