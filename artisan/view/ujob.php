<?php

        $ajob = new Order();
        $ajob->autht = $token;
        $ajs = $ajob->getOrderByArtisanId($aid);






?>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Job Request</h2>
                                   
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
                                                <th>User Name</th>
                                                <th>User Type</th>
                                                <th>Product / Service</th>
                                                <th>Category</th>
                                                <th>Job Status</th>
                                                <th>View Job</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            
                                                    foreach($ajs as $aj){


                                                        $id                 = $aj['id'];
                                                        $clientId           = $aj['clienId'];
                                                        $artisanId          = $aj['artisanId'];
                                                        $artisanFullName    = $aj['artisanFullNmae'];
                                                        $clientFullName     = $aj['clientFullName'];
                                                        $messages           = $aj['messages'];
                                                        $msgDate            = $aj['msgDate'];
                                                        $serviceId          = $aj['serviceId'];
                                                        $quoteId            = $aj['quoteId'];
                                                        $createdDate        = $aj['createdDate'];
                                                        $fn = "";
                                                        $status = "Processing";
                                                        $userType = "";

                                                        $serv  = new Service();
                                                        $serv->autht = $token;
                                                        $ser = $serv->getServiceDetails($serviceId);
                                                        $ser_name = $ser['serviceName'];
                                                        $ser_cat = $ser['category'];


                                                        if(isset($clientId) && !empty($clientId) && !$clientId == null && !$clientId == 0){

                                                            $fn     = $clientFullName;
                                                            $userType = "Client";  
                                                        }
                                                        
                                                        /*if(isset($artisanId) && !empty($artisanId) && !$artisanId == null && $artisanId == 0){

                                                            $fn = $artisanFullName;
                                                            $userType = "Artisan";
                                                        }*/

                                                        echo"
                                                        
                                                        <tr>
                                                                <td>$id</td>
                                                                <td>$fn </td>
                                                                <td>$userType</td>
                                                                <td>$ser_name</td>
                                                                <td>$ser_cat</td>
                                                                <td>$status</td>
                                                                <td> <a href='index.php?vuj&oid=$id' class='btn btn-primary btn-lg'>View</a></td>
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