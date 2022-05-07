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
            h3{
                padding-top: 0px;
            }
            #form_border{
                /*border: 1px solid rgb(184, 175, 175);*/
                padding: 10px 10px 10px 10px;
                background-color: rgb(255, 255, 255);
            }
            #adjust{
                padding-bottom: 60px;
            }
            hr{
                height: 1px;
                border: none;
                background-color: #cccccc;
            }
        </style>
    </head>
    <body>
        <?php
            include 'includes/header.php';
        ?>
        <div class="container wrapper">
            <div id="adjust">

            </div>
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4" id="form_border">
                    <form method="POST" action="signup_submit.php">
                        <h3 align="center"><b>SIGN UP</b></h3>
                        <hr>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter valid email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password(min. 6 characters)" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Phone Number:</label>
                            <input type="tel" class="form-control" maxlength="10" size="10" name="contact" placeholder="Enter valid Phone Number" required>
                        </div>
                        <div class="btn-signup">
                            <button type="submit" style="background-color: rgb(73, 139, 120);" name="submit" class="btn btn-success btn-block">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include 'includes/footer.php';
        ?>
    </body>
</html>