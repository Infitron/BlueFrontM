<?php

	/*
	 * Session Class
	 */
	class Session{

		private $signed_in = false;
		public  $user_id;
		public  $token;
		public  $userRole;
		public  $userRoleId;
		public  $message;
		public  $count;
		
		function __construct(){
			session_start();
			$this->check_the_login();
			$this->check_message();
			$this->visitor_count();
		}


		public function visitor_count(){

			if (isset($_SESSION['count'])) {
				
				return $this->count = $_SESSION['count']++;				
			}else{

				return $_SESSION['count'] = 1;
			}
		}

		public function message($msg=""){
			if (!empty($msg)) {
				$_SESSION['message'] = $msg;
			}else{
				return $this->message;
			}
		}

		private function check_message(){
			if(isset($_SESSION['message'])){
				$this->message = $_SESSION['message'];
				unset($_SESSION['message']);

			}else{
				$this->message = "";
			}
		}

		public function is_signed_in(){
			return $this->signed_in;
		}

		public function login($user){
			if($user){
				$this->user_id		= $_SESSION['user_id'];
				$this->token 		= $_SESSION['token'];
				$this->userRole 	= $_SESSION['userRole'];
				$this->userRoleId 	= $_SESSION['userRoleId'];
				$this->signed_in = true;
			}
		}

		public function logout(){
			unset($_SESSION['user_id']);
			unset($_SESSION['token']);
			unset($_SESSION['userRole']);
			unset($_SESSION['userRoleId']);
			unset($this->user_id);
			unset($this->token);
			unset($this->userRole);
			unset($this->userRoleId);
			$this->signed_in = false;
		}

		public function check_the_login(){
			if(isset($_SESSION['user_id']) && isset($_SESSION['token']) && isset($_SESSION['userRole']) && isset($_SESSION['userRoleId']) ){
				$this->user_id		= $_SESSION['user_id'];
				$this->token 		= $_SESSION['token'];
				$this->userRole 	= $_SESSION['userRole'];
				$this->userRoleId 	= $_SESSION['userRoleId'];
				$this->signed_in = true;
			}else{
				unset($this->user_id);
				unset($this->token);
				unset($this->userRole);
				unset($this->userRoleId);
				$this->signed_in = false;
			}
		}




	}

	$session = new Session();
	$message = $session->message();
	

?>