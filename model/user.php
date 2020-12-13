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
		public $AreaLocationId;
		public $ArtisanCategory;
		public $ArtisanCategoryId;
		public $category;
		public $AboutMe;
		public $RefererCode;
		public $Code;


		public $type;
		public $size;
		public $tmp_path;
		public $upload_directory = "../images/users";
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

				$this->save_users_images();

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

				$target_path = $this->upload_directory."/".$this->PicturePath;

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

	                    if( $status == true ){

							 $userRole = $testCheck->{'userRole'};

		                       if($userRole == 'Artisan'){

										$_SESSION['auser_id'] =   $testCheck->{'userId'};
										$_SESSION['token'] =    "Authorization: bearer " .$testCheck->{'token'};
										$_SESSION['userRole'] = $testCheck->{'userRole'};
										$_SESSION['userRoleId'] = 1;
		                                $_SESSION['email']      = $email;

		                                
								}if($userRole == 'Client'){

										$_SESSION['cuser_id'] =   $testCheck->{'userId'};
										$_SESSION['token'] =    "Authorization: bearer " .$testCheck->{'token'};
										$_SESSION['userRole'] = $testCheck->{'userRole'};
										$_SESSION['userRoleId'] = 2;
		                                $_SESSION['email']      = $email;

		                                
								}  


						}

					}

			}



		   public function createClient(){

				$url = $this->url_user_client;
					
					 //Initiate cURL.
                $ch = curl_init($url);

                //The JSON data.
                 $jsonData = array(
					"firstName" 		=> $this->FirstName,
					"lastName" 		=> $this->LastName,
				   "phoneNumber" 		=> $this->PhoneNumber,
				   "idcardNo"			 => $this->IdcardNo,
				  "picturePath" 		=> $this->PicturePath,
				  "address"			=> $this->Address,
				  "state"				=> $this->State,
				   "userId" 			=> $this->UserId
				   );



                //Encode the array into JSON.
                $jsonDataEncoded = json_encode($jsonData);


                echo "<span style='display:none'>";
                //Tell cURL that we want to send a POST request.
                curl_setopt($ch, CURLOPT_POST, 1);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                //Attach our encoded JSON string to the POST fields.
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

                //Set the content type to application/json
                curl_setopt($ch, CURLOPT_HTTPHEADER, array($this->autht,'Content-Type: application/json; charset=utf-8'));

                //Execute the request
                $result = curl_exec($ch);

                //Close CURL
                curl_close($ch);

                echo"</span>";

               if($result){
                    
                    $testCheck = json_decode($result);
                    $status  = $testCheck->{'status'};
                    $message  = $testCheck->{'message'};

                    if(http_response_code(200) || $status == 200 ||  $status == 201){

						 echo "<script>alert('Client Data Created')</script>";
					}

			  }


		}


			public function updateClient($id){

					$data_array =  array(
					      "firstName" 		=> $this->FirstName,
						  "lastName" 		=> $this->LastName,
						 "phoneNumber" 		=> $this->PhoneNumber,
						 "idcardNo"			 => $this->IdcardNo,
					    "picturePath" 		=> $this->PicturePath,
					    "address"			=> $this->Address,
					    "state"				=> $this->State,
						 "userId" 			=> $this->UserId
				   );

					$url = $this->url_user_client."/".$id;
					$make_call = $this->callAPI('PUT', $url, json_encode($data_array), $this->autht);
					$response = json_decode($make_call, true);
					$status  = $response['status'];
					$message = $response['message'];
					
					if(http_response_code(200) || $status == 200 ||  $status == 201 ){

							

							    $_SESSION['cid']                   = $id;
                                $_SESSION['userId']                = $this->UserId;
                                $_SESSION['firstName']             = $this->FirstName;
                                $_SESSION['lastName']              = $this->LastName;
                                $_SESSION['phoneNumber']           = $this->PhoneNumber;
                                $_SESSION['picturePath']           = $this->PicturePath;
                                $_SESSION['address']               = $this->Address;
								$_SESSION['state']                 = $this->State;
								$_SESSION['idcardNo']              = $this->idcardNo;

                                 echo "<script>alert('Client Data Updated')</script>";
                              
					}

			}


			public function getUserIdClient($id){

					$url = $this->url_user_client.'/'.$id;
					$make_call = $this->callAPI('GET', $url, false, $this->autht);
					$response = json_decode($make_call, true);
					$status  =  $response['status'];
					$message = $response['message'];
					
					if(http_response_code(200) || $status == 200 ||  $status == 201 ){

							 return $message;
					}else{

						echo "<script>alert('User Have no data')</script>";
					}

			}


			public function getClientDetails($id){

				$url = $this->url_user_client.'/'.$id;
				$make_call = $this->callAPI('GET', $url, false, $this->autht);
				$response = json_decode($make_call, true);
				$status  =  $response['status'];
				$message = $response['message'];
				
				if(http_response_code(200) || $status == 200 ||  $status == 201 ){

						 return $message;
				}else{

					echo "<script>alert('User Have no data')</script>";
				}

		}



			public function getClients(){

					$url = $this->url_user_client;
					$make_call = $this->callAPI('GET', $url, false, $this->autht);
					$response = json_decode($make_call, true);
					$status  =  $response['status'];
					$message = $response['message'];
					
					if(http_response_code(200) || $status == 200 ||  $status == 201 ){

							 return $message;
					}else{

						echo "<script>alert('User Have no data')</script>";
					}

			}

			public function countUser($urlDetails){

					$url = $urlDetails;
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


			public function getArtisans(){

					$url = $this->url_user_artisan;
					$make_call = $this->callAPI('GET', $url, false, $this->autht);
					$response = json_decode($make_call, true);
					$status  =  $response['status'];
					$message = $response['message'];
					
					if(http_response_code(200) || $status == 200 ||  $status == 201 ){

							 return $message;
					}else{

						echo "<script>alert('User Have no data')</script>";
					}

			}

			public function getUserIdArtisans($id){

				$url = $this->url_user_artisan."/".$id;
				$make_call = $this->callAPI('GET', $url, false, $this->autht);
				$response = json_decode($make_call, true);
				$status  =  $response['status'];
				$message = $response['message'];
				
				if(http_response_code(200) || $status == 200 ||  $status == 201 ){

						 return $message;
				}else{

					echo "<script>alert('User Have no data')</script>";
				}

		}



			public function getUserArtisan($id){

					$url = $this->url_user_artisan."/".$id;

						 //Initiate cURL.
             		 $ch = curl_init();

					curl_setopt_array($ch, array(
					  CURLOPT_URL => $url,
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 50,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "GET",
					  CURLOPT_HTTPHEADER => array($this->autht,'Content-Type: application/json; charset=utf-8'),
					  
					));

					$make_call = curl_exec($ch);
					curl_close($ch);

					$response = json_decode($make_call, true);
					$status  =  $response['status'];
					$message = $response['message'];

					if(http_response_code(200) || $status == 200 ){
					     return $message;
					}

			}


		
		
			public function createArtisan(){

				$data_array =  array(
					"firstName" 		 	=> $this->FirstName,
					"lastName" 		 		=> $this->LastName,
				   "phoneNumber" 		 	=> $this->PhoneNumber,
				   "areaLocationId" 	 	=> $this->AreaLocationId,
				  "artisanCategoryId"  		=> $this->ArtisanCategoryId,
				  "idcardNo"			 	=> $this->IdcardNo,
				  "picturePath" 		 	=> $this->PicturePath,
				  "address"			 		=> $this->Address,
				  "state" 			 		=> $this->State,
				  "aboutMe" 			 	=> $this->AboutMe,
				   "userId" 			 	=> $this->UserId,
				   "refererCode" 	     	=> $this->RefererCode
			   );

				$url = $this->url_user_artisan;
				$make_call = $this->callAPI('POST', $url, json_encode($data_array),$this->autht);
				$response = json_decode($make_call, true);

				$status  = $response['status'];
				$message = $response['message'];
				
				if(http_response_code(200) || $status == 200 || $status == 201 ){

							 echo "<script>alert('Artisan Data Create')</script>";
							
				}

		}

			


			


			public function updateArtisan($id){

					$data_array =  array(
						"firstName" 		 	=> $this->FirstName,
						"lastName" 		 		=> $this->LastName,
					   "phoneNumber" 		 	=> $this->PhoneNumber,
					   "areaLocationId" 	 	=> $this->AreaLocationId,
					  "artisanCategoryId"  		=> $this->ArtisanCategoryId,
					  "idcardNo"			 	=> $this->IdcardNo,
					  "picturePath" 		 	=> $this->PicturePath,
					  "address"			 		=> $this->Address,
					  "state" 			 		=> $this->State,
					  "aboutMe" 			 	=> $this->AboutMe,
					   "userId" 			 	=> $this->UserId,
					   "refererCode" 	     	=> $this->RefererCode
				   );



					$url = $this->url_user_artisan."/".$id;
					$make_call = $this->callAPI('PUT', $url, json_encode($data_array),$this->autht);
					$response = json_decode($make_call, true);
					$status  = $response['status'];
					$message = $response['message'];
					
					if(http_response_code(200) || $status == 200 ||  $status == 201 ){

							

                                $_SESSION['aid']                   = $id;
                                $_SESSION['userId']                = $this->UserId;
                                $_SESSION['firstName']             = $this->FirstName;
                                $_SESSION['lastName']              = $this->LastName;
                                $_SESSION['phoneNumber']           = $this->PhoneNumber;
                                $_SESSION['idcardNo']              = $this->IdcardNo;
                                $_SESSION['picturePath']           = $this->PicturePath;
                                $_SESSION['address']               = $this->Address;
                                $_SESSION['state']                 = $this->State;
								$_SESSION['aboutMe']               = $this->AboutMe;
								$_SESSION['refererCode']           = $this->RefererCode;

                                 echo "<script>alert('Artisan Data Update')</script>";
                                
					}

			}


			public function findArtisanById($id){

						$url = $this->url_user_artisan;
						$get_data = $this->callAPI("GET", $url, false, $this->autht);
						$response = json_decode($get_data, true);
						$errors = $response['status'];
						$artisan_id = 0;
						
						
						if ($errors == 200 || $errors == 201){
							$data = $response['message'];
							
							foreach ($data as $datas) {

								if ($datas['userId'] == $id) {
									
									$artisan_id = $datas['id'];
								}
								
							}

						}

						return $artisan_id;

		  }

		  public function findClientById($id){

						$url = $this->url_user_client;
						$get_data = $this->callAPI("GET", $url, false, $this->autht);
						$response = json_decode($get_data, true);
						$errors = $response['status'];
						$client_id = 0;
						
						if ($errors == 200 || $errors == 201){
							$data = $response['message'];

							foreach ($data as $datas) {

								if ($datas['userId'] == $id) {
									
									$client_id = $datas['id'];
								}
								
							}

						}

						return $client_id;

		  }



}

?>