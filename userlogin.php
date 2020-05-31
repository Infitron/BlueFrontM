<?php
        include('model/init.php');



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

                       
                        $userRole = $testCheck->{'userRole'};


                       if($userRole == 'Artisan'){

								$_SESSION['user_id'] =   $testCheck->{'userId'};
								$_SESSION['token'] =    "Authorization: bearer " .$testCheck->{'token'};
								$_SESSION['userRole'] = $testCheck->{'userRole'};
								$_SESSION['userRoleId'] = 1;
                                $_SESSION['email']      = $email;
                                $_SESSION['password']   = $password;
                                $session->check_the_login();

                               

                                $user = new User();
                                $user->autht = $_SESSION['token'];
                                $artisanId = $user->findArtisanById($_SESSION['user_id']);
                                $user_data = $user->getUserArtisan($artisanId);

                                $_SESSION['aid']                   = $user_data['id'];
                                $_SESSION['userId']                = $user_data['userId'];
                                $_SESSION['firstName']             = $user_data['firstName'];
                                $_SESSION['lastName']              = $user_data['lastName'];
                                $_SESSION['phoneNumber']           = $user_data['phoneNumber'];
                                $_SESSION['idcardNo']              = $user_data['idcardNo'];
                                $_SESSION['picturePath']           = $user_data['picturePath'];
                                $_SESSION['address']               = $user_data['address'];
                                $_SESSION['category']              = $user_data['category'];
                                $_SESSION['state']                 = $user_data['state'];
                                $_SESSION['aboutMe']               = $user_data['aboutMe'];
                                $_SESSION['createdDate']           = $user_data['createdDate'];
                                $_SESSION['areaLocation']          = $user_data['areaLocation'];
                                $_SESSION['artisanCategory']       = $user_data['artisanCategory'];
                                


								echo "<script> window.open('artisan/index.php?db','_self'); </script>";

						} if($userRole == 'Client'){

								$_SESSION['user_id'] = $testCheck->{'userId'};
								$_SESSION['token'] = "Authorization: bearer " .$testCheck->{'token'};
								$_SESSION['userRole'] = $testCheck->{'userRole'};
								$_SESSION['userRoleId'] = 2;
                                $_SESSION['email']      = $email;
                                $_SESSION['password']   = $password;
                                $session->check_the_login();




                                $user = new User();
                                $user->autht = $_SESSION['token'];
                                $clientId = $user->findClientById($_SESSION['user_id']);
                                $user_data = $user->getClientDetails($clientId);

                                $_SESSION['cid']                   = $user_data['id'];
                                $_SESSION['userId']                = $user_data['userId'];
                                $_SESSION['firstName']             = $user_data['firstName'];
                                $_SESSION['lastName']              = $user_data['lastName'];
                                $_SESSION['phoneNumber']           = $user_data['phoneNumber'];
                                $_SESSION['idcardNo']              = $user_data['idcardNo'];
                                $_SESSION['picturePath']           = $user_data['picturePath'];
                                $_SESSION['address']               = $user_data['address'];
                                $_SESSION['state']                 = $user_data['state'];
                                $_SESSION['aboutMe']               = $user_data['aboutMe'];
                                $_SESSION['createdDate']           = $user_data['createdDate'];
                              

								echo "<script> window.open('client/index.php?db','_self'); </script>";

						}

                    }else{
                        echo "<script>alert('Error Input, Please make sure you enter correct data')</script>";
                        echo "<script> window.open('login.php','_self'); </script>";
                    }

                }

        }





 ?>