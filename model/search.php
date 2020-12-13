<?php  


	class Search extends Api	{



		public function getSearchSubCatId($subCatId){

			if(isset($subCatId) && !empty($subCatId)){

				$url = $this->url_user_search."?SubCatId=".$subCatId;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();

			    if ($errors == 200 || $errors == 201 || $errors == 404){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get SubCategories";
			    }    
			    
			    return $data;

			}

		}

		public function getSearchCatId($subCatId){

			if(isset($subCatId) && !empty($subCatId)){

				$url = $this->url_user_search."?SubCatId=".$subCatId;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();

			    if ($errors == 200 || $errors == 201 || $errors == 404){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get Categories";
			    }    
			    
			    return $data;

			}

		}

		public function getSearch($subCatId,$stateId,$LgId){

			if(isset($subCatId) && isset($stateId) && isset($LgId)){

				$url = $this->url_user_search."?SubCatId=$subCatId&StateId=$stateId&LgId=$LgId";
				$get_data = $this->callAPI("GET", $url, false, $this->autht);
				$response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();

				if ($errors == 200 || $errors == 201 || $errors == 404){

				$data = $response['message'];

				}else{
					echo "Unable to get Area of Location";
				}

				return $data;

			}	
			

		}

			
		public function getLocation(){

			$url = $this->url_user_location;
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


		public function getSubCategory(){
				$url = $this->url_user_aSubcategory;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get SubCategories";
			    }    
			    
			    return $data;
			}



}




 ?>