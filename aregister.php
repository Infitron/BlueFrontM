<?php include('hnav.php'); ?>

<?php
        


       
          $email =  $_SESSION['email1'];
          $userId = $_SESSION['artisan_user_id'];
          $password = $_SESSION['password'];
        

        if (isset($_POST['submit'])) {
        
                 $userLogin = new User();
                 $userLogin->userLogin($email,$password);
                 $token =  $_SESSION['token'];

                 
              

                $fname      = addslashes(trim($_POST['fname']));
                $lname      = addslashes(trim($_POST['lname']));
                $phone      = addslashes(trim($_POST['phone']));
                $username   = addslashes(trim($_POST['username']));
                $email      = addslashes(trim($_POST['email']));
                $state      = addslashes(trim($_POST['state']));
                $loc        = addslashes(trim($_POST['loc']));
                $cat        = addslashes(trim($_POST['cat']));
                $address    = addslashes(trim($_POST['address']));
                $aboutme    = addslashes(trim($_POST['aboutme']));
                $IdcardNo   = addslashes(trim($_POST['IdcardNo']));


                 $user_reg = new User();
                 $user_reg->autht                  = $token;
                 $user_reg->FirstName              = $fname;
                 $user_reg->LastName               = $lname;
                 $user_reg->PhoneNumber            = $phone;
                 $user_reg->IdcardNo               = $IdcardNo;
                 $user_reg->Address                = $address;
                 $user_reg->PicturePath            = "default.png";
                 $user_reg->State                  = $state;
                 $user_reg->UserId                 = $userId;
                 $user_reg->AreaLocationId         = $loc;
                 $user_reg->ArtisanCategoryId      = $cat;
                 $user_reg->AboutMe                = $aboutme;
                 $user_reg->RefererCode            = "Default";
                 $user_reg->createArtisan();

                echo "<script> window.open('login.php','_self'); </script>";
        }

        
?>



<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mb-5" data-aos="fade">

                

                <form action="" method="POST" id="reguser-form" class="p-5 bg-white" enctype="multipart/form-data">
                <h2 class="mb-5 text-black">Artisan Registration</h2>
                        <div class="row form-group">

                                <div class="col-md-12">
                                    <label class="text-black" for="fname">First Name</label>
                                    <input type="text" id="fname" name="fname" class="form-control">
                                </div>
                        </div>
                        <div class="row form-group">

                                <div class="col-md-12">
                                    <label class="text-black" for="fname"> Last Name</label>
                                    <input type="text" id="lname" name="lname" class="form-control">
                                </div>
                        </div>
                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="username"> Username</label>
                                <input type="text" id="username" name="username" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" id="username" name="email" class="form-control"  value="<?php echo $email; ?>" readonly="">
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="username">Phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="IdcardNo">Identification Number (Drivig Licence, National ID, Voters ID)</label>
                            <input type="text" id="IdcardNo" name="IdcardNo" class="form-control">
                        </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="state">State </label>
                                    <select class="form-control" id="state" name="state">
                                        <?php  

                                                $sta = new State();
                                                $sta->autht = $_SESSION['token'];
                                                $staa = $sta->getState();

                                                foreach ($staa as $staas) {
                                                    $id        = $staas['id'];
                                                    $stat_name = $staas['name'];

                                                    echo " <option value='$id'>$stat_name</option>";
                                                }


                                        ?>
                                    </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="loc">LGA / Location</label>
                                    <select class="form-control" id="loc" name="loc">
                                        <?php  

                                            $loc = new Location();
                                            $loc->autht  = $_SESSION['token'];
                                            $loca = $loc->getLocation();

                                            foreach ($loca as $locas) {
                                                $loc_id = $locas['id'];
                                                $loc_lga = $locas['area'];

                                                echo " <option value='$loc_id'>$loc_lga</option>";
                                            }


                                        ?>
                                    </select>
                            </div>
                       </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="cat">Job Category</label>
                                    <select class="form-control" id="cat" name="cat">
                                        <?php  

                                                $cat = new Category();
                                                $cat->autht  = $_SESSION['token'];
                                                $cate = $cat->getCategory();

                                                foreach ($cate as $cates) {
                                                    $cat_id = $cates['id'];
                                                    $cat_lga = $cates['categoryName'];

                                                    echo " <option value='$cat_id'>$cat_lga</option>";
                                                }


                                        ?>
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
                                <label class="text-black" for="address">Tell Us More About Yourself </label>
                                <textarea class="form-control" type="text" name="aboutme" rows="9"></textarea>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Register" name="submit" id="submit" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>

                    


                 </form >

            </div>
        </div>
    </div>                 

</div>
                     
                 
              
        




<?php include('lfooter.php'); ?>
