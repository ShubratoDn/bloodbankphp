<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register As Donor</title>
    <?php
        include("head.php");
        error_reporting(0);
    ?>
    <link rel="stylesheet" href="../resources/css/join.css">
</head>
<body>
    

    <!-- header starts -->
    <header>
        <nav class="navbar  mb-5">
            <div class="container">
                <a href="../index.php" class="nav-logo col-lg-5 mb-5">
                    <img src="../resources/img/logo.png" alt="logo" class="logo">
                    <div class="logo-text">
                        Blood Bank
                    </div>
                </a>
            </div>
        </nav>

    </header>
    <!--header  ends  -->


    <main>
        <section id="donor-register">
            <div class="containerpy-5"> 
                <div class="donor-register jumbotron">
                    <h1 class=" text-center">Register As Donor</h1>

                    <!--PHP COde start -->
                    <?php

                        //including database connect
                        include "../database/dbconnection.php";


                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $phone1 = $_POST['phone1'];
                        $phone2 = $_POST['phone2'];
                        $email = $_POST['email'];
                        $district = $_POST['district'];
                        $upazila = $_POST['upazila'];
                        $blood_group = $_POST['blood_group'];
                        $last_donate_time = $_POST['last_donate_time'];
                        $last_donate_my = $_POST['last_donate_my'];
                        $gender = $_POST['gender'];
                        $age = $_POST['age'];
                        $password = $_POST['password'];
                        $confirmpass = $_POST['confirmpass'];

                        // creating token
                        $token = bin2hex(random_bytes(15));

                        //for Uploded photo
                        $getPhoto = $_FILES['photo'];  
                        $photo = $_FILES['photo']['name'];
                        $photoType=  end(explode(".", $photo));
                        $photoTmpName = $_FILES['photo']['tmp_name'];
                        $photoError = $_FILES['photo']['error'];
                        $photoSize = $_FILES['photo']['size'];

                        $photo_unique = bin2hex(random_bytes(5));
                        $move_file = "../uploads/".$photo_unique.$photo;
                        $permanent_dir = "uploads/".$photo_unique.$photo;
                        

                        if(isset($_POST['submit'])){


                            $fname = filter_var($fname,FILTER_SANITIZE_STRING);
                            $lname = filter_var($lname,FILTER_SANITIZE_STRING);
                            $phone1 = filter_var($phone1,FILTER_SANITIZE_NUMBER_INT);
                            $phone2 = filter_var($phone2,FILTER_SANITIZE_NUMBER_INT);
                            $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                            $email = filter_var($email,FILTER_VALIDATE_EMAIL);
                            $district = filter_var($district,FILTER_SANITIZE_STRING);
                            $upazila = filter_var($upazila,FILTER_SANITIZE_STRING);
                            $blood_group = filter_var($blood_group,FILTER_SANITIZE_STRING);
                            $last_donate_time = filter_var($last_donate_time,FILTER_SANITIZE_NUMBER_INT);
                            $last_donate_my = filter_var($last_donate_my,FILTER_SANITIZE_STRING);
                            $gender = filter_var($gender,FILTER_SANITIZE_STRING);
                            $age = filter_var($age,FILTER_SANITIZE_NUMBER_INT);
                            $password = filter_var($password,FILTER_SANITIZE_STRING);
                            $confirmpass = filter_var($confirmpass,FILTER_SANITIZE_STRING);

                            // name
                            if(!$fname && !$lname){
                                $namerr = "Insert Name";
                                $error = "error";
                            }

                            // phone
                            if(!$phone1){
                                $phoneerr = "Insert Phone 1";
                                $error = "error";
                            }

                            // address
                            if(!$district && !$upazila){
                                $adderr = "Insert full address";
                                $error = "error";
                            }

                            // blood group
                            if(!$blood_group){
                                $bgerr .= "Insert Your Blood group";  
                                $error = "error";
                            }else{
                                
                                switch($blood_group){
                                    case "A+" : 
                                        $filter_bg_class = "Ap";
                                        break;
                                    case "A-" : 
                                        $filter_bg_class = "An";
                                        break;
                                    case "B+" : 
                                        $filter_bg_class = "Bp";
                                        break;
                                    case "B-" : 
                                        $filter_bg_class = "Bn";
                                        break;
                                    case "AB+" : 
                                        $filter_bg_class = "ABp";
                                        break;
                                    case "AB-" : 
                                        $filter_bg_class = "ABn";
                                        break;
                                    case "O+" : 
                                        $filter_bg_class = "Op";
                                        break;
                                    case "O-" : 
                                        $filter_bg_class = "On";
                                        break;
                                    default :
                                    $bgerr .= "Invalid Blood Group";
                                    $error = "error";
                                }
                            }

                            // last_donate
                            $donation_eligibility = "eligible";
                            if($last_donate_time && $last_donate_my){
                                $last_donate = $last_donate_time." ".$last_donate_my;
                                switch ($last_donate_my){
                                    case "month":
                                        break;
                                    case "year":
                                        break;
                                    default:
                                    $lastdonateerr = "Enter Year or Month";
                                    $error = "error";                                    
                                }
                            }else{
                                $last_donate = "--";
                            }

                            // gender
                            if(!$gender){
                                $gendererr = "Insert Your Gender";
                                $error= "error";
                            }else{
                                switch($gender){
                                    case "Male":
                                        break;
                                    case "Female":
                                        break;
                                    case "Other":
                                        break;
                                    default :
                                    $gendererr = "Invalid Gender Type";    
                                    $error= "error";
                                }
                            }

                            // age
                            if(!$age){
                                $ageerr = "Insert Your Age";
                                $error = "error";
                            }else{
                                if($age<16){
                                    $ageerr = "Your Age is less thn 16";
                                    $error = "error";
                                }
                            }

                            // password
                            if(!$password && !$confirmpass){
                                $passerr = "Insert Your Password";
                                $error = "error";
                            }else{
                                if(strlen($password)<4 && strlen($confirmpass)<4){
                                    $passerr = "Enter minimum 4 character ";
                                    $error = "error";
                                }else{
                                    if($password != $confirmpass){
                                        $passerr = "Password is not matching";
                                        $error = "error";
                                    }else{
                                        $password = md5($password);
                                    }
                                }
                            }

                            // photo
                            if($photoSize>0){
                                if($photoSize>1200000){
                                    $photoerr = "Too Large File!";
                                    $error = "error";
                                }else{
                                    switch ($photoType){
                                        case "jpg":                                        
                                        case "jpeg":                                        
                                        case "gif":                                        
                                        case "png":
                                            // if got correct format then moving the file
                                            $upload_photo = "upload";
                                            break;
                                        default :
                                        $photoerr = "Invalid Format! Only JPG, JPEG, PNG & GIF files are allowed.";
                                        $error = "error";
                                    }
                                }  
                            }else{
                                if($gender == "Male"){
                                    $permanent_dir = "resources/img/male.jpg";
                                }else{
                                    $permanent_dir = "resources/img/female.jpg";
                                }
                            }                        

                        




                        

                            if($error){
                                // if error then setting their value
                                $fnameVal = $fname;
                                $lnameVal = $lname;
                                $phone1Val = $phone1;
                                $phone2Val = $phone2;
                                $emailVal = $email;
                                $last_donate_timeVal = $last_donate_time;
                                $ageVal = $age;
                                $passwordVal = $confirmpass;
                                $errorMsg = "<h4 class='alert alert-danger font-weight-bold'>You make some mistake to fill the form</h4>";
                            }else{

                                //if phone number or email already exist in database
                                $sql_find = "SELECT * FROM donor_info WHERE user_type='donor' AND email='$email' OR phone1='$phone1' ";
                                $find_query = mysqli_query($con, $sql_find);
                                if($row = mysqli_fetch_assoc($find_query)){
                                    if($row['email']== $email){
                                        $errorMsg .= "<h2 class='alert alert-danger font-weight-bold'>This Email is already used. Try to Log in</h2>";
                                    }
                                    elseif($row['phone1']== $phone1){                                        
                                        $errorMsg .= "<h2 class='alert alert-danger font-weight-bold'>Phone 1 is already used. Try to Log in</h2>";
                                    }
                                }else{

                                    // if Email or Phone does not exist then creating account

                                    $sql_f_user = "SELECT * FROM `donor_info` WHERE user_type='user' AND email='$email' OR email='$phone1'";
                                    $f_user_result = mysqli_query($con, $sql_f_user);
                                    if($row = mysqli_fetch_assoc($f_user_result)){

                                        $userId = $row['id'];
                                        $sql_update = "UPDATE `donor_info` SET `user_type`='donor',`fname`='$fname',`lname`='$lname',`full_name`='',`email`='$email',`phone1`='$phone1',`phone2`='$phone2',`password`='$password',`confirmpass`='$confirmpass',`district`='$district',`upazila`='$upazila',`gender`='$gender',`age`='$age',`photo`='$permanent_dir',`blood_group`='$blood_group',`last_donate`='$last_donate',`token`='$token',`filter_bg_class`='$filter_bg_class', donation_eligibility = '$donation_eligibility' WHERE id = $userId";
                                        if(mysqli_query($con, $sql_update)){
                                            // if succesfully updated account
                                            $_SESSION["registerSuccess"]= "<h5 class='alert alert-success'><b>Congrats!</b> Successfully Updated account</h5>";

                                        }else{
                                            $errorMsg .= "<h2 class='alert alert-success'><b>Error!</b> Fail to create account</h2>";
                                        }

                                    }else{

                                       $sql_insert = "INSERT INTO `donor_info`( `user_type`, `fname`, `lname`, `full_name`, `email`, `phone1`, `phone2`, `password`, `confirmpass`, `district`, `upazila`, `gender`, `age`, `photo`, `blood_group`, `donated_blood`, `last_donate`, `donation_eligibility`, `token`, `filter_bg_class`)
                                                                        VALUES ('donor','$fname','$lname','','$email','$phone1','$phone2','$password','$confirmpass','$district','$upazila','$gender','$age','$permanent_dir','$blood_group', '','$last_donate','$donation_eligibility','$token','$filter_bg_class')";
                                         if(mysqli_query($con, $sql_insert)){
                                            // if succesfully updated account                                    
                                            $_SESSION["registerSuccess"]= "<h5 class='alert alert-success'><b>Congrats!</b> Successfully Created Your account</h5>";

                                        }else{
                                            $errorMsg .= "<h2 class='alert alert-danger'><b>Error!</b> Fail to create account.</h2>";
                                        }                                
                                    }


                                    // if every this is okay then redirect to login page and upload photo
                                    if(isset($_SESSION["registerSuccess"])){
                                        // uploading photo
                                        if($upload_photo){
                                            if(!move_uploaded_file($photoTmpName, $move_file)){                                        
                                                $error = "error";
                                                $photoerr = "<p class=' text-danger'><p>Failed to upload your photo</p></p>";
                                            }
                                        }
                                        ?>
                                            <script>
                                                location.replace("login.php");
                                            </script>
                                         <?php
                                    }

                                }
                            }


                        }
                                    
                    
                    ?>


                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
                        <?php echo @$errorMsg;?>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- name -->
                                <div class="input-group">
                                    <p class="input-label"><b>Your Name <span class=" text-red">*</span> </b></p>
                                    <input type="text" value="<?php echo @$fname?>" name="fname" placeholder="First Name"  class=" dbl-input ">
                                    <input type="text" value="<?php echo @$lname?>" name="lname" placeholder="Last Name" class=" dbl-input ">
                                    <p>
                                        <small class=" text-danger font-weight-bold">
                                            <?php echo @$namerr;?>
                                        </small>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- phone -->
                                <div class="input-group">
                                    <p class="input-label"><b>Phone <span class="text-red"> *</span> </b>  <small>(017xxxxxxxx)</small></p>
                                    <input type="number" value="<?php echo @$phone1?>" name="phone1" placeholder="Phone 1"  class="dbl-input ">
                                    <input type="number" value="<?php echo @$phone2?>" name="phone2" placeholder="Phone 2" class="dbl-input ">
                                    <p>
                                        <small class=" text-info">Phone 1 is required.
                                        </small> 
                                        <small class="text-danger font-weight-bold">
                                        <?php echo @$phoneerr;?>
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Email -->
                                <div class="input-group">
                                    <p class="input-label"><b>Email </b></p>
                                    <input type="email" value="<?php echo @$email?>" name="email" placeholder="Your Email"  class="w-100">
                                    <p><small class=" text-danger font-weight-bold"></small></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- address -->
                                <div class="input-group">
                                    <p class="input-label"><b>Address<span class="text-red"> *</span></b> </p>
                                    <select name="district" id="district" class=" dbl-input" onchange="populate_dropdown()">
                                        <option value="">District</option>
                                        <option value="Sirajganj">Sirajganj</option>
                                        <option value="Pabna">Pabna</option>
                                        <option value="Naogaon">Naogaon</option>
                                    </select>
                                    <select name="upazila" id="upazila" class=" dbl-input">
                                        <option value="">Upazila</option>
                                    </select>
                                    <p><small class=" text-danger font-weight-bold"><?php echo @$adderr?></small></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- blood Group -->
                                <div class="input-group">
                                    <p class="input-label"><b>Blood Group<span class="text-red"> *</span> </b></p>
                                    <select name="blood_group" class="w-100">
                                        <option value="">Choose Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    <p><small class=" text-danger font-weight-bold"><?php echo @$bgerr?></small></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- last donated blood -->
                                <div class="input-group">
                                    <p class="input-label"><b>Last Donated blood</b></p>
                                    <input type="number" value="<?php echo @$last_donate_time?>" name="last_donate_time" placeholder="When you last donate blood?" class=" w-50">
                                    <select name="last_donate_my">
                                        <option value="">Month/Year</option>
                                        <option value="month">month</option>
                                        <option value="year">year</option>
                                    </select>
                                    <b> Ago</b>
                                    <p><small class=" text-info">If you have not ever donate blood then leave this input &nbsp; &nbsp;&nbsp;&nbsp; </small>
                                        <small class=" text-danger font-weight-bold">
                                        <?php echo @$lastdonateerr;?>
                                        </small>
                                    </p>
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Gender -->
                                <div class="input-group">
                                    <p class="input-label"><b>Gender<span class="text-red"> *</span> </b></p>
                                    <select name="gender" id="gender" class="w-100">
                                        <option value="">Choose Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <p><small class=" text-danger font-weight-bold">
                                        <?php echo @$gendererr;?>
                                    </small></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Age -->
                                <div class="input-group">
                                    <p class="input-label"><b>Age<span class="text-red"> *</span> </b></p>
                                    <input type="number" value="<?php echo @$age?>" name="age" placeholder="Your Age"  class="w-75"> <b>Year</b>
                                    <p><small class=" text-info">Your Age Sould be above 16 &nbsp; &nbsp;&nbsp;&nbsp; </small><small class=" text-danger font-weight-bold"><?php echo @$ageerr;?></small></p>
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Photo -->
                                <div class="input-group">
                                    <p class="input-label"><b>Your Photo</b></p>
                                    <input type="file" name="photo" id="">
                                    <p><small class=" text-info">Your img size must be under 1mb </small>&nbsp; &nbsp;&nbsp;&nbsp;<small class=" text-danger font-weight-bold"><?php echo @$photoerr?></small></p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Password -->
                                <div class="input-group">
                                    <p class="input-label"><b>Password<span class="text-red"> *</span> </b></p>
                                    <input type="password" value="<?php echo @$confirmpass?>" name="password" placeholder="Password" class="dbl-input">
                                    <input type="password" value="<?php echo @$confirmpass?>" name="confirmpass" placeholder="Confirm Password" class="dbl-input">
                                    <p><small class=" text-danger font-weight-bold"><?php echo @$passerr;?></small></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <input type="submit" name="submit" class="rg-submit-btn" value="Register Now">
                        </div>

                    </form>

                </div>
            </div>
        </section>
    </main>

    <?php
        include("../partial-template/_footer.php");
    ?>


    <!--java script-->
    <script src="../resources/js/main.js"></script>


</body>
</html>