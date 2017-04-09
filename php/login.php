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
	<style>
		/* lelijk ik weet het :3 */
		body {
		    background: #34495e;
    		box-sizing: border-box;
		}
		form {
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    transform: translateX(-50%) translateY(-50%);
		    background: #fff;
		    padding: 20px;
		    border-radius: 4px;
		}
		input.form-control {
		    width: 100%;
		    background: #f7f7f7;
		    border: none;
		    padding: 10px;
		    box-sizing: border-box;
		    margin-bottom: 15px;
		    margin-top: 5px;
		    font-size: 16px;
		}
		label {
		    font-weight: 500;
		    font-family: sans-serif;
		}
		input.btn.btn-success {
		    width: 100%;
		    box-sizing: border-box;
		    padding: 10px;
		    margin-top: 10px;
		    margin-bottom: 10px;
		    background: #2ecc71;
		    border: 1px solid #27ae60;
		    border-radius: 4px;
		    color: #fff;
		    font-weight: 700;
		    cursor: pointer;
		    font-family: sans-serif;
		}
	</style>
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