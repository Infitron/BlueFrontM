<?php
        include('../model/init.php');

          $email =  $_SESSION['email'];
          $userId = $_SESSION['user_id'];
          $password = $_SESSION['password'];
        

        if (isset($_POST['submit'])) {
        
                 $userLogin = new User();
                 $userLogin->userLogin($email,$password);
                 $token =  $_SESSION['token'];

        

                $fname      = addslashes(trim($_POST['fname']));
                $lname      = addslashes(trim($_POST['lname']));
                $phone      = addslashes(trim($_POST['phone']));
                $state      = addslashes(trim($_POST['state']));
                $address    = addslashes(trim($_POST['address']));
               
             


                 $user_reg = new User();
                 $user_reg->autht                  = $token;
                 $user_reg->FirstName              = $fname;
                 $user_reg->LastName               = $lname;
                 $user_reg->PhoneNumber            = $phone;
                 $user_reg->IdcardNo               = "200LAG";
                 $user_reg->PicturePath            = "default.png";
                 $user_reg->Address                = $address;
                 $user_reg->State                  = $state;
                 $user_reg->UserId                 = $userId;
                 $user_reg->createClient();

                echo "<script>alert('Client Creation Successful')</script>";
                echo "<script> window.open('../login.php','_self'); </script>";
        }

        
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="" content="">
       

    <!-- Title Page-->
    <title>Create User</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Client Profile Registration</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="fname">
                                            <label class="label--desc">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="lname">
                                            <label class="label--desc">Last Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                     <input class="input--style-5" type="email" name="email" value="<?php echo $email; ?>" readonly="">
                                </div>
                            </div>
                        </div>
                          <div class="form-row">
                            <div class="name">Phone Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                          <div class="form-row">
                            <div class="name">State</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="state">
                                </div>
                            </div>
                        </div>
                       
                       
                        <div class="form-row">
                            <div class="name">Address</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="input--style-5" type="text" name="address" cols="48"></textarea> 
                                </div>
                            </div>
                        </div>
                        
                       
                        <div>
                            <input class="btn btn--radius-2 btn--red" type="submit" name="submit" value="Register" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->