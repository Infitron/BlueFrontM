<?php include('hnav.php'); ?>

<?php 


    if(isset($_POST['getSearch'])){

          $state              = addslashes(trim($_POST['state']));
          $subcat             = addslashes(trim($_POST['subcat']));
          $lga                = addslashes(trim($_POST['lga']));

          $search        =  new Search();
          $search->autht = $_SESSION['token'];
          $searchList    = $search->getSearch($subcat,$state,$lga);

          




 


?>

  
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

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">

            <div class="row">



            <?php  
             
                  foreach($searchList as $searchLists){

                        $id                = $searchLists['id'];
                        $artisanId         = $searchLists['artisanId'];
                        $descriptions      = $searchLists['descriptions'];
                        $serviceName       = $searchLists['serviceName'];
                        $status            = $searchLists['status'];
                        $category          = $searchLists['category'];
                        $subCategory       = $searchLists['subCategory'];
                        $locationId        = $searchLists['locationId'];
                        $lgaId             = $searchLists['lgArea'];
                        $state             = $searchLists['state'];
                        $image             = $searchLists['image'];
                        $creationDate      = $searchLists['creationDate']; 

                        $address = $lgaId.", ".$state;
                    ?>
                        
                              <div class='col-lg-6'>
                                  <div class='d-block d-md-flex listing vertical'>
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
              
                              </div>
                        
                        
            <?php         

                  }
              }

            ?>

            </div>

            <div class="col-12 mt-5 text-center">
              <div class="custom-pagination">
                <span>1</span>
                <a href="#">2</a>
                <a href="#">3</a>
                <span class="more-page">...</span>
                <a href="#">10</a>
              </div>
            </div>

          </div>
          <div class="col-lg-3 ml-auto">

            <div class="mb-5">
              <h3 class="h5 text-black mb-3">Filters</h3>
              <form action="#" method="post">
                <div class="form-group">
                  <input type="text" placeholder="What are you looking for?" class="form-control">
                </div>
                <div class="form-group">
                  <div class="select-wrap">
                      <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>
                      <select class="form-control" name="" id="">
                        <option value="">All Categories</option>
                        <option value="" selected="">Real Estate</option>
                        <option value="">Books &amp;  Magazines</option>
                        <option value="">Furniture</option>
                        <option value="">Electronics</option>
                        <option value="">Cars &amp; Vehicles</option>
                        <option value="">Others</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                  <!-- select-wrap, .wrap-icon -->
                  <div class="wrap-icon">
                    <span class="icon icon-room"></span>
                    <input type="text" placeholder="Location" class="form-control">
                  </div>
                </div>
              </form>
            </div>
            
            <div class="mb-5">
              <form action="#" method="post">
                <div class="form-group">
                  <p>Radius around selected destination</p>
                </div>
                <div class="form-group">
                  <input type="range" min="0" max="100" value="20" data-rangeslider>
                </div>
              </form>
            </div>

            <div class="mb-5">
              <form action="#" method="post">
                <div class="form-group">
                  <p>Category 'Real Estate' is selected</p>
                  <p>More filters</p>
                </div>
                <div class="form-group">
                  <ul class="list-unstyled">
                    <li>
                      <label for="option1">
                        <input type="checkbox" id="option1">
                        Residential
                      </label>
                    </li>
                    <li>
                      <label for="option2">
                        <input type="checkbox" id="option2">
                        Commercial
                      </label>
                    </li>
                    <li>
                      <label for="option3">
                        <input type="checkbox" id="option3">
                        Industrial
                      </label>
                    </li>
                    <li>
                      <label for="option4">
                        <input type="checkbox" id="option4">
                        Land
                      </label>
                    </li>
                  </ul>
                </div>
              </form>
            </div>

           
          </div>

        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 text-left border-primary">
            <h2 class="font-weight-light text-primary">Trending Today</h2>
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
    
<div class="site-section bg-white">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Testimonials</h2>
            </div>
        </div>

        <div class="slide-one-item home-slider owl-carousel">
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-3">
                        <p>Jolade Abimbolu</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;Strange and beautiful things happen to each of us every day, and sometimes you just cannot keep silent about them. This is what inspired a special online project that allows people to share anonymously all the heart-warming, hilarious, sad, inspiring and wonderful stories from people’s lives that they overhear.&rdquo;</p>
                    </blockquote>
                </div>
            </div>
            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-3">
                        <p>Christine Ugheli</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;A little girl was decorating a box with a gold wrapping paper to put it under the Christmas tree. George was a driver and. George was a driver and he spent so much time at his work, that he could hardly have a meal together with his wife and three children.&rdquo;</p>
                    </blockquote>
                </div>
            </div>

            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="images/person_4.jpg" alt="Image" class="img-fluid mb-3">
                        <p>Tijani Bella</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;I'm an optimist in the sense that I believe humans are noble and honorable, and some of them are really smart. I have a very optimistic view of individuals.&rdquo;</p>
                    </blockquote>
                </div>
            </div>

            <div>
                <div class="testimonial">
                    <figure class="mb-4">
                        <img src="images/person_5.jpg" alt="Image" class="img-fluid mb-3">
                        <p>Adeyemi Brainard</p>
                    </figure>
                    <blockquote>
                        <p>&ldquo;A very elderly man with a large packet in his hands always comes by our apartment block every morning. The whole courtyard comes alive when he shows up; all the local cats and their kittens run up to him from all directions, purring and rubbing his legs. He tries to give some of his attention to each one of the animals, petting them, talking to them. Then he goes to their bowls scattered underneath the nearby trees, cleans them, ladles out some pet food from his packet, and pours some milk and fresh water. &rdquo;</p>
                    </blockquote>
                </div>
            </div>

        </div>
    </div>
</div>


    <div class="newsletter bg-primary py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2>Newsletter</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <div class="col-md-6">
            
            <form class="d-flex">
              <input type="text" class="form-control" placeholder="Email">
              <input type="submit" value="Subscribe" class="btn btn-white"> 
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php include('lfooter.php'); ?>