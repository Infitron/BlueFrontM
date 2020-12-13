<?php  


	class SubCategory extends Api	{


			public function getSubCategory(){

				$url = $this->url_user_aSubcategory;
					
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


			public function countSubCatId($id){

				$url = $this->url_user_CatSub.$id;
				$make_call = $this->callAPI('GET', $url, false, $this->autht);
				$response = json_decode($make_call, true);
				$status  =  $response['status'];
				$message = $response['message'];
				
					
					if(http_response_code(200) || $status == 200 ||  $status == 201){

							return sizeof($message);
					}else{

						return 0;
					}

		}



		public function countCatAll(){

					$url = $this->url_user_aSubcategory;
					$make_call = $this->callAPI('GET', $url, false, $this->autht);
					$response = json_decode($make_call, true);
					$status  =  $response['status'];
					$message = $response['message'];
					//$catIdAarry = array();
					
					if(http_response_code(200) || $status == 200 ||  $status == 201){

							return sizeof($message);
					}else{

						return 0;
					}

			}










}




 ?>