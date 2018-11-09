<?php 
    require("admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    //prepare statement
    $sql_statement = "SELECT * FROM workshop w,branches b,rating r WHERE w.workshop_branch_id=b.branch_id AND r.workshop_id=w.workshop_id";
    //
    $data = $mysqli->query($sql_statement);
?>
                    
<div class="row mr-0 w-100">
        <?php 
            for ($rowno = 0; $rowno < $data->num_rows; $rowno++) { ?>

            <div class="col-sm-3 p-2">
                <?php 
                    $data->data_seek($rowno);
                    $indrow = $data->fetch_assoc();
                    include("get-image.php");
                        
                ?>
                
                <div class="card h-100" id="workshop-element" style="border-radius : 0rem ; background :url('<?php echo $img ; ?>') content-box;">
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
                        <a class="btn btn-info w-100" href="<?php echo "booknow.php?id=".$indrow['workshop_id']; ?>">Book</a>
                        
                    </div>
                </div>
            </div>
        <?php } ?>
    
</div>