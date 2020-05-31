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
                $email              = addslashes(trim($_POST['email'])); 
                $aboutme           = addslashes(trim($_POST['about_me'])); 
                $loc                = addslashes(trim($_POST['loc'])); 
                $cat                = addslashes(trim($_POST['cat'])); 
                $address            = addslashes(trim($_POST['address'])); 
                $state              = addslashes(trim($_POST['state']));  
                $country            = addslashes(trim($_POST['country'])); 
                $bacc_no            = addslashes(trim($_POST['bacc_no'])); 
                $bacc_name          = addslashes(trim($_POST['bacc_name'])); 
                $profession         = addslashes(trim($_POST['profession'])); 
                $facebook           = addslashes(trim($_POST['facebook'])); 
                $twitter            = addslashes(trim($_POST['twitter'])); 
                $instagram          = addslashes(trim($_POST['instagram']));
                $aid                = addslashes(trim($_POST['aid']));
                $userId             = addslashes(trim($_POST['user_id']));
                $idcardNo           = addslashes(trim($_POST['idcardNo']));
                $token              = $_POST['token'];
                $date               =  date('Y/m/d'); 


                 $user_reg = new User();
                 $user_reg->autht                  = $token;
                 $user_reg->set_file($_FILES['ufile']);
                 $user_reg->FirstName              = $fname;
                 $user_reg->LastName               = $lname;
                 $user_reg->PhoneNumber            = $phone;
                 $user_reg->IdcardNo               = $idcardNo;
                 $user_reg->Address                = $address;
                 $user_reg->State                  = $state;
                 $user_reg->UserId                 = $userId;
                 $user_reg->AreaLocation           = $loc;
                 $user_reg->ArtisanCategoryId      = $cat;
                 $user_reg->AboutMe                = $aboutme;
                 $user_reg->updateArtisan($aid);

                echo "<script> window.open('../artisan/index.php?db','_self'); </script>";
                
                


        }



?>