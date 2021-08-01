
<!DOCTYPE html>
<html lang="en">
<head>
    <?php

        session_start();

        error_reporting(0);
        include 'head.php';
        include "../database/dbconnection.php";
    ?>

    <title>Find Your Account</title>
    <link rel="stylesheet" href="../resources/css/loader.css">
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="../resources/css/login.css">
</head>
<body onload="myLoader()">

    <!-- Including loader -->
        <?php include "../partial-template/_loader.ph"?>
    <!-- Including loader -->

    <!-- php codes starts -->
    <?php

        $email_num = $_POST['email_num'];
        $email_num = filter_var($email_num, FILTER_SANITIZE_EMAIL);
        
        if($_POST['submit']){

            $sql = "SELECT * FROM donor_info WHERE email = '$email_num' OR phone1= '$email_num'";
            $result = mysqli_query($con, $sql);

            if($row = mysqli_fetch_assoc($result)){
                
                // mail send information
                $userName =  $row['fname']." ".$row['lname'];
                $userToken = $row['token'];


                $to = "$email_num";
                $subject = "Recover Password";
                $mailMsg ="<p>Hi $userName </p>
                    <p><strong>Click here to  recover your account</strong></p>
                    http://localhost/bloodbank/join/reset_password.php?token=$userToken ";
                $header  = "From: Blood Bank<mycomputer44985@gmail.com>"."\r\n" .
                            'Content-Type: text/html; charset=utf-8' ;

                if(mail($to, $subject, $mailMsg, $header)){
                    $errorMsg .= "<div class=' alert-success border rounded px-1  mb-3'><strong>Check $email_num to recover your password</strong></div>";

                    $_SESSION['sendMail'] = 1 ;
                }else{
                    $errorMsg .= "<div class=' alert-danger border rounded px-1  mb-3'><strong>Failed to send recover mail</strong></div>";
                    $_SESSION['sendMail'] = 0;
                }

            }else{
                $errorMsg .="<div class=' alert-danger border rounded px-1 text-dark mb-3'><p><strong>No search results</strong></p>
                            This email or number is not valid</div>";
                $foundErr = 1;
            }

        }
    
    ?>
    <!-- php codes Ends -->


    <section id="recover">
        <div class="container-fluid jumbotron d-flex justify-content-center align-items-center w-100" style="height: 100vh;">
            <form action="" method="post" class=" col-lg-5 col-md-7 col-sm-10">
                <div class=" card w-100">
                    <div class=" card-header">
                        <h2>Find Your Account</h2>
                    </div>
                    <div class=" card-body">
                        <?php echo @$errorMsg; ?>
                        <p class="">Please enter your email address or mobile number to search for your account.</p>
                        <div class="input-div border rounded">
                            <div class="input-logo">
                                <i class=" fa fa-user"></i>
                            </div>
                            <input type="text" class="form-input w-100" name="email_num" placeholder="Email or Phone">
                        </div>
                    </div>
                    <div class=" card-footer">
                        <div>
                            <div class=" buttonx">
                                <input type="submit" name="submit" class="submit-btn " value="Recover">
                            </div>
                         </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>