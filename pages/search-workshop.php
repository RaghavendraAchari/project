<!DOCTYPE html>
<html lang="en">
<head>

    <?php require("header.php"); ?>
    <link rel="stylesheet" href="./CSS/search-workshop.css"/> 
    <title>WS: Search workshop for your need</title>
</head>
<body>
    <?php require("navigation.php"); ?>
    <script type="text/javascript">
        var ele = document.getElementById('search-link');
        ele.className +=' active';
        function changeClass(e){
                            var ele = document.getElementById(e);
                                ele.className +=' active';
                        }
    </script>
    <div class="container-fluid mt-3">
        <nav class="navbar navbar-expand-sm bg-light navbar-light search-bar">
            <form class="form-inline" action="#">
                <label for="searchbar mr-sm-2">Search : </label>
                <input class="form-control ml-sm-2 mr-sm-2" name="searchbar" placeholder="search" id="searchbar"/>
                <button class="btn btn-secondary" name="searchbutton" type="submit">Search</button>
            </form>
        </nav>

        <div id="search-window" class="bg-light mt-2 mb-2" >
            <?php 
                

                $server = 'localhost';
                $username = 'root';
                $password = '';
                $dbname='working_solutions';
                
                //create ob of mysqli
                $mysqli = new mysqli($server, $username, $password,$dbname);
                
                
                //mysqli ob will have connect_errno != 0 if err occurs
                if($mysqli->connect_errno){
                    die('Could not connect to '.$mysqli->connect_err());
                }
                $selection="";
                 if(isset($_GET["selection"])){
                    $selection = $_GET["selection"];
                 }else{

                 }
                
                //prepare statement
                $sql_statement = 'SELECT * FROM workshop w,branches b,rating r WHERE w.workshop_branch_id=b.branch_id AND r.workshop_id=w.workshop_id';
                //
                $data = $mysqli->query($sql_statement);
            ?>
                <div class = "row h-100" style="margin : 0rem;">
                    
                        <div class="col-sm-2 bg-light text-dark" style="border-right : 1px solid rgb(158, 158, 158);">
                            <a class="btn btn-info card m-2 <?php echo $selection == "all"? "active" : "" ; ?>" id="all" href="search-workshop.php?selection=all" >
                                    <div class="card-body card-text">
                                        All
                                    </div>
                            </a>
                            <a class="card btn btn-info m-2 <?php echo $selection == "cyber"? "active" : "" ; ?>"  id="cyber" href="search-workshop.php?selection=cyber">
                                <div class="card-body card-text">
                                    Cyber
                                </div>
                            </a>
                            <a class="card btn btn-info m-2 <?php echo $selection == "electrical"? "active" : "" ; ?>" id="electrical" href="search-workshop.php?selection=electrical">
                                <div class="card-body card-text">
                                    Electrical
                                </div>
                            </a>
                            <a class="card btn btn-info m-2 <?php echo $selection == "mechanical"? "active" : "" ; ?>" id="mechanical" href="search-workshop.php?selection=mechanical">
                                <div class="card-body card-text">
                                    Mechanical
                                </div>
                            </a>
                            <a class="card btn btn-info m-2 <?php echo $selection == "carpentry"? "active" : "" ; ?>" id="carpentry" href="search-workshop.php?selection=carpentry">
                                <div class="card-body card-text">
                                    carpentry
                                </div>
                            </a>
                        </div>

                    <div class="col-sm-10">
                        <div class="row mr-0 w-100">
                                <?php 
                                    for ($rowno = 0; $rowno < $data->num_rows; $rowno++) { ?>

                                    <div class="col-sm-3 p-2">
                                        <?php 
                                            $data->data_seek($rowno);
                                            $indrow = $data->fetch_assoc();
                                        ?>
                                        <div class="card h-100" id="workshop-element">
                                            <div class="card-header text-center">
                                                <h4 class="card-title">
                                                    <?php echo $indrow['workshop_name']; ?>
                                                </h4>
                                                
                                            </div>
                                            <div class="card-body card-text">
                                                <p class="card-text mb-1">
                                                    <?php echo "Address : "?>
                                                </p>
                                                <p class="card-text">
                                                    <?php echo $indrow['workshop_address']; ?>
                                                </p>
                                                
                                            </div>
                                            <div class="card-body pt-0">
                                                <h5 class="font-weight-normal">
                                                    <span class="badge badge-info h-50 text-left">
                                                        <?php echo $indrow['branch_name']; ?>
                                                    </span>
                                                    <span class="badge badge-success h-50 m-2">
                                                        <?php echo $indrow['workshop_rating']." / 5"; ?>
                                                    </span>
                                                </h5>
                                                <a class="btn btn-info w-100" href="#">Book</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                            <?php } ?>
                            
                        </div>
                        <div class="form-group text-center">
                            <form method="get"> <input type="submit" class="btn btn-info mt-2 disabled hidden" value="more" /></form>
                        </div>  
                    </div>

                </div>
                
                
                <?php
                    mysqli_close($mysqli);
                ?>
        </div>
    </div>
    <?php require("footer.php"); ?>
</body>
</html>