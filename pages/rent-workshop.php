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
            <form  action="rent.php" method="POST">
                <h2>Workshop Registration : </h2>

                <div class="form-group basic">
                    <h5 class="text-danger">Workshop Owner Info : </h5>
                    <div class="form-inline">
                            <label for="ownerid" class="mr-sm-2" >Workshop owner id : </label>
                            <input type="text" class="form-control mb-2 mr-sm-4" id="ownername" name="ownername" placeholder="Enter Workshop owner id"/>
                    </div>
                </div>
                <div class="form-group basic">
                    <h5 class="text-danger">Workshop Info : </h5>
                    <div class="form-inline">
                            <label for="workshopname" class="mr-sm-2" >Workshop name : </label>
                            <input type="text" class="form-control mb-2 mr-sm-4" id="workshopname" name="workshopname" placeholder="Enter Workshop name"/>
                    </div>
                </div>
                <div class="form-group basic">
                    <h5 class="text-danger">Workshop Contact Info : </h5>
                    <div class="form-inline">
                        <label for="details"  class="mr-sm-2" >E-mail : </label>
                        <div class="input-group">
                                <div class="input-group-prepend mb-2" >
                                    <span class="input-group-text">@</span>
                                </div>
                            <input type="email" class="form-control mb-2 mr-sm-4" id="details" name="details" placeholder="Enter details"/>
                        </div>
                        <label for="Workshopphone" class="mr-sm-2" >Workshop Phone no : </label>
                        <div class="input-group">
                                <div class="input-group-prepend mb-2" >
                                    <span class="input-group-text">+91</span>
                                </div>
                            <input type="text" class="form-control mb-2 mr-sm-4" id="Workshopphone" name="phone" placeholder="Enter workshop Phone number"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h5 class="text-danger">Workshop details : </h5>
                    <div >
                        <label for="description" class="mr-sm-2" >Description of Workshop : </label>
                        <textarea type="text" cols="30" rows="10" class="form-control mb-2 mr-sm-4" id="description" name="description" placeholder="Describe your workshop..."></textarea>
                    </div>
                </div>

            <input class="btn btn-secondary mr-sm-4" type="submit" value="submit" name="submit"/>
            <input class="btn btn-secondary" type="reset" value="clear fields"/>
            </form>
        </div>
    <?php require("footer.php"); ?>
</body>
</html>
