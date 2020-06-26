                           <?php   

                             $userService = new Service();
                             $userService->autht =  $_SESSION['token'];

                            if (isset($_GET['id']) && !empty($_GET['id'])) {

                                $id = $_GET['id'];
                                
                                 $UServiceD  = $userService->getServiceByArtisanId($id);

                                 $sid       = $UServiceD['id'];
                                 $artisanId = $UServiceD['artisanId'];
                                 $serviceName = $UServiceD['serviceName'];
                                 $descriptions = $UServiceD['descriptions'];
                                 $statusId = $UServiceD['statusId'];
                                 $creationDate = $UServiceD['creationDate'];
                              




                    ?>




                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add </strong>
                                        <small> Service</small>
                                    </div>
                                    <div class="card-body card-block">
                                      <form method="POST" action="../control/ceditservice.php" enctype="multipart/form-data">
                                            
                                        <div class="form-group">
                                            <label for="sname" class=" form-control-label">Name</label>
                                            <input type="text" id="sname" name="sname" placeholder="" class="form-control" value="<?php echo $serviceName; ?>">
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="sinfo" class=" form-control-label">Information</label>
                                            <textarea name="sinfo" id="sinfo" rows="9" placeholder="Content..." class="form-control" ><?php echo $descriptions; ?></textarea>
                                        </div>
                                        
                                         <input type="hidden" id="status" name="status" placeholder="" class="form-control" value="<?php echo $statusId; ?>">
                                          <input type="hidden" id="userId" name="userId" placeholder="" class="form-control" value="<?php echo $userId; ?>">
                                         <input type="hidden" id="sId" name="sId" placeholder="" class="form-control" value="<?php echo $sid; ?>">
                                         <input type="hidden" id="artisanId" name="artisanId" placeholder="" class="form-control" value="<?php echo $artisanId; ?>">
                                         <input type="hidden" id="token" name="token" placeholder="" class="form-control" value="<?php echo $token; ?>">
                                         <input type="hidden" id="creationDate" name="creationDate" placeholder="" class="form-control" value="<?php echo $creationDate; ?>">
                                                 <div class="form-group">
                                                     <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" >
                                                </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>

            <?php   }  ?>