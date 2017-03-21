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

foreach ($_POST as $item => $value) {
    $repository->togglePresentStatus($item);
    header('location: controlpanel.php');
}
?>