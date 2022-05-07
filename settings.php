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
        ?>
        <div class="container wrapper">
            <div class="row row_style">
                <div class="col-xs-4 col-xs-offset-4">
                    <div class="panel">
                        <div class="panel-heading" style="color: white; background-color: rgb(73, 139, 120);">
                            <h3 align="center">Change Password</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div>
                                    <form id="form_style" method="POST" action="settings_submit.php">
                                        <div class="form-group">
                                            <label for="old_password">Old Password</label>
                                            <input type="password" class="form-control" name="old_password" placeholder="Enter old password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <input type="password" class="form-control" name="new_password" placeholder="Enter new password(min. 6 characters)" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="retype_password">Confirm Password</label>
                                            <input type="password" class="form-control" name="retype_password" placeholder="Re-type New Password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" style="border: 1px solid  rgb(73, 139, 120); border-style: outset;" class="btn btn-block" data-dismiss="modal">Change</button>
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
