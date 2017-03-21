<?php
/**
 * Created by PhpStorm.
 * User: Sven de Ronde
 * Date: 20-3-2017
 * Time: 21:37
 */
include 'partials/config.php';
include 'partials/Repository.php';

$config = new Config();
$repository = new Repository($config->connection());

$companies = $repository->getCompanies();
// $searchTest = $repository->search('design');
// $toggleTest = $repository->togglePresentStatus(1);


header('Content-Type: application/json');
echo json_encode($companies);
die();