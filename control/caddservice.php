<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){


                $sname             = addslashes(trim($_POST['sname'])); 
                $sinfo             = addslashes(trim($_POST['sinfo'])); 
                $status            = addslashes(trim($_POST['status'])); 
                $userId            = addslashes(trim($_POST['userId'])); 
                $token             = addslashes(trim($_POST['token']));

               
                $add_service  = new Service();
				$add_service->autht         =  $token;
                $add_service->ServiceName   =  $sname;
                $add_service->Descriptions  =  $sinfo;
                $add_service->StatusId      =  $status;
                $add_service->UserId        =  $userId;
                $add_service->postService();
                
                 echo "<script> window.open('../artisan/index.php?db','_self'); </script>";
		     }
?>