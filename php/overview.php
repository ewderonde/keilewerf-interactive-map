<?php
/**
 * Created by PhpStorm.
 * User: Sven de Ronde
 * Date: 21-3-2017
 * Time: 00:40
 */

include 'partials/config.php';
include 'partials/Repository.php';

$config = new Config();
$repository = new Repository($config->connection());
$companies = $repository->getCompanies();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>
     Aanwezigheid
    </title>
</head>
    <body>
        <a href="company-admin.php">terug naar beheerpagina</a>
        <form>
            <?php foreach($companies as $company) {
                $class = ($company['present'] == 1)? 'btn-success' : 'btn-danger'; ?>
                <div class="btn <?=$class . ' '. $company['tag'] ?> btn-xs-block mobile-button" name="<?= $company['id'] ?>" style="pointer-events: none;"><?= $company['name'] ?> </div>
            <?php } ?>
        </form>
        <style>
            .mobile-button {
                width: 24%;
                display: block;
                margin: 0.5% 0.5%;
            }
            form {
                display: flex;
                flex-flow: row wrap;
            }
        </style>
    </body>
</html>
