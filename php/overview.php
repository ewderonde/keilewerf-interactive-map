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
            padding: 20px;
            border-radius: 4px;
            width: 1200px;
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
        a {
            color: #fff;
            margin-bottom: 15px;
            display: block;
        }
        a:hover {
            text-decoration: underline;
            color: #fff;
        }
    </style>
</head>
    <body>
        <div class="information">
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
        </div>
    </body>
</html>
