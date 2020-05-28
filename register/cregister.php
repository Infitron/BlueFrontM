<?php
        include('../model/init.php');

        if (isset($_POST['submit'])) {
            


                $fname      = addslashes(trim($_POST['fname']));
                $lname      = addslashes(trim($_POST['lname']));
                $phone      = addslashes(trim($_POST['phone']));
                $username   = addslashes(trim($_POST['username']));
                $email      = addslashes(trim($_POST['email']));
                $state      = addslashes(trim($_POST['state']));
                $loc        = addslashes(trim($_POST['loc']));
                $cat        = addslashes(trim($_POST['cat']));
                $address     = addslashes(trim($_POST['address']));
                $user_role  = addslashes(trim($_POST['user_role']));
                $date       =  date('Y/m/d');





                 $user_reg = new User();
                 $user_reg->FirstName              = $fname;
                 $user_reg->LastName               = $lname;
                 $user_reg->PhoneNumber            = $phone;
                 $user_reg->IdcardNo               = "";
                 $user_reg->Address                = $address;
                 $user_reg->State                  = $state;
                 $user_reg->UserId                 = $userId;
                 $user_reg->AreaLocation           ="";
                 $user_reg->ArtisanCategoryId      = 1;
                 $user_reg->AboutMe                ="";
                 $user_reg->set_file($_FILES['ufile']);
                 $user_reg->save_users_images();
                 $user_reg->createArtisan();
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
                    <h2 class="title">Artisan Profile Registration</h2>
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
                            <div class="name">Username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email">
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
                            <div class="name">LGA / Location</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="loc">
                                             <?php  

                                                    $loc = new Location();
                                                    $loca = $loc->getLocation();

                                                    foreach ($loca as $locas) {
                                                        $loc_id = $locas['id'];
                                                        $loc_lga = $locas['lga'];

                                                        echo " <option value='$loc_id'>$loc_lga</option>";
                                                    }


                                            ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Categories</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="cat">
                                             <?php  

                                                    $loc = new Location();
                                                    $loca = $loc->getLocation();

                                                    foreach ($loca as $locas) {
                                                        $loc_id = $locas['id'];
                                                        $loc_lga = $locas['lga'];

                                                        echo " <option value='$loc_id'>$loc_lga</option>";
                                                    }


                                            ?>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
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
                            <button class="btn btn--radius-2 btn--red" type="submit" name="submit">Register</button>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->