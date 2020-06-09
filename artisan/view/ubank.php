<?php  

        $userBank = new BankDetails();
        $userBank->autht =  $_SESSION['token'];
        $userBankDId = $userBank->findBankDetailsByUserId($aid);
        

        if(empty($userBankDId)){
            echo "<script>alert('Add your Bank Details')</script>";   
             echo "<script> window.open('../artisan/index.php?aub','_self'); </script>";
        }

        $UbankD  = $userBank->getSingleBankDetails($userBankDId);
        $id = $UbankD['id'];   
         $BankCode = new BankCode();
         $BankCode->autht =  $_SESSION['token'];
         $uBCName  = $BankCode->getBankCodeName($UbankD['bankCode']);


        




?>         
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">User Bank Details</h2>
                                    <!-- <a href="index.php?aub" class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>add Details</a> -->
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
                                                <th>Bank Account Name</th>
                                                <th>Bank Code</th>
                                                <th>Bank Name</th>
                                                <th>View Details</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $UbankD['id']; ?></td>
                                                <td><?php echo $UbankD['accountName']; ?></td>
                                                <td><?php echo $UbankD['bankCode']; ?></td>
                                                <td><?php echo $uBCName; ?></td>
                                                <td><a href="index.php?vub&id=<?php echo $id; ?>" class="btn btn-danger btn-lg">View</a></td>
                                               
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>