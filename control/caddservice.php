<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){


                $sname             = addslashes(trim($_POST['sname'])); 
                $sinfo             = addslashes(trim($_POST['sinfo'])); 
                $status            = addslashes(trim($_POST['status'])); 
                $userId            = addslashes(trim($_POST['userId'])); 
                $cat               = addslashes(trim($_POST['cat'])); 
                $loc               = addslashes(trim($_POST['loc']));
                $state             = addslashes(trim($_POST['state']));
                $aId               = addslashes(trim($_POST['aId']));
                $token             = addslashes(trim($_POST['token']));
                $date              = date('Y-m-d H:i:s'); 

              


               
                $add_service  = new Service();
				$add_service->autht         =  $token;
                $add_service->set_file($_FILES['sfile']);
                $add_service->serviceName   =  $sname;
                $add_service->descriptions  =  $sinfo;
                $add_service->statusId      =  $status;
                $add_service->categoryId    =  $cat;
                $add_service->locationId    =  $loc;
                $add_service->lgaId         =  $state;
                $add_service->artisanId     =  $aId;
                $add_service->creationDate  =  $date;
                $add_service->postService();
                
                 echo "<script> window.open('../artisan/index.php?ups','_self'); </script>";
		     }
?>