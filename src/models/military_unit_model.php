<?php
class MilitaryUnitModel
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

    public function readMilitaryUnitById(int $id)
    {
        $militaryUnit = R::findOne('military_unit', 'id = ?', [$id]);

        return $militaryUnit;
    }
}