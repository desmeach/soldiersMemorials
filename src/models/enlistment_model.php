<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/soldiers/src/models/country_model.php";

class EnlistmentModel
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function openConnection()
    {
        $this->database->openConnection();
    }

    public function closeConnection()
    {
        $this->database->closeConnection();
    }

    public function readEnlistmentById(int $id)
    {
        $enlistment = R::findOne('enlistment', 'id = ?', [$id]);

        $enlistment["country"] = new CountryModel($this->database);
        $enlistment["country"] = $enlistment["country"]->readCountryById($enlistment["id_country"]);

        return $enlistment;
    }
}