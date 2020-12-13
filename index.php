<?php  include('hnav.php'); 

        $countCat = new SubCategory();
        $countCat->autht = $_SESSION['token'];     
        
        
?>

<div class="site-blocks-cover overlay" style="background-image: url(images/banner1.png);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-12">

                <div class="row justify-content-center mb-4">
                    <div class="col-md-8 text-center">
                        <h1 class="" data-aos="fade-up">Welcome to Blue Collar Hub</h1>
                        <p data-aos="fade-up" data-aos-delay="100">No matter where you live, just enter the service you looking for and we'll find the right artisan for you.</p>
                    </div>
                </div>
                <div class="form-search-wrap mb-3" data-aos="fade-up" data-aos-delay="200">
                    <form method="post" action="listings.php" id="searchl">
                        <div class="row align-items-center">
               
                            <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                                <div class="wrap-icon">
                                <span class="icon"><span class="icon-keyboard_arrow_down"></span></span>

                                    <select class="form-control" name="subcat" placeholder="Select Subcategory">
                                            <?php 

                                            
                                                $cat = new SubCategory();
                                                $cate = $cat->getSubCategory();

                                                foreach ($cate as $cates) {
                                                    $cat_id = $cates['id'];
                                                    $cat_name = $cates['name'];

                                                    echo " <option data-id='$cat_id' value='$cat_id'>$cat_name</option>
                                                            

                                                    ";
                                                }

                                            ?>


                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                                <div class="wrap-icon">
                                    <span class="icon icon-room"></span>

                                    <select class="form-control" name="state" id="state" onchange='selectLga()'>
                                    <option>Select State</option>
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
                            </div>
                        
                            <script>
                                function selectLga(){
                                
                                        var stateId = document.getElementById('state').value;
                                        if(stateId){
                                            $.ajax({
                                                type:'GET',
                                                url:'model/ajaxStateLga.php',
                                                data:{ 'stateId': stateId },
                                                success:function(msg){
                                                    $('#statelga').load('model/ajaxStateLga.php?stateId='+ stateId);
                                                }
                                            });
                                        }
                                    
                                }
                                
                            </script>

                            <div class="col-lg-12 mb-4 mb-xl-0 col-xl-3">
                                <div class="wrap-icon">
                                    <span class="icon icon-room"></span>

                                    <select class="form-control" name="lga" id="statelga">
                                        <option>Select LGA</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-2 ml-auto text-right">
                                <input type="submit" class="btn btn-primary btn-block rounded" value="Search" id="getSearch" name="getSearch">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row text-left trending-search" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-12">
                        <h2 class="d-inline-block">Trending Search:</h2>
                        <a href="#">Car Painting</a>
                        <a href="#">Tailoring</a>
                        <a href="#">House Painting</a>
                        <a href="#">Panel Beater</a>
                        <a href="#">Mechanic</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2 class="h5 mb-4 text-black">Featured Ads</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12  block-13">
                <div class="owl-carousel nonloop-block-13">
                    <div class="d-block d-md-flex listing vertical">
                        <a href="listings-single.php" class="img d-block" style="background-image: url('images/mech.png')"></a>
                        <div class="lh-content">
                            <span class="category">Automobiles</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="listings-single.php">Car Mechanics</a></h3>
                            <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <div class="d-block d-md-flex listing vertical">
                        <a href="listings-single.php" class="img d-block" style="background-image: url('images/tailor.png')"></a>
                        <div class="lh-content">
                            <span class="category">Fashion</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="listings-single.php">Home Restoration</a></h3>
                            <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <div class="d-block d-md-flex listing vertical">
                        <a href="listings-single.php" class="img d-block" style="background-image: url('images/users.png')"></a>
                        <div class="lh-content">
                            <span class="category">Furniture</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="listings-single.php">New Sofa</a></h3>
                            <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <div class="d-block d-md-flex listing vertical">
                        <a href="listings-single.php" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>
                        <div class="lh-content">
                            <span class="category">Electronics</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="listings-single.php">Phone Repairs</a></h3>
                            <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <div class="d-block d-md-flex listing vertical">
                        <a href="listings-single.php" class="img d-block" style="background-image: url('images/mech.png')"></a>
                        <div class="lh-content">
                            <span class="category">Automobiles</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="listings-single.php">Car Mechanics</a></h3>
                            <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <div class="d-block d-md-flex listing vertical">
                        <a href="listings-single.php" class="img d-block" style="background-image: url('images/tailor.png')"></a>
                        <div class="lh-content">
                            <span class="category">Fashion</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="listings-single.php">Home Restoration</a></h3>
                            <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <div class="d-block d-md-flex listing vertical">
                        <a href="listings-single.php" class="img d-block" style="background-image: url('images/users.png')"></a>
                        <div class="lh-content">
                            <span class="category">Furniture</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="listings-single.php">Wooden Chair &amp; Table</a></h3>
                            <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <div class="d-block d-md-flex listing vertical">
                        <a href="listings-single.php" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>
                        <div class="lh-content">
                            <span class="category">Electronics</span>
                            <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                            <h3><a href="listings-single.php">iPhone X gray</a></h3>
                            <address>28, Broad Str, Ikeja, Lagos</address>
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
</div>
<div class="site-section" data-aos="fade">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Popular Categories</h2>
                <p class="color-black-opacity-5">With Numbers Profession and Jobs Under Them.</p>
            </div>
        </div>
        <div class="overlap-category mb-5">
            <div class="row align-items-stretch no-gutters">
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="list_cat_services.php?id=1" class="popular-category h-20">
                        <span class="icon"><span class="flaticon-car"></span></span>
                        <span class="caption mb-2 d-block">Automobiles</span>
                        <span class="number"><?php echo $countCat-> countSubCatId(1); ?></span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="list_cat_services.php?id=5" class="popular-category h-20">
                        <span class="icon"><span class="flaticon-closet"></span></span>
                        <span class="caption mb-2 d-block">Furniture</span>
                        <span class="number"><?php echo $countCat->countSubCatId(5); ?></span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="list_cat_services.php?id=3" class="popular-category h-20">
                        <span class="icon"><span class="flaticon-home"></span></span>
                        <span class="caption mb-2 d-block">Building</span>
                        <span class="number"><?php echo $countCat->countSubCatId(3); ?></span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="list_cat_services.php?id=4" class="popular-category h-20">
                        <span class="icon"><span class="flaticon-open-book"></span></span>
                        <span class="caption mb-2 d-block">Fabrications</span>
                        <span class="number"><?php echo $countCat->countSubCatId(4); ?></span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="list_cat_services.php?id=7" class="popular-category h-20">
                        <span class="icon"><span class="flaticon-tv"></span></span>
                        <span class="caption mb-2 d-block">Electronics</span>
                        <span class="number"><?php echo $countCat->countSubCatId(7); ?></span>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 mb-4 mb-lg-0 col-lg-2">
                    <a href="" class="popular-category h-20">
                        <span class="icon"><span class="flaticon-pizza"></span></span>
                        <span class="caption mb-2 d-block">Other</span>
                        <span class="number"><?php echo $countCat->countCatAll(); ?></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-7 text-left border-primary">
                <h2 class="font-weight-light text-primary">Trending Now</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="d-block d-md-flex listing">
                    <a href="listings-single.php" class="img d-block" style="background-image: url('images/tailor.png')"></a>
                    <div class="lh-content">
                        <span class="category">Fashion</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="listings-single.php">Home Restoration</a></h3>
                        <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <a href="listings-single.php" class="img d-block" style="background-image: url('images/users.png')"></a>
                    <div class="lh-content">
                        <span class="category">Furniture</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="listings-single.php">Wooden Chair &amp; Table</a></h3>
                        <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <a href="listings-single.php" class="img d-block" style="background-image: url('images/img_3.jpg')"></a>
                    <div class="lh-content">
                        <span class="category">Electronics</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="listings-single.php">iPhone X gray</a></h3>
                        <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <a href="listings-single.php" class="img d-block" style="background-image: url('images/mech.png')"></a>
                    <div class="lh-content">
                        <span class="category">Automobiles</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="listings-single.php">Car Mechanics</a></h3>
                        <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <a href="listings-single.php" class="img d-block" style="background-image: url('images/tailor.png')"></a>
                    <div class="lh-content">
                        <span class="category">Fashion</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="listings-single.php">Home Restoration</a></h3>
                        <address>28, Broad Str, Ikeja, Lagos</address>
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
                    <a href="listings-single.php" class="img d-block" style="background-image: url('images/users.png')"></a>
                    <div class="lh-content">
                        <span class="category">Furniture</span>
                        <a href="#" class="bookmark"><span class="icon-heart"></span></a>
                        <h3><a href="listings-single.php">Wooden Chair &amp; Table</a></h3>
                        <address>28, Broad Str, Ikeja, Lagos</address>
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

<div class="site-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light text-primary">Our Blog</h2>
                <p class="color-black-opacity-5">See Our Daily News &amp; Updates</p>
            </div>
        </div>
        <div class="row mb-3 align-items-stretch">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="images/mech.png" alt="Image" class="img-fluid rounded">
                    <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>
                    <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span> <a href="#">News</a></div>
                    <p>He comes to feed them every day, rain or shine. Whenever I see him, I want to thank him with all my heart, because he does not just help all the stray pets, but he has also changed the way our neighbours treat them, too. Many were inspired to start feeding them as well, some are even trying to find homes for them. There is kindness in this world!</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="images/tailor.png" alt="Image" class="img-fluid rounded">
                    <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>
                    <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span> <a href="#">News</a></div>
                    <p>He comes to feed them every day, rain or shine. Whenever I see him, I want to thank him with all my heart, because he does not just help all the stray pets, but he has also changed the way our neighbours treat them, too. Many were inspired to start feeding them as well, some are even trying to find homes for them. There is kindness in this world!</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="h-entry">
                    <img src="images/users.png" alt="Image" class="img-fluid rounded">
                    <h2 class="font-size-regular"><a href="#" class="text-black">Many People Selling Online</a></h2>
                    <div class="meta mb-3">by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span> <a href="#">News</a></div>
                    <p>He comes to feed them every day, rain or shine. Whenever I see him, I want to thank him with all my heart, because he does not just help all the stray pets, but he has also changed the way our neighbours treat them, too. Many were inspired to start feeding them as well, some are even trying to find homes for them. There is kindness in this world!</p>
                </div>
            </div>
            <div class="col-12 text-center mt-4">
                <a href="blog.php" class="btn btn-primary rounded py-2 px-4 text-white">View All Posts</a>
            </div>
        </div>
    </div>
</div>

<?php include('lfooter.php'); ?>
