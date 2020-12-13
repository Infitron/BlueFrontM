<?php include('hnav.php'); ?>
<?php  

    if (isset($_GET['aid']) && !empty($_GET['aid']) &&isset($_GET['sid']) && !empty($_GET['sid'])) {
       
        $aid              = addslashes(trim($_GET['aid']));
        $sid              = addslashes(trim($_GET['sid']));

        $user = new User();
        $user->autht = $_SESSION['token'];
        $user_data = $user->getUserArtisan($aid);



        $aid                   = $user_data['id'];
        $userId                = $user_data['userId'];
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


<!--================Home Banner Area =================-->
<section class="profile_area">
    <div class="container">
        <div class="profile_inner p_120">
            <div class="row">
                <div class="col-lg-5">
                    <img class="img-fluid" src="images/users/<?php echo $picturePath; ?>" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="personal_text">
                        <h6>Hello @<?php echo $firstName; ?>, i am</h6>
                        <h3><?php echo $full_name; ?></h3>
                        <h4>Category</h4>
                        <ul class="list basic_info">
                            <li><a href="#"><i class="lnr lnr-phone-handset"></i><?php echo $categoryId; ?></a></li>
                            
                        </ul>
                        <h4>Service</h4>
                        <ul class="list basic_info">
                            <li><a href="#"><i class="lnr lnr-phone-handset"></i><?php echo $serviceName; ?></a></li>
                            
                        </ul>
                        <h4>Contact Information</h4>
                        <ul class="list basic_info">
                            <li><a href="#"><i class="lnr lnr-phone-handset"></i><?php echo $phoneNumber; ?></a></li>
                        
                        </ul>
                        <h4>Location</h4>
                        <ul class="list basic_info">
                            <li><a href="#"><i class="lnr lnr-home"></i><?php echo  $address; ?></a></li>
                        </ul>
                        <h4>Information About Me</h4>
                        <ul class="list basic_info">
                            <li><a href="#"><i class="lnr lnr-home"></i><?php echo  $aboutMe; ?></a></li>
                        </ul>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="wel_item">
                                    <i class="lnr lnr-database"></i>
                                    <h4>2.5M</h4>
                                    <p>Average Rating</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="wel_item">
                                    <i class="lnr lnr-book"></i>
                                    <h4>1000</h4>
                                    <p>Jobs Completed</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="wel_item">
                                    <i class="lnr lnr-users"></i>
                                    <h4>3965</h4>
                                    <p>Client Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="mb-4" style="margin-top: -150px;">
                    <div class="slide-one-item home-slider owl-carousel">
                        <?php    

                            foreach($sdata as $sdatas){

                                $images           = $sdatas['image'];
                        
                        ?>
                        <div><img src="images/services/<?php echo $images; ?>" alt="Image" class="img-fluid rounded"></div>

                        <?php  }  ?>
                    </div>
                </div>
                <p class="mt-3"><a href="order_process.php?sid=<?php echo $sid; ?>&aid=<?php echo $aid; ?>&an=<?php echo $full_name; ?>" class="btn btn-primary">Book Me Now!</a></p>
            </div>
            <div class="col-lg-3 ml-auto">
                <div class="mb-5">
                    <h3 class="h5 text-black mb-3">Other Servies</h3>
                    <ul>
                        
                        <?php    

                              foreach($selService as $selServices){

                                $sname  =  $selServices['serviceName'];
                                $asid  =   $selServices['id'];
                
                         ?>
                         <li><a href="listings-single.php?aid=<?php echo $aid; ?>&sid=<?php echo $asid; ?>"><?php echo $sname; ?></a></li>

                    
                        <?php  }  ?>  
                    </ul>

                </div>


                
            </div>
        </div>
    </div>
</div>

<?php   } ?>
<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-7 text-left border-primary">
                <h2 class="font-weight-light text-primary">Customers Also Viewed</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/tailor.png')"></a>
                    <div class="lh-content">
                        <span class="category">Real Estate</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">House with Swimming Pool</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>
                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/users.png')"></a>
                    <div class="lh-content">
                        <span class="category">Furniture</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">Wooden Chair &amp; Table</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>
                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>
                    <div class="lh-content">
                        <span class="category">Electronics</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">iPhone X gray</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/mech.png')"></a>
                    <div class="lh-content">
                        <span class="category">Cars &amp; Vehicles</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">Red Luxury Car</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>
                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/tailor.png')"></a>
                    <div class="lh-content">
                        <span class="category">Real Estate</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">House with Swimming Pool</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>
                <div class="d-block d-md-flex listing">
                    <a href="#" class="img d-block" style="background-image: url('images/users.png')"></a>
                    <div class="lh-content">
                        <span class="category">Furniture</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="#">Wooden Chair &amp; Table</a></h3>
                        <address>Don St, Brooklyn, New York</address>
                        <p class="mb-0">
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-warning"></span>
                            <span class="icon-star text-secondary"></span>
                            <span class="review">(3 Reviews)</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include('lfooter.php'); ?>
