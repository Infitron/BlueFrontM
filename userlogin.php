<?php
        include('model/init.php');
        include('hnav.php'); 


        if(isset($_POST['submit'])){

               
                $email      = addslashes(trim($_POST['email']));
                $password   = addslashes(trim($_POST['password']));

                $url = "https://api.bluecollarhub.com.ng/api/Account/Login";

                //Initiate cURL.
                $ch = curl_init($url);

                //The JSON data.
                 $jsonData = array(
                      'username' => $email,
                      'password' =>  $password,
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
                       	
                        $userRole = $testCheck->{'userRole'};

                       if($userRole == 'Artisan'){

								$_SESSION['userId'] = $testCheck->{'userId'};
								$_SESSION['token'] = $testCheck->{'token'};
								$_SESSION['userRole'] = $testCheck->{'userRole'};
								$_SESSION['userRoleId'] = 1;


								echo "<script> window.open('artisan/index.php','_self'); </script>";

						} if($userRole == 'Client'){

								$_SESSION['userId'] = $testCheck->{'userId'};
								$_SESSION['token'] = $testCheck->{'token'};
								$_SESSION['userRole'] = $testCheck->{'userRole'};
								$_SESSION['userRoleId'] = 2;


								echo "<script> window.open('client/index.php','_self'); </script>";

						}

                    }else{
                        echo "<script>alert('Error Input, Please make sure you enter correct data')</script>";
                        echo "<script> window.open('login.php','_self'); </script>";
                    }

                }

        }





 ?>