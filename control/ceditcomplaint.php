<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){


                $title             = addslashes(trim($_POST['title'])); 
                $artisanId         = addslashes(trim($_POST['a_id'])); 
                $desc              = addslashes(trim($_POST['message']));
                $status            = addslashes(trim($_POST['ccompstatus']));
                $id                = addslashes(trim($_POST['id']));  
                $token             = $_POST['token'];
                $date              = date('Y-m-d H:i:s'); 

            


               
                $add_comp  = new Complaint();
				$add_comp->autht         =  $token;
                $add_comp->Title         =  $title;
                $add_comp->ArtisanId     =  $artisanId;
                $add_comp->Description   =  $desc;
                $add_comp->CreatedDate   =  $date;
                $add_comp->StatusId      =  $status;
                $add_comp->DateResolved  =  $date;
                $add_comp->PutComplaint($id);
                
                 echo "<script> window.open('../artisan/index.php?db','_self'); </script>";
		     }
?>