<?php 
      
       
        if(isset($_POST['submit'])){

                $username   = addslashes(trim($_POST['username']));
                $email      = addslashes(trim($_POST['email']));
                $password   = addslashes(trim($_POST['password']));
                $user_role  = addslashes(trim($_POST['user_role']));
                $date       =  date('Y/m/d');


                $url = "https://api.bluecollarhub.com.ng/api/Account/Register";

                //Initiate cURL.
                $ch = curl_init($url);

                //The JSON data.
                 $jsonData = array(
                      'EmailAddress' => $email,
                      'Password' =>  $password,
                      'CreationDate' => $date,
                      'RoleId' => $user_role,
                      'UserName' =>  $username 
                );

                //Encode the array into JSON.
                $jsonDataEncoded = json_encode($jsonData);


                echo "<span style='display:none'>";
                //Tell cURL that we want to send a POST request.
                curl_setopt($ch, CURLOPT_POST, 1);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                //Attach our encoded JSON string to the POST fields.
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

                //Set the content type to application/json
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));

                //Execute the request
                $result = curl_exec($ch);

                //Close CURL
                curl_close($ch);

                echo"</span>";

               if($result){
                  
                    $testCheck = json_decode($result);
                    $status  = $testCheck->{'success'};

                    if(http_response_code(200) && $status == true ){
                        echo "<script>alert('Registration Successful')</script>";
                        echo "<script> window.open('login.php','_self'); </script>";

                    }else{
                        echo "<script>alert('Error Input, Please make sure you enter correct data')</script>";
                        echo "<script> window.open('uregister.php','_self'); </script>";
                    }

                }






                
                


        }



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>User Register</title>

    <!-- Fontfaces CSS-->
    <link href="artisan/css/font-face.css" rel="stylesheet" media="all">
    <link href="artisan/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="artisan/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="artisan/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="artisan/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="artisan/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="artisan/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="artisan/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="artisan/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="artisan/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="artisan/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="artisan/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="artisan/css/theme.css" rel="stylesheet" media="all">


</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="artisan/images/icon/logo1.png" alt="bluecollarhub">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">

                               
                                        
                                              <div class="row form-group">

                                                <div class="col-md-12">
                                                    <label class="text-black" for="fname">First Name</label>
                                                    <input type="text" id="fname" name="fname" class="form-control">
                                                </div>
                                            </div>
                                              <div class="row form-group">

                                                <div class="col-md-12">
                                                    <label class="text-black" for="lname">Last Name</label>
                                                    <input type="text" id="lname" name="lname" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">

                                                <div class="col-md-12">
                                                    <label class="text-black" for="phone">Phone Number</label>
                                                    <input type="phone" id="phone" name="phone" class="form-control">
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label class="text-black" for="state">State</label>
                                                     <select class="form-control" id="state" name="state">
                                                                <option value="1">Lagos</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label class="text-black" for="loc">Town / Location</label>
                                                     <select class="form-control" id="loc" name="loc">
                                                                <option value="1">Lagos</option>
                                                    </select>
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label class="text-black" for="address">Address</label>
                                                       <input type="text" id="address" name="address" class="form-control">
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label class="text-black" for="ufile">Upload Your Picture</label>
                                                    <input type="file" id="ufile" name="ufile" class="form-control">
                                                </div>
                                            </div>
                     
                               
                               <button class="au-btn au-btn--block au-btn--blue2 m-b-20" name="submit" type="submit">register</button>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="artisan/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="artisan/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="artisan/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="artisan/vendor/slick/slick.min.js">
    </script>
    <script src="artisan/vendor/wow/wow.min.js"></script>
    <script src="artisan/vendor/animsition/animsition.min.js"></script>
    <script src="artisan/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="artisan/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="artisan/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="artisan/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="artisan/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="artisan/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="artisan/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="artisan/js/main.js"></script>

</body>

</html>
<!-- end document-->