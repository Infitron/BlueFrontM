<?php   

				include('../model/init.php');


		        if(isset($_POST['submit'])){

            
                $username   = addslashes(trim($_POST['username']));
                $email      = addslashes(trim($_POST['email']));
                $password   = addslashes(trim($_POST['password']));
                $password2   = addslashes(trim($_POST['password2']));
                $user_role  = addslashes(trim($_POST['user_role']));
                $date       =  date('Y/m/d');
                /*
                foreach ($_POST as $key => $value) {
                	echo "$key => $value <br>";
                }

                die(); */

                if ($password != $password2) {
                     echo "<script>alert('Password not match, Please fill in same password on both fields')</script>";
                     echo "<script> window.open('register.php','_self'); </script>";
                     die();
                }


                $url = "https://api.bluecollarhub.com.ng/api/v1.1/Account/Register";

                //Initiate cURL.
                $ch = curl_init($url);

                //The JSON data.
                 $jsonData = array(
                      'emailAddress' => $email,
                      'password' =>  $password,
                      'creationDate' => $date,
                      'roleId' => $user_role,
                      'userName' =>  $username 
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
                  
                    $testCheck   = json_decode($result);
                    $status      = $testCheck->{'success'};
                    $error       = $testCheck->{'errorMessage'};
                    $userRole    = $testCheck->{'userRole'};
                    $userId      = $testCheck->{'userId'};

                  

                    if(http_response_code(200) || $status == true ){


                        echo "<script>alert('Registration Successful')</script>";
                            
                            if($user_role == '1'){

				                    $_SESSION['artisan_user_id']    =  $userId;
				                    $_SESSION['email1']             =   $email;
				                    $_SESSION['password']           =   $password;
				                    
                            	 echo "<script>alert('Registration Successful and Create Your Profile')</script>";
                            	  echo "<script> window.open('../aregister.php','_self'); </script>";

                            } if($user_role == '2'){

                                    $_SESSION['client_user_id']   =   $userId;
                                    $_SESSION['email1']           =   $email;
                                    $_SESSION['password']         =   $password;

                            	  echo "<script>alert('Registration Successful and Create Your Profile')</script>";
                            	  echo "<script> window.open('../cregister.php','_self'); </script>";
                            }
                       

                    }else{
                        echo "<script>alert('$error')</script>";
                        echo "<script>alert('Error Input, Please make sure you enter correct data')</script>";
                        echo "<script> window.open('../register.php','_self'); </script>";
                    }

                }






                
                


        }



?>