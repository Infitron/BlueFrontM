<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){


                $title             = addslashes(trim($_POST['title'])); 
                $artisanId         = addslashes(trim($_POST['a_id'])); 
                $desc              = addslashes(trim($_POST['message'])); 
                $token             = $_POST['token'];
                $date              = date('Y-m-d H:i:s'); 

               
               
                $add_comp  = new Complaint();
				$add_comp->autht         =  $token;
                $add_comp->Title         =  $title;
                $add_comp->ArtisanId     =  $artisanId;
                $add_comp->Descriptions  =  $desc;
                $add_comp->CreatedDate   =  $date;
                $add_comp->StatusId      =  1;
                $add_comp->DateResolved  =  $date;
                $add_comp->PostComplaint();
                
                 echo "<script> window.open('../artisan/index.php?db','_self'); </script>";
		     }
?>