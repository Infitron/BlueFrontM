<?php include('hnav.php'); ?>


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/banner3.png);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 text-center">
                        <h1>Our Services</h1>
                        <p class="mb-0">Bluecollarhub.com.ng is an online Directory of the best blue collar service providers, their services and a platform to book any of the services. </p>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-7 text-left border-primary">
                <h2 class="font-weight-light text-primary">Trending Services</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
               
             <?php  
                    

                    if(isset($_GET['id'])){

                        $cat_id              = addslashes(trim($_GET['id']));
              
              
              
                        $seriv = new Service();
                        $seriv->autht = $_SESSION['token'];
                        $seriv  = $seriv->getService();

                                        
                                        foreach($seriv as $serivs){

                                            $serid =  $serivs['id'];
                            
                                            $serivce = new Service();
                                            $serivce->autht = $_SESSION['token'];
                                            $ser  = $serivce->getServiceDetails($serid);
                            
                                            foreach($ser as $sers){
                            
                                                $serCatSub =  $sers['subCategory'];
                            
                                                $cat = new SubCategory();
                                                $cat->autht = $_SESSION['token'];
                                                $cate = $cat->getSubCategory();

                                                foreach ($cate as $cates) {


                                                    $sersubN =  $cates['name'];
                            
                                                    if($serCat ==  $sersubN){
                                
                                                        $subcatId =  $cates['id'];
                                
                                                        $subser = new Search();
                                                        $subser->autht = $_SESSION['token'];
                                                        $subserDetail  = $ser->getSearchSubCatId($subcatId);
                                                        
                                                        if($subserDetail == "" || $subserDetail == null){
                                            
                                                            echo "<script>alert('Service not Avaliable')</script>";
                                                            echo "<script> window.open('index.php','_self'); </script>";
                                            
                                                        }
                                
                                
                                                                foreach ($serDetail as $serDetails) {
                                
                                                                    $id                = $serDetails['id'];
                                                                    $artisanId         = $serDetails['artisanId'];
                                                                    $descriptions      = $serDetails['descriptions'];
                                                                    $serviceName       = $serDetails['serviceName'];
                                                                    $status            = $serDetails['status'];
                                                                    $category          = $serDetails['category'];
                                                                    $subCategory       = $serDetails['subCategory'];
                                                                    $locationId        = $serDetails['locationId'];
                                                                    $lgaId             = $serDetails['lgaArea'];
                                                                    $state             = $serDetails['state'];
                                                                    $image             = $serDetails['image'];
                                                                    $creationDate      = $serDetails['creationDate'];
                                                                    $address = $lgaId.", ".$state;
                            
                                              

                 ?>

                                                         
                                                                
                                                                <div class='d-block d-md-flex listing'>
                                                                <a href='listings-single.php?aid=<?php echo $artisanId; ?>&sid=<?php echo $id; ?>' class='img d-block' style="background-image: url('images/services/<?php echo $image; ?>')"></a>
                                                                <div class='lh-content'>
                                                                <span class='category'><?php echo $subCategory; ?></span>
                                                                <a href='listings-single.php?aid=<?php echo $artisanId; ?>&sid=<?php echo $id; ?>' class='bookmark'><span class='icon-heart'></span></a>
                                                                <h3><a href='listings-single.php?aid=<?php echo $artisanId; ?>&sid=<?php echo $id; ?>'><?php echo $serviceName; ?></a></h3>
                                                                <address><?php echo $address; ?></address>
                                                                <p class='mb-0'>
                                                                    <span class='icon-star text-warning'></span>
                                                                    <span class='icon-star text-warning'></span>
                                                                    <span class='icon-star text-warning'></span>
                                                                    <span class='icon-star text-warning'></span>
                                                                    <span class='icon-star text-secondary'></span>
                                                                    <span class='review'>(3 Reviews)</span>
                                                                </p>
                                                                </div>
                                                            </div>
                                                                
                                                                
                                                                
                                                                
                     <?php                                            
                                        
                                                            }
                            
                            
                                                }
                            
                            
                            
                                            }
                            
                                        
                            
                                        
                            
                                    }
                        
                                }

                            }
                            
                    
                    
                    
                    ?>
               
            </div>

        </div>
    </div>
</div>





<?php include('lfooter.php'); ?>
