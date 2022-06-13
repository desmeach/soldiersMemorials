<?php
require $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/lib/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/models/soldier_model.php';

class Controller
{

    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function handle($request)
    {
        switch ($request) {
            case 'create':
                break;
            case 'edit':
                break;
            case 'delete':
                break;
            case 'add_photo':
                break;
            default:
                $this->readSoldier();
                break;
        }
    }

    public function readSoldier()
    {
        $this->model->openConnection();
        if (isset($_GET["id"]))
        {
            $soldier = $this->model->readSoldierById((int) $_GET["id"]);
        }
        else
        {
            $soldier = $this->model->readSoldierBySurname($_GET["surname"]);
        }
        include_once $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/views/header.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/views/soldier.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/views/footer.php';

        $this->model->closeConnection();
    }
}