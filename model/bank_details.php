<?php  


	class BankDetails extends Api	{
		
			public $id;
			public $ArtisanId;
    		public $AccountName;
    		public $AccountNumber;
    		public $BankCode;
    		public $Bvn;
    		public $UserId;
    		public $CreatedDate;
			

			public function getBankDetails(){
				$url = $this->url_user_bank;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get Categories";
			    }    
			    
			    return $data;
			}


			public function getSingleBankDetails($id){

				$url = $this->url_user_bank."/".$id;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get Bank Details";
			    }    
			    
			    return $data;
			}


			public function findBankDetailsByUserId($id){

						$url      = $this->url_user_bank;
						$get_data = $this->callAPI("GET", $url, false, $this->autht);
						$response = json_decode($get_data, true);
						$errors = $response['status'];
						$bankD_id = 0;
						
						if ($errors == 200 || $errors == 201){
							$data = $response['message'];

							foreach ($data as $datas) {

								if ($datas['artisanId'] == $id) {
									
									$bankD_id = $datas['id'];
								}
								
							}

						}

						return $bankD_id;

		  }


			public function PostBankDetails(){


				$data_array =  array(

					    "accountName" 			=> $this->AccountName,
						"accountNumber" 		=> $this->AccountNumber,
						"bankCode" 		    	=> $this->BankCode,
					    "bvn"					=> $this->Bvn,
						"userId" 				=> $this->UserId,
						"createdDate" 			=> $this->CreatedDate,
				   );

				$url = $this->url_user_bank;
			    $get_data = $this->callAPI("POST", $url, json_encode($data_array), $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			       echo "<script>alert('Bank Details Created Successfully ')</script>";
			    
			    }else{
			        echo "Unable to Post Bank Details";
			    }    
			    
			    return $data;
			}

			public function PutBankDetails($id){


				$data_array =  array(

					    "accountName" 			=> $this->AccountName,
						"accountNumber" 		=> $this->AccountNumber,
						"bankCode" 		    	=> $this->BankCode,
					    "bvn"					=> $this->Bvn,
						"userId" 				=> $this->UserId,
						"createdDate" 			=> $this->CreatedDate,
				 );


				$url = $this->url_user_bank."/".$id;
			    $get_data = $this->callAPI("PUT", $url,json_encode($data_array), $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to Update Categories";
			    }    
			    
			    return $data;
			}



			 





		}











 ?>