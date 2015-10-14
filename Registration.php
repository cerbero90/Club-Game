<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<!--<link rel="stylesheet" href="./style.css">-->
</head>
<body>
	<div id="form">
		<form method="post">
			Email
			<input type="email" name="email" value="example@email.com">
			<input type="button" name="signup" value="Go!">
		</form>		
	</div>
</body>
</html>





<?php

	class Validator
	{
		protected $email;



		public function __construct()
		{
			$this->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		}

		public function validateEmail()
		{
			if( ! filter_var($this->email, FILTER_VALIDATE_EMAIL))

				throw new Exception("Invalid email");

			else echo "Congratulation! Check your mail to verify your account!";
		}
	}



	class Database
	{
		//to comunicate with database
	}



	class Notifier
	{
		//send an email verification
	}



	class Controller
	{
		protected $validator;

		protected $database;

		protected $notifier;



		public function __construct(Validator $validator, Database $database, Notifier $notifier)
		{
			$this->validator = $validator;

			$this->database = $database;

			$this->notifier = $notifier;
		}

		public function run()
		{
			$this->validator->validateEmail();

			$this->database->//functionNameDatabase();		return false = ok

			
			if( ! /*functionNameDatabase()*/)

				$this->notifier->//functionNameNotifier();

			else throw new Exception("This email is already taken");
		}
	}






	if($_POST['signup'])
	{
		$validator = new Validator();

		$database = new Database();

		$notifier = new Notifier();

		$controller = new Controller($validator, $database, $notifier);
	}
?>