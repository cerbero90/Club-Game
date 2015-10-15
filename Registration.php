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
			<input type="submit" name="signup" value="Go!">
		</form>		
	</div>
</body>
</html>





<?php

	class Validator
	{

		public function validateEmail($email)
		{
			return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
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
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

			if( ! $this->validator->validateEmail($email))
			{
				throw new Exception('The provided email is not valid.');
			}

			if($this->database->hasUserWithEmail($email))
			{
				throw new Exception('This email has been already taken');
			}
			
			$this->notifier->sendWelcomeEmail($email);

			return 'Your account has been registered successfully!';
		}
	}






	if(isset($_POST['signup']))
	{
		$validator = new Validator();

		$database = new Database();

		$notifier = new Notifier();

		$controller = new Controller($validator, $database, $notifier);

		echo $controller->run();
	}
?>
