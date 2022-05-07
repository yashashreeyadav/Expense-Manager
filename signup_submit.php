


<?php
require 'includes/common.php';
$name = $_POST['name'];
$name = mysqli_real_escape_string($con , $name);



$email = $_POST['email'];
$email = mysqli_real_escape_string($con , $email);
$email_regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

if(!preg_match($email_regex , $email)){
    echo "<script>alert('Incorrect Email id')</script>";
    echo ("<script>location.href='sign_up.php'</script>");
}
$password = $_POST['password'];
if(strlen($password) < 6){
    echo "<script>alert('Incorrect Password(Min. 6 characters)')</script>";
    echo ("<script>location.href='sign_up.php'</script>");
}
$password = mysqli_real_escape_string($con , $password);
$password = md5($password);

$contact = $_POST['contact'];
$contact = mysqli_real_escape_string($con , $contact);
$contact_regex = "/^[789][0-9]{9}$/";
if(!preg_match($contact_regex , $contact )){
    echo "<script>alert('Incorrect contact number')</script>";
    echo ("<script>location.href='sign_up.php'</script>");
}




//check whether email already exists
$select_query = "SELECT * from user WHERE email = '$email'";
$select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
$select_rows = mysqli_num_rows($select_query_result);
if($select_rows!=0){
    echo "<script>alert('This Email address already exists')</script>";
    echo ("<script>location.href='sign_up.php'</script>");
}
//if not then add to DB
else{
    $insert_query = "INSERT INTO user (name,email,password,contact) VALUES ('$name','$email','$password','$contact')";
    $inser_query_result = mysqli_query($con , $insert_query) or die(mysqli_error($con));
    $user_id = mysqli_insert_id($con);
    // $_SESSION['id'] = $user_id;
    // $_SESSION['email'] = $email;
    header('location:login.php');
}



?>
