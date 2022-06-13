<?php
class CountryModel
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

    public function readCountryById(int $id)
    {
        $country = R::findOne('country', 'id = ?', [$id]);

        return $country;
    }
}