<?php  
    
   if (isset($_GET['id']) && !empty($_GET['id'])) {

         $id  = addslashes(trim($_GET['id']));

         $getComp = new Complaint();

         $getComp->autht         =  $_SESSION['token'];
         $getCompId              =  $getComp->getComplaintId($id); 

         

          $comp_id            =  $getCompId['id'];
          $comp_title         =  $getCompId['title'];
          $comp_artisanId     =  $getCompId['artisanId'];
          $comp_description   =  $getCompId['description'];
          $comp_createdDate   =  $getCompId['createdDate'];
          $comp_statusId      =  $getCompId['statusId'];
          $comp_dateResolved  =  $getCompId['dateResolved'];
          $comp_artisan       =  $getCompId['artisan'];

            $artisan = new User();
            $artisan->autht          = $_SESSION['token'];
            $getName                 = $artisan->getUserArtisan($comp_artisanId);
            $fullname                = $getName['firstName']." ".$getName['lastName'];

          if ($comp_statusId == 1 || $comp_statusId == 8) {
             $comp_statusId = "Pending";
         }if ($comp_statusId == 2) {
             $comp_statusId = "Processing";
         }if ($comp_statusId == 3) {
             $comp_statusId = "Resolved";
         }
        

?>                              
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>View </strong>
                                        <small> Complaint</small>
                                    </div>
                                    <div class="card-body card-block">
                                      <form >
                                            
                                        <div class="form-group">
                                            <label for="aname" class="form-control-label">Complaint Title</label>
                                            <input type="text" id="title" name="title" placeholder="" class="form-control" value="<?php echo $comp_title ; ?>" readonly="">
                                        </div>

                                        <div class="form-group">
                                            <label for="anum" class="form-control-label">Selected Complaint Artisan </label>
                                            <input type="text"  name="acomp" placeholder="" list="acomp" class="form-control" value="<?php echo $fullname; ?>" readonly="">
                                          
                                        </div>

                                        <div class="form-group">
                                            <label for="message" class=" form-control-label">Complaint Message</label>
                                            <textarea name="message" id="message" rows="9" placeholder="" class="form-control"  readonly=""><?php echo $comp_description; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="anum" class="form-control-label">Current Complaint Status </label>
                                            <input type="text"  name="cstatus" placeholder="" list="cstatus" class="form-control" value="<?php echo $comp_statusId; ?>" readonly="">
                                          
                                        </div>

                                        <div class="form-group">
                                            <label for="anum" class="form-control-label">Complaint Date Created </label>
                                            <input type="text"  name="acomp" placeholder="" list="cdate" class="form-control" value="<?php echo $comp_createdDate; ?>" readonly="">
                                          
                                        </div>

                                       


                                                
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>

    <?php } ?>