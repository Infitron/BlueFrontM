<?php  

        $userBank = new BankDetails();
        $userBank->autht =  $_SESSION['token'];
        $userBankDId = $userBank->findBankDetailsByUserId($aid);

        $userBankD = new BankDetails();
        $userBankD->autht         =  $_SESSION['token'];
        $bankD = $userBankD->getSingleBankDetails($userBankDId);

          $bid      = $bankD['id'];
          $aname    = $bankD['accountName'];
          $anum     = $bankD['accountNumber'];
          $bcode    = $bankD['bankCode'];
          $bvn      = $bankD['bvn'];
          $dateC    = $bankD['createdDate'];

        

        if(empty($userBankDId)){
            echo "<script>alert('Add your Bank Details')</script>";   
             echo "<script> window.open('../artisan/index.php?aub','_self'); </script>";
        }

        $UbankD  = $userBank->getSingleBankDetails($userBankDId);
        $id = $UbankD['id'];   
         $BankCode = new BankCode();
         $BankCode->autht =  $_SESSION['token'];
         $uBCName  = $BankCode->getBankCodeName($UbankD['bankCode']);

         $cate  = new Category();
         $cate->autht =  $_SESSION['token'];
         $cates =  $cate->getCategoryId($artisanCategoryId);
         $cate_name = $cates['categoryName'];
         $cate_desc = $cates['description'];

    
        $stat = new State();
        $stat->autht =  $_SESSION['token'];
        $states =  $stat->getStateId($state);
        $state_name = $states['name'];
        




?>               

                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    
                                    <a href="index.php?uep" class="au-btn au-btn-icon au-btn--blue">
                                       <i class="zmdi zmdi-plus"></i>Edit Profile</a> 
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>User Basic</strong>
                                        <small> Information</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="idn" class=" form-control-label">Identification Number (Drivig Licence, National ID, Voters ID)</label>
                                            <input type="text" id="idn" placeholder="" class="form-control" value="<?php echo $idcardNo; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="f_name" class=" form-control-label">First Name</label>
                                            <input type="text" id="f_name" placeholder="" class="form-control" value="<?php echo  $firstName; ?>" readonly="">
                                        </div>
                                         <div class="form-group">
                                            <label for="f_name" class=" form-control-label">Last Name</label>
                                            <input type="text" id="l_name" placeholder="" class="form-control" value="<?php echo $lastName; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class=" form-control-label">Phone Number</label>
                                            <input type="text" id="phone" placeholder="" name="phone" class="form-control" value="<?php echo $phoneNumber; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class=" form-control-label">Email</label>
                                            <input type="text" id="email" placeholder="" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="about_me" class=" form-control-label">Information About Me</label>
                                            <textarea name="about_me" id="about_me" rows="9" placeholder=""  class="form-control" readonly="" ><?php echo $aboutMe; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="loc" class=" form-control-label">Location / City</label>
                                             <input type="text" id="loc" placeholder="" name="loc" value="<?php echo $areaLocationArea; ?>" class="form-control" readonly="">
                                           
                                        </div>

                                        <div class="form-group">
                                            <label for="address" class=" form-control-label">Address</label>
                                            <textarea name="address" id="address" rows="9" placeholder=""  class="form-control" readonly=""><?php echo $address; ?></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label for="state" class=" form-control-label">State</label>
                                            <input type="text" id="state" placeholder="" name="state" value="<?php echo $state_name; ?>" class="form-control" readonly="">
                                        </div>
                                         <div class="form-group">
                                            <label for="country" class=" form-control-label">Country</label>
                                            <input type="text" id="country" placeholder="" name="country" value="Nigeria" class="form-control" readonly="">
                                        </div>



                                          </div>
                                    </div>
                                </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                            <strong>User Bank</strong>
                                            <small> Details</small>
                                        </div>
                                        <div class="card-body card-block">

                                        <div class="form-group">
                                            <label for="bank_name" class=" form-control-label">Bank Name</label>
                                            <input type="text" id="bank_name" placeholder="" name="bank_name" class="form-control" value="<?php echo $uBCName; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="bacc_name" class=" form-control-label">Bank Account Name</label>
                                            <input type="text" id="bacc_name" name="bacc_name" placeholder="" class="form-control" value="<?php echo $aname; ?>" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="ban" class=" form-control-label">Bank Account Number</label>
                                            <input type="text" id="ban" placeholder="" class="form-control" value="<?php echo $anum; ?>" readonly="">
                                        </div>
                                        
                                
                                          </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                                <strong>User Jobs</strong>
                                                <small> Details</small>
                                        </div>
                                        <div class="card-body card-block">

                                         <div class="form-group">
                                            <label for="profession" class=" form-control-label">Category</label>
                                            <input type="text" id="profession" placeholder="" name="profession" class="form-control" value="<?php echo $cate_name; ?>" readonly=""> 
                                        </div>

                                         <div class="form-group">
                                            <label for="category" class=" form-control-label">Category Description</label>
                                            <textarea name="catDesc" id="catDesc" rows="9" placeholder=""  class="form-control" readonly=""><?php echo $cate_desc; ?></textarea>
                                        </div>

                                        </div>
                                    </div>
                                </div>   

                                