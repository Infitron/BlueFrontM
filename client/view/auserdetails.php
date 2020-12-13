
<?php

if (isset($_GET['aid']) && !empty($_GET['aid']) &&isset($_GET['sid']) && !empty($_GET['sid'])) {
       
    $aid              = addslashes(trim($_GET['aid']));
    $sid              = addslashes(trim($_GET['sid']));


    $user = new User();
    $user->autht = $_SESSION['token'];
    $user_data = $user->getUserArtisan($aid);


    $aid                   = $user_data['id'];
    $userIds               = $user_data['userId'];
    $firstName             = $user_data['firstName'];
    $lastName              = $user_data['lastName'];
    $phoneNumber           = $user_data['phoneNumber'];
    $picturePath           = $user_data['picturePath'];
    $address               = $user_data['address'];
    $state                 = $user_data['state'];
    $aboutMe               = $user_data['aboutMe'];
    $artisanCategoryId     = $user_data['artisanCategoryId'];
    $areaLocationId        = $user_data['areaLocationId'];

    $full_name  =  $firstName." ".$lastName;

   
    $service = new Service();
    $service->autht = $_SESSION['token'];
    $service_data = $service->getServiceDetails($sid);

    $ssid          = $service_data['id'];
    $artisanId     = $service_data['artisanId'];
    $serviceName   = $service_data['serviceName'];
    $descriptions  = $service_data['descriptions'];
    $categoryId    = $service_data['category'];
    $locationId    = $service_data['locationId'];
    $lgaId         = $service_data['lgArea'];
    $subCategory   = $service_data['subCategory'];
    $image         = $service_data['image'];
    $state         = $service_data['state'];
    $creationDate  = $service_data['creationDate'];


    $serv           = new Service();
    $serv->autht    = $_SESSION['token'];
    $sdata          = $serv->getServiceByArtisanId($aid);
    $selService     = $serv->getServiceByArtisanId($aid);









?>


     <div class="container-fluid">
         <div class="row">              
                   
                   
                   <div class="col-md-4">
                                <aside class="profile-nav alt">
                                    <section class="card">
                                        <div class="card-header user-header alt bg-dark">
                                            <div class="media">
                                                <a href="#">
                                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/icon/avatar-01.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <h2 class="text-light display-6"><?php echo $full_name; ?></h2>
                                                    <p><?php echo $subCategory; ?></p>
                                                </div>
                                            </div>
                                        </div>


                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <a href="index.php?ss&aid=<?php echo $aid; ?>&sid=<?php echo $sid; ?>&ai=<?php echo $aid; ?>">
                                                    <i class="fa fa-id-badge"></i>&nbsp;&nbsp;  Artisan Information
                                                   
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="index.php?ss&aid=<?php echo $aid; ?>&sid=<?php echo $sid; ?>&si=<?php echo $sid; ?>">
                                                    <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;  Service Information
                                                   
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="index.php?ss&aid=<?php echo $aid; ?>&sid=<?php echo $sid; ?>&rate">
                                                    <i class="fa fa-certificate"></i>&nbsp;&nbsp; Rate
                                                    
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="index.php?ss&aid=<?php echo $aid; ?>&sid=<?php echo $sid; ?>&te">
                                                    <i class="fa fa-comment"></i>&nbsp;&nbsp; Testimony
                                                   
                                                </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="index.php?orm&uid=<?php echo $userId; ?>&sid=<?php echo $sid; ?>">
                                                    <i class="fa fa-cart-arrow-down"></i>&nbsp;&nbsp; Book Me Now
                                                   
                                                </a>
                                            </li>
                                        </ul>

                                    </section>
                                </aside>
                            </div>


                            <?php   

                                    if(isset($_GET['ai'])){



                                        echo"
                                        
                                        
                                        <div class='col-lg-6'>
                                                <div class='card'>
                                                        <div class='card-header'>
                                                            <strong>Artisan </strong>
                                                            <small> Information</small>
                                                        </div>
                                                        <div class='card-body card-block'>

                                                                <div class='form-group'>
                                                                    <label for='company' class=' form-control-label'>Contact Information</label>
                                                                    <input type='text' id='contact' placeholder='' class='form-control' value='$phoneNumber' readonly>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label for='vat' class=' form-control-label'>Location</label>
                                                                    <input type='text' id='address' placeholder='' class='form-control' value='$address' readonly>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label for='street' class=' form-control-label'>Information About Me</label>
                                                                    <textarea name='info' id='info' rows='9' placeholder='' class='form-control' readonly> $aboutMe </textarea>
                                                                </div>

                                                        </div>
                                                </div>
                                        </div>
                                        
                                        
                                        
                                        ";



                                    }


                                    if(isset($_GET['si'])){



                                        echo"
                                        
                                        
                                        <div class='col-lg-6'>
                                                <div class='card'>
                                                        <div class='card-header'>
                                                            <strong>Service </strong>
                                                            <small> Information</small>
                                                        </div>
                                                        <div class='card-body card-block'>

                                                                <div class='form-group'>
                                                                    <label for='company' class=' form-control-label'>Sub-Category</label>
                                                                    <input type='text' id='contact' placeholder='' class='form-control' value='$subCategory' readonly>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label for='vat' class=' form-control-label'>Service Name</label>
                                                                    <input type='text' id='address' placeholder='' class='form-control' value='$serviceName' readonly>
                                                                </div>
                                                                <div class='form-group'>
                                                                    <label for='street' class=' form-control-label'>Description</label>
                                                                    <textarea name='info' id='info' rows='9' placeholder='' class='form-control' readonly> $descriptions </textarea>
                                                                </div>

                                                        </div>
                                                </div>
                                        </div>
                                        
                                        
                                        
                                        ";



                                    }



                            ?>
                           
                     </div>




             </div>
     </div>

     <div class="container-fluid">
         <div class="row"> 
             
         
         <?php   
         
            foreach($sdata as $sdatas){

                $images           = $sdatas['image'];
                $serviceName      = $sdatas['serviceName'];
                $descriptions     = $sdatas['descriptions'];



                     echo"
                        
                        <div class='col-md-4'>
                                <div class='card'>
                                                <img class='card-img-top' src='../images/services/$images' alt=''>
                                                <div class='card-body'>
                                                    <h4 class='card-title mb-3'>$serviceName</h4>
                                                    <p class='card-text'>$descriptions
                                                    </p>
                                                </div>
                                </div>
                        </div>

                        
                        
                        
                        ";


                }
         
         
         
         
         
         ?>
    
              
                               
         </div>
</div>



<?php  } ?>