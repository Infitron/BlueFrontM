

    <?php 

        

        $user = new User();
        $user->autht = $_SESSION['token'];
        $user->userLogin($_SESSION['email'],$_SESSION['password']);
        $user->autht = $_SESSION['token'];
        

            $cid                   = $_SESSION['cid'];
            $userId                = $_SESSION['userId'];
            $firstName             = $_SESSION['firstName'];
            $lastName              = $_SESSION['lastName'];
            $phoneNumber           = $_SESSION['phoneNumber'];
            $picturePath           = $_SESSION['picturePath'];
            $address               = $_SESSION['address'];
            $state                 = $_SESSION['state'];
            $createdDate           = $_SESSION['createdDate'];
            $token                 = $_SESSION['token'];

            

            


    ?>
        <!-- PAGE CONTAINER-->
                <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                        <form class="form-header" action="index.php?ls" method="POST">
                                
                                <select class="au-input au-input--xl form-control" type="text" name="subCat" placeholder="Search for Service" />
                                
                                <?php 

                               
                                $cat = new SubCategory();
                                $cat->autht = $_SESSION['token'];
                                $cate = $cat->getSubCategory();

                                foreach ($cate as $cates) {
                                     $cat_id = $cates['id'];
                                     $cat_lga = $cates['name'];

                                     echo " <option data-id='$cat_id' value='$cat_id'>$cat_lga</option> ";
                                     
                                }


                                
                            
                                ?>

                            </select>

                                <button class="au-btn--submit" type="submit" name="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../images/users/<?php echo $picturePath;  ?>" alt="<?php echo $firstName; ?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $firstName; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../images/users/<?php echo $picturePath;  ?>" alt="<?php echo $firstName; ?>" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $firstName." ".$lastName; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['email']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="index.php?up">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="index.php?uep">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="index.php?ue">
                                                        <i class="zmdi zmdi-money-box"></i>Earning</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                       

                        <?php

                            if (isset($_GET['db'])) {
                                include("view/dashboard.php");
                            }

                             if (isset($_GET['up'])) {
                                include("view/profile.php");
                            } if (isset($_GET['uep'])) {
                                include("view/uprofile_setting.php");
                            } if (isset($_GET['upc'])) {
                                include("view/profile_creation.php");
                            }


                            if (isset($_GET['ulh'])) {
                                include("view/login_log.php");
                            }if (isset($_GET['ui'])) {
                                include("view/uimage.php");
                            }

                            // User Job
                              if (isset($_GET['uj'])) {
                                include("view/ujob.php");
                            }if (isset($_GET['auj'])) {
                                include("view/aujob.php");
                            }


                             // User Messaging System
                            if (isset($_GET['um'])) {
                                include("view/umessage.php");
                            }if (isset($_GET['aum'])) {
                                include("view/aumessage.php");
                            }if (isset($_GET['vum'])) {
                                include("view/vumessage.php");
                            }


                            
                            // User Complaint
                            if (isset($_GET['ucp'])) {
                                include("view/ucomplaint.php");
                            }if (isset($_GET['cp'])) {
                                include("view/acomplaint.php");
                            }if (isset($_GET['vcp'])) {
                                include("view/vcomplaint.php");
                            }if (isset($_GET['ecp'])) {
                                include("view/ecomplaint.php");
                            }


                            // User Payment 
                            if (isset($_GET['upd'])) {
                                include("view/upaymentdetails.php");
                            } if (isset($_GET['vpd'])) {
                                include("view/vpaymentdetails.php");
                            }


                            // User Quote 
                            if (isset($_GET['uq'])) {
                                include("view/uquotes.php");
                            } if (isset($_GET['vq'])) {
                                include("view/vquotes.php");
                            }

                            // User Service 
                            if (isset($_GET['us'])) {
                                include("view/uservices.php");
                            } if (isset($_GET['usc'])) {
                                include("view/vservices.php");
                            }if (isset($_GET['ls'])) {
                                include("view/listservice.php");
                            } 
                            
                             //User Order
                             if (isset($_GET['orm'])) {
                                include("view/aorder.php");
                            }if (isset($_GET['oms'])) {
                                include("view/saorder.php");
                            }

                        ?>












                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 bluecollarhub. All rights reserved. Template by <a href="https://bluecollarhub.com.ng">bluecollarhub</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->