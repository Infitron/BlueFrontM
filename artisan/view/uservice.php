<?php  

        $userService = new Service();
        $userService->autht =  $_SESSION['token'];
        $userServiceDId = $userService->findServiceByUserId($aid);
        

        if(empty($userServiceDId)){
            echo "<script>alert('Add your Service Details')</script>";   
             echo "<script> window.open('../artisan/index.php?aus','_self'); </script>";
        }

        $UServiceD  = $userService->getServiceByArtisanId($userServiceDId);




        

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
                                                <th>Task</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  
                                                   
                                                
                                                        
                                                        $sid       = $UServiceD['id'];
                                                        $artisanId = $UServiceD['artisanId'];
                                                        $serviceName = $UServiceD['serviceName'];
                                                        $descriptions = $UServiceD['descriptions'];
                                                        $statusId = $UServiceD['statusId'];
                                                        $creationDate = $UServiceD['creationDate'];

                                                        echo "

                                                                 <tr>
                                                                    <td>$sid</td>
                                                                    <td>$serviceName</td>
                                                                    <td>$descriptions</td>
                                                                    <td><a href='index.php?vus&id=$sid' class='btn btn-danger btn-lg'>View</a></td>
                                                                    <td> <a href='index.php?eus&id=$sid' class='btn btn-primary btn-lg'>Edit</a></td>
                                                                </tr>



                                                        ";
                                                  

                                                   

                                            ?>



                                           

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>