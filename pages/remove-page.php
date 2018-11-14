<?php session_start(); ?>
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
            <div class="col-sm-4">
                <a href="admin-page.php" class="btn btn-secondary">Go To Profile Page</a>
            </div>
        </nav>

        <div id="search-window" class="bg-light mt-2 mb-2" >
            <?php 
                $selection="";

                if(isset($_GET["selection"])){
                    $selection = $_GET["selection"];
                }else{
                    $selection = "all";
                }
            ?>
                <div class = "row h-100" style="margin : 0rem;">
                    
                        <div class="col-sm-2 bg-light text-dark" style="border-right : 1px solid rgb(158, 158, 158);">
                            <a class="btn btn-info card m-2 <?php echo $selection == "all"? "active" : "" ; ?>" id="all" href="remove-page.php?selection=all&remove=1" >
                                    <div class="card-body card-text">
                                        All
                                    </div>
                            </a>
                            <a class="card btn btn-info m-2 <?php echo $selection == "cyber"? "active" : "" ; ?>"  id="cyber" href="remove-page.php?selection=cyber&remove=1">
                                <div class="card-body card-text">
                                    Cyber
                                </div>
                            </a>
                            <a class="card btn btn-info m-2 <?php echo $selection == "electrical"? "active" : "" ; ?>" id="electrical" href="remove-page.php?selection=electrical&remove=1">
                                <div class="card-body card-text">
                                    Electrical
                                </div>
                            </a>
                            <a class="card btn btn-info m-2 <?php echo $selection == "mechanical"? "active" : "" ; ?>" id="mechanical" href="remove-page.php?selection=mechanical&remove=1">
                                <div class="card-body card-text">
                                    Mechanical
                                </div>
                            </a>
                            <a class="card btn btn-info m-2 <?php echo $selection == "carpentry"? "active" : "" ; ?>" id="carpentry" href="remove-page.php?selection=carpentry&remove=1">
                                <div class="card-body card-text">
                                    carpentry
                                </div>
                            </a>
                        </div>

                    <div class="col-sm-10">
                        <?php 
                            include("./Helpers/get-workshop.php");
                        ?>
                    </div>    

                </div>
        </div>
    </div>
    <?php require("footer.php"); ?>
    <?php require("./Helpers/change-user.php"); ?>
</body>
</html>