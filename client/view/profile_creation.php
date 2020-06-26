
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>User</strong>
                                        <small> Profile Setting</small>
                                    </div>
                                    <div class="card-body card-block">
                                       <form method="POST" action="../control/cclientcreation.php" enctype="multipart/form-data">
                                      
                                        <div class="form-group">
                                            <label for="f_name" class=" form-control-label">First Name</label>
                                            <input type="text" id="f_name" name="f_name" placeholder="" class="form-control"  >
                                        </div>
                                         <div class="form-group">
                                            <label for="l_name" class=" form-control-label">Last Name</label>
                                            <input type="text" id="l_name" name="l_name" placeholder="" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class=" form-control-label">Phone Number</label>
                                            <input type="text" id="phone" placeholder="" name="phone" class="form-control"  >
                                        </div>

                                        <div class="form-group">
                                            <label for="address" class=" form-control-label">Address</label>
                                            <textarea name="address" id="address" rows="9" placeholder=""  class="form-control" ></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label for="state" class=" form-control-label">State</label>
                                            <input type="text" id="state" placeholder="" name="state"  class="form-control" >
                                        </div>
                                       

                                         <div class="form-group">
                                            <label for="ufile" class=" form-control-label">User Picture Upload</label>
                                            <input type="file" id="ufile" placeholder="" name="ufile" class="form-control" >
                                        </div>
                                                 
                                                 <input type="hidden"  placeholder="" name="user_id" class="form-control" value="<?php echo $_SESSION['user_id']; ?>">
                                                  <input type="hidden"  placeholder="" name="token" class="form-control" value="<?php echo $token; ?>">
                                                <div class="form-group">
                                                      <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" >
                                                </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>