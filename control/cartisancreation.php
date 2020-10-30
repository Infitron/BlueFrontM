<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){


             
            
                $fname              = addslashes(trim($_POST['f_name'])); 
                $lname              = addslashes(trim($_POST['l_name'])); 
                $phone              = addslashes(trim($_POST['phone'])); 
                $email              = addslashes(trim($_POST['email'])); 
                $aboutme            = addslashes(trim($_POST['about_me'])); 
                $loc                = addslashes(trim($_POST['loc'])); 
                $cat                = addslashes(trim($_POST['cat'])); 
                $address            = addslashes(trim($_POST['address'])); 
                $state              = addslashes(trim($_POST['state']));                 
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
                 $user_reg->RefererCode            = " ";
                 $user_reg->createArtisan();

                echo "<script> window.open('../logout.php','_self'); </script>";
                
                


        }



?>