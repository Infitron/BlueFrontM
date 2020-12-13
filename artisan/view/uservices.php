                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Service</strong>
                                        <small>Search</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="index.php?ls" method="POST">
                        

                                         <div class="form-group">
                                            <label for="service" class=" form-control-label">Select Subcategory</label>
                    
                                            <select id="subCat" class="form-control" placeholder="Select A Service" name="subCat">
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
                                        </div>
                                        <div class="form-group">
                                            <label for="service" class=" form-control-label">Select State</label>
                    
                                            <select  class="form-control" placeholder="" id="state" name="state" onchange='selectLga()'>
                                                   
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
                                        <script>
                                            function selectLga(){
                                            
                                                    var stateId = document.getElementById('state').value;
                                                    if(stateId){
                                                        $.ajax({
                                                            type:'GET',
                                                            url:'../model/ajaxStateLga.php',
                                                            data:{ 'stateId': stateId },
                                                            success:function(msg){
                                                                $('#statelga').load('../model/ajaxStateLga.php?stateId='+ stateId);
                                                            }
                                                        });
                                                    }
                                                
                                            }
                                            
                                        </script>
                                        <div class="form-group">
                                            <label for="service" class=" form-control-label">Select LGA</label>
                    
                                            <select id="statelga" class="form-control" placeholder="" name="lga" >

                                                <option>Select LGA</option>
                                            
                                             </select>
                                        </div>
                                                 <div class="form-group">
                                                     <button type="submit" class="btn btn-primary btn-lg" name="submit">Search</button>
                                                </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>