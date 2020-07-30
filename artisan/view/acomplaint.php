                              
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add </strong>
                                        <small> Complaint</small>
                                    </div>
                                    <div class="card-body card-block">
                                      <form method="POST" action="../control/caddcomplaint.php" enctype="multipart/form-data">
                                            
                                        <div class="form-group">
                                            <label for="aname" class="form-control-label">Complaint Title</label>
                                            <input type="text" id="title" name="title" placeholder="" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label for="anum" class="form-control-label">Select Complaint Artisan </label>
                                            <input type="text"  name="acomp" placeholder="" list="acomp" class="form-control" >
                                             <datalist id="acomp">
                                                     <?php  

                                                            $artisan = new User();
                                                            $artisan->autht = $_SESSION['token'];
                                                            $artisanC = $artisan->getArtisans();

                                                            //var_dump($artisanC);
                                                            
                                                            foreach ($artisanC as $artisanCs) {
                                                                $a_id = $artisanCs['id'];
                                                                $a_name = $artisanCs['firstName']." ".$artisanCs['lastName'];

                                                                echo " <option value='$a_name'>$a_name</option>
                                                                       <input type='hidden' name='a_id' id='a_id' value='$a_id'>
                                                                ";
                                                            }

                                                           


                                                    ?>
                                                </datalist>
                                        </div>

                                        <div class="form-group">
                                            <label for="message" class=" form-control-label">Complaint Message</label>
                                            <textarea name="message" id="message" rows="9" placeholder="Content..." class="form-control" ></textarea>
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