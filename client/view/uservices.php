                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Service</strong>
                                        <small>Search</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="index.php?usc" method="POST">
                        

                                         <div class="form-group">
                                            <label for="service" class=" form-control-label">Enter Service</label>
                                            <input type="text" id="" placeholder="Select A Service" list="service" name="service" class="form-control" >
                                            <datalist id="service">
                                                    <?php 

                                                                                                    
                                                    $cat = new Category();
                                                    $cat->autht = $_SESSION['token'];
                                                    $cate = $cat->getCategory();

                                                    foreach ($cate as $cates) {
                                                        $cat_id = $cates['id'];
                                                        $cat_lga = $cates['categoryName'];

                                                        echo " <option data-id='$cat_id' value='$cat_lga'>$cat_lga</option>
                                                                <input type='hidden' name='cat' id='city_id' value='$cat_id'>

                                                        ";
                                                    }


                                                    
                                                
                                                    ?>
                                            
                                                </datalist>
                                        </div>
                                                 <div class="form-group">
                                                     <button type="submit" class="btn btn-primary btn-lg">Search</button>
                                                </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>