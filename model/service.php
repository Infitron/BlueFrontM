<?php  


	class Service extends Api	{

		public $id;
		public $artisanId;
		public $descriptions;
		public $serviceName;
		public $statusId;
		public $categoryId;
		public $subcategoryId;
		public $locationId;
		public $lgaId;
		public $image;
		public $creationDate;
		public $stateId;

		public $type;
		public $size;
		public $tmp_path;
		public $upload_directory = "../images/services";
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

				$this->image = basename($file['name']);
				$this->tmp_path = $file['tmp_name'];
				$this->type     = $file['type'];
				$this->size     = $file['size'];

				$this->save_users_images();

			}
			
		}


		public function image_path_and_placeholder(){
			return empty($this->image)? $this->image_placeholder : $this->upload_directory.'/'.$this->image;
		}


		public function save_users_images(){


				if(!empty($this->errors)){
					return false;
				}

				if(empty($this->image) || empty($this->tmp_path)){
					$this->errors[] = "File not available";
				}

				$target_path = $this->upload_directory."/".$this->image;

				if(file_exists($target_path)){
					$this->errors[] = "The file {$this->image} already exists";
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




		public function postService(){

			$data_array =  array(
				"artisanId" 	=> $this->artisanId,
				"serviceName"	=> $this->serviceName,
				"descriptions" 	=> $this->descriptions,
				"statusId" 		=> $this->statusId,
				"categoryId" 	=> $this->categoryId,
				"subCategoryId" => $this->subcategoryId,
				"locationId" 	=> $this->locationId,
				"lgaId"		    => $this->lgaId,
				"image" 		=> $this->image,
				"creationDate" 	=> $this->creationDate,
				"stateId" 		=> $this->stateId

			   
			);


			$url = $this->url_user_service;
			$get_data = $this->callAPI("POST", $url, json_encode($data_array), $this->autht);
			$response = json_decode($get_data, true);
			$status  = $response['status'];
			$message = $response['message'];
					
			if(http_response_code(200) || $status == 200 || $status == 201){

							//print_r($message); die();
							 echo "<script>alert('Service Created Successfully')</script>";
			}
		}


		public function putService($id){

			$data_array =  array(
				"artisanId" 	=> $this->artisanId,
			    "descriptions" 	=> $this->descriptions,
			    "serviceName"	=> $this->serviceName,
			    "statusId" 		=> $this->statusId,
				"categoryId" 	=> $this->categoryId,
				"subCategoryId" => $this->subcategoryId,
			    "locationId" 	=> $this->locationId,
			    "lgaId"		    => $this->lgaId,
			    "image" 		=> $this->image,
				"creationDate" 	=> $this->creationDate,
				"stateId" 		=> $this->stateId
		    );

			$url = $this->url_user_service."/".$id;
			$get_data = $this->callAPI("PUT", $url, json_encode($data_array), $this->autht);
			$response = json_decode($get_data, true);
			$status  = $response['status'];
			$message = $response['message'];
					
			if(http_response_code(200) || $status == 200 || $status == 201){

							//print_r($message); die();
							 echo "<script>alert('Service Successfully Updated')</script>";
			}
		}



		public function findServiceByUserId($id){

						$url      = $this->url_user_service;
						$get_data = $this->callAPI("GET", $url, false, $this->autht);
						$response = json_decode($get_data, true);
						$errors = $response['status'];
						$service_id = 0;
						if ($errors == 200 || $errors == 201){
							$data = $response['message'];

							foreach ($data as $datas) {

								if ($datas['artisanId'] == $id) {
									
									$service_id = $datas['id'];
								}
								
							}

						}

						return $service_id;

		  }


		  public function findServiceByCategoryId($id){

			$url      = $this->url_user_service;
			$get_data = $this->callAPI("GET", $url, false, $this->autht);
			$response = json_decode($get_data, true);
			$errors = $response['status'];
			$service = array();
			
			if ($errors == 200 || $errors == 201 || $errors == 404){
				$data = $response['message'];
				

				foreach ($data as $datas) {

					if ($datas['categoryId'] == $id) {
						
						$service = $datas;
					}
					
				}

			}

			return $service;

}


			public function findServiceBySubCategoryId($id){

				$url      = $this->url_user_service;
				$get_data = $this->callAPI("GET", $url, false, $this->autht);
				$response = json_decode($get_data, true);
				$errors = $response['status'];
				$service = array();
				
				if ($errors == 200 || $errors == 201 || $errors == 404){
					$data = $response['message'];
					

					foreach ($data as $datas) {

						if ($datas['categoryId'] == $id) {
							
							$service = $datas;
						}
						
					}

				}

				return $service;

			}


		  public function getServiceByArtisanId($id){

						$url      = $this->url_user_service."/AllService/".$id;
						$get_data = $this->callAPI("GET", $url, false, $this->autht);
						$response = json_decode($get_data, true);
						$errors = $response['status'];
						$data = array();
						
						if ($errors == 200 || $errors == 201){
							

							$data = $response['message'];
							

							
						}else{
					         echo "<script>alert('Unable to get your service')</script>";
					       // echo "<script> window.open('../artisan/index.php?ups','_self'); </script>";
					    } 

						return $data;

		  }



		  public function getServiceDetails($id){

				$url = $this->url_user_service."/".$id;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
				
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			         echo "<script>alert('Unable to get your service, please add your service')</script>";
			        echo "<script> window.open('../artisan/index.php?aus','_self'); </script>";
			    }    
			    
			    return $data;
			}


			public function getService(){

				$url = $this->url_user_service;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
				
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			         echo "<script>alert('Unable to get your service, please add your service')</script>";
			        //echo "<script> window.open('../artisan/index.php?aus','_self'); </script>";
			    }    
			    
			    return $data;
			}


			public function countServiceByArtisan($id){

				$url      = $this->url_user_service."/AllService/".$id;
				$get_data = $this->callAPI("GET", $url, false, $this->autht);
				$response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = $response['message'];
				
				if ($errors == 200 || $errors == 201){
					

					
					return sizeof($data);
					

					
				}else{
					 return 0;
				} 

				

			}





}




 ?>