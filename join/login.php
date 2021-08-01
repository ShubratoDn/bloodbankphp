
<?php

   session_start();
   error_reporting(0);
   include "../database/dbconnection.php" ;
   if(isset($_SESSION['registerSuccess'])){
       $registrationSuccess = $_SESSION['registerSuccess'];
   }else{
   }

   if(isset($_SESSION['successSignup'])){
       $successSignup = $_SESSION['successSignup'];
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>

      <?php
         include "head.php"
      ?>
      <title>Login Now!</title>
      <link rel="stylesheet" href="../resources/css/login.css">
</head>
<body>

<section id="login">
    <div class="container ">
        <div class="login-form col-10 col-sm-8 col-md-5 col-lg-3 ">
            <div>
                <img src="../resources/img/login-profile.svg" alt="" class="profile-img mt-5">
            </div>
            <h2 class="text-center">WELCOME</h2>
            <!-- successful messages -->
            <?php 
                echo @$registrationSuccess;
                echo  @$_SESSION['passwordUpdate'];
                echo @$successSignup;
            ?>


            <!-- ============================= -->
                    <!--  USER LOGIN -->
            <!-- ============================= -->
            <!-- php codes for Normal User -->
            <?php
                $email_num = $_POST['email_num'];
                $getPassword = $_POST['password'];
                $rememberMe = $_POST['rememberme'];

                if($_POST['submit']){
                    $email_num =  filter_var($email_num,FILTER_SANITIZE_STRING);
                    $getPassword =  filter_var($getPassword,FILTER_SANITIZE_STRING);

                    $sql = "SELECT * FROM donor_info WHERE email = '$email_num' OR phone1= '$email_num'";
                    $result = mysqli_query($con, $sql);

                    if($row = mysqli_fetch_assoc($result)){
                        $db_pass = $row['password'];
                        $password = md5($getPassword);
                        $foundErr = 0;

                        if($password != $db_pass){
                            $errorMsg .= "Incorrect Password";
                            $foundErr = 1;
                        }else{
                            $_SESSION['userid'] = $row['id'];
                            $_SESSION['usertype'] = $row['user_type'];
                            $_SESSION['profile_pic'] = $row['photo'];

                            if($_SESSION['usertype'] == "user"){
                                $_SESSION['username'] = $row['full_name'];
                            }else{
                                $_SESSION['username'] = $row['fname'];
                            }

                            //setting this cookie for not destroy the session after closing browser
                            setcookie("mySession", "session", time() + 15*24*60*60 );
                            $_SESSION['cookie'] = $_COOKIE['mySession'];

                            $foundErr = 0;
                            if(isset($rememberMe)){//isset lekha ta compulsory

                                // setting cookie as value
                                setcookie("email_num", "$email_num", time()+ 7*24*60*60);
                                setcookie("password","$getPassword", time() + 7*24*60*60);

                                header("Location: ../index.php");                                
                            }else{                                    
                                ?>
                                    <script>
                                        location.replace("../index.php");
                                    </script>
                                <?php
                            }
                        }
                    }else{
                        $errorMsg .="Invalid account";
                        $foundErr = 1;
                    }

                    if($foundErr == 1){
                        $email_numVal = $email_num;
                    }

                }
            ?>                
            <!-- php codes ENds -->

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="post" class=" px-3">
                <div class="error-msg">
                    <div class="alert-danger px-2 rounded">
                        <strong id="errorMsg">
                            <script>
                                var errorMsg = document.getElementById("errorMsg");
                                setTimeout(() => {
                                    errorMsg.innerHTML = '';
                                }, timeout);
                            </script>
                            <?php echo $errorMsg;?>
                        </strong>
                    </div>
                </div>

                <div class="input-div">
                    <div class="input-logo">
                        <i class=" fa fa-user"></i>
                    </div>
                    <input type="text" class="form-input w-100" name="email_num" placeholder="Email or Phone" value="<?php if($email_numVal){echo $email_numVal;}else{if(isset($_COOKIE['email_num'])){echo $_COOKIE['email_num'];}}  ?>">
                </div>

                <div class="input-div">
                    <div class="input-logo">
                        <i class=" fa fa-lock"></i>
                    </div>
                    <input type="password" class="form-input w-100" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>">
                </div>

                <p><a href="#" class="forget-pass"><small><a href="recover.php" class=" text-primary">Forgot Password?</a></small></a></p>

                <div class="text-white mb-3">                    
                    <small><input type="checkbox"  name="rememberme" >
                    Remember me</small>
                </div>

                <div>
                    <div class=" buttonx">
                        <input type="submit" name="submit" class="submit-btn" value="Log in">
                    </div>
                </div>
            </form>            

            <div class="register-now mb-5">
                <small>
                    <p class=" m-0">Don't have an account? <a href="signup.php" class=" text-primary"> Signup Now</a></p>
                    <p class=" m-0">Want to be a Donor? <a href="register.php" class=" text-primary"> Register Now</a></p>
                </small>
            </div>
        </div>
    </div>
</section>


   <?php
      // including footer page
      include "footer.php"
   ?>

</body>
</html>
