<?php  


	class Api 
	{
		
		 
		 public $url_user_logic 		= "https://api.bluecollarhub.com.ng/api/Account/Login";
		 public $url_user_reg 			= "https://api.bluecollarhub.com.ng/api/Account/Register";
		 public $url_user_artisan 		= "https://api.bluecollarhub.com.ng/api/v1/artisan";
		 public $url_user_client 		= "https://api.bluecollarhub.com.ng/api/v1/Client";
		 public $url_user_bank 			= "https://api.bluecollarhub.com.ng/api/v1/BankDetail";
		 public $url_user_service 		= "https://api.bluecollarhub.com.ng/api/v1/Service";
		 public $url_user_article 		= "https://api.bluecollarhub.com.ng/api/v1/Article";
		 public $url_user_order 		= "https://api.bluecollarhub.com.ng/api/v1/Order";
		 public $url_user_quote 		= "https://api.bluecollarhub.com.ng/api/v1/Quote";
		 public $url_user_projct 		= "https://api.bluecollarhub.com.ng/api/v1/Project";
		 public $url_user_acategory 	= "https://api.bluecollarhub.com.ng/api/v1/ACategory";
		 public $url_user_location 		= "https://api.bluecollarhub.com.ng/api/v1/Location";
		 public $url_user_search 		= "https://api.bluecollarhub.com.ng/api/v1/Search";
		 public $autht;

		 function __construct(){
			$this->getToken();
		}



		public function getToken(){

						$curl = curl_init();
						$ctime = date("Y/m/d");
						curl_setopt_array($curl, array(
						  CURLOPT_URL => $this->url_user_logic,
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 30,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "POST",
						  CURLOPT_POSTFIELDS =>"{ \"username\": \"odubela.tolulope@gmail.com\", \"password\": \"Destiny321.\" }",
						  CURLOPT_HTTPHEADER => array(
						    "Content-Type: application/json"
						  ),
						));

						$response = curl_exec($curl);
						$err = curl_error($curl);
						curl_close($curl);
						//echo $err;
						//echo "This is the response".$response;
						$datam = json_decode($response);   
						$mid= $datam->userId; 
						$mrole= $datam->userRole;
						$mtoken = $datam->token;
						$dstatus = $datam->success;
						$derror = $datam->errorMessage;
						//echo "This is the Status ".$dstatus. "<br>Role: " .$mrole."<br> Error(If any): ".$derror."<br>UserId: ".$mid;
						//echo "<br>";

						if (is_null($derror)){
							$_SESSION["mID"] = $mid;
							$_SESSION["mtoken"] = $mtoken;
						    $_SESSION["mauth"] = "Authorization: bearer " . $mtoken;
							$this->autht = "Authorization: bearer " . $mtoken;
						   //echo $_SESSION["mtoken"];
						}else  {
							  foreach ($derror as $errorMessage => $val) {
							   echo "unable to start aplication: " .$val;

								}
						}
			}

		public function callAPI($method, $url, $data, $authuser){
				  
				   $curl = curl_init();

				   switch ($method){
				      case "POST":
				         curl_setopt($curl, CURLOPT_POST, 1);
				         if ($data)
				            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				         break;
				      case "PUT":
				         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
				         if ($data)
				            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
				         break;
				      default:
				         if ($data)
				            $url = sprintf("%s?%s", $url, http_build_query($data));
				   }

				   // OPTIONS:
				   curl_setopt($curl, CURLOPT_URL, $url);
				   curl_setopt($curl, CURLOPT_TIMEOUT, 30);
				   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				      $authuser,
				      'Content-Type: application/json',
				   ));
				   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

				   // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
				   // EXECUTE:
				   $result = curl_exec($curl);
				   if(!$result){die("Connection Failure");}
				   curl_close($curl);
				   return $result;

		}


		

		
	}



?>