<?php  


	class State extends Api	{

		public $Id;
		public $Name;
		public $Lga;



		public function getState(){

			$url = $this->url_user_state;
			$get_data = $this->callAPI("GET", $url, false, $this->autht);
			$response = json_decode($get_data, true);
			$errors = $response['status'];
			$data = array();
			
			if ($errors == 200 || $errors == 201){
				$data = $response['message'];

			}else{
				echo "Unable to Get Location";
			}

			return $data;
		}

		public function getStateId($id){

			$url = $this->url_user_state."/ThisState/".$id;
			$get_data = $this->callAPI("GET", $url, false, $this->autht);
			$response = json_decode($get_data, true);
			$errors = $response['status'];
			$data = array();
			
			if ($errors == 200 || $errors == 201){
				$data = $response['message'];

			}else{
				echo "Unable to Get Location";
			}

			return $data;
		}




}




 ?>