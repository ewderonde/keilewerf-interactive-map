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
</head>
<body>
	<p>Uw bent momenteel <strong id="status-text"><?php echo $currentStatus ?> </strong></p> <a href="logout.php">Uitloggen</a>
	<a href="overview.php">Aanwezigheid bekijken</a>
	<form id="toggle-form" method="post" action="" >
		<input type="hidden" name="id" value="<?php echo $bende['id']; ?>">
		<button id="toggle-status" type="button" name="toggle" value="<?php echo $bende ?>" class="<?php echo $class; ?>"><?php echo $statusText; ?></button>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
	<script src="../js/config.js"></script>
	<script src="../js/status-toggle.js"></script>
</body>
</html>