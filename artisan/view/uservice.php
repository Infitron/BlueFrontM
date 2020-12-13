<?php  

        $userService = new Service();
        $userService->autht =  $_SESSION['token'];
        $UServiceD  = $userService->getServiceByArtisanId($aid);
        

        if(empty($UServiceD)){
            echo "<script>alert('Add your Service Details')</script>";   
             echo "<script> window.open('../artisan/index.php?aus','_self'); </script>";
        }

       




        

?>         



                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Service / Product</h2>
                                    <a href="index.php?aus" class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>add Service</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Last Service Name</th>
                                                <th>Last Service Info</th>
                                                <th>View Image File</th>
                                                <th>View Service Details</th>
                                                <th>Task</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                   
                                                
                                                      foreach ($UServiceD as $UServiceDs) {
                                                       
                                                        $sid            = $UServiceDs['id'];
                                                        $artisanId      = $UServiceDs['artisanId'];
                                                        $serviceName    = $UServiceDs['serviceName'];
                                                        $descriptions   = $UServiceDs['descriptions'];
                                                        $statusId       = $UServiceDs['statusId'];
                                                        $asimage        = $UServiceDs['image'];
                                                        $creationDate   = $UServiceDs['creationDate'];

                                                        echo "

                                                                 <tr>
                                                                    <td>$sid</td>
                                                                    <td>$serviceName</td>
                                                                    <td>$descriptions</td>
                                                                    <td><a href='../images/services/$asimage' class='btn btn-danger btn-lg'  data-toggle='lightbox' data-title='Service Image' data-footer='$serviceName' target='_blank'>View</a></td>
                                                                     <td><a href='index.php?vus&id=$sid' class='btn btn-success btn-lg'>View</a></td>
                                                                    <td> <a href='index.php?eus&id=$sid' class='btn btn-primary btn-lg'>Edit</a></td>
                                                                </tr>

                                                        ";
                                                  
                                                     }
                                                   
                                                    
                                            ?>



                                           

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>