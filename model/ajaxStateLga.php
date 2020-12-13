<?php  

    include('init.php');

    if(isset($_GET['stateId'])){

        $stateId = addslashes($_GET['stateId']);

        $lga = new State();
        $lga->autht = $_SESSION['token'];
        $lgaa = $lga->getStateLgaId($stateId);


        foreach ($lgaa as $lgaas) {
            $id        =  $lgaas['Id'];
            $lga_name  =  $lgaas['Lga1'];
            
                echo "<option value='$id'>$lga_name</option>";
            

        }

    }





?>