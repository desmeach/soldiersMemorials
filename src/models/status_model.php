<?php
class StatusModel
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

    public function readStatusById(int $id)
    {
        $status = R::findOne('status', 'id = ?', [$id]);

        return $status;
    }
}