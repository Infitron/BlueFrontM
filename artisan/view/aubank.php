                              
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add </strong>
                                        <small> Bank Details</small>
                                    </div>
                                    <div class="card-body card-block">
                                      <form method="POST" action="../control/caddbankdetails.php" enctype="multipart/form-data">
                                            
                                        <div class="form-group">
                                            <label for="aname" class="form-control-label">Account Name</label>
                                            <input type="text" id="aname" name="aname" placeholder="" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label for="anum" class="form-control-label">Account Number</label>
                                            <input type="text" id="anum" name="anum" placeholder="" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label for="bvn" class="form-control-label">BVN</label>
                                            <input type="text" id="bvn" name="bvn" placeholder="" class="form-control" >
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="bcode" class="form-control-label">Bank Name</label>
                                            
                                              <select name="bcode" id="bcode" class="form-control">
                                                     <?php  

                                                            $bankC = new BankCode();
                                                            $bankC->autht = $_SESSION['token'];
                                                            $bank = $bankC->getBankCode();

                                                            foreach ($bank as $banks) {
                                                                $b_code = $banks['bankcode'];
                                                                $b_name = $banks['bankName'];

                                                                echo " <option value='$b_code'>$b_name</option>";
                                                            }


                                                    ?>
                                                </select>
                                        </div>

                                        
                                       
                                         <input type="hidden" id="userId" name="userId" placeholder="" class="form-control" value="<?php echo $userId; ?>">
                                          <input type="hidden" id="token" name="token" placeholder="" class="form-control" value="<?php echo $token; ?>">
                                                 <div class="form-group">
                                                     <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" >
                                                </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>