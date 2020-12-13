<?php  

        if(isset($_POST['submit'])){
            

            $scatid = addslashes(trim($_POST['subCat']));  
            $stateid = addslashes(trim($_POST['state'])); 
            $lgaid = addslashes(trim($_POST['lga'])); 

           
            if($scatid == "" || $scatid == null){

                echo "<script>alert('Service not Avaliable')</script>";
                echo "<script> window.open('index.php?db','_self'); </script>";

            }
           
           

            $ser = new Search();
            $ser->autht = $_SESSION['token'];
            $serDetail  = $ser->getSearch($scatid,$stateid, $lgaid);

           
            
            if($serDetail == "" || $serDetail == null){

                echo "<script>alert('Service not Avaliable')</script>";
                echo "<script> window.open('index.php?db','_self'); </script>";

            }
            
        

?>

<div class="row">
            <?php 

                    foreach ($serDetail as $serDetails) {

                        $id                = $serDetails['id'];
                        $artisanId         = $serDetails['artisanId'];
                        $descriptions      = $serDetails['descriptions'];
                        $serviceName       = $serDetails['serviceName'];
                        $status            = $serDetails['status'];
                        $category          = $serDetails['category'];
                        $subCategory       = $serDetails['subCategory'];
                        $locationId        = $serDetails['locationId'];
                        $lgaId             = $serDetails['lgaArea'];
                        $state             = $serDetails['state'];
                        $image             = $serDetails['image'];
                        $creationDate      = $serDetails['creationDate'];

            
            
            ?>



			 <div class="col-md-4">
                         
                                <div class="card">
                                    <img class="card-img-top" src="../images/services/<?php echo $image ?>" alt="Service Image">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3"><?php echo $serviceName; ?></h4>
                                        <p class="card-text"><?php echo $descriptions; ?>
                                        </p>
                                        <p><a href="index.php?ss&aid=<?php echo $artisanId; ?>&sid=<?php echo $id; ?>" class="btn btn-primary">View Service</a></p>
                                       
                                    </div>
                                </div>
              </div>
        
    <?php  } ?>   

</div>

<?php    

     }else{

                        echo "<script> window.open('index.php?db','_self'); </script>";
      } 


 ?>