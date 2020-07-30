<?php  

    
     $getComp = new Complaint();

     $getComp->autht         =  $_SESSION['token'];
     $getCompId              =  $getComp->getComplainArtisantId($aid); 

     if ($getCompId == " " || $getCompId == NULL) {

            echo "<script>alert('You have no Complaint Record on your Tray, Add Complaint')</script>";
            echo "<script> window.open('../artisan/index.php?cp','_self'); </script>"; 
     }

    

?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Complaint</h2>
                                    <a href="index.php?cp" class="au-btn au-btn-icon au-btn--blue">
                                       <i class="zmdi zmdi-plus"></i>add Complaint</a> 
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Artisan Name</th>
                                                <th>Complaint Title</th>
                                                <th>Complaint Status</th>
                                                <th>View Complaint</th>
                                                <th>Handle Complaint</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 

                                                foreach ($getCompId as $getCompIds) {

                                                     $comp_id            =  $getCompIds['id'];
                                                     $comp_title         =  $getCompIds['title'];
                                                     $comp_artisanId     =  $getCompIds['artisanId'];
                                                     $comp_description   =  $getCompIds['description'];
                                                     $comp_createdDate   =  $getCompIds['createdDate'];
                                                     $comp_statusId      =  $getCompIds['statusId'];
                                                     $comp_dateResolved  =  $getCompIds['dateResolved'];
                                                     $comp_artisan       =  $getCompIds['artisan'];

                                                     $artisan = new User();
                                                     $artisan->autht          = $_SESSION['token'];
                                                     $getName                 = $artisan->getUserArtisan($comp_artisanId);
                                                     $fullname                = $getName['firstName']." ".$getName['lastName'];




                                                     if ($comp_statusId == 1) {
                                                         $comp_statusId = "Pending";
                                                     }if ($comp_statusId == 2) {
                                                         $comp_statusId = "Processing";
                                                     }if ($comp_statusId == 3) {
                                                         $comp_statusId = "Resolved";
                                                     }
                                                    
                                                    echo "

                                                            <tr>
                                                                <td>$comp_id</td>
                                                                <td>$fullname</td>
                                                                <td>$comp_title </td>
                                                                <td>$comp_statusId</td>
                                                                <td> <a href='index.php?vcp&id=$comp_id' class='btn btn-primary btn-lg'>View</a></td>
                                                                 <td> <a href='index.php?ecp&id=$comp_id' class='btn btn-danger btn-lg'>Handle</a></td>
                                                            </tr>


                                                    ";
                                                }



                                            ?>
                                            

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>