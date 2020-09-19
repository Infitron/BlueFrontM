                           <?php   

                             $userService = new Service();
                             $userService->autht =  $_SESSION['token'];

                            if (isset($_GET['id']) && !empty($_GET['id'])) {

                                $id = $_GET['id'];
                                
                                 $UServiceD  = $userService->getServiceDetails($id);


                                 $sid           = $UServiceD['id'];
                                 $artisanId     = $UServiceD['artisanId'];
                                 $serviceName   = $UServiceD['serviceName'];
                                 $descriptions  = $UServiceD['descriptions'];
                                 $statusId      = 4;
                                 $categoryId    = $UServiceD['category'];
                                 $locationId    = $UServiceD['locationId'];
                                 $lgaId         = $UServiceD['lgArea'];
                                 $subCategory   = $UServiceD['subCategory'];
                                 $image         = $UServiceD['image'];
                                 $state         = $UServiceD['state'];
                                 $creationDate  = $UServiceD['creationDate'];
                              




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

                                        <div class="form-group">
                                            <label for="category" class=" form-control-label">Service Category</label>
                                        
                                               <select name="cat" id="category"  class="form-control">


                                                    <?php  

                                                            $scat = new Category();
                                                            $scat->autht = $_SESSION['token'];
                                                            $scate = $scat->getCategory();

                                                            foreach ($scate as $cates) {
                                                                $cat_id = $cates['id'];
                                                                $cat_lga = $cates['categoryName'];

                                                                echo " <option value='$cat_id'>$cat_lga</option>";
                                                            }


                                                    ?>
                                                </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="subcat" class=" form-control-label">Service SubCategory</label>
                                        
                                               <select name="subcat" id="subcat"  class="form-control">


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

                                         <div class="form-group">
                                            <label for="loc" class=" form-control-label">Service Location Area </label>
                                           
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
                                            <label for="lga" class=" form-control-label">Service State LGA </label>
                                           
                                                    <select name="lga" id="lga" class="form-control">
                                                     <?php  

                                                            $lga = new State();
                                                            $lga->autht = $_SESSION['token'];
                                                            $lgaa = $lga->getStateLga();

                                                            foreach ($lgaa as $lgaas) {
                                                                $id        =  $lgaas['id'];
                                                                $lga_name  =  $lgaas['localGovernment'];
                                                                foreach($lga_name as $lga_names){
                                                                    $ids      =  $lga_names['id'];
                                                                    $namelga  =  $lga_names['lga1'];
                                                                    echo "<option value='$ids'>$namelga</option>";
                                                                }

                                                               
                                                            }


                                                    ?>
                                                </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="state" class=" form-control-label">Service State </label>
                                           
                                                    <select name="state" id="state" class="form-control">
                                                     <?php  

                                                            $sta = new State();
                                                            $sta->autht = $_SESSION['token'];
                                                            $staa = $sta->getState();

                                                            foreach ($staa as $staas) {
                                                                $id        = $staas['id'];
                                                                $stat_name = $staas['name'];

                                                                echo " <option value='$id'>$stat_name</option>";
                                                            }


                                                    ?>
                                                </select>
                                        </div>


                                         <div class="form-group">
                                            <label for="ufile" class=" form-control-label">Service Picture Upload</label>
                                            <input type="file" id="sfile" placeholder="" name="sfile" class="form-control" >
                                        </div>
                                        
                                         <input type="hidden" id="status" name="status" placeholder="" class="form-control" value="<?php echo $statusId; ?>">
                                          <input type="hidden" id="userId" name="userId" placeholder="" class="form-control" value="<?php echo $userId; ?>">
                                         <input type="hidden" id="sId" name="sId" placeholder="" class="form-control" value="<?php echo $sid; ?>">
                                         <input type="hidden" id="aId" name="aId" placeholder="" class="form-control" value="<?php echo $artisanId; ?>">
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