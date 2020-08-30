<?php include('hnav.php'); ?>

<?php
        include('model/init.php');

          $email =  $_SESSION['email1'];
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
                echo "<script> window.open('login.php','_self'); </script>";
        }

        
?>



<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mb-5" data-aos="fade">

                <h2 class="mb-5 text-black">Client Registration</h2>

                <form action="" method="POST" id="reguser-form" class="p-5 bg-white" enctype="multipart/form-data">

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
                                <label class="text-black" for="username">Phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-control">
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

                                                    echo " <option value='$stat_name'>$stat_name</option>";
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
                                <input type="submit" value="Register" name="submit" id="submit" class="btn btn-primary py-2 px-4 text-white">
                            </div>
                        </div>

                    


                 </form >

            </div>
        </div>
    </div>                 

</div>
                     
                 
              
        




<?php include('lfooter.php'); ?>
