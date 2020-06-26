<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){


                $sname             = addslashes(trim($_POST['sname'])); 
                $sinfo             = addslashes(trim($_POST['sinfo'])); 
                $status            = addslashes(trim($_POST['status'])); 
                $userId            = addslashes(trim($_POST['userId'])); 
                $aId               = addslashes(trim($_POST['artisanId']));
                $sId               = addslashes(trim($_POST['sId'])); 
                $token             = addslashes(trim($_POST['token']));
                $creationDate      = addslashes(trim($_POST['creationDate']));

               
                $add_service  = new Service();
				$add_service->autht         =  $token;
                $add_service->ServiceName   =  $sname;
                $add_service->Descriptions  =  $sinfo;
                $add_service->StatusId      =  $status;
                $add_service->Id            =  $sId;
                $add_service->ArtisanId     =  $aId;
                $add_service->creationDate  =  $creationDate;
                $add_service->putService();
                
                 echo "<script> window.open('../artisan/index.php?db','_self'); </script>";
		     }
?>