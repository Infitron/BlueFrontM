<?php  


	class Quote extends Api	{


        public $id;
        public $artisanId;
        public $clientId;
        public $item;
        public $descr;
        public $price;
        public $discount;
        public $vat;
        public $address1;
        public $workmanShip;
        public $bookingId;
        public $orderDate;
        public $orderStatusId;
        public $quoteStatusId;
        public $quoteStatus;
        public $createdDate;
        public $booking;
        public $client;
        public $total;
        public $idNavigation;
        public $orderStatus;
        public $projects;

        //Post Variable 
        public $name;
        public $quantity;
        public $unitPrice;
        public $totalPrice;

        public $eachItem = array();


        
       
       

        

			public function getQuote(){
				$url = $this->url_user_quote;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
                $data = array();
                
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get Categories";
			    }    
			    
			    return $data;
            }

            public function getQuoteId($id){
				$url = $this->url_user_quote."/".$id;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
                $data = array();
                
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get Categories";
			    }    
			    
			    return $data;
            }



            public function postQuote(){


                $data_array =  array(
                     "item"  => array(

                                        "name"          => $this->eachItem[0],
                                        "quantity"      => $this->eachItem[1],
                                        "unitPrice"     => $this->eachItem[2],
                                        "totalPrice"    => $this->eachItem[3]

                                    ),
                      "discount"    => $this->discount,
                      "workmanShip" => $this->workmanShip,
                      "total"       => $this->total,
                      "bookingId"   => $this->bookingId,
                      "createdDate" => $this->createdDate, 
                      "orderDate"   => $this->orderDate 
    
                   
                );
    
                $url = $this->url_user_quote;
                $get_data = $this->callAPI("POST", $url, json_encode($data_array), $this->autht);
                $response = json_decode($get_data, true);
                $status  = $response['status'];
                $message = $response['message'];
                        
                if(http_response_code(200) || $status == 200 || $status == 201){
    
                                //print_r($message); die();
                                 echo "<script>alert('Quote Created Successfully')</script>";
                }
            }


            public function getQuoteByOrderId($id){
				$url = $this->url_user_quote;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
                $orderQ = array();
                
			    if ($errors == 200 || $errors == 201){

                   $data = $response['message'];
                   
                        foreach ($data as $datas) {

                            if ($datas['bookingId'] == $id) {
                                
                                $orderQ = $datas;
                            }
                            
                        }
			    
			    }  
			    
			    return $orderQ;
            }

            



			


		}











 ?>