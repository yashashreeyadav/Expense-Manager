<?php
require 'includes/common.php';
$plan_id = $_SESSION['pid'];
$expense_title = $_POST['expense_title'];
$expense_date = $_POST['expense_date'];
$amount_spent = $_POST['amount_spent'];

if($amount_spent < 0){
    echo "<script>alert('Amount cannot be negative!')</script>";
    echo ("<script>location.href='view_plan.php'</script>");
}
$member_name = $_POST['member_name'];

$select_query = "SELECT * FROM members WHERE plan_id = '$plan_id' AND member_name = '$member_name'";
$select_query_result = mysqli_query($con,$select_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($select_query_result);

$final_amount = $row['amount_spent']+$amount_spent;

$update_query = "UPDATE members SET amount_spent = '$final_amount' WHERE plan_id = '$plan_id' AND member_name = '$member_name'";
$update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));




$member_id = $row['mid'];

$insert_query = "INSERT INTO expense (expense_title,expense_amount,expense_date,member_id) VALUES ('$expense_title','$amount_spent','$expense_date','$member_id')";
$insert_query_result = mysqli_query($con , $insert_query) or die(mysqli_error($con));

echo "<script>alert('Expense Added!')</script>";
echo ("<script>location.href='view_plan.php'</script>");
?>