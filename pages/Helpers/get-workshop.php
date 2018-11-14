<?php 
$remove = null;
    if(isset($_GET['remove'])){
        $remove = true;
    }
    require("admin-details.php");
    $mysqli = new mysqli($server, $username, $password,$dbname);
    
    
    //mysqli ob will have connect_errno != 0 if err occurs
    if($mysqli->connect_errno){
        die('Could not connect to '.$mysqli->connect_err());
    }
    if(isset($_GET['from'])){
        $selection = $_GET['selection'];
    }

    switch ($selection) {
        case 'all':
        $sql_statement = "SELECT * FROM workshop w,branches b,rating r WHERE w.workshop_branch_id=b.branch_id AND r.workshop_id=w.workshop_id";
        break;
        case 'cyber':
        $sql_statement = 'SELECT * FROM workshop w,rating r,branches b WHERE r.workshop_id=w.workshop_id AND w.workshop_branch_id=b.branch_id AND w.workshop_branch_id IN (SELECT branch_id FROM branches WHERE branch_name=\'Cyber\')';
        break;
        case 'electrical':
        $sql_statement = "SELECT * FROM workshop w,rating r,branches b  WHERE r.workshop_id=w.workshop_id AND w.workshop_branch_id=b.branch_id AND w.workshop_branch_id IN (SELECT branch_id FROM branches WHERE branch_name='Electrical')";
        break;
        case 'mechanical':
        $sql_statement = "SELECT * FROM workshop w,rating r,branches b  WHERE r.workshop_id=w.workshop_id AND w.workshop_branch_id=b.branch_id AND w.workshop_branch_id IN (SELECT branch_id FROM branches WHERE branch_name='Mechanical')";
        break;
        case 'carpentry':
        $sql_statement = "SELECT * FROM workshop w,rating r,branches b  WHERE r.workshop_id=w.workshop_id AND w.workshop_branch_id=b.branch_id AND w.workshop_branch_id IN (SELECT branch_id FROM branches WHERE branch_name='Carpentry')";
        break;
        
        default:
        $sql_statement = "SELECT * FROM workshop w,branches b,rating r WHERE w.workshop_branch_id=b.branch_id AND r.workshop_id=w.workshop_id";
            break;
    }
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
                
                <div class="card h-100" id="workshop-element" style="border-radius : 0rem ; ">
                    <div class="card-header text-center h-25"style="overflow: hidden ;">
                        <h4 class="card-title">
                            <?php echo $indrow['workshop_name']; ?>
                        </h4>
                        
                    </div>
                    <div class="card-body d-flex flex-column h-50 card-text">
                        <div class="h-75">
                            <p class="card-title mb-1">
                                <?php echo "Address : "?>
                            </p>
                            <p class="card-text">
                                <?php echo $indrow['workshop_address']; ?>
                            </p>
                        </div>
                        <div class="align-self-start h-25">
                            <p class="card-title mb-1 ">Price : </p>
                            <p class="card-text mb-1 "> Rs : <?php echo $indrow['price']=='0'?"-" :$indrow['price'] ; ?> </p>
                        </div>
                        
                    </div>
                    <div class="card-body pt-0 h-30">
                        <h5 class="font-weight-normal">
                            <span class="badge badge-info h-50 text-left">
                                <?php echo $indrow['branch_name']; ?>
                            </span>
                            <span class="badge badge-success h-50 m-2">
                                <?php echo $indrow['workshop_rating']." / 5"; ?>
                            </span>
                        </h5>
                        <a class="btn btn-info w-100" href="<?php echo $remove==true? "./Helpers/remove-workshop.php?id=".$indrow['workshop_id']."&selection=".$selection : "booknow.php?id=".$indrow['workshop_id']; ?>"><?php echo $remove==true ? "Remove" : "Book" ; ?></a>
                        
                    </div>
                </div>
            </div>
        <?php } ?>
    
</div>