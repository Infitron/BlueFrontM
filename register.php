<?php
        include('model/init.php');
        include('hnav.php'); 


        if(isset($_POST['submit'])){

                $username   = addslashes(trim($_POST['username']));
                $email      = addslashes(trim($_POST['email']));
                $password   = addslashes(trim($_POST['password']));
                $password2   = addslashes(trim($_POST['password2']));
                $user_role  = addslashes(trim($_POST['user_role']));
                $date       =  date('Y/m/d');

                if ($password != $password2) {
                     echo "<script>alert('Password not match, Please fill in same password on both fields')</script>";
                     echo "<script> window.open('register.php','_self'); </script>";
                     die();
                }


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
                        echo "<script> window.open('register.php','_self'); </script>";
                    }

                }






                
                


        }



?>


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/banner2.png);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>Sign Up</h1>
                        <p class="mb-0">Thank you for your intrest in BlueCollar Hub. Complete the form below to get started</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mb-5" data-aos="fade">

                <h2 class="mb-5 text-black">Register</h2>

                <form action="#" method="POST" id="reguser-form" class="p-5 bg-white">

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="password2">Re-type Password</label>
                            <input type="password" id="password2" name="password2" class="form-control">
                        </div>
                    </div>
                     <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="regas">Register As: </label>
                             <select class="form-control" id="regas" name="user_role">
                                        <option value="2">Client</option>
                                        <option value="1">Artisan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <p>Already have an account? <a href="login.php">Log In Here</a></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Sign Up" name="submit" id="reg_user" class="btn btn-primary py-2 px-4 text-white">
                        </div>
                    </div>
                    <div>
                        <p>
                            <?php echo $message; ?>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php include('lfooter.php'); ?>
