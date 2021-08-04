<?php
    session_start();
    $userid = $_GET['id'];
    if(!$_SESSION['userid']){    
        ?>
            <script>
                location.replace("../index.php");
            </script>
        <?php        
    }

    if($_SESSION['userid'] != $userid){
        ?>
            <script>
                location.replace("../index.php");
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
    <meta property="og:title" content="Blood Bank kyabb">
    <meta property="og:description" content="Donate Blood and Save Other Life">
    <meta property="og:image" content="resources/img/logo.png">
    <meta property="og:url" content="https://kyabb.com">
    <title>Profile</title>
    
    <?php
    
        include("head_profile.php");
    
    ?>

</head>
<body>
    <!-- header starts -->
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="../index.php" class="nav-logo col-lg-5">
                    <img src="../resources/img/logo.png" alt="logo" class="logo">
                    <div class="logo-text">
                        Blood Bank
                    </div>
                </a>
            </div>
        </nav>

        <!-- title -->
        <section id="header-path">
            <div class="container py-4">
                <div class="row">
                    <div class="col-12">
                        <p class=" text-white"><a href="../index.php" class="text-white-50">Home</a> <span class=" text-red"> / </span> Profile</p>
                    </div>
                </div>
                <h1 class=" text-white page-descrip">My Profile : </h1>
            </div>
        </section>
    </header>
    <!--header  ends  -->

    <!-- main section starts -->
    <main>
        <section id=" profile">
            <div class="container my-5">

                <div class="row jumbotron rounded">

                    <?php
                    
                        include("../database/dbconnection.php");

                        $sql_find = "SELECT * FROM `donor_info` WHERE id='$userid' ";
                        $result = mysqli_query($con, $sql_find);

                        if($row = mysqli_fetch_assoc($result)){                         
            
                    ?>

                    <div class="col-lg-3 d-flex justify-content-center align-items-center">
                        <div class="profile-left py-5">
                            <!-- profile pic -->
                            <img src="../<?php echo $row['photo']?>" alt="#" class=" profile-pic img-fluid">
                            <a href="update-profile.php?id=<?php echo $row['id']?>" class=" up-profile-text">Update Profile <i class=" fa fa-pencil-square-o"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <!-- profile detaile starts -->
                        <div id="profile-detail">
                            <table>
                                <tr><th class="table-first-row" colspan="2">User Datails</th></tr>
                                <tr>
                                    <th>User Id  </th>
                                    <td><?php echo $row['id'] ?></td>
                                </tr>
                                <tr>
                                    <th>Name  </th>
                                    <td><?php echo $row['fname']." ".$row['lname'] ?></td>
                                </tr>
                                <tr>
                                    <th>Gender  </th>
                                    <td><?php echo $row['gender'] ?></td>
                                </tr>
                                <tr>
                                    <th>Age  </th>
                                    <td><?php echo $row['age'] ?></td>
                                </tr>
                                <tr>
                                    <th>Blood Group  </th>
                                    <td><span class=" text-red font-weight-bold"><?php echo $row['blood_group'] ?></span></td>
                                </tr>
                                <tr>
                                    <th>Donated blood  </th>
                                    <td><?php echo $row['donated_blood'] ?> times</td>
                                </tr>
                                <tr>
                                    <th>Last Donate </th>
                                    <td><?php echo $row['last_donate'] ?> ago</td>
                                </tr>
                                <tr>
                                    <th>Address  </th>
                                    <td><?php echo $row['upazila'].", ".$row['district'] ?></td>
                                </tr>
                                <tr>
                                    <th>Phone 1  </th>
                                    <td><?php echo $row['phone1'] ?></td>
                                </tr>
                                <tr>
                                    <th>Phone 2  </th>
                                    <td><?php echo $row['phone2'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email  </th>
                                    <td><?php echo $row['email'] ?></td>
                                </tr>
                            </table>

                            <a href="#" class=" profile-chng-pass-btn rounded">Change Password</a>
                        </div>  <!-- profile detaile Ends -->                    
                    </div>

                    <?php

                        }else{
                            //ending if
                            ?>
                                <script>
                                    location.replace("../index.php");
                                </script>
                            <?php                               
                        }
                    ?>


                </div>
            </div>
        </section>
    </main>
    <!-- main section Ends -->

    <!-- footer starts -->
    <footer class="" id="footer"> 
        <div class="container-md py-5">
            <div class="row pt-5">
                <!-- contact us -->
                <div class="col-sm-4 p-3 mb-4">
                    <h1>CONTACT US</h1>
                    <p><i class=" fa fa-map-marker pr-3"></i><b>Headquerter  </b> Khwaja Yunus Ali Hospital, Enayetput, Sirajganj.</p>
                    <p><i class=" fa fa-envelope pr-2"></i><b>Email  </b><a href="mailto mycomputer44985@gmail.com" >mycomputer44985@gmail.com</a></p>
                    <p><i class=" fa fa-phone pr-3"></i><b>Tel  </b><a href="tel 01759458961" >01759458961</a></p>
                </div>
                <!-- services -->
                <div class="col-sm-4 p-3 mb-4">
                    <h1>Services</h1>
                    <p><a href="#">Donate blood</a></p>
                    <p><a href="#">Request blood</a></p>
                    <p><a href="#">About Blood</a></p>
                </div>
                <!-- additional links -->
                <div class="col-sm-4 p-3 mb-4">
                    <h1>additional links</h1>
                    <p><a href="#">About us</a></p>
                    <p><a href="#">Terms and conditions</a></p>
                    <p><a href="#">Privacy policy</a></p>
                    <p><a href="#">Contact us</a></p>
                </div>
            </div>
        </div>
        <div class="footer-end py-5">
            <div class="container-md">
                <div class="row flex-column-reverse flex-md-row">
                    <div class="col-md-4 text-center text-md-left  mb-4">
                        &copy; 2021 All Rights Reserved
                    </div>                    
                     <!-- social links -->
                    <div class="col-md-4  social-links text-center mb-4">
                        <i class=" fa fa-facebook"></i>
                        <i class=" fa  fa-instagram"></i>
                        <i class=" fa fa-twitter"></i>
                    </div>
                    <div class="col-md-4 text-md-right text-center mb-4">
                        <p><b>Design by </b><span class=" text-red" style="cursor: pointer;">  Shubrato Debnath</span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer Ends -->



    <!-- javascript -->
    <script src="../vendor/js/jquery.min.js"></script>
    <script src="../vendor/js/popper.min.js"></script>
    <script src="../vendor/js/html5shiv.min.js"></script>
    <script src="../vendor/js/respond.min.js"></script>
    <script src="../vendor/js/bootstrap.min.js"></script>
    <!-- animated headline js-->
    <script src="../vendor/js/animateHeader.js"></script>
    <!-- data-aos-->
    <script src="../vendor/js/aos.js"></script>
    <!-- owl carousel -->
    <script src="../vendor/js/owl.carousel.min.js"></script>
    <!-- mixitup plugin for filter -->
    <script src="../vendor/js/mixitup.min.js"></script>


    <!-- custom js -->
    <script src="resources/js/main.js"></script>
</body>
</html>