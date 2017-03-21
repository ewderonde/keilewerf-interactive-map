<?php
    if(isset($_POST['search'])) {
        include 'partials/config.php';
        include 'partials/Repository.php';

        $config = new Config();
        $repository = new Repository($config->connection());

        $searchResult = $repository->search($_POST['search']);
        header('Content-Type: application/json');
        echo json_encode(['status' => 200 , 'message' => 'success!', 'data' => $searchResult]);
        die();
    } else {
        echo json_encode(['status' => 400, 'message' => 'Bad request']);
    }

?>

