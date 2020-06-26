<?php  


            if (empty($aid) || $aid == "" || empty($userId) || $userId == "" ) {
                
                echo "<script>alert('You have not created Your Artisan Profile')</script>";
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
                                        <form method="POST" action="../control/cprofileupadte.php" enctype="multipart/form-data">
                                          <div class="form-group">
                                            <label for="idn" class=" form-control-label">Identification Number (Drivig Licence, National ID, Voters ID)</label>
                                            <input type="text" id="idn" placeholder="" name="idcardNo" class="form-control" value="<?php echo $idcardNo; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="f_name" class=" form-control-label">First Name</label>
                                            <input type="text" id="f_name" placeholder="" name="f_name" class="form-control" value="<?php echo  $firstName; ?>" >
                                        </div>
                                         <div class="form-group">
                                            <label for="f_name" class=" form-control-label">Last Name</label>
                                            <input type="text" id="l_name" placeholder="" name="l_name" class="form-control" value="<?php echo $lastName; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class=" form-control-label">Phone Number</label>
                                            <input type="text" id="phone" placeholder="" name="phone" class="form-control" value="<?php echo $phoneNumber; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class=" form-control-label">Email</label>
                                            <input type="text" id="email" placeholder="" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="about_me" class=" form-control-label">Information About Me</label>
                                            <textarea name="about_me" id="about_me" rows="9" placeholder=""  class="form-control"  ><?php echo $aboutMe; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="loc" class=" form-control-label">Location / City</label>
                                           
                                                    <select name="loc" id="loc" class="form-control">
                                                     <?php  

                                                            $loc = new Location();
                                                            $loc->autht = $_SESSION['token'];
                                                            $loca = $loc->getLocation();

                                                            foreach ($loca as $locas) {
                                                                $loc_id = $locas['id'];
                                                                $loc_lga = $locas['area'];

                                                                echo " <option value='$loc_id'>$loc_lga</option>";
                                                            }


                                                    ?>
                                                </select>
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
                                            <label for="country" class=" form-control-label">Country</label>
                                            <input type="text" id="country" placeholder="" name="country" value="Nigeria" class="form-control" >
                                        </div>


                                       
                                        
                                         <div class="form-group">
                                            <label for="profession" class=" form-control-label">Category</label>
                                          
                                             <select name="profession" id="profession"  class="form-control">

                                                 <?php  

                                                            $cat = new Category();
                                                            $cat->autht = $_SESSION['token'];
                                                            $cate = $cat->getCategory();

                                                            foreach ($cate as $cates) {
                                                                $cat_id = $cates['id'];
                                                                $cat_lga = $cates['categoryName'];

                                                                echo " <option value='$cat_id'>$cat_lga</option>";
                                                            }


                                                    ?>
                                                     
                                                </select>
                                        </div>

                                         <div class="form-group">
                                            <label for="category" class=" form-control-label">Sub Category</label>
                                        
                                               <select name="cat" id="category"  class="form-control">


                                                    <?php  

                                                            $scat = new SubCategory();
                                                            $scat->autht = $_SESSION['token'];
                                                            $scate = $scat->getSubCategory();

                                                            foreach ($scate as $cates) {
                                                                $cat_id = $cates['id'];
                                                                $cat_lga = $cates['name'];

                                                                echo " <option value='$cat_id'>$cat_lga</option>";
                                                            }


                                                    ?>
                                                </select>
                                        </div>
                                     
                                    <!--     
                                        <div class="form-group">
                                            <label for="facebook" class=" form-control-label">Facebook</label>
                                            <input type="text" id="facebook" placeholder="" name="facebook" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="twitter" class=" form-control-label">Twitter</label>
                                            <input type="text" id="twitter" placeholder="" name="twitter" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="instagram" class=" form-control-label">Instagram</label>
                                            <input type="text" id="instagram" placeholder="" name="instagram" class="form-control" >
                                        </div>

                                    -->

                                         <div class="form-group">
                                            <label for="ufile" class=" form-control-label">User Picture Upload</label>
                                            <input type="file" id="ufile" placeholder="" name="ufile" class="form-control" >
                                        </div>
                                                 <input type="hidden"  placeholder="" name="aid" class="form-control"  value="<?php echo $aid; ?>" >
                                                 <input type="hidden"  placeholder="" name="user_id" class="form-control" value="<?php echo $userId; ?>">
                                                  <input type="hidden"  placeholder="" name="token" class="form-control" value="<?php echo $token; ?>">
                                                <div class="form-group">
                                                      <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" >
                                                </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>