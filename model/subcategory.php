<?php  


	class SubCategory extends Api	{


			

			public function getSubCategory(){
				$url = $this->url_user_aSubcategory;
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