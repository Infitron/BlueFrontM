                           

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>User Basic</strong>
                                        <small> Information</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="idn" class=" form-control-label">Identification Number</label>
                                            <input type="text" id="idn" placeholder="" class="form-control" value="<?php echo $idcardNo; ?>" readonly="">
                                        </div>
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
                                            <label for="about_me" class=" form-control-label">Information About Me</label>
                                            <textarea name="about_me" id="about_me" rows="9" placeholder=""  class="form-control" readonly="" ><?php echo $aboutMe; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="loc" class=" form-control-label">Location / City</label>
                                            <textarea name="loc" id="loc" rows="9" placeholder=""  class="form-control" readonly=""><?php echo $areaLocation; ?></textarea>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                            <strong>User Bank</strong>
                                            <small> Details</small>
                                        </div>
                                        <div class="card-body card-block">

                                        <div class="form-group">
                                            <label for="bank_name" class=" form-control-label">Bank Name</label>
                                            <input type="text" id="bank_name" placeholder="" name="bank_name" class="form-control" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="bacc_name" class=" form-control-label">Bank Account Name</label>
                                            <input type="text" id="bacc_name" name="bacc_name" placeholder="" class="form-control" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="ban" class=" form-control-label">Bank Account Number</label>
                                            <input type="text" id="ban" placeholder="" class="form-control" readonly="">
                                        </div>
                                        
                                
                                          </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                                <strong>User Jobs</strong>
                                                <small> Details</small>
                                        </div>
                                        <div class="card-body card-block">

                                         <div class="form-group">
                                            <label for="profession" class=" form-control-label">Profession</label>
                                            <input type="text" id="profession" placeholder="" name="profession" class="form-control" readonly="">
                                        </div>

                                         <div class="form-group">
                                            <label for="category" class=" form-control-label">Category</label>
                                            <input type="text" id="category" placeholder="" value="<?php echo $artisanCategory; ?>" name="category" class="form-control" readonly="">
                                        </div>

                                        </div>
                                    </div>
                                </div>   

                                 <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                                <strong>User Social Media</strong>
                                                <small> Details</small>
                                        </div>
                                        <div class="card-body card-block">
                                       
                                            <div class="form-group">
                                                <label for="facebook" class=" form-control-label">Facebook</label>
                                                <input type="text" id="facebook" placeholder="" name="facebook" class="form-control" readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label for="twitter" class=" form-control-label">Twitter</label>
                                                <input type="text" id="twitter" placeholder="" name="twitter" class="form-control" readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label for="instagram" class=" form-control-label">Instagram</label>
                                                <input type="text" id="instagram" placeholder="" name="instagram" class="form-control" readonly="">
                                            </div>
                                    </div>
                                </div>
                            </div>