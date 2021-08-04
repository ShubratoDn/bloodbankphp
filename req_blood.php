<?php

if(!isset($_SESSION['userid'])){
    ?>
        <script>
            location.replace("join/login.php");
        </script>    
    <?php
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request For Blood</title>

    <?php
        include("head.php");
    ?>

    <link rel="stylesheet" href="resources/css/req_blood.css">
</head>
<body>

    <?php 

        // including empty nav
        include("partial-template/_emptynav.php");


        // incluidng form
        include("partial-template/_req_blood_form.php");


        // incluidng footer
        include("partial-template/_footer.php");
    ?>


    <!-- javascript -->
    <script src="vendor/js/jquery.min.js"></script>
    <script src="vendor/js/popper.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>

    <!-- mixitup plugin for filter -->
    <script src="vendor/js/mixitup.min.js"></script>

    <!-- custom js -->
    <script src="resources/js/main.js"></script>
</body>
</html>