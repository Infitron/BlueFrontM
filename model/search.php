<?php  


	class Search extends Api	{




		public function getSearch($subCatId,$stateId,$locationId){




		}

			
		public function getLocation(){

			$url = $this->url_user_location;
			$get_data = $this->callAPI("GET", $url, false, $this->autht);
			$response = json_decode($get_data, true);
			$errors = $response['status'];
			
			if ($errors == 200 || $errors == 201){
				$data = $response['message'];

			}else{
				echo "Unable to Get Location";
			}

			return $data;
		}

		public function getState(){

			$url = $this->url_user_state;
			$get_data = $this->callAPI("GET", $url, false, $this->autht);
			$response = json_decode($get_data, true);
			$errors = $response['status'];
			
			if ($errors == 200 || $errors == 201){
				$data = $response['message'];

			}else{
				echo "Unable to Get Location";
			}

			return $data;
		}


		public function getSubCategory(){
				$url = $this->url_user_aSubcategory;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
			    $errors = $response['status'];
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get SubCategories";
			    }    
			    
			    return $data;
			}



}




 ?>