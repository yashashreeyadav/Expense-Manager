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
            #p_style{
                padding-left: 10px;
                padding-right: 10px;
            }
            .btn:hover{
                color: rgb(255, 255, 255);
                background-color: rgb(73, 139, 120);
                
            }
        </style>
    </head>
    <body>
        <?php
            include 'includes/header.php';
        ?>
    <?php
    $user_id = $_SESSION['id'];
    $plan_id = $_SESSION['pid'];
    $select_plan_query = "SELECT * FROM plan WHERE user_id = '$user_id' AND pid = '$plan_id'";
    $select_plan_query_result = mysqli_query($con,$select_plan_query) or die(mysqli_error($con));
    $plan_row = mysqli_fetch_array($select_plan_query_result);
    $budget = $plan_row['initial_budget'];
    $total_amount = 0;
    


    $select_member_query = "SELECT * FROM members WHERE plan_id = '$plan_id'";
    $select_member_query_result = mysqli_query($con,$select_member_query) or die(mysqli_error($con));
    ?>
        <div class="container wrapper">
            <div class="row row_style">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="panel">
                        <div class="panel-heading" style="color: white; background-color: rgb(73, 139, 120);">
                            <h3 align="center"><?php echo $plan_row['plan_title']; ?><span class="glyphicon glyphicon-user" style="float: right;"><?php echo $plan_row['no_of_members']; ?></span></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row" id="p_style">
                                <p><b>Initial Budget</b><i class="fa fa-inr" style="float: right;"><?php echo $plan_row['initial_budget']; ?></i></p> 
                            </div>
                            <?php 
                                while($total_calculation = mysqli_fetch_array($select_member_query_result)){
                                    $total_amount = $total_amount + $total_calculation['amount_spent'];
                            ?>
                            <div class="row" id="p_style">
                                <p><b><?php echo $total_calculation['member_name']; ?></b><i class="fa fa-inr" style="float: right;"><?php echo $total_calculation['amount_spent']; ?></i></p> 
                            </div>
                            <?php
                                }
                                $remaining_amount = $budget - $total_amount;
                            ?>
                            <div class="row" id="p_style">
                                <p><b>Total Amount Spent</b><i class="fa fa-inr" style="float: right;"><?php echo $total_amount; ?></i></p> 
                            </div>
                            <div class="row" id="p_style">
                                <?php
                                        if($remaining_amount > 0){
                                            $text_color = "green";
                                        }
                                        else if($remaining_amount < 0){
                                            $text_color = "red";
                                        }
                                        else if($remaining_amount == 0){
                                            $text_color = "black";
                                        }
                                ?>
                                <p><b>Remaining Amount</b><i class="fa fa-inr" style="float: right; color: <?php echo $text_color; ?>;"><?php echo $remaining_amount; ?></i></p> 
                            </div>
                            <div class="row" id="p_style">
                                <?php
                                    $individual_shares = $total_amount/$plan_row['no_of_members'];
                                ?>
                                <p><b>Individual Shares</b><i class="fa fa-inr" style="float: right;"><?php echo $individual_shares; ?></i></p> 
                            </div>
                            <?php
                                $select_member_query = "SELECT * FROM members WHERE plan_id = '$plan_id'";
                                $select_member_query_result = mysqli_query($con,$select_member_query) or die(mysqli_error($con));
                                while($member_row = mysqli_fetch_array($select_member_query_result)){
                                    $final_contribution = $member_row['amount_spent']-$individual_shares;
                            ?>
                            <div class="row" id="p_style">
                                <?php
                                    if($final_contribution > 0){
                                        $text_color = "green";
                                        $text = "Gets Back ";
                                    }
                                    else if($final_contribution < 0){
                                        $text_color = "red";
                                        $text = "Owes ";
                                        $final_contribution = $individual_shares-$member_row['amount_spent'];
                                    }
                                    else if($final_contribution == 0){
                                        $text_color = "black";
                                        $text = "All Settled Up";
                                    }

                                    if($final_contribution == 0){
                                ?>
                                <strong><?php echo $member_row['member_name']; ?></strong><p style="float: right; color: <?php echo $text_color; ?>;"><?php echo $text; ?></p> 
                                <?php
                                    }
                                    else{
                                ?>
                                <strong><?php echo $member_row['member_name']; ?></strong><p style="float: right; color: <?php echo $text_color; ?>;"><?php echo $text; ?><i class="fa fa-inr"><?php echo $final_contribution; ?></i></p>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <div align="center">
                                <a href="view_plan.php"  style="border: 1px solid  rgb(73, 139, 120); border-style: outset; " class="btn"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</a>
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