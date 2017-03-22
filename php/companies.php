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

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

header('Content-Type: application/json');
echo json_encode(utf8ize($companies));
