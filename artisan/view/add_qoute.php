<?php                 

		if (isset($_GET['num'])) {


            $num = $_GET['num'];
            $count = 0;

			for ($i=0; $i < $num; $i++) {
                $count++;

				echo "

						 <div class='row'>
                                    
                                        <div class='col-sm-1'>
                                            <div class='form-group'>
                                                <label>$count</label>
                                                
                                            </div>
                                        </div>
                                        <div class='col-sm-3'>
                                            <div class='form-group'>
                                                <label>Name</label>
                                                <input class='form-control' name='mName[]' type='text'>
                                            </div>
                                        </div>
                                        <div class='col-sm-2'>
                                            <div class='form-group'>
                                                <label>Quantity</label>
                                                <input class='form-control' id='mQu' name='mQu[]' type='text'>
                                            </div>
                                    </div>

                                    <div class='col-sm-2'>
                                            <div class='form-group'>
                                                <label>Unit Price</label>
                                                <input class='form-control' id='mUp' name='mUp[]' type='text'>
                                            </div>
                                    </div>
                                    <div class='col-sm-3'>
                                            <div class='form-group'>
                                                <label>Total Price</label>
                                                <input class='form-control' id='mTp' name='mTp[]' type='text'>
                                            </div>
                                    </div>
                                  
                                
							</div>

                ";

                echo "
                
                            <script>

                            $(document).ready(function()
                            {
                                $('#mTp').focus(function()
                                {
                                    var q = +$('#mQu').val();
                                    var up = +$('#mUp').val();
                                

                                    var i = q * up;

                                    $('#mTp').val(i);

                                });
                            });


                        </script>
                            
                
                ";
                
    

			}
		}



?>


