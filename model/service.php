<?php  


	class Service extends Api	{

		public $Descriptions;
		public $ServiceName;
		public $StatusId;
		public $UserId;


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
					
			if(http_response_code(200) || $status == 200 ){

							//print_r($message); die();
							 echo "<script>alert('Service Created Successfully')</script>";
			}
		}





}




 ?>