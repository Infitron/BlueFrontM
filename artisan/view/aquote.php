<?php   


        if(isset($_GET['oid']) && isset($_GET['odate'])){

            $oid   = addslashes(trim($_GET['oid'])); 
            $odate = addslashes(trim($_GET['odate']));
           
            
        
        


?>


<div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Create </strong>
                                        <small>Quote</small>
                                    </div>
                                    <div class="card-body card-block">
                                    <form method="POST" action="../control/caddquote.php" enctype="multipart/form-data">
                                            
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">How Many Items?</label>
                                            <input type="text" id="qnum" name="qnum" placeholder="" class="form-control" onkeyup="pickNumMain()">
                                        </div>

                                        <div class="ShowM">

                                        </div>

                                    <script>
                                      function pickNumMain(){

                                                    var num =  document.getElementById('qnum').value;
                                                    $.ajax({
                                                                    url: "./view/add_qoute.php",
                                                                    type: "GET",
                                                                    data: { 
                                                                        'num': num    
                                                                    },              
                                                                    success: function (msg) {

                                                                    $(".ShowM").load("./view/add_qoute.php?num=" + num);

                                                                    }
                                                        });
                                                }

                                     

                                     </script>
                                    
                                      <div class="form-group">
                                            <label for="name" class=" form-control-label">Discount</label>
                                            <input type="text" id="" name="dis" placeholder="" class="form-control">
                                      </div>
                                      <div class="form-group">
                                            <label for="name" class=" form-control-label">Workmanship</label>
                                            <input type="text" id="" name="wm" placeholder="" class="form-control">
                                      </div>
                                      <div class="form-group">
                                            <label for="name" class=" form-control-label">Total</label>
                                            <input type="text" id="" name="total" placeholder="" class="form-control">
                                      </div>
                                        
                                        <input type="hidden" name="oid" value="<?php echo $oid; ?>" />
                                        <input type="hidden" name="odate" value="<?php echo $odate; ?>" />
                                        <input type="hidden" name="token" value="<?php echo $token; ?>" />
                                        <div class="form-group">
                                                     <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                                        </div>
                                        
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>
        <?php  } ?>