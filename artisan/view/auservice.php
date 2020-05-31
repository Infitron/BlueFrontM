                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add </strong>
                                        <small> Service</small>
                                    </div>
                                    <div class="card-body card-block">
                                      <form method="POST" action="../control/caddservice.php" enctype="multipart/form-data">
                                            
                                        <div class="form-group">
                                            <label for="sname" class=" form-control-label">Name</label>
                                            <input type="text" id="sname" name="sname" placeholder="" class="form-control" >
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="sinfo" class=" form-control-label">Information</label>
                                            <textarea name="sinfo" id="sinfo" rows="9" placeholder="Content..." class="form-control" ></textarea>
                                        </div>
                                        
                                         <input type="hidden" id="status" name="status" placeholder="" class="form-control" value="1">
                                         <input type="hidden" id="userId" name="userId" placeholder="" class="form-control" value="<?php echo $userId; ?>">
                                          <input type="hidden" id="token" name="token" placeholder="" class="form-control" value="<?php echo $token; ?>">
                                                 <div class="form-group">
                                                     <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" >
                                                </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>