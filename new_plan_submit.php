<?php
require 'includes/common.php';
$user_id = $_SESSION['id'];
$initial_budget = $_POST['init_budget'];
$num_of_members = $_POST['num_of_members'];
if($initial_budget < 0){
    echo "<script>alert('Budget cannot be negative!')</script>";
    echo ("<script>location.href='new_plan.php'</script>");
}
else if($initial_budget < 50){
    echo "<script>alert('Budget should be atleast 50')</script>";
    echo ("<script>location.href='new_plan.php'</script>");
}
else if($num_of_members <= 1){
    echo "<script>alert('Number of members should be atleast 2')</script>";
    echo ("<script>location.href='new_plan.php'</script>");
}
else{
    $insert_query = "INSERT INTO plan (plan_title,initial_budget,no_of_members,start_date,end_date,user_id) VALUES (NULL,'$initial_budget','$num_of_members',NULL,NULL,'$user_id')";
    $insert_query_result = mysqli_query($con , $insert_query) or die(mysqli_error($con));
    $pid = mysqli_insert_id($con);
    $_SESSION['pid'] = $pid;
    header('location:plan_details.php?initial_budget='.$initial_budget.'&num='.$num_of_members);
}
?>
