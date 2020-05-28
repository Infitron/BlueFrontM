<?php  


	class Category extends Api	{


			

			public function getCategory(){
				$url = $this->url_user_acategory;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
			    $errors = $response['status'];
			    if ($errors == 200){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get Categories";
			    }    
			    
			    return $data;
			}


		}











 ?>