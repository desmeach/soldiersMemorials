<?php

require $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/controllers/controller.php';

$controller = new Controller(
    new SoldierModel(
        new Database('db_soldiers')
    )
);

$request = str_replace('.php', '', basename($_SERVER['PHP_SELF']));
$request = trim($request, '/');

$controller->handle($request);