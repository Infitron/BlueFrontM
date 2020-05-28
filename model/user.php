<?php


class User extends Api{




		public $FirstName;
		public $LastName;
		public $PhoneNumber;
		public $IdcardNo;
		public $PicturePath;
		public $Address;
		public $State;
		public $UserId;
		public $AreaLocation;
		public $ArtisanCategory;
		public $ArtisanCategoryId;
		public $category;
		public $AboutMe;


		public $type;
		public $size;
		public $tmp_path;
		public $upload_directory = "images/users";
		public $image_placeholder = "http://placehold.it/400x400&text=image";


		public $errors = array();
		public $upload_errors_array = array(

			UPLOAD_ERR_OK 			=>"There is no error.",
			UPLOAD_ERR_INI_SIZE 			=>"The uploaded file exceeds the upload_mas_filesize directive.",
			UPLOAD_ERR_FORM_SIZE =>"he uploaded file exceeds the MAX_FILE_SIZE directive.",
			UPLOAD_ERR_PARTIAL =>"The uploaded file was only partially uploaded.",
			UPLOAD_ERR_NO_FILE =>"No file was uploaded.",
			UPLOAD_ERR_NO_TMP_DIR =>"Missing a temporary folder.",
			UPLOAD_ERR_CANT_WRITE =>"Failed to write file to disk.",
			UPLOAD_ERR_EXTENSION =>"A PHP extension stopped the file upload."
		);



		public function set_file($file){

			

			if(empty($file) || !$file || !is_array($file)){
				$this->errors[] = "There was no file upload here";
				return false;
			}elseif ($file['error'] !=0) {
				$this->errors[] = $this->upload_errors_array[$file['error']];
				return false;
			}else{

				$this->PicturePath = basename($file['name']);
				$this->tmp_path = $file['tmp_name'];
				$this->type     = $file['type'];
				$this->size     = $file['size'];

			}
			
		}


		public function image_path_and_placeholder(){
			return empty($this->PicturePath)? $this->image_placeholder : $this->upload_directory.'/'.$this->PicturePath;
		}


		public function save_users_images(){


				if(!empty($this->errors)){
					return false;
				}

				if(empty($this->PicturePath) || empty($this->tmp_path)){
					$this->errors[] = "File not available";
				}

				$target_path = "../".$this->upload_directory."/".$this->PicturePath;

				if(file_exists($target_path)){
					$this->errors[] = "The file {$this->PicturePath} already exists";
					return false;
				}

				if (move_uploaded_file($this->tmp_path, $target_path)) {
					
					
						unset($this->tmp_path);
						return true;
				
				}else{
					$this->errors[] = "No permission to upload to directory";
					return false;
				}		
			
		}

		public function userLogin($email,$password){


					$data_array =  array(
					      "username" 		=> $email,
						  "password" 		=> $password,
				   );



					$url = $this->url_user_logic;
					$ch = curl_init($url);

					//Encode the array into JSON.
               		 $jsonDataEncoded = json_encode($data_array);
					 echo "<span style='display:none'>";
                //Tell cURL that we want to send a POST request.
	                curl_setopt($ch, CURLOPT_POST, 1);

	                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	                //Attach our encoded JSON string to the POST fields.
	                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

	                //Set the content type to application/json
	                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));

	                //Execute the request
	                $result = curl_exec($ch);

	                //Close CURL
	                curl_close($ch);

	                echo"</span>";

	               if($result){
	                    
	                    $testCheck = json_decode($result);
	                    $status  = $testCheck->{'success'};

	                    if(http_response_code(200) && $status == true ){

							 $userRole = $testCheck->{'userRole'};

		                       if($userRole == 'Artisan'){

										$_SESSION['user_id'] =   $testCheck->{'userId'};
										$_SESSION['token'] =    "Authorization: bearer " .$testCheck->{'token'};
										$_SESSION['userRole'] = $testCheck->{'userRole'};
										$_SESSION['userRoleId'] = 1;
		                                $_SESSION['email']      = $email;

		                                echo "<script>alert('User Login Created')</script>";
								} 
						}

					}

			}



		   public function createClient(){

					$data_array =  array(
					      "FirstName" 		=> $this->FirstName,
						  "LastName" 		=> $this->LastName,
						 "PhoneNumber" 		=> $this->PhoneNumber,
					    "IdcardNo"			=> $this->IdcardNo,
					    "PicturePath" 		=> $this->PicturePath,
					    "Address"			=> $this->Address,
					    "State"				=> $this->State,
						 "UserId" 			=> $this->UserId
				   );

					$url = $this->url_user_client.$this->UserId;
					$make_call = $this->callAPI('POST', $url, json_encode($data_array), $this->autht);
					$response = json_decode($make_call, true);
					$status  = $response->{'status'};
					$message = $response->{'message'};
					
					if(http_response_code(200) && $status == 200 ){

							 echo "<script>alert('Client Data Created')</script>";
					}

			}


			public function updateClient(){

					$data_array =  array(
					      "FirstName" 		=> $this->FirstName,
						  "LastName" 		=> $this->LastName,
						 "PhoneNumber" 		=> $this->PhoneNumber,
					    "IdcardNo"			=> $this->IdcardNo,
					    "PicturePath" 		=> $this->PicturePath,
					    "Address"			=> $this->Address,
					    "State"				=> $this->State,
						 "UserId" 			=> $this->UserId
				   );

					$url = $this->url_user_client.$this->UserId;
					$make_call = $this->callAPI('PUT', $url, json_encode($data_array), $this->autht);
					$response = json_decode($make_call, true);
					$status  = $response->{'status'};
					$message = $response->{'message'};
					
					if(http_response_code(200) && $status == 200 ){

							 echo "<script>alert('Client Data Created')</script>";
					}

			}


			public function getClientDetails($id){

					$url = $this->url_user_client.'/'.$id;
					$make_call = $this->callAPI('GET', $url, false, $this->autht);
					$response = json_decode($make_call, true);
					$status  =  $response['response']['status'];
					$message = $response['response']['message'];
					
					if(http_response_code(200) && $status == 200 ){

							 return $message;
					}else{

						echo "<script>alert('User Have no data')</script>";
					}

			}


			public function getUserArtisan($id){

					$url = $this->url_user_artisan."/".$id;
					$make_call = $this->callAPI('GET', $url, false, $this->autht);
					var_dump($make_call);
					$response = json_decode($make_call, true);
					$status  =  $response->{'status'};
					$message = $response->{'message'};

					if(http_response_code(200) || $status == 200 ){

							 return $message;
					}else{

						echo "<script>alert('User Have no data, Please Update Your Data')</script>";
					}

			}



			public  function createArtisan(){


					$data_array =  array(
					     "FirstName" 		 => $this->FirstName,
						  "LastName" 		 => $this->LastName,
						 "PhoneNumber" 		 => $this->PhoneNumber,
						 "AreaLocationId" 	 => $this->AreaLocation,
						"ArtisanCategoryId"  => $this->ArtisanCategoryId,
					    "IdcardNo"			=> $this->IdcardNo,
					    "PicturePath" 		=> $this->PicturePath,
					    "Address"			=> $this->Address,
					    "State" 			=> $this->State,
					    "AboutMe" 			=> $this->AboutMe,
						 "UserId" 			=> $this->UserId
				   );

					foreach ($data_array as $key => $value) {
						echo "$key => $value <br>";
					}

					$url = $this->url_user_artisan;
					
					$make_call = $this->callAPI('POST', $url, json_encode($data_array),$this->autht);
					var_dump($make_call); die();
					$response = json_decode($make_call, true);
					$status  = $response->{'status'};
					$message = $response->{'message'};

					if ($status == 201 || $status == 200) {
						 echo "<script>alert('Artisan Data Created')</script>";
					}
			}


			


			public function updateArtisan(){

					$data_array =  array(
					     "FirstName" 		=> $this->FirstName,
						  "LastName" 		=> $this->LastName,
						 "PhoneNumber" 		=> $this->PhoneNumber,
						 "AreaLocation" 	=> $this->AreaLocation,
					    "IdcardNo"			=> $this->IdcardNo,
					    "PicturePath" 		=> $this->PicturePath,
					    "Address"			=> $this->Address,
					    "State" 			=> $this->State,
					    "AboutMe" 			=> $this->AboutMe,
						 "UserId" 			=> $this->UserId
				   );

					$url = $this->url_user_artisan.$this->UserId;
					$make_call = $this->callAPI('PUT', $url, json_encode($data_array),$this->autht);
					$response = json_decode($make_call, true);
					$status  = $response->{'status'};
					$message = $response->{'message'};
					
					if(http_response_code(200) && $status == 200 ){

							 echo "<script>alert('Artisan Data Created')</script>";
					}

			}



}

?>