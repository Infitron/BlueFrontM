<?php 

          $userBankD = new BankDetails();
          $userBankD->autht         =  $_SESSION['token'];
          $bankD = $userBankD->getSingleBankDetails($_GET['id']);

          $bid      = $bankD['id'];
          $aname    = $bankD['accountName'];
          $anum     = $bankD['accountNumber'];
          $bcode    = $bankD['bankCode'];
          $bvn      = $bankD['bvn'];
          $dateC    = $bankD['createdDate'];


          $BankCode = new BankCode();
          $BankCode->autht =  $_SESSION['token'];
          $uBCName  = $BankCode->getBankCodeName($bcode);
        
          

 ?>         


                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>View</strong>
                                        <small> Bank Details</small>
                                    </div>
                                    <div class="card-body card-block">
                                      <form>
                                        
                                       <div class="form-group">
                                            <label for="aname" class="form-control-label">Bank Name</label>
                                            <input type="text" id="aname" name="bname" placeholder="" class="form-control" value="<?php echo $uBCName; ?>" readonly="">
                                        </div>

                                        <div class="form-group">
                                            <label for="aname" class="form-control-label">Account Name</label>
                                            <input type="text" id="aname" name="aname" placeholder="" class="form-control" value="<?php echo $aname; ?>" readonly="">
                                        </div>

                                        <div class="form-group">
                                            <label for="anum" class="form-control-label">Account Number</label>
                                            <input type="text" id="anum" name="anum" placeholder="" class="form-control" value="<?php echo $anum; ?>" readonly="">
                                        </div>

                                        <div class="form-group">
                                            <label for="bvn" class="form-control-label">BVN</label>
                                            <input type="text" id="bvn" name="bvn" placeholder="" class="form-control" value="<?php echo $bvn; ?>" readonly="">
                                        </div>

                                         <div class="form-group">
                                            <label for="bname" class="form-control-label">Bank Details Created Date</label>
                                            <input type="text" id="bname" name="bdd" placeholder="" class="form-control" value="<?php echo $dateC; ?>" readonly="">
                                        </div>
                                       
                                  </form>
                                       
                                    </div>
                                </div>
                            </div>