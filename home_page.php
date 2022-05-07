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
            #padding_style{
                padding-top: 155px;
            }
            #box{
                background-color: white;
                padding: 60px 0px 60px 10px;
            }
            #glyph_color{
                color: rgb(73, 139, 120);
            }
            #p_style{
                padding-left: 10px;
                padding-right: 10px;
            }
            .btn:hover{
                background-color: rgb(73, 139, 120);
                color: white;
            }
            #fixedbutton{
                position: fixed;
                bottom: 40px;
                right: 15px;
            }
        </style>
    </head>
    <body>
        <?php
            include 'includes/header.php';
        ?>
        <?php
            $user_id = $_SESSION['id'];
            $select_plan_query = "SELECT * FROM plan WHERE user_id = '$user_id'";
            $select_plan_query_result = mysqli_query($con,$select_plan_query) or die(mysqli_error($con));
            $total_rows = mysqli_num_rows($select_plan_query_result);
            if($total_rows == 0){
        ?>
        <div class="container wrapper">
            <div style="padding-top: 60px;">
                <h2>You don't have any active plan</h2>
            </div>
            <div class="row" id="padding_style">
                <div class="col-xs-2 col-xs-offset-5">
                    <div class="panel">
                        <div class="panel-body" id="box">
                            <a href="new_plan.php"><span class="glyphicon glyphicon-plus-sign" id="glyph_color"></span> Create a New Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
            else{
        ?>

        <div class="container wrapper">
            <div style="padding-top: 60px;">
                <h2>Your Plans</h2>
            </div>
            <div class="row row_style">
                <?php
                    while($row = mysqli_fetch_array($select_plan_query_result)){
                ?>
                <div class="col-xs-3">
                    <div class="panel">
                        <div class="panel-heading" style="color: white; background-color: rgb(73, 139, 120);">
                            <h3 align="center"><?php echo $row['plan_title']; ?><span class="glyphicon glyphicon-user" style="float: right;"><?php echo $row['no_of_members']; ?></span></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row" id="p_style">
                                <p><b>Budget</b><i class="fa fa-inr" style="float: right;"><?php echo $row['initial_budget']; ?></i></p>
                            </div>
                            <div class="row" id="p_style">
                                <strong>Date</strong><p style="float: right;"><?php echo $row['start_date']."  to  ".$row['end_date']; ?></p>
                            </div>
                            <div style=" color: rgb(73, 139, 120);">
                                <?php echo "<a href='view_plan.php?plan_id=".$row['pid']."'><button type='submit' style='border: 1px solid  rgb(73, 139, 120); border-style: outset;' class='btn btn-block' data-dismiss='modal'>View Plan</button></a>"; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div id="fixedbutton">
                <a href="new_plan.php"><span class="glyphicon glyphicon-plus-sign" id="glyph_color" style="font-size: 50px;"></span></a>
            </div>
        </div>
        <?php } ?>
        <?php
            include 'includes/footer.php';
        ?>
    </body>
</html>
