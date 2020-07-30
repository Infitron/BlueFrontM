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
             $statusId      = $UServiceD['statusId'];
             $categoryId    = $UServiceD['categoryId'];
             $locationId    = $UServiceD['locationId'];
             $lgaId         = $UServiceD['lgaId'];
             $creationDate  = $UServiceD['creationDate'];

            
/*             

             $getCat = new SubCategory();
             $getCat->autht = $_SESSION['token'];
             $getCName = $getCat->getSubCategoryId($categoryId);
             $subCName = $getCName['name'];

             $getState       = new State();
             $getState->autht  = $_SESSION['token'];
             $getSName = $getState->getStateId($lgaId);

             $StateName = $getSName['Name'];
*/




?>



                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>View </strong>
                                        <small> Service</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <form>
                                            
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">Name</label>
                                            <input type="text" id="name" placeholder="" class="form-control" value="<?php echo $serviceName; ?> " readonly >
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="about_me" class=" form-control-label">Information</label>
                                            <textarea name="about_me" id="about_me" rows="9" placeholder="Content..." class="form-control" readonly><?php echo $descriptions; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">Category</label>
                                            <input type="text" id="name" placeholder="" class="form-control" value="<?php echo  $categoryId; ?>" readonly >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">Service Location Area </label>
                                            <input type="text" id="name" placeholder="" class="form-control" value="<?php echo $locationId; ?>" readonly >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">Service State</label>
                                            <input type="text" id="name" placeholder="" class="form-control" value="<?php echo $lgaId; ?>" readonly >
                                        </div>
                                        
                                         
                                         <div class="form-group">
                                            <label for="cd" class=" form-control-label">Created Date & Time</label>
                                            <input type="text" id="cd" placeholder="" class="form-control" value="<?php echo $creationDate; ?> " readonly>
                                        </div>

                                        
                                              
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>

    <?php  


            }


    ?>