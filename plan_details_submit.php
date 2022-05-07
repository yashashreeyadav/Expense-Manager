<?php
require 'includes/common.php';

$plan_id = $_SESSION['pid'];
$user_id = $_SESSION['id'];
$plan_title = $_POST['title'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$update_query = "UPDATE plan SET plan_title = '$plan_title', start_date = '$start_date', end_date = '$end_date' WHERE user_id = '$user_id' AND pid = '$plan_id'";
$update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));

$num_of_members = $_POST['no_of_members'];
for($i=1;$i<=$num_of_members;$i++){
    $member_name = $_POST['member_name'.$i];
    $insert_member_query = "INSERT INTO members (member_name,plan_id) VALUES ('$member_name','$plan_id')";
    $insert_query_result = mysqli_query($con , $insert_member_query) or die(mysqli_error($con));
}
echo "<script>alert('Done')</script>";
echo ("<script>location.href='home_page.php'</script>");
?>