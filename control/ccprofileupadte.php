<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){


                 /*  foreach ($_POST as $key => $value) {
                    echo "$key => $value <br />";
                }
                foreach ($_FILES as $key => $value) {
                    echo "$key => $value <br />";
                }
                die();*/
            
                $fname              = addslashes(trim($_POST['f_name'])); 
                $lname              = addslashes(trim($_POST['l_name'])); 
                $phone              = addslashes(trim($_POST['phone'])); 
                $address            = addslashes(trim($_POST['address'])); 
                $state              = addslashes(trim($_POST['state']));  
                $cid                = addslashes(trim($_POST['cid']));
                $userId             = addslashes(trim($_POST['user_id']));
                $token              = $_POST['token'];
                $date               =  date('Y/m/d'); 


                 $user_reg = new User();
                 $user_reg->autht                  = $token;
                 $user_reg->set_file($_FILES['ufile']);
                 $user_reg->FirstName              = $fname;
                 $user_reg->LastName               = $lname;
                 $user_reg->PhoneNumber            = $phone;
                 $user_reg->Address                = $address;
                 $user_reg->State                  = $state;
                 $user_reg->UserId                 = $userId;
                 $user_reg->updateClient($cid);


                echo "<script> window.open('../client/index.php?db','_self'); </script>";
                
                


        }



?>