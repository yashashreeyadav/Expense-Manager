<?php
require 'includes/common.php';
if (isset($_SESSION['email'])) {
    header('location:home_page.php');
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
                        <div class="panel-heading">
                            <h3 align="center">LOGIN</h3>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div>
                                    <form id="form_style" method="POST" action="login_submit.php">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" style="background-color: rgb(73, 139, 120);" class="btn btn-success btn-block" data-dismiss="modal">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel-footer">
                                Don't have an account? <a href="sign_up.php">Register</a>
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