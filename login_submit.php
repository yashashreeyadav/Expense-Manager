<?php
require 'includes/common.php';
$email = $_POST['email'];
$password = $_POST['password'];
$email = mysqli_real_escape_string($con,$email);
$password = mysqli_real_escape_string($con,$password);

$encrypted_password = md5($password);
$select_query = "SELECT id,email FROM user WHERE email = '$email' AND password = '$encrypted_password'";
$select_query_result = mysqli_query($con,$select_query) or die(mysqli_error($con));
$total_rows = mysqli_num_rows($select_query_result);
if($total_rows == 0){
    echo "<script>alert('Invalid credentials')</script>";
    echo ("<script>location.href='login.php'</script>");
}
else{
    $row = mysqli_fetch_array($select_query_result);
    $_SESSION['email'] = $row['email'];
    $_SESSION['id'] = $row['id'];
    header('location: home_page.php');
}
?>