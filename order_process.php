<?php

        include('model/init.php');

        if(isset($_GET['sid']) && !empty($_GET['sid']) && isset($_GET['aid']) && !empty($_GET['aid']) && isset($_GET['an']) && !empty($_GET['an']) ){

            $sid              = addslashes(trim($_GET['sid']));
            $aid              = addslashes(trim($_GET['aid']));
            $an               = addslashes(trim($_GET['an']));


            $_SESSION['order_sid']   = $sid;
            $_SESSION['order_aid']   = $aid;
            $_SESSION['order_aname'] = $an;


            echo "<script>alert('Your Order is been process, Please login to continue to the next step')</script>";
            echo "<script> window.open('login.php','_self'); </script>";


        }


?>