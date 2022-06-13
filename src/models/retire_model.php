<?php
class RetireModel
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

    public function readRetireById(int $id)
    {
        $retire = R::findOne('retire', 'id = ?', [$id]);

        return $retire;
    }
}