<?php  


	class BankCode extends Api	{


			

			public function getBankCode(){
				$url = $this->url_bank_code;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
			    if ($errors == 200){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get Categories";
			    }    
			    
			    return $data;
			}


			public function getBankCodeName($code){
				$url = $this->url_bank_code;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
			    $errors = $response['status'];
				$bankD_name = "";

			    	if ($errors == 200 || $errors == 201){
							$data = $response['message'];

							foreach ($data as $datas) {

								if ($datas['bankcode'] == $code) {
									
									$bankD_name = $datas['bankName'];
								}
								
							}

						}

						return $bankD_name;
			}



		}











 ?>