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
    </head>
    <body>
        <?php
            include 'includes/header.php';
        ?>
        <div id="banner_image" class="wrapper">
            <div class="container">
                <center>
                    <div id="banner_content">
                        <h1>We help you control your budget.</h1>
                        <a href="login.php" style="background-color: rgb(73, 139, 120);" class="btn btn-success btn-lg active">Start Today</a>
                    </div>
                </center>
            </div>
        </div>
        <?php
            include 'includes/footer.php';
        ?>
    </body>
</html>
