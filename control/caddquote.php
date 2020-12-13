<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){

                $mName            = $_POST['mName'];
                $mQu              = $_POST['mQu'];
                $mUp              = $_POST['mUp'];
                $mTp              = $_POST['mTp'];
                $qnum             = $_POST['qnum'];
                $incount          = $qnum;

     
                

                $dis              = addslashes(trim($_POST['dis']));
                $wm               = addslashes(trim($_POST['wm']));
                $total            = addslashes(trim($_POST['total']));
                $oid              = addslashes(trim($_POST['oid']));
                $odate             = addslashes(trim($_POST['odate']));
                $token             = $_POST['token'];
                $date              = date('Y-m-d H:i:s'); 
                
                $name           = array();
                $quantity       = array();
                $unitPrice      = array();
                $totalPrice     = array();

                for ($i = 0; $i <= $incount; $i++) { 

                    if($i == $incount){
                         break;
                     }

                     $name           = $mName[$i];
                     $quantity       = $mQu[$i];
                     $unitPrice      = $mUp[$i];
                     $totalPrice     = $mTp[$i];


                }

                $add_quote  = new Quote();
				$add_quote->autht             =  $token;

                for ($a=0; $a <= $incount; $a++) { 

                    $add_quote->eachItem  = array($name[$a],$quantity[$a],$unitPrice[$a],$totalPrice[$a]);

                }

               
                $add_quote->discount        =   $dis;
                $add_quote->workmanShip     =   $wm;
                $add_quote->total           =   $total;
                $add_quote->bookingId       =   $dis;
                $add_quote->createdDate     =   $date;
                $add_quote->orderDate       =   $odate;
                $add_quote->postQuote();

                echo "<script> window.open('../artisan/index.php?db','_self'); </script>";
               
                

                
		     }
?>