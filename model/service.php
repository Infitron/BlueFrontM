<?php  


	class Service extends Api	{

		public $Id;
		public $ArtisanId;
		public $Descriptions;
		public $ServiceName;
		public $StatusId;
		public $UserId;
		public $CreationDate;


		public function postService(){

			$data_array =  array(
			    "Descriptions" => $this->Descriptions,
			    "ServiceName" => $this->ServiceName,
			    "StatusId" => $this->StatusId,
			    "UserId" => $this->UserId
		    );

			$url = $this->url_user_service;
			$get_data = $this->callAPI("POST", $url, json_encode($data_array), $this->autht);
			$response = json_decode($get_data, true);
			$status  = $response['status'];
			$message = $response['message'];
					
			if(http_response_code(200) || $status == 200 || $status == 201){

							//print_r($message); die();
							 echo "<script>alert('Service Created Successfully')</script>";
			}
		}


		public function putService(){

			$data_array =  array(
				 "Id" => $this->Id,
				 "ArtisanId" => $this->ArtisanId,
			    "Descriptions" => $this->Descriptions,
			    "ServiceName" => $this->ServiceName,
			    "StatusId" => $this->StatusId,
			    "CreationDate" => $this->CreationDate
		    );

		  

			$url = $this->url_user_service;
			$get_data = $this->callAPI("PUT", $url, json_encode($data_array), $this->autht);
			$response = json_decode($get_data, true);
			$status  = $response['status'];
			$message = $response['message'];
					
			if(http_response_code(200) || $status == 200 || $status == 201){

							//print_r($message); die();
							 echo "<script>alert('Service Successfully Updated')</script>";
			}
		}



		public function findServiceByUserId($id){

						$url      = $this->url_user_service;
						$get_data = $this->callAPI("GET", $url, false, $this->autht);
						$response = json_decode($get_data, true);
						$errors = $response['status'];
						
						if ($errors == 200 || $errors == 201){
							$data = $response['message'];

							foreach ($data as $datas) {

								if ($datas['artisanId'] == $id) {
									
									$service_id = $datas['id'];
								}
								
							}

						}

						return $service_id;

		  }


		  public function getServiceByArtisanId($id){

						$url      = $this->url_user_service;
						$get_data = $this->callAPI("GET", $url, false, $this->autht);
						$response = json_decode($get_data, true);
						$errors = $response['status'];
						$message = array();
						
						if ($errors == 200 || $errors == 201){
							$data = $response['message'];
							

							foreach ($data as $datas) {

								if ($datas['id'] == $id) {
									
									$message = $datas;
								}
								
							}

						}

						return $message;

		  }



		  public function getServiceDetails($id){

				$url = $this->url_user_service."/".$id;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
			    $errors = $response['status'];
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			         echo "<script>alert('Unable to get your service, please add your service')</script>";
			        echo "<script> window.open('../artisan/index.php?aus','_self'); </script>";
			    }    
			    
			    return $data;
			}





}




 ?>