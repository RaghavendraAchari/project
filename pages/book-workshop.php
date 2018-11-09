<!DOCTYPE html>
<html lang="en">
<head>

    <?php require("header.php"); ?>
    <link rel="stylesheet" href="./CSS/bookpage.css" />
    <title>WS: Book workshops asper your need</title>
</head>
<body>
    <?php require("navigation.php"); ?>
    <script type="text/javascript">
        var ele = document.getElementById('book-link');
        ele.className +=' active';
    </script>

    <div class="container-fluid">
        <div class="row m-3">
            <div class="col-md-2 mb-3" >
                <p>filter : </p>
                <div class="accordion"  id="accordionCollapse" >
                    <div class="card" style="border-radius : 0rem;">
                        <div class="card-header">
                            <a class="card-link" data-toggle="collapse"  href="#collapseOne"><b>DATE</b></a>
                        </div>
                    </div>
                    <div class="collapse" id="collapseOne" data-parent="#accordionCollapse">
                        <div class="card card-body">
                            <p>Choose a date :</p>
                            <form>
                                <div class="form-group form-check">
                                    <label class="form-check-label"><input class="form-check-input" name="dateSelection" id="dateSelection" type="checkbox"> Monday</label>
                                    <label class="form-check-label"><input class="form-check-input"  name="dateSelection" id="dateSelection" type="checkbox"> Tuesday</label>
                                    <label class="form-check-label"><input class="form-check-input"  name="dateSelection" id="dateSelection" type="checkbox"> wednesday</label>
                                    <label class="form-check-label"><input class="form-check-input"  name="dateSelection" id="dateSelection" type="checkbox"> Thursday</label>
                                    <label class="form-check-label"><input class="form-check-input"  name="dateSelection" id="dateSelection" type="checkbox"> Friday</label>
                                    <input class="apply btn btn-secondary  mt-2 mr-2" id="filter1" type="button" value="Apply"/>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card" style="border-radius : 0rem;">
                        <div class="card-header"><a class="card-link" href="#collapseTwo"  data-toggle="collapse" ><b>TIME</b></a></div>             
                    </div>    
                    <div id="collapseTwo" class="collapse" data-parent="#accordionCollapse">
                        <div class="card card-body">
                            <p>Choose a Time :</p>
                            <form>
                                <div class="form-group form-check">
                                    <label class="form-check-label"><input class="form-check-input"  name="timeSelection" id="timeSelection" type="checkbox"/> 9am - 11am</label>
                                    <label class="form-check-label"><input class="form-check-input" name="timeSelection" id="timeSelection" type="checkbox"/> 11am - 1pm</label>
                                    <label class="form-check-label"><input class="form-check-input" name="timeSelection" id="timeSelection" type="checkbox"/> 1pm - 3pm</label>
                                    <label class="form-check-label"><input class="form-check-input" name="timeSelection" id="timeSelection" type="checkbox"/> 3pm - 5pm</label>
                                    <label class="form-check-label"><input class="form-check-input" name="timeSelection" id="timeSelection" type="checkbox"/> 5pm - 7pm</label>
                                    <input class="apply btn btn-secondary mt-2 mr-2 " type="submit" value="Apply" onclick="onClickFilter"/>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card" style="border-radius : 0rem;">
                        <div class="card-header"><a class="card-link" href="#collapseThree"  data-toggle="collapse" ><b>DEPARTMENT</b></a></div>             
                    </div>    
                    <div id="collapseThree" class="collapse" data-parent="#accordionCollapse">
                        <div class="card card-body" style=" border-bottom: 1px solid gainsboro ;">
                            <p>Choose a Time :</p>
                            <form>
                                <div class="form-group form-check">
                                    <label class="form-check-label"><input class="form-check-input" name="timeSelection" id="timeSelection" type="checkbox"/>Cyber</label>
                                    <label class="form-check-label"><input class="form-check-input" name="timeSelection" id="timeSelection" type="checkbox"/>Electrical</label>
                                    <label class="form-check-label"><input class="form-check-input" name="timeSelection" id="timeSelection" type="checkbox"/>Mechanical</label>
                                    <label class="form-check-label"><input class="form-check-input" name="timeSelection" id="timeSelection" type="checkbox"/>Carpentry</label>
                                    <input class="apply btn btn-secondary mt-2 mr-2 " type="submit" value="Apply" onclick="onClickFilter"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-10 mb-3" id="searchResults" style="border-radius : 0rem;" >
                <script type="text/javascript" >
                    $('#filter1').click(function () {
                        $(this).val("Applied");
                    });
                    var request = new XMLHttpRequest();
                    var link = "./Helpers/get-all-workshops.php?selection=all";
                    request.open("GET",link);
                    request.send();
                    request.onreadystatechange = function(){
                        if(request.readyState == 4){
                            var ele = document.getElementById('searchResults');
                            ele.innerHTML= request.responseText;
                        }
                    }
                </script>
            </div>
        </div>
    </div>
    <?php require("footer.php"); ?>
</body>
</html>