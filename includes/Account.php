<?php 

	class Account {

		private $errorArray;

		public function __construct() {
			$this->errorArray = array();
		}

		public function getError($error){
			if(!in_array($error, $this->errorArray)){
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
			$this->validateUsername($un);
			$this->validateFirstname($fn);
			$this->validateLastname($ln);
			$this->validateEmails($em, $em);
			$this->validatePasswords($pw, $pw);

			if(empty($this->errorArray)) {
				//Insert into db
				return true;
			}else{
				return false;
			}
		}

		private function validateUsername($un) {
			if(strlen($un)>25 || strlen($un) < 5) {
				$this->array_push($this->errorArray, Constants::$usernameCharacters);
				return;
			}
			//TODO: check if username exists
		}

		private function validateFirstname($un) {
			if(strlen($un)>25 || strlen($un) < 2) {
				$this->array_push($this->errorArray, Constants::$firstNameCharacters);
				return;
			}
		}

		private function validateLastname($un) {
			if(strlen($un)>25 || strlen($un) < 2) {
				$this->array_push($this->errorArray, Constants::$lastNameCharacters);
				return;
			}
		}

		private function validateEmails($em, $em2) {
			if($em != $em2) {
				array_push($this->errorArray, Constants::$emailsDoNotMatch);
				return;
			}
			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, Constants::$emailInvalid);
				return;
			}

			//TODO: check that username hasn't already been used
		}

		private function validatePasswords($pw, $pw2) {
			if($pw != $pw2) {
				array_push($this->errorArray, Constants::$passwordDoNotMatch);
				return;
			}
			if(preg_match("/[^A-Za-z0-9]/" ,$pw)) {
				array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
				return;
			}

			if(strlen($pw)>30 || strlen($pw) < 5) {
			$this->array_push($this->errorArray, Constants::$passwordCharacters);
			return;
			}

			//TODO: check that username hasn't already been used

		}

	}

?>