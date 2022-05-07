<?php
require 'includes/common.php';
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="style_index.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            hr{
                height: 1px;
                border: none;
                background-color: #cccccc;
            }
            #form_style{
                padding-left: 10px;
                padding-right: 10px;
            }
            .btn:hover{
                background-color: rgb(73, 139, 120);
                color: white;
            }
        </style>
    </head>
    <body>
        <?php
            include 'includes/header.php';
            if(isset($_GET['initial_budget'])){
                $initial_budget = $_GET['initial_budget'];
            }
            if(isset($_GET['num'])){
                $num_of_members = $_GET['num'];
            }
        ?>
        <div class="container wrapper">
            <div class="row row_style">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div>
                                    <form id="form_style" method="POST" action="plan_details_submit.php">
                                        <div class="form-group">
                                            <label for="title">Title:</label>
                                            <input type="text" class="form-control" name="title" placeholder="Enter Title (Ex. Trip to Goa)" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6 form-group">
                                                <label for="start_date">From:</label>
                                                <input type="date" class="form-control" name="start_date" placeholder="dd/mm/yyyy"  required>
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label for="end_date">To:</label>
                                                <input type="date" class="form-control" name="end_date" placeholder="dd/mm/yyyy" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6 form-group">
                                                <label for="init_budget">Initial Budget</label>
                                                <input type="number" class="form-control" name="init_budget" value="<?php echo $initial_budget; ?>" readonly>
                                            </div>
                                            <div class="col-xs-6 form-group">
                                                <label for="no_of_members">No. of Members</label>
                                                <input type="number" class="form-control" name="no_of_members" value="<?php echo $num_of_members; ?>" readonly>
                                            </div>
                                        </div>
                                        <?php
                                            for($i=1;$i<=$num_of_members;$i++){
                                        ?>
                                        <div class="form-group">
                                            <label for="member_name<?php echo $i;?>">Member <?php echo $i;?></label>
                                            <input type="text" class="form-control" name="member_name<?php echo $i;?>" placeholder="Member <?php echo $i;?> Name" required>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <button type="submit" style="border: 1px solid  rgb(73, 139, 120); border-style: outset;" class="btn btn-block" data-dismiss="modal">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include 'includes/footer.php';
        ?>
    </body>
</html>
