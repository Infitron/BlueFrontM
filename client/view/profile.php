                           

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>User Basic</strong>
                                        <small> Information</small>
                                    </div>
                                    <div class="card-body card-block">
                                        
                                        <div class="form-group">
                                            <label for="f_name" class=" form-control-label">First Name</label>
                                            <input type="text" id="f_name" placeholder="" class="form-control" value="<?php echo  $firstName; ?>" readonly="">
                                        </div>
                                         <div class="form-group">
                                            <label for="f_name" class=" form-control-label">Last Name</label>
                                            <input type="text" id="l_name" placeholder="" class="form-control" value="<?php echo $lastName; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class=" form-control-label">Phone Number</label>
                                            <input type="text" id="phone" placeholder="" name="phone" class="form-control" value="<?php echo $phoneNumber; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class=" form-control-label">Email</label>
                                            <input type="text" id="email" placeholder="" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" readonly="">
                                        </div>
                                       

                                        <div class="form-group">
                                            <label for="address" class=" form-control-label">Address</label>
                                            <textarea name="address" id="address" rows="9" placeholder=""  class="form-control" readonly=""><?php echo $address; ?></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label for="state" class=" form-control-label">State</label>
                                            <input type="text" id="state" placeholder="" name="state" value="<?php echo $state; ?>" class="form-control" readonly="">
                                        </div>
                                         <div class="form-group">
                                            <label for="country" class=" form-control-label">Country</label>
                                            <input type="text" id="country" placeholder="" name="country" value="Nigeria" class="form-control" readonly="">
                                        </div>



                                          </div>
                                    </div>
                                </div>
                        
                               
                                