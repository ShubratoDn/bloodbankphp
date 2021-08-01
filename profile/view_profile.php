<!DOCTYPE html>
<html lang="en">
<head>

    <title>Donor Profile</title>

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
                <h1 class=" text-white page-descrip">Donor Profile : </h1>
            </div>
        </section>
    </header>
    <!--header  ends  -->

    <!-- main section starts -->
    <main>

        <?php

            $userid = $_GET['id'];

            include("../database/dbconnection.php");

            $sql = "SELECT * FROM donor_info WHERE id='$userid'";
            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
        ?>

        <section id=" profile">
            <div class="container my-5">
                <div class="row jumbotron rounded">
                    <div class="col-lg-3 d-flex justify-content-center align-items-center">
                        <div class="profile-left py-5">
                            <!-- profile pic -->
                            <img src="../<?php echo $row['photo']?>" alt="<?php echo $row['fname']?>" class=" profile-pic img-fluid">
                            <h4 class=" font-weight-bold text-primary text-center mt-4"><?php echo $row['fname']." ".$row['lname']?></h4>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <!-- profile detaile starts -->
                        <div id="profile-detail">
                            <table>
                                <tr><th class="table-first-row" colspan="2">User Datails</th></tr>
                                <tr>
                                    <th>User Id  </th>
                                    <td><?php echo $row['id']?></td>
                                </tr>
                                <tr>
                                    <th>Name  </th>
                                    <td><?php echo $row['fname']." ".$row['lname']?></td>
                                </tr>
                                <tr>
                                    <th>Gender  </th>
                                    <td><?php echo $row['gender']?></td>
                                </tr>
                                <tr>
                                    <th>Age  </th>
                                    <td><?php echo $row['age']?></td>
                                </tr>
                                <tr>
                                    <th>Blood Group  </th>
                                    <td><span class=" text-red font-weight-bold"><?php echo $row['blood_group']?></span></td>
                                </tr>
                                <tr>
                                    <th>Donated blood  </th>
                                    <td><?php echo $row['donated_blood']?> times</td>
                                </tr>
                                <tr>
                                    <th>Last Donate </th>
                                    <td><?php echo $row['last_donate']?> ago</td>
                                </tr>
                                <tr>
                                    <th>Address  </th>
                                    <td><?php echo $row['address']?></td>
                                </tr>
                                <tr>
                                    <th>Phone 1  </th>
                                    <td><?php echo $row['phone1']?></td>
                                </tr>
                                <tr>
                                    <th>Phone 2  </th>
                                    <td><?php echo $row['phone2']?></td>
                                </tr>
                                <tr>
                                    <th>Email  </th>
                                    <td><?php echo $row['email']?></td>
                                </tr>
                            </table>
                    
                        </div>  <!-- profile detaile Ends -->                    
                    </div>
                </div>
            </div>
        </section>

        <?php

            }else{
                header("location: ../index.php");
            };
         
        ?>

    </main>
    <!-- main section Ends -->

    <?php
        include("../partial-template/_footer.php");
    ?>


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