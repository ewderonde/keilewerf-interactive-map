<?php
/**
 * Created by PhpStorm.
 * User: Sven de Ronde
 * Date: 6-4-2017
 * Time: 12:10
 */

include 'partials/config.php';
include 'partials/Repository.php';
$config = new Config();
$repository = new Repository($config->connection());

if(isset($_POST['id'])) {
    // Recheck status after post.
    $id = $_POST['id'];
    $repository->togglePresentStatus($id);

    $search = $repository->search('bende');

    $bende = $search[0];

    $status = $bende['present'];
    $statusText = ($status == 1)? 'Uitchecken' : 'Inchecken';
    $class = ($status == 1)? 'btn btn-danger' : 'btn btn-success';

    $currentStatus = ($status == 1)? 'ingecheckt' : 'uitgecheckt';

    echo json_encode(['status' => 'success', 'buttonText' => $statusText, 'statusText' => $currentStatus, 'btnclass' => $class , 'company_status' => $status]);
}