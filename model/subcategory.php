<?php  


	class SubCategory extends Api	{


			

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


		public function getSubCategoryId($id){
				$url = $this->url_user_aSubcategory."/".$id;
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


		


		public function countCatId($id){

					$url = $this->url_user_aSubcategory;
					$make_call = $this->callAPI('GET', $url, false, $this->autht);
					$response = json_decode($make_call, true);
					$status  =  $response['status'];
					$message = $response['message'];
					$catIdAarry = array();
					
					if(http_response_code(200) || $status == 200 ||  $status == 201){

							// return sizeof($message[]);

							foreach ($message as $messages) {
								
									if ($messages['categoryId'] == $id) {
											
										$catIdAarry = 	$messages['categoryId'];					

									}
							}

							return sizeof($catIdAarry);
					}else{

						return 0;
					}

			}



		public function countCatAll($id){

					$url = $this->url_user_aSubcategory;
					$make_call = $this->callAPI('GET', $url, false, $this->autht);
					$response = json_decode($make_call, true);
					$status  =  $response['status'];
					$message = $response['message'];
					$catIdAarry = array();
					
					if(http_response_code(200) || $status == 200 ||  $status == 201){

							return sizeof($message);
					}else{

						return 0;
					}

			}






}




 ?>