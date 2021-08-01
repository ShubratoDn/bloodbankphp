
<?php

    session_start();
    error_reporting(0);

    $userid = $_GET['id'];
    if(!$_SESSION['userid']){
        header("location: ../index.php");
    }

    if($_SESSION['userid'] != $userid){
        header("location: ../index.php");
    }

    include("../database/dbconnection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>

    <?php

        include('head_profile.php');
    
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
                        <p class=" text-white"><a href="../index.php" class="text-white-50">Home</a> <span class=" text-red"> / </span>Profile <span class=" text-red"> / </span>Update Profile</p>
                    </div>
                </div>
                <h1 class=" text-white page-descrip">Update Profile : </h1>
            </div>
        </section>
    </header>
    <!--header  ends  -->

    <!-- main section starts -->
    <main>
        <section id="profile">
            <div class="container my-5">
                
                <!-- PHP CODES START -->
                <?php

                    // FINDING FOR SET VALUES
                    $sql_find = "SELECT * FROM `donor_info` WHERE id='$userid'";
                    $find_result = mysqli_query($con, $sql_find);

                    if($row = mysqli_fetch_assoc($find_result)){ 

                        $fname= $_POST['fname'];
                        $lname= $_POST['lname'];
                        $gender= $_POST['gender'];
                        $age= $_POST['age'];
                        $district= $_POST['district'];
                        $upazila= $_POST['upazila'];
                        $phone1= $_POST['phone1'];
                        $phone2= $_POST['phone2'];
                        $email= $_POST['email'];

                        if(isset($_POST['submit'])){

                            $fname= trim(filter_var($fname,FILTER_SANITIZE_STRING));
                            $lname= trim(filter_var($lname,FILTER_SANITIZE_STRING));
                            $gender= trim(filter_var($gender,FILTER_SANITIZE_STRING));
                            $age= trim(filter_var($age,FILTER_SANITIZE_NUMBER_INT));
                            $district= trim(filter_var($district,FILTER_SANITIZE_STRING));
                            $upazila= trim(filter_var($upazila,FILTER_SANITIZE_STRING));
                            $phone1= trim(filter_var($phone1,FILTER_SANITIZE_NUMBER_INT));
                            $phone2= trim(filter_var($phone2,FILTER_SANITIZE_NUMBER_INT));
                            $email= trim(filter_var($email,FILTER_SANITIZE_STRING));
                            $email= trim(filter_var($email,FILTER_VALIDATE_EMAIL));


                            if(!$fname && !$lname && !$gender && !$age ||!$district  && $phone1 ){
                                $errMsg .= "<p>Please, fill all inputs</p>";
                            }

                            if($gender != "male" && $gender != "female" && $gender != "Male" && $gender != "Female"){
                                $errMsg .= "<p>Enter correct spelling of our gender</p>";
                            }

                            if($errMsg){
                                echo "<div class='alert alert-danger'>$errMsg</div>";
                            }else{
                                $update_sql = "UPDATE `donor_info` SET `fname`='$fname',`lname`='$lname ', `gender`='$gender ', `age`='$age ', `phone1`='$phone1',`phone2`='$phone2 ',`district`='$district',`upazila`='$upazila',`email`='$email' WHERE id='$userid'" ;
                                $update_query = mysqli_query($con, $update_sql);
                                if($update_query){
                                    
                                    echo '<div class="alert alert-success alert-dismissible fade show col-5" role="alert">
                                                                    <strong>Sucessflly Updated YourProfile</strong> 
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>';

                                    ?>
                                        <script>
                                            setTimeout(() => {
                                                location.replace("<?php echo "profile.php?id=$userid"?>");
                                            }, 2000);
                                        </script>
                                    <?php                                    
                                    
                                }else{
                                    echo "<p class=' alert alert-danger'>Failed to update your profile. ".mysqli_error($con)."</p>";
                                }
                            }


                        }
                        
                ?>
                <!-- PHP CODES ENDS -->

                <!-- update form starts from here -->
                <form action="#" method="post" id="update-form">
                    <div class="row jumbotron rounded">
                        <div class="col-lg-3 d-flex justify-content-center align-items-center">
                            <div class="profile-left py-5">
                                <!-- profile pic -->
                                <img src="../<?php echo $row['photo']?>" alt="User" class=" profile-pic img-fluid">

                                <!-- change profile pic -->
                                <div class="input-group my-5 justify-content-between align-items-center">
                                    Change Pic
                                    <div>
                                      <i class=" fa fa-pencil update-edit" onclick="inputEnable(0)"></i>
                                    </div>
                                </div>
                                <!-- file input -->
                                <div class="input-group ">
                                    <input type="file" name="photo" id="update-change-pic-in" class="w-100">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-9">
                            <!-- profile detaile starts -->
                            <div id="profile-detail">
                                <table class="update-user-detail">
                                    <tr><th class="table-first-row" colspan="2">User Datails</th></tr>
                                    <tr>
                                        <th>User Id  </th>
                                        <td><?php echo $row['id'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Name  </th>
                                        <td>
                                            <div class="input-group mb-2 d-flex justify-content-between">
                                                <input type="text" name="fname" value="<?php echo $row['fname']?>" placeholder="First Name" class="mr-3" readonly>
                                                <i class=" fa fa-pencil update-edit" onclick="inputEnable(1)"></i>
                                            </div>

                                            <div class="input-group d-flex justify-content-between">
                                                <input type="text" name="lname" value="<?php echo $row['lname']?>" placeholder="Last Name" class="mr-3" readonly>       
                                                <i class=" fa fa-pencil update-edit" onclick="inputEnable(2)"></i>  
                                            </div>
                                        </td>                                   
                                    </tr>
                                    <tr>
                                        <th>Gender  </th>
                                        <td class=" d-flex justify-content-between">
                                            <input type="text" name="gender" value="<?php echo $row['gender']?>" placeholder="Gender"  readonly>    
                                            <i class=" fa fa-pencil update-edit" onclick="inputEnable(3)"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Age  </th>
                                        <td class=" d-flex justify-content-between">
                                            <input type="text" name="age" value="<?php echo $row['age']?>" placeholder="Age" readonly>    
                                            <i class=" fa fa-pencil update-edit" onclick="inputEnable(4)"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Blood Group  </th>
                                        <td><span class=" text-red font-weight-bold">O+</span></td>
                                    </tr>
                                    <tr>
                                        <th>Donated blood  </th>
                                        <td>1 times</td>
                                    </tr>
                                    <tr>
                                        <th>Last Donate </th>
                                        <td>19 july, 2021</td>
                                    </tr>                                
                                    <tr>
                                        <th>Address  </th>
                                        <td class=" d-flex justify-content-between">
                                            <div class="input-group px-5">
                                                <select name="district" id="district" onchange="populate_dropdown()" required>
                                                    <option value="">Choose District</option>
                                                    <option value="Sirajganj">Sirajganj</option>
                                                    <option value="Pabna">Pabna</option>
                                                    <option value="Naogaon">Naogaon</option>
                                                </select>
                                                <select name="upazila" id="upazila" class="">
                                                    <option value="">Upazila</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone 1  </th>
                                        <td class=" d-flex justify-content-between">
                                            <input type="text" name="phone1" value="<?php echo $row['phone1']?>" placeholder="Phone 1" readonly>    
                                            <i class=" fa fa-pencil update-edit" onclick="inputEnable(5)"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone 2  </th>
                                        <td class=" d-flex justify-content-between">
                                            <input type="text" name="phone2" value="<?php echo $row['phone2']?>" placeholder="Phone 2" readonly>    
                                            <i class=" fa fa-pencil update-edit" onclick="inputEnable(6)"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email  </th>
                                        <td class=" d-flex justify-content-between">
                                            <input type="text" name="email" value="<?php echo $row['email']?>" placeholder="email " readonly>    
                                            <i class=" fa fa-pencil update-edit" onclick="inputEnable(7)"></i>
                                        </td>
                                    </tr>
                                </table>
    
                                <input type="submit" name="submit" value="Update" class="update-btn">
                            </div>  <!-- profile detaile Ends -->                    
                        </div>
                    </div>


                </form>
                <!-- update form Ends -->

                <?php

                    }//end first if condition

                ?>
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


    <!-- custom js -->
    <script src="../resources/js/main.js"></script>

    <script>
        function inputEnable(x){
            var input = document.getElementsByTagName("input")[x];
            if(x==0){
                input.style.display = "block";
            }else{
                input.removeAttribute('readonly');  
            }
        };
    </script>
</body>
</html>