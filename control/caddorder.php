<?php   

				include('../model/init.php');


		     if(isset($_POST['submit'])){


                $uid             = addslashes(trim($_POST['userid']));
                $sid             = addslashes(trim($_POST['serviceid']));
                $message         = addslashes(trim($_POST['message']));
                $token           = $_POST['token'];
                




               
                $add_order  = new Order();
				$add_order->autht             =  $token;
                $add_order->clientId          =  $uid;
                $add_order->messages          =  $message;
                $add_order->serviceId         =  $sid;
                $add_order->postOrder();

                $aid = $_SESSION['aid'];
                $cid = $_SESSION['cid'];

                if(isset($aid) && !empty($aid)){

                    unset($_SESSION['order_sids']);
                    unset($_SESSION['order_aids']);
                    unset($_SESSION['order_anames']);

                    echo "<script> window.open('../artisan/index.php?db','_self'); </script>";
                }if(isset($cid) && !empty($cid)){
                    
                    unset($_SESSION['order_sids']);
                    unset($_SESSION['order_aids']);
                    unset($_SESSION['order_anames']);

                    echo "<script> window.open('../client/index.php?db','_self'); </script>";
                }
                

                
		     }
?>