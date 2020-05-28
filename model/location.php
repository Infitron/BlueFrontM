<?php  


	class Location extends Api	{




		public function getLocation(){

			$url = $this->url_user_location;
			$get_data = $this->callAPI("GET", $url, false, $this->autht);
			$response = json_decode($get_data, true);
			$errors = $response['status'];
			
			if ($errors == 200){
				$data = $response['message'];

			}else{
				echo "Unable to Get Location";
			}

			return $data;
		}





}




 ?>