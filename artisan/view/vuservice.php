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
             $statusId      = $UServiceD['status'];
             $categoryId    = $UServiceD['category'];
             $locationId    = $UServiceD['locationId'];
             $lgaId         = $UServiceD['lgArea'];
             $subCategory   = $UServiceD['subCategory'];
             $image         = $UServiceD['image'];
             $state         = $UServiceD['state'];
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
                                            <label for="name" class=" form-control-label">SubCategory</label>
                                            <input type="text" id="name" placeholder="" class="form-control" value="<?php echo  $subcategory; ?>" readonly >
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">Service LGA </label>
                                            <input type="text" id="name" placeholder="" class="form-control" value="<?php echo $lgaId; ?>" readonly >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">Service State</label>
                                            <input type="text" id="name" placeholder="" class="form-control" value="<?php echo $state; ?>" readonly >
                                        </div>  
                                         <div class="form-group">
                                            <label for="cd" class=" form-control-label">Created Date & Time</label>
                                            <input type="text" id="cd" placeholder="" class="form-control" value="<?php echo $creationDate; ?> " readonly>
                                        </div>

                                        <div class="map-data m-b-40">
                                            <h3 class="title-3 m-b-30">
                                                <i class="zmdi zmdi-map"></i>Service Image</h3>
                                            <div class="filters">
                                                <img src="../images/services/<?php echo $image; ?>" alt="">
                                            </div>
                                        </div>
                             

                                        
                                              
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>

    <?php  


            }


    ?>