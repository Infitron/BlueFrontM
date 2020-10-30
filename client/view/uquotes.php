<?php

        $ajob = new Order();
        $ajob->autht = $token;
        $ajs = $ajob->getOrderByClientId($cid);







?>


        
        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">User Service Quotes</h2>
                                    <!--<a href="index.php?aum" class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>add Message</a>-->
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
                                                <th>Artisan Name</th>
                                                <th>Product / Service</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Total Amount</th>
                                                <th>View Quote</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php

                                                foreach($ajs as $aj){

                                                    $qid                 = $aj['id'];
                                                    $artisanFullName    = $aj['artisanFullNmae'];
                                                    $serviceId          = $aj['serviceId'];
                                                    
                                                    $quote = new Quote();
                                                    $quote->autht = $token;
                                                    $quo =  $quote->getQuoteByOrderId($qid);

                                                   

                                                    foreach ($quo as $quos) {

                                                        $serv  = new Service();
                                                        $serv->autht = $token;
                                                        $ser = $serv->getServiceDetails($serviceId);
                                                        $ser_name = $ser['serviceName'];
                                                        $ser_cat  = $ser['category'];
                                                        $ser_subcat = $ser['subCategory'];

                                                        $idq      =  $quos['id'];
                                                        $amtTotal =  $quos['total'];

                                                        echo" 
                                                        
                                                                <tr>
                                                                    <td>$idq</td>
                                                                    <td>$artisanFullName</td>
                                                                    <td>$ser_name</td>
                                                                    <td>$ser_cat</td>
                                                                    <td>$ser_subcat</td>
                                                                    <td>$amtTotal</td>
                                                                    <td> <a href='index.php?vq?qid=$idq' class='btn btn-primary btn-lg'>View</a></td>
                                                                </tr>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        ";






                                                       
                                                    }



                                                }



                                            ?>
                                            

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>