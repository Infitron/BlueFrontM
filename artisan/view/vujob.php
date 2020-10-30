<?php   


        if(isset($_GET['oid'])){

            $id = addslashes(trim($_GET['oid'])); 
            $oid = new Order();
            $oid->autht = $token;
            $odetails = $oid->getOrderId($id);

            $sid = new Service();
            $sid->autht = $token;
            $sdetails = $sid->getServiceDetails($odetails['serviceId']);
            $odate = $odetails['createdDate'];

            
        
        


?>


<div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>View </strong>
                                        <small> Job Request</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <form>
                                            
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">Client Full Name</label>
                                            <input type="text" id="name" placeholder="" class="form-control" value="<?php echo $odetails['clientFullName'] ; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="service" class=" form-control-label">Product / Service</label>
                                            <input type="text" id="service" name="service" placeholder="" class="form-control" value="<?php echo $sdetails['serviceName'] ; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class=" form-control-label">Category</label>
                                            <input type="text" id="category" name="category" placeholder="" class="form-control" value="<?php echo $sdetails['category'] ; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class=" form-control-label">SubCategory</label>
                                            <input type="text" id="category" name="category" placeholder="" class="form-control" value="<?php echo $sdetails['subCategory'] ; ?>" readonly="">
                                        </div>
                                         <div class="form-group">
                                            <label for="sdate" class=" form-control-label">Order Date</label>
                                            <input type="text" id="sdate" name="sdate" placeholder="" class="form-control" value="<?php echo $odate; ?>" readonly="">
                                        </div>
                            
                                        <div class="form-group">
                                            <label for="message" class=" form-control-label">Client Message</label>
                                            <textarea name="message" id="message" rows="9" placeholder="Content..." class="form-control" readonly><?php echo $odetails['messages'] ; ?></textarea>
                                        </div>
                                       
                                         <div class="form-group">
                                         <a href="index.php?qa&oid=<?php echo $id; ?>&odate=<?php echo $odate; ?>&aid=<?php echo $aid; ?>" class="btn btn-primary btn-lg">Add Quote</a>
                                                     
                                         </div>
                                        
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>
        <?php  } ?>