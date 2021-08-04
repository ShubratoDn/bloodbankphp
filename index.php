<?php
    session_start();
    error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Blood Bank kyabb">
    <meta property="og:description" content="Donate Blood and Save Other Life">
    <meta property="og:image" content="resources/img/logo.png">
    <meta property="og:url" content="https://kyabb.com">
    <title>Blood Bank</title>
    <link rel="shortcut icon" href="resources/img/logo.png" type="image/x-icon">

    <!-- vendor style -->
    <!-- normalize -->
    <link rel="stylesheet" href="vendor/css/normalize.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Fredoka+One&family=Open+Sans&family=Tourney:wght@200&display=swap" rel="stylesheet">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/css/font-awesome.min.css">
    
    <!--animated headline css -->
    <link rel="stylesheet" href="vendor/css/animateHeader.css">

    <!-- data-aos -->
    <link rel="stylesheet" href="vendor/css/aos.css">

    <!-- owl carousel -->
    <link rel="stylesheet" href="vendor/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/css/owl.theme.default.css">

    <!-- custom style -->
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/responsive.css">
</head>
<body>
    <!-- header starts -->
    <header>
       
       <!-- includding navbar -->
       <?php 
            include("partial-template/_navbar.php");
       ?>

        <!-- including landing page -->
        <?php
            include('partial-template/_landingpage.php');
        ?>
    </header>
    <!--header  ends  -->

    <!-- main Start -->
    <main>
        
        <!-- including  SEARCH DONOR SECTIOn -->
        <?php
            include('partial-template/_search-donor.php');
        ?>


        <!-- including  SOME DONOR SECTIOn -->
        <?php
            include('partial-template/_some-donor.php');
        ?>


        <!-- including  NEED BLOOD SECTION -->
        <?php
            include('partial-template/_need-blood.php');
        ?>

    </main>
    <!-- Main Ends -->

        <!-- including footer section -->
        <?php
            include('partial-template/_footer.php');
        ?>
    <!-- javascript -->
    <script src="vendor/js/jquery.min.js"></script>
    <script src="vendor/js/popper.min.js"></script>
    <script src="vendor/js/html5shiv.min.js"></script>
    <script src="vendor/js/respond.min.js"></script>
    <script src="vendor/js/bootstrap.min.js"></script>
    <!-- animated headline js-->
    <script src="vendor/js/animateHeader.js"></script>
    <!-- data-aos-->
    <script src="vendor/js/aos.js"></script>
    <!-- owl carousel -->
    <script src="vendor/js/owl.carousel.min.js"></script>
     <!-- mixitup plugin for filter -->
     <script src="vendor/js/mixitup.min.js"></script>


    <!-- custom js -->
    <script src="resources/js/main.js"></script>

</body>
</html>