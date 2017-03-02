<?php 

	class Session 
	{
		private $signed_in = false;
		public $user_id;
		public $message;

		function __construct()
		{
			session_start();
			$this->check_log_in();
			$this->check_message();
		}

		public function message($msg = "") 
		{
			if(!empty($msg)){
				$_SESSION['message'] = $msg;
			} else {
				return $this->message;
			}
		}

		private function check_message()
		{
			if(isset($_SESSION['message'])){
				$this->message = $_SESSION['message'];
				unset($_SESSION['message']);
			} else {
				$this->message = "";
			}
		}


		public function is_signed_in()
		{
			return $this->signed_in;
			//getter to get private property in session
		}

		public function log_in($user) //user value coming from database
		{
			if($user){
				$this->user_id = $_SESSION['user_id'] = $user->id; //assigining property in user class
				$this->signed_in = true;
			}
		}

		public function log_out()
		{
			unset($_SESSION['user_id']);
			unset($this->user_id);
			$this->signed_in = false;
		}

		private function check_log_in()
		{
			if(isset($_SESSION['user_id'])) {
				$this->user_id = $_SESSION['user_id'];
				$this->signed_in = true;
			} else {
				unset($this->user_id);
				$this->signed_in = false;
			}
		}
	}

	$session = new Session();
	$message = $session->message();

 ?>