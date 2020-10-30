<?php  


	class Order extends Api	{


            public $id;
            public $clientId;
            public $artisanId;
            public $artisanFullName;
            public $clientFullName;
            public $messages;
            public $msgDate;
            public $msgTime;
            public $serviceId;
            public $quoteId;
            public $createdDate;


            public function postOrder(){

                $data_array =  array(
                    "clientUserId" 	=> $this->clientId,
                    "messages" 	    => $this->messages,
                    "serviceId" 	=> $this->serviceId,
                   
                );

                $url = $this->url_user_order;
                $get_data = $this->callAPI("POST", $url, json_encode($data_array), $this->autht);
                $response = json_decode($get_data, true);
                $status  = $response['status'];
                $message = $response['message'];
                        
                if(http_response_code(200) || $status == 200 || $status == 201){
                         echo "<script>alert('Order Successfully Posted, Artisan Well Get To You Soon.')</script>";
                }
            }

            public function putOrder($id){

                $data_array =  array(
                    "bookingId" 	=> $id,
                    "qouteId" 	    => $this->quoteId,
                   
                );

                $url = $this->url_user_service."/".$id;
			    $get_data = $this->callAPI("PUT", $url, json_encode($data_array), $this->autht);
                $response = json_decode($get_data, true);
                $status  = $response['status'];
                $message = $response['message'];
                        
                if(http_response_code(200) || $status == 200 || $status == 201){
                         echo "<script>alert('Order Successfully Updated')</script>";
                }
            }

		public function getOrder(){

			$url = $this->url_user_order;
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

        public function getOrderId($id){

			$url = $this->url_user_order."/".$id;
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


        public function getOrderByArtisanId($id){

			$url = $this->url_user_order."/Artisan/".$id;
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


        public function getOrderByClientId($id){

			$url = $this->url_user_order;
			$get_data = $this->callAPI("GET", $url, false, $this->autht);
			$response = json_decode($get_data, true);
			$errors = $response['status'];
			$orderQ = array();
			
			if ($errors == 200 || $errors == 201){
                $data = $response['message'];
                
                foreach ($data as $datas) {

                    if ($datas['clienId'] == $id) {
                        
                        $orderQ = $datas;
                    }
                    
                }

            }
            

			return $orderQ;
        }
        

       
        
            
        





}




 ?>