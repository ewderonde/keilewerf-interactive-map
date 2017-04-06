<?php
/**
 * Created by PhpStorm.
 * User: Sven de Ronde
 * Date: 21-3-2017
 * Time: 00:49
 */
include 'partials/config.php';
include 'partials/Repository.php';

$config = new Config();
$repository = new Repository($config->connection());
$search = $repository->search('bende');

$bende = $search[0];

$status = $bende['present'];
$statusText = ($status == '1')? 'Uitchecken' : 'Inchecken';
$class = ($status == '1')? 'btn btn-success' : 'btn btn-danger';

$currentStatus = ($status == '1')? 'ingecheckt' : 'uitgecheckt';


// var_dump($bende);
if(isset($_POST['toggle'])) {
	$repository->togglePresentStatus($bende['id']);
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Admin - Keilewerf</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<p>Uw bent momenteel <strong><?php echo $currentStatus ?> </strong></p>
	<input type="submit" name="toggle" value="<?php echo $statusText; ?>" class="<?php echo $class; ?>">
</body>
</html>