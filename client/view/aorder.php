<?php    

        if(isset($_GET['uid']) && isset($_GET['sid'])){

                $sid   = addslashes(trim($_GET['sid']));
                $uid   = addslashes(trim($_GET['uid']));



?>
                            
                            
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Order </strong>
                                        <small> Message</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <form method="POST" action="../control/caddorder.php" enctype="multipart/form-data">
                                            
                                        
                                        <div class="form-group">
                                            <label for="message" class=" form-control-label">Message</label>
                                            <textarea name="message" id="message" rows="9" placeholder="Content..." class="form-control" ></textarea>
                                        </div>
                                                <input type="hidden" name="userid" value="<?php echo $uid; ?>" />
                                                <input type="hidden" name="serviceid" value="<?php echo $sid; ?>" />
                                                <input type="hidden" name="token" value="<?php echo $token; ?>" />
                                                 <div class="form-group">
                                                     <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                                                </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>


        <?php  }  ?>