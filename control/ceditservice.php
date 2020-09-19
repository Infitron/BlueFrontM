<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){


                $sname             = addslashes(trim($_POST['sname'])); 
                $sinfo             = addslashes(trim($_POST['sinfo'])); 
                $status            = addslashes(trim($_POST['status'])); 
                $userId            = addslashes(trim($_POST['userId'])); 
                $cat               = addslashes(trim($_POST['cat'])); 
                $subcat            = addslashes(trim($_POST['subcat'])); 
                $loc               = addslashes(trim($_POST['loc']));
                $state             = addslashes(trim($_POST['state']));
                $lga               = addslashes(trim($_POST['lga']));
                $aId               = addslashes(trim($_POST['aId']));
                $sId               = addslashes(trim($_POST['sId']));
                $token             = addslashes(trim($_POST['token']));
                $creationDate      = addslashes(trim($_POST['creationDate']));
                $date              = date('Y-m-d H:i:s'); 


              
              

               
                $add_service  = new Service();
                $add_service->autht         =  $token;
                $add_service->set_file($_FILES['sfile']);
                $add_service->serviceName   =  $sname;
                $add_service->descriptions  =  $sinfo;
                $add_service->statusId      =  $status;
                $add_service->categoryId    =  $cat;
                $add_service->subcategoryId =  $subcat;
                $add_service->locationId    =  $loc;
                $add_service->lgaId         =  $lga;
                $add_service->artisanId     =  $aId;
                $add_service->stateId       =  $state;
                $add_service->creationDate  =  $date;
                $add_service->putService($sId);
                
                 echo "<script> window.open('../artisan/index.php?ups','_self'); </script>";
		     }
?>