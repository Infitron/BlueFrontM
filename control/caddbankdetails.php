<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){


                $aname             = addslashes(trim($_POST['aname'])); 
                $anum              = addslashes(trim($_POST['anum'])); 
                $bvn               = addslashes(trim($_POST['bvn'])); 
                $bcode             = addslashes(trim($_POST['bcode'])); 
                $date              =  date('Y-m-d h:i:s');
                $userId            = addslashes(trim($_POST['userId'])); 
                $token             = addslashes(trim($_POST['token']));




               
                $add_bank  = new BankDetails();
				$add_bank->autht             =  $token;
                $add_bank->AccountName       =  $aname;
                $add_bank->AccountNumber     =  $anum;
                $add_bank->BankCode          =  $bcode;
                $add_bank->Bvn               =  $bvn;
                $add_bank->UserId            =  $userId;
                $add_bank->CreatedDate       =  $date;
                $add_bank->PostBankDetails();
                

                 echo "<script> window.open('../artisan/index.php?db','_self'); </script>";
		     }
?>