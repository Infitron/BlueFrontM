<?php   


        if(isset($_GET['oid'])){


        
        }


?>


<div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>View </strong>
                                        <small> Job Request</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <form>
                                            
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">User Name</label>
                                            <input type="text" id="name" placeholder="" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="service" class=" form-control-label">Product / Service</label>
                                            <input type="text" id="service" name="service" placeholder="" class="form-control" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class=" form-control-label">Category</label>
                                            <input type="text" id="category" name="category" placeholder="" class="form-control" readonly="">
                                        </div>
                                         <div class="form-group">
                                            <label for="sdate" class=" form-control-label">Start Date</label>
                                            <input type="text" id="sdate" name="sdate" placeholder="" class="form-control" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="edate" class=" form-control-label">End Date</label>
                                            <input type="text" id="edate" name="edate" placeholder="" class="form-control" readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="message" class=" form-control-label">Job Details</label>
                                            <textarea name="message" id="message" rows="9" placeholder="Content..." class="form-control" ></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label for="status" class=" form-control-label">Job Status</label>
                                            <select id="status" name="status" placeholder="" class="form-control">
                                                <option value="pending">Pending</option>
                                                <option value="processing">Processing</option>
                                                <option value="resolved">Resolved</option>
                                            </select>
                                            
                                        </div>
                                         <div class="form-group">
                                                     <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                                         </div>
                                        
                                        </form>
                                       
                                    </div>
                                </div>
                            </div>