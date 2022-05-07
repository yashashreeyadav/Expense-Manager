<?php
    require 'includes/common.php';

    $old_password = $_POST['old_password'];
    $old_password = mysqli_real_escape_string ($con , $old_password);
    $old_password = md5($old_password);

    $new_password = $_POST['new_password'];;

    $retype_password = $_POST['retype_password'];

    $email = $_SESSION['email'];

    $select_query = "SELECT * FROM user WHERE email = '$email' AND password = '$old_password'";
    $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($select_query_result);
    if($rows != 1){
        echo "<script>alert('Incorrect Old Password')</script>";
        echo ("<script>location.href='settings.php'</script>");
    }
    else if(strlen($new_password) < 6){
        echo "<script>alert('Password should be atleast 6 characters long')</script>";
        echo ("<script>location.href='settings.php'</script>");
    }
    else if($new_password!=$retype_password){
        echo "<script>alert('Passwords do not match')</script>";
        echo ("<script>location.href='settings.php'</script>");
    }
    else{
        $new_password = mysqli_real_escape_string ($con , $new_password);
        $new_password = md5($new_password);
        $retype_password = mysqli_real_escape_string ($con , $retype_password);
        $retype_password = md5($retype_password);
        $update_query = "UPDATE user SET password = '$new_password' WHERE email = '$email'";
        $update_query_result = mysqli_query($con , $update_query) or die(mysqli_error($con));
        echo "<script>alert('Password updated!')</script>";
        echo ("<script>location.href='login.php'</script>");
    }
?>