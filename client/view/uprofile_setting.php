<?php    

        
         if (empty($cid) || $cid == "" || empty($userId) || $userId == "" ) {
                
                echo "<script>alert('You have not created Your Client Profile')</script>";
                echo "<script> window.open('index.php?upc','_self'); </script>";
            }




?>





                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>User</strong>
                                        <small> Profile Setting</small>
                                    </div>
                                    <div class="card-body card-block">
                                       <form method="POST" action="../control/ccprofileupadte.php" enctype="multipart/form-data">
                                         
                                        <div class="form-group">
                                            <label for="f_name" class=" form-control-label">First Name</label>
                                            <input type="text" id="f_name" name="f_name" placeholder="" class="form-control" value="<?php echo  $firstName; ?>" >
                                        </div>
                                         <div class="form-group">
                                            <label for="l_name" class=" form-control-label">Last Name</label>
                                            <input type="text" id="l_name" name="l_name" placeholder="" class="form-control" value="<?php echo $lastName; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class=" form-control-label">Phone Number</label>
                                            <input type="text" id="phone" placeholder="" name="phone" class="form-control" value="<?php echo $phoneNumber; ?>" >
                                        </div>
                                       

                                        <div class="form-group">
                                            <label for="address" class=" form-control-label">Address</label>
                                            <textarea name="address" id="address" rows="9" placeholder=""  class="form-control" ><?php echo $address; ?></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label for="state" class=" form-control-label">State</label>
                                            <input type="text" id="state" placeholder="" name="state" value="<?php echo $state; ?>" class="form-control" >
                                        </div>
                                       

                                         <div class="form-group">
                                            <label for="ufile" class=" form-control-label">User Picture Upload</label>
                                            <input type="file" id="ufile" placeholder="" name="ufile" class="form-control" >
                                        </div>
                                                 <input type="hidden"  placeholder="" name="cid" class="form-control"  value="<?php echo $cid; ?>" >
                                                 <input type="hidden"  placeholder="" name="user_id" class="form-control" value="<?php echo $userId; ?>">
                                                  <input type="hidden"  placeholder="" name="token" class="form-control" value="<?php echo $token; ?>">
                                                <div class="form-group">
                                                      <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" >
                                                </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>