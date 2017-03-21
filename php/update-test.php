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
        De Keilewerf
    </title>
</head>
<body>
    <?php foreach($companies as $company) {
        $class = ($company['present'] == 1)? 'btn-success' : 'btn-danger'; ?>
        <button class="btn <?=$class . ' '. $company['tag'] ?>"> <?= $company['name'] ?> </button>
    <?php } ?>
<!-- Jquery and custom Javascript files -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../js/jquery.autocomplete.js"></script>
<!--    <script src="../js/main.js" type="text/javascript"></script>-->

<!-- Temporary Script for testing -->
<script>
    var update = function() {
        $.ajax({
            type: "GET",
            url: BASE_URL + '/php/companies.php',
            success: function (result) {
                renderCompanies(result);
            },
            error: function (result) {
                console.log(result);
            }
        });
    };

    var renderCompanies = function (companies) {
        console.log('Refresh.');
        for(var i = 0; i < companies.length; i++) {
            var target = $('.'+companies[i].tag);
            if(companies[i].present == 1) {
                target.removeClass('btn-danger');
                target.addClass('btn-success');
            } else {
                target.removeClass('btn-success');
                target.addClass('btn-danger');
            }
        }
    };

    setInterval(function () { update(); }, 3000);
</script>
</body>
</html>
