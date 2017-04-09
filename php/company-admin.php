<?php
/**
 * Created by PhpStorm.
 * User: Sven de Ronde
 * Date: 21-3-2017
 * Time: 00:49
 */
include 'partials/config.php';
include 'partials/Repository.php';
session_start();

if(!$_SESSION['loggedIn']) {
	header('location: login.php');
}

$config = new Config();
$repository = new Repository($config->connection());
$search = $repository->search('bende');

$bende = $search[0];

$status = $bende['present'];
$statusText = ($status == 1)? 'Uitchecken' : 'Inchecken';
$class = ($status == 1)? 'btn btn-danger' : 'btn btn-success';

$currentStatus = ($status == 1)? 'ingecheckt' : 'uitgecheckt';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin - Keilewerf</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		/* lelijk ik weet het :3 */
		body {
		    background: #34495e;
    		box-sizing: border-box;
		}
		.information {
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    transform: translateX(-50%) translateY(-50%);
		    background: #fff;
		    padding: 20px;
		    border-radius: 4px;
		    width: 250px;
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
	<div class="information">
		<p>Uw bent momenteel <strong id="status-text"><?php echo $currentStatus ?> </strong></p> 
		<form id="toggle-form" method="post" action="" >
			<input type="hidden" name="id" value="<?php echo $bende['id']; ?>">
			<button id="toggle-status" type="button" name="toggle" value="<?php echo $bende['id']; ?>" class="<?php echo $class; ?>"><?php echo $statusText; ?></button>
		</form>
		</br>
		<a href="logout.php">Uitloggen</a></br>
		<a href="overview.php">Aanwezigheid bekijken</a>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
	<script src="../js/config.js"></script>
	<script src="../js/status-toggle.js"></script>
</body>
</html>