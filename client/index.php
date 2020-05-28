<?php   
    ob_start();
	include "../model/init.php"; 
    if(!$session->is_signed_in()){redirect("../login.php");}

    include("inc/header.php");
    include("inc/sidebar.php");
    include("inc/mainconent.php");
    include("inc/footer.php");

?>
    


     