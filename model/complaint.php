<?php  


	class Complaint extends Api	{

		public $Id;
		public $Title;
		public $ArtisanId;
		public $Description;
		public $CreatedDate;
		public $StatusId;
		public $DateResolved;

			

			public function getComplaint(){
				$url = $this->url_user_complaint;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get Complaint";
			    }    
			    
			    return $data;
			}


			public function getComplainArtisantId($id){
				$url = $this->url_user_complaint."/GetAllComplaints/".$id;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
			    
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get Complaint";
			    }    
			    
			    return $data;
			}


			public function getComplaintId($id){
				$url = $this->url_user_complaintId."/GetComplaint/GetComplaint/".$id;
			    $get_data = $this->callAPI("GET", $url, false, $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
			    
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			    
			    }else{
			        echo "Unable to get Complaint";
			    }    
			    
			    return $data;
			}


				public function PostComplaint(){


					$data_array =  array(

						    "title" 			=> $this->Title,
							"artisanId" 		=> $this->ArtisanId,
							"description" 		=> $this->Description,
						    "createdDate"		=> $this->CreatedDate,
							"statusId" 		    => $this->StatusId,
							"dateResolved" 		=> $this->DateResolved
					   );

					$url = $this->url_user_complaint;
				    $get_data = $this->callAPI("POST", $url, json_encode($data_array), $this->autht);
				    $response = json_decode($get_data, true);
					$errors = $response['status'];
					$data = array();

				    if ($errors == 200 || $errors == 201){

				       $data = $response['message'];
				       echo "<script>alert('Complaint Created Successfully ')</script>";
				    
				    }else{
				        echo "Unable to Post Complaint";
				    }    
				    
				    return $data;
			}

			public function PutComplaint($id){


				$data_array =  array(

						    "title" 			=> $this->Title,
							"artisanId" 		=> $this->ArtisanId,
							"description" 		=> $this->Description,
						    "createdDate"		=> $this->CreatedDate,
							"statusId" 		    => $this->StatusId,
							"dateResolved" 		=> $this->DateResolved
				);



				$url = $this->url_user_complaint."/".$id;
			    $get_data = $this->callAPI("PUT", $url,json_encode($data_array), $this->autht);
			    $response = json_decode($get_data, true);
				$errors = $response['status'];
				$data = array();
			    if ($errors == 200 || $errors == 201){

			       $data = $response['message'];
			       echo "<script>alert('Complaint Updated Successfully')</script>";
				    
			    
			    }else{
			        echo "Unable to Update Complaint";
			    }    
			    
			    return $data;
			}



	}











 ?>