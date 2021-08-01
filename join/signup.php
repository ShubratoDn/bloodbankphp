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
    <title>Signup</title>

    <?php  
        include "head.php"
    ?>
    <link rel="stylesheet" href="../resources/css/join.css">
    <link rel="stylesheet" href="../resources/css/req_blood.css">

</head>
<body>
    <!-- Nav Bar -->
    <nav class="navbar ">
        <div class="container">
            <a href="../index.php" class="nav-logo col-lg-8">
                <img src="../resources/img/logo.png" alt="logo" class="logo">
                <div class="logo-text">
                    Blood Bank
                </div>
            </a>
        </div>    
    </nav>

    <section id="signup" class=" d-flex justify-content-center align-items-center">
        <div class="container ">
            <div class="req-form py-5 m-auto col-xl-4 col-lg-5 col-md-8 col-sm-10 col-12">
                <h1 class="text-center">Signup Now</h1>
                <hr>


                <!-- PHP CODE STARTS FROM HERE -->
                <?php
                    // including database connection
                    include "../database/dbconnection.php";

                    $full_name = $_POST['full_name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $confirmpass = $_POST['confirmpass'];
                    $token = bin2hex(random_bytes(15));

                    if(isset($_POST['submit'])){
                        $full_name = filter_var($full_name,FILTER_SANITIZE_STRING);
                        $email =  filter_var($email,FILTER_SANITIZE_STRING);
                        $password =  filter_var($password,FILTER_SANITIZE_STRING);
                        $confirmpass =  filter_var($confirmpass,FILTER_SANITIZE_STRING);


                        //checking if number or email is alreadye exist
                        $sql_find = "SELECT * FROM `donor_info` WHERE email = '$email'";
                        $find_result = mysqli_query($con, $sql_find);
                        if($row = mysqli_fetch_assoc($find_result)){
                            $errmsg .="<p>This Account is Already Exist</p>";
                        }else{
                            // IF ACCOUNT IS NOT EXIST IN DATABASE

                            // matching password
                            if($password != $confirmpass){
                                $errmsg .= "<p>Password is not matching</p>";
                            }else{
                                $password = md5($password);
                            }

                        }   

                        if($errmsg){
                            echo "<div class='alert alert-danger'>$errmsg</div>";
                        }else{

                            $sql_insert = "INSERT INTO `donor_info`( `user_type`,`full_name`, `email`, `password`, `confirmpass`, token) VALUES ('user','$full_name','$email','$password','$confirmpass', '$token')";
                            $insert_query = mysqli_query($con, $sql_insert);
                            if(!$insert_query){
                                echo "<div class='alert alert-danger'>Creating Account Fail. Try again</div>". mysqli_error($con);
                            }else{
                                $_SESSION['successSignup']="<div class='alert alert-success font-weight-bold'> Sucessfully created account!</div>";
                                echo $_SESSION['successSignup'];
                                header("location: login.php");
                            }
                        }
                    }
                ?>
                <!-- PHP CODE ENDS -->
   

                <!-- form starts here -->
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="post">
                    
                    <div class="input-div">
                        <label for="full-name">
                            <h4>Full Name</h4>
                         </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class=" fa fa-user"></i>
                            </div><input type="text" name="full_name" id="full-name" placeholder="Enter Full Name" required>
                        </div>    
                    </div>               
                   
                    <div class="input-div">
                        <label for="email_id">
                            <h4>Email or Phone</h4>
                        </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class=" fa fa-envelope"></i>
                            </div>
                            <input type="text" name="email" id="email_id" placeholder="Email or Phone" required>
                        </div>
                   </div>
                    
                   <div class="input-div">
                        <label for="n_pass">
                            <h4>Password</h4>
                        </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class=" fa fa-lock"></i>
                            </div>
                            <input type="password" name="password" id="n_pass" placeholder="Password" required>
                        </div>
                   </div>

                   <div class="input-div">
                        <label for="con_pass">
                            <h4>Confirm Password</h4>
                        </label>
                        <div class="input-group">
                            <div class="input-icon">
                                <i class=" fa fa-lock"></i>
                            </div>
                            <input type="text" name="confirmpass" id="con_pass" placeholder="Confirm password" required>
                        </div>
                   </div>
                    

                   <input type="submit" name="submit" value="Sign Up" class=" btn btn-primary btn-lg w-100">
                </form>
                <!-- form Ends -->

                <div class="my-5">
                    <small>Already have an account? <a href="login.php" class=" text-primary">Login here</a></small>
                </div>
            </div>
        </div>
    </section>

    <!-- footer starts -->
    <footer class="" id="footer"> 
        <div class="container-md py-5">
            <div class="row pt-5">
                <!-- contact us -->
                <div class="col-sm-4 p-3 mb-4">
                    <h1>CONTACT US</h1>
                    <p><i class=" fa fa-map-marker pr-3"></i><b>Headquerter : </b> Khwaja Yunus Ali Hospital, Enayetput, Sirajganj.</p>
                    <p><i class=" fa fa-envelope pr-2"></i><b>Email : </b><a href="mailto: mycomputer44985@gmail.com" >mycomputer44985@gmail.com</a></p>
                    <p><i class=" fa fa-phone pr-3"></i><b>Tel : </b><a href="tel: 01759458961" >01759458961</a></p>
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
                    <div class="col-md-4 text-center text-md-left  mb-4 text-white">
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
    <script src="../vendor/js/bootstrap.min.js"></script>

    <!-- custom js -->
    <script src="../resources/js/main.js"></script>
</body>
</html>