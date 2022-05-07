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
            #fixedbutton{
                position: fixed;
                bottom: 40px;
                right: 15px;
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
            if(isset($_GET['plan_id'])){
                $_SESSION['pid'] = $_GET['plan_id'];
            }
            $plan_id = $_SESSION['pid'];
            $select_plan_query = "SELECT * FROM plan WHERE user_id = '$user_id' AND pid = '$plan_id'";
            $select_plan_query_result = mysqli_query($con,$select_plan_query) or die(mysqli_error($con));
            $plan_row = mysqli_fetch_array($select_plan_query_result);
            $budget = $plan_row['initial_budget'];
            $total_amount = 0;



            $select_member_query = "SELECT * FROM members WHERE plan_id = '$plan_id'";
            $select_member_query_result = mysqli_query($con,$select_member_query) or die(mysqli_error($con));

            while($total_calculation = mysqli_fetch_array($select_member_query_result)){
                $total_amount = $total_amount + $total_calculation['amount_spent'];
            }
            $remaining_amount = $budget - $total_amount;
        ?>
        <div class="container wrapper">
            <div class="row row_style">
                <div class="col-xs-6">
                    <div class="panel">
                        <div class="panel-heading" style="color: white; background-color: rgb(73, 139, 120);">
                            <h3 align="center"><?php echo $plan_row['plan_title']; ?><span class="glyphicon glyphicon-user" style="float: right;"><?php echo $plan_row['no_of_members']; ?></span></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row" id="p_style">
                                <p><b>Budget</b><i class="fa fa-inr" style="float: right;"><?php echo $plan_row['initial_budget']; ?></i></p>
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
                                <?php
                                    if($remaining_amount < 0){
                                ?>
                                <strong>Remaining Amount</strong><p style="float: right; color: <?php echo $text_color; ?>;">Overspent by <i class="fa fa-inr"><?php echo $remaining_amount; ?></i></p>
                                <?php
                                    }
                                    else{
                                ?>
                                <p><b>Remaining Amount</b><i class="fa fa-inr" style="float: right; color: <?php echo $text_color; ?>;"><?php echo $remaining_amount; ?></i></p>
                                    <?php } ?>
                            </div>
                            <div class="row" id="p_style">
                                <strong>Date</strong><p style="float: right;"><?php echo $plan_row['start_date']."  to  ".$plan_row['end_date']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-xs-offset-2" style="padding-top: 50px;">
                    <a href="expense_distribution.php" style="border: 1px solid  rgb(73, 139, 120); border-style: outset; " class="btn btn-block btn-lg">Expense Distribution</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <?php
                        $select_expense_query = "SELECT * FROM members INNER JOIN expense ON members.mid = expense.member_id WHERE members.plan_id='$plan_id'";
                        $select_expense_query_result = mysqli_query($con,$select_expense_query) or die(mysqli_error($con));
                        while($expense_row = mysqli_fetch_array($select_expense_query_result)){
                    ?>
                    <div class="col-xs-6">
                        <div class="panel">
                            <div class="panel-heading" style="color: white; background-color: rgb(73, 139, 120);">
                                <h3 align="center"><?php echo $expense_row['expense_title']; ?></h3>
                            </div>
                            <div class="panel-body">
                                <div class="row" id="p_style">
                                    <p><b>Amount</b><i class="fa fa-inr" style="float: right;"><?php echo $expense_row['expense_amount']; ?></i></p>
                                </div>
                                <div class="row" id="p_style">
                                <strong>Paid by</strong><p style="float: right;"><?php echo $expense_row['member_name']; ?></p>
                                </div>
                                <div class="row" id="p_style">
                                    <strong>Paid on</strong><p style="float: right;"><?php echo $expense_row['expense_date']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-xs-4 col-xs-offset-1">
                    <div class="panel">
                        <div class="panel-heading" style="color: white; background-color: rgb(73, 139, 120);">
                            <h4 align="center">Add New Expense</h4>
                        </div>
                        <div class="panel-body">
                            <div>
                                <form id='p_style' method='POST' action="expense_submit.php">
                                    <div class="form-group">
                                        <label for="expense_title">Title</label>
                                        <input type="text" class="form-control" name="expense_title" placeholder="Expense Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="expense_date">Expense Date</label>
                                        <input type="date" class="form-control" name="expense_date" placeholder="dd/mm/yyy" min='2021-01-11' required>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount_spent">Amount Spent</label>
                                        <input type="number" class="form-control" name="amount_spent" placeholder="Amount Spent (in Rs.)" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="member_name">Spent by</label>
                                        <select name="member_name" class="form-control">
                                            <?php
                                                $select_member_query = "SELECT * FROM members WHERE plan_id = '$plan_id'";
                                                $select_member_query_result = mysqli_query($con,$select_member_query) or die(mysqli_error($con));
                                                while($member_row = mysqli_fetch_array($select_member_query_result)){
                                            ?>
                                            <option><?php echo $member_row['member_name']; ?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
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
        <?php
            include 'includes/footer.php';
        ?>
    </body>
</html>
