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
            case 'soldier':
                $this->readSoldier();
                break;
            default:
                $this->readMemorial();
                break;
        }
    }

    public function readMemorial()
    {
        $this->model->openConnection();
        include_once $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/views/header.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/views/memorials/memorial.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/views/footer.php';

        $this->model->closeConnection();
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
            $soldier = $this->model->readSoldierByName([$_GET["surname"], $_GET["name"], $_GET["middle_name"]]);
        }
        include_once $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/views/header.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/views/soldier/soldier_data.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/soldiers/src/views/footer.php';

        $this->model->closeConnection();
    }
}