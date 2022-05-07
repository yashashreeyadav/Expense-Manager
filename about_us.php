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
    </head>
    <body>
        <?php
            include 'includes/header.php';
        ?>
        <div class="container wrapper">
            <div class="row row_style" style="padding-top: 100px;">
                <div class="col-xs-6">
                    <h2>Who are we?</h2>
                    <p>We are a group of young technocrats who came up with an idea of solving budget and time
                    issues which we usually face in our daily lives. We are here to provide a budget controller
                    according to your aspects.</p>
                    <p>Budget control is the biggest financial issue in the present world. One should look after
                    their budget control to get ride off from their financial crisis.</p>
                </div>
                <div class="col-xs-6">
                    <h2>Why choose us?</h2>
                    <p>We provide a predominant way to control and manage your budget estimations with ease
                    of accessing of multiple users.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <h2>Contact Us</h2>
                    <p><b>Email:</b> abc@gmail.com.com</p>
                    <p><b>Mobile:</b> +91-8448444853</p>
                </div>
            </div>
        </div>
        <?php
            include 'includes/footer.php';
        ?>
    </body>
</html>
