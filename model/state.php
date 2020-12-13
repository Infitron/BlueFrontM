<?php  


	class State extends Api	{

		public $Id;
		public $Name;
		public $Lga;






		public function getState(){

			$url = $this->url_user_state;
				
				 //Initiate cURL.
			$ch = curl_init($url);


			echo "<span style='display:none'>";
			//Tell cURL that we want to send a GET request.
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			//Set the content type to application/json
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));

			//Execute the request
			$result = curl_exec($ch);

			//Close CURL
			curl_close($ch);

			echo"</span>";

			if($result){
					
					$testCheck = json_decode($result, true);
					$status  = $testCheck['status'];
					$message  = $testCheck['message'];

					if(http_response_code(200) || $status == 200 ||  $status == 201){

						return $message;
					}

			}
	   }


	   public function getStateLga(){

		$url = $this->url_user_state;
			
			 //Initiate cURL.
		$ch = curl_init($url);


		echo "<span style='display:none'>";
		//Tell cURL that we want to send a GET request.
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		//Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));

		//Execute the request
		$result = curl_exec($ch);

		//Close CURL
		curl_close($ch);

		echo"</span>";

		if($result){
				
				$testCheck = json_decode($result, true);
				$status  = $testCheck['status'];
				$message  = $testCheck['message'];

				if(http_response_code(200) || $status == 200 ||  $status == 201){

					return $message;
				}

		}
   }


		public function getStateId($id){

			$url = $this->url_state."/".$id;
			$get_data = $this->callAPI("GET", $url, false, $this->autht);
			$response = json_decode($get_data, true);
			$errors = $response['status'];
			$data = array();
			
			if ($errors == 200 || $errors == 201){
				$data = $response['message'];

			}else{
				echo "Unable to Get State";
			}

			return $data;
		}


		public function getStateLgaId($id){

			$url = $this->url_user_lga."/".$id;
			$get_data = $this->callAPI("GET", $url, false, $this->autht);
			$response = json_decode($get_data, true);
			$errors = $response['status'];
			$data = array();
			
			if ($errors == 200 || $errors == 201){
				$data = $response['message'];

			}else{
				echo "Unable to Get LGA";
			}

			return $data;
		}

	




}




 ?>