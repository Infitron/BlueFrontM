                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Service</strong>
                                        <small>Search</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="index.php?ls" method="POST">
                        

                                         <div class="form-group">
                                            <label for="service" class=" form-control-label">Search Service</label>
                    
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
                                                     <button type="submit" class="btn btn-primary btn-lg" name="submit">Search</button>
                                                </div>
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>