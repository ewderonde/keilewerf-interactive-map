<?php
	session_start();
	if(isset($_SESSION['loggedIn'])) {
		header('location: company-admin.php');
	}
	$message = '';
	if(isset($_POST['email']) && isset($_POST['password'])){
		$email = $_POST['email' ];
		$password = $_POST['password'];

		if ($email == 'bende@keilewerf.nl' && $password == '1234') {
			$_SESSION['loggedIn'] = true;
			header('location: company-admin.php');
		} else {
			$message = 'Uw wachtwoord of gebruikersnaam is onjuist.';
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login - Keilewerf</title>
</head>
<body>
<form method="post" action="" autocomplete="off" >
	<div class="form-group">
		<label for="email">Emailadres</label>
		<input type="text" name="email" class="form-control">
	</div>

	<div class="form-group">
		<label for="email">Wachtwoord</label>
		<input type="password" name="password" autocomplete="off" class="form-control">
	</div>
	<input type="submit" value="login" class="btn btn-success">
</form>
<div class="validation-message">
	<p><?php echo $message  ?></p>
</div>
</body>
</html>